$(document).ready(function() {
			//creating a connection from the front end, we use forceNew inorder to create a new connection for every new client
			var socket = io.connect('http://localhost:8080', {'forceNew':true});
			
			var user_name = '';
			var $message = $('#message');
			var $messages = $('#messages');
			var $messageForm = $('#form');
			var bleep = new Audio();
			bleep.src = "sound.mpa3";
			document.getElementById("message").disabled = true;
			var count = 0;
			var check_timer=false;
			var timer;
			var chatroom = {};
			
			function getCurrentTime()
			{
				var dt = new Date();
				var hrs = dt.getHours();
				var mins = dt.getMinutes();
				if(mins < 10)
				{
					mins = '0' + mins;
				}
				if(hrs > 12)
				{
					hrs -= 12;
					var time = hrs + ":" + mins + "PM";
				} else if(hrs == 0){
					hrs = 12;
					var time = hrs + ":" + mins + "AM";
				} else if(hrs < 10) {
					hrs = '0' + hrs;
					var time = hrs + ":" + mins + "AM";
				}else {
					var time = hrs + ":" + mins + "AM";
				}
				return time;
			}
						
			$("#nameandemail").click(function(e) {
				e.preventDefault();
				var value_name = $('#name').val();
				user_name = value_name;
				var value_mail = $('#email').val();
								
				if(value_name!=''&&value_mail!=''){
					var now = getCurrentTime();
					socket.emit("new user", {username: value_name, time: now}, function(data) {
						if(data){
							$('#username').css("display",'none');
							$('#usermail').css("display", 'none');
							$('#nameandemail').css("display", 'none');
							document.getElementById("message").disabled = false;
							$("#usererror").css("display", "none");
							$("#display-box").removeClass('hidden');
							$("#voice-call").removeClass('hidden');
							$("#like").removeClass('hidden');
							$("#unlike").removeClass('hidden');
						} else {
							$("#usererror").text("The username already exist");
						}
					});
				} else {
					$("#usererror").text("Please fill all the above fields");
				}
			});
			
			//	
			socket.on('Finding admin', function(data) {
				if(data.what!='Oops' && data.what!='Queue'){
					$("#onClose").addClass('hidden');
					$("#another-one").addClass('hidden');
					$messages.css('height', '300px');
					$messages.text("");
					var content = data.admin + ' has joined the chat';
					$("#chat_with").text(data.admin);
					bleep.play();
					$messages.append('<div class="row instructions"><span data-toggle="tooltip" title="' + data.time+ '" class="myToolTip">' + content + '</span></div><br />');
					$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
				} else if(data.what == 'Oops'){
					bleep.play();
					$messages.append('<div class="alert_instructions"><span data-toggle="tooltip" title="' + data.time+ '" class="myToolTip">' + ' Sorry but no admins are available to chat' + '</span></div><br />');
					$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
					$messages.css('height','260px');
					$("#another-one").removeClass('hidden');
				} else if(data.what == 'Queue'){
					bleep.play();		
					document.getElementById("message").disabled = true;
					var upper_secs = data.waiting_time%60;
					var upper_mins = (data.waiting_time-upper_secs)/60;
					if(upper_mins<10&&upper_secs<10)
					{
						upper_mins = '0'+upper_mins;
						uppper_secs = '0'+upper_secs;	
					} else if(upper_mins<10&&upper_secs>=10)
					{
						upper_mins = '0'+upper_mins;
					} else if(upper_mins>=10&& upper_secs<10)
					{
						upper_secs = '0'+upper_secs;
					}
					$messages.text("");
					$messages.append('<div id="upper_countdown"></div><div id="expected_time">' + upper_mins + ' minutes and '+upper_secs+' seconds.</div><br />');
					$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
					count = data.waiting_time;	
					if(check_timer){
						clearInterval(timer);
					}
					timer = setInterval(function() {
						check_timer = true;
						if(count!=0)
						{
							count-=1;
							$("#expected_time").text("");
							var secs = count%60;
							var mins = (count-secs)/60;
							if(mins<10&&secs<10)
							{
								mins = '0'+mins;
								secs = '0'+secs;	
							} else if(mins<10&&secs>=10)
							{
								mins = '0'+mins;
							} else if(mins>=10&& secs<10)
							{
								secs = '0'+secs;
							}
							$("#expected_time").text(mins+" minutes and "+secs+" seconds.");
						} else {
							check_timer = false;
							clearInterval(timer);
						}
					},1000);
				}
			});

			$('#message').bind('keypress',function(e) {
				if(e.keyCode == '13') {
					e.preventDefault();
					var msg_to = $("#chat_with").text();
					var value = $('#message').val();
					$message.val('');
					var now = getCurrentTime();
					socket.emit("message-to-admin",{msg: value, to: msg_to, time: now, chatroom_data: chatroom});
					$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
				}
			});
			
			socket.on("admin disconnected", function(data) {
				if(data.what == 'self')
				{
					var content = 'You have disconnected the chat';
					$("#chat_with").text("Live Chat");
					bleep.play();
					$messages.append('<div class="alert_instructions"><span data-toggle="tooltip" title="' + data.time+ '" class="myToolTip">' + content + '</span></div><br />');
					$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
					document.getElementById("message").disabled = true;
				} else {
					var content = 'chat has been disconnected by '+ data.adminname;
					$("#chat_with").text("Live Chat");
					bleep.play();
					if(data.time == undefined)
					{
						var now = getCurrentTime();
					} else {
						var now = data.time;
					}
					$messages.append('<div class="alert_instructions"><span data-toggle="tooltip" title="' + now + '" class="myToolTip">' + content + '</span></div><br />');
					$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
					document.getElementById("message").disabled = true;
					$messages.css('height','260px');
					$("#another-one").removeClass('hidden');
				}
			});
			
			socket.on('already disconnected', function(data) {
				$messages.text("");
				bleep.play();
				$messages.append('<div class="alert_instructions"><span data-toggle="tooltip" title="' + data.time+ '" class="myToolTip">' + data.what + '</span></div><br />');
				$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
			});
			
			// listining the messages and data which we are getting from the server
			socket.on('new-message', function(data) {
				if(data.what == 'Chatroom')
				{
					if(data.by == 'self'){
						var $strike = $("#messages div").last();
						var att = $strike.attr('id');
						$messages.append('<div id="right">'+ data.message + '<span>'+ data.time +'</span></div>');
						$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
						var pad = $("#messages div").last();
						if(att == undefined)
						{
							pad.addClass('hvr-bubble-right');
						}
						if(att == 'left') {
							pad.css("margin-top", "6px");
							pad.addClass('hvr-bubble-right');
						} else if(att != undefined){
							pad.css("margin-top", "2px");
							var atr = pad.prev().attr('class');
							if(atr == 'hvr-bubble-right') {
								pad.prev().css("border-radius", "10px 7px 0px 0px");
							} else {
								pad.prev().css("border-radius", "0px");
							}
							pad.css("border-radius", "0px 0px 10px 10px");
						}
					} else {
						var $strike = $("#messages div").last();
						var $strike_text = $("#messages div p").last().text();
						var att = $strike.attr('id');
						bleep.play();
						$messages.append('<div id="left"><p id="send_by">' + data.sendbywhom+ '</p>'+ data.message + '<span>'+ data.time +'</span></div>');
						$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
						var pad = $("#messages div").last();
						var pad_text = $("#messages div p").last().text();
						if(att == 'right' || att == undefined) {
							pad.css("margin-top", "6px");
							pad.addClass('hvr-bubble-left');
						} else {
							var atr = pad.prev().attr('class');
							if(atr == 'hvr-bubble-left' ) {
								if($strike_text == pad_text)
								{
									pad.prev().css("border-radius", "7px 10px 0px 0px");
									pad.css("margin-top", "2px");
									pad.find("#send_by").hide();
									pad.css("border-radius", "0px 0px 10px 10px");									
								} else {
									pad.addClass('hvr-bubble-left');
									pad.css("margin-top", "6px");
								}
							} else {
								if($strike_text == pad_text)
								{
									pad.find("#send_by").hide();
									pad.prev().css("border-radius", "0px");
									pad.css("margin-top", "2px");
									pad.css("border-radius", "0px 0px 10px 10px");
								} else {									
									pad.addClass('hvr-bubble-left');
									pad.css("margin-top", "6px");
								}
							}
						}
					}
				} else {
					if(data.by == 'self'){
						var $strike = $("#messages div").last();
						var att = $strike.attr('id');
						$messages.append('<div id="right">'+ data.message + '<span>'+ data.time +'</span></div>');
						$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
						var pad = $("#messages div").last();
						if(att == undefined)
						{
							pad.addClass('hvr-bubble-right');
						}
						if(att == 'left') {
							pad.css("margin-top", "6px");
							pad.addClass('hvr-bubble-right');
						} else if(att != undefined){
							pad.css("margin-top", "2px");
							var atr = pad.prev().attr('class');
							if(atr == 'hvr-bubble-right') {
								pad.prev().css("border-radius", "10px 7px 0px 0px");
							} else {
								pad.prev().css("border-radius", "0px");
							}
							pad.css("border-radius", "0px 0px 10px 10px");
						}
					} else if(data.by == 'admin') {
						var $strike = $("#messages div").last();
						var att = $strike.attr('id');
						bleep.play();
						$messages.append('<div id="left">'+ data.message + '<span>'+ data.time +'</span></div>');
						$("#messages").animate({scrollTop: $("#messages")[0].scrollHeight},'slow');
						var pad = $("#messages div").last();
						if(att == undefined)
						{
							pad.addClass('hvr-bubble-left');
						}
						if(att == 'right') {
							pad.css("margin-top", "6px");
							pad.addClass('hvr-bubble-left');
						} else if(att != undefined){
							pad.css("margin-top", "2px");
							var atr = pad.prev().attr('class');
							if(atr == 'hvr-bubble-left') {
								pad.prev().css("border-radius", "7px 10px 0px 0px");							
							} else {
								pad.prev().css("border-radius", "0px");
							}
							pad.css("border-radius", "0px 0px 10px 10px");
						}
					}
				}
			});
			
			socket.on("Chat Room", function(data) {
				chatroom.chat_createdBy = data.complete_data.chat_createdBy;
				chatroom.user_connected = data.complete_data.user_connected;
				chatroom.admins_connected = [];
				var adminJoined = data.joinedBy;
				var len = data.complete_data.admins_connected.length;
				for(i=0;i<len;i++)
				{
					var name = data.complete_data.admins_connected[i];
					chatroom.admins_connected.push(name);
				}
				$messages.append('<div class="instructions"><span data-toggle="tooltip" title="' + data.time + '" class="myToolTip">'+ adminJoined+ ' has joined the chat.</span></div>');
			});
			
			// when user is disconnecting the chat manually
			$(".end-chat").click(function(e) {
				e.preventDefault();
				$("#settings").hide();
				$messages.css('height','260px');
				var now = getCurrentTime();
				socket.emit("user disconnecting", {time: now});
				$("#onClose").addClass('hidden');
				$("#another-one").removeClass('hidden');
			});			
			$("#cancel").click(function(e) {
				e.preventDefault();
				$("#onClose").addClass('hidden');
				$messages.css("height","300px");
			}); 
			$("#start-another-chat").click(function(e) {
				e.preventDefault();
				u_name = user_name;
				var now = getCurrentTime();
				socket.emit("another chat", {username: u_name, time: now}, function(data) {
					$messages.text("");
					$("#another-one").addClass('hidden');
					$messages.css("height","300px");
					document.getElementById("message").disabled = false;
				});
			});
			$("#close").click(function(e) {
				e.preventDefault();
				$(".panel-primary").hide();
			});
			$("#delete-conversation").click(function(e) {
				e.preventDefault();
				$messages.text("");
			});
			$("#mute-conversation").click(function(e) {
				e.preventDefault();
				if(bleep.muted == true)
				{
					bleep.muted = false;
					$("#mute-conversation").text("Mute Conversation");		
				} else {
					bleep.muted = true;
					$("#mute-conversation").text("Unmute Conversation");
				}
			});
			
			
			$(".slide-toggle").click(function() {
				if($(".panel-body").is(':visible')) {
					$(".glyphicon-chevron-down").hide();
					$(".glyphicon-cog").hide();
					$(".glyphicon-remove").hide();
					$(".glyphicon-earphone").hide();
					$(".glyphicon-chevron-up").removeClass('hidden');
				} else {
					$(".glyphicon-chevron-down").show();
					$(".glyphicon-cog").show();
					$(".glyphicon-remove").show();
					$(".glyphicon-earphone").show();
					$(".glyphicon-chevron-up").addClass('hidden');
				}
				$("#body-and-all").slideToggle("slow");
			});
			
			$(".glyphicon-remove").click(function() {
				if($("#nameandemail").is(':visible')) {
					$('.panel-primary').hide();
				} else { 
					if($("#another-one").is(':visible')) {
						$("#another-one").addClass('hidden');
						$("#messages").css("height", "300px");
					}
					$("#onClose").removeClass('hidden');
					$("#messages").css("height", "260px");
				}
			});

			$(".glyphicon-remove").mousemove(function() {
				$(this).css("color", "#bb542b");
			}).mouseout(function() {
				$(this).css("color", "#878787");
			});
			$(".glyphicon-cog").mousemove(function() {
				$(this).css("color", "#d7d7d7");
			}).mouseout(function() {
				$(this).css("color", "#878787");
			});
			$(".glyphicon-cog").click(function(e) {
				if($("#settings").is(':visible')) {
					$("#settings").hide();
				} else {
					$("#settings").show();
					$("#settings").css('top', e.clientY+25).css('left', e.clientX-180);
				}
			});
			$(document).click(function(e) {     
				if($(e.target).attr('id') === "settings" || $(e.target).attr('class') === "link" || $(e.target).attr('id') === "display-box") {
				} else {
					if($("#settings").is(':visible')) {
						$("#settings").hide();
					}
				}
			});
			$(".slide-toggle").mousemove(function() {
				$(this).css("color", "#d7d7d7");
			}).mouseout(function() {
				$(this).css("color", "#878787");
			});
			
			$(".glyphicon-earphone").mousemove(function() {
				$(this).css("color", "#d7d7d7");
			}).mouseout(function() {
				$(this).css("color", "#878787");
			});
			
			$("#like").mousemove(function() {
				$(this).css("color", "#44619d");
				$(this).css("font-size", "20px");
			}).mouseout(function() {
				$(this).css("color", "#878787");
				$(this).css("font-size", "18px"); 
			});
			$("#unlike").mousemove(function() {
				$(this).css("color", "#44619d");
				$(this).css("font-size", "20px");
			}).mouseout(function() {
				$(this).css("color", "#878787");
				$(this).css("font-size", "18px");
			});
			$("#settings ul li").mousemove(function() {
				$(this).css("cursor", "pointer");
				$(this).addClass('setting_focus');
			}).mouseout(function() {
				$(this).removeClass('setting_focus');
			}); 
			
			$(".myToolTip").tooltip();
		});