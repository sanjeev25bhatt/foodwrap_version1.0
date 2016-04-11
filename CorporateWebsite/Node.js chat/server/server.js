// express is going to answer our http request and server website eventually  
var express = require('express');

//invocation of express, this will create a new instance of express application
var app = express();

//server represents the instance of our express which is wrapped in http
var server = require('http').Server(app);

//using socket io, (we are taking this io variable and invoking it in the server) defined above)
var io = require('socket.io')(server);

var users = {};

var adminLoginDetails = [{
	adminName: 'admin',
	password: 'adminpass'
},{
	adminName: 'admin2',
	password: 'adminpass2'
}];

var admins = {};

var adminList = [];

var users_waiting_list = [];

//express.static will do all the magic to set up a static directory for us
app.use(express.static('app'));

var message = '';

var total_chat_time = 0;
var counter = 0;
var avg_time = 0;

	function calcAverageTime(data)
	{
		var s = users[data].chat_startTime;
		var e = users[data].chat_endTime;
		var pos_s = s.indexOf('M');
		var pos_e = e.indexOf('M');
		pos_s -= 1;
		pos_e -= 1;
		var start_chat_time = s.substring(0, pos_s);
		var end_chat_time = e.substring(0, pos_e);
		var start_timeArray = start_chat_time.split(':');
		var end_timeArray = end_chat_time.split(':');
		var start_minutes = parseInt(start_timeArray[0])*60 + parseInt(start_timeArray[1]);
		var end_minutes = parseInt(end_timeArray[0])*60 + parseInt(end_timeArray[1]);
		var time = end_minutes - start_minutes;
		total_chat_time += time;
		avg_time = total_chat_time/counter;
	}
	
	function generating_avg_time()
	{
		var after_decimal = avg_time%1;
		var before_decimal = avg_time - after_decimal;
		var mins = before_decimal;
		var secs = Math.round(((after_decimal*100)/100)*60);
		var total_secs = (mins*60)+secs;
		return total_secs;
	}
	
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
		} else if(hrs == 0) {
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
	
	function in_waiting_list(name)
	{
		var count = users_waiting_list.length;
		var check;
		for(i=0;i<count;i++)
		{
			if(users_waiting_list[i]==name)
			{
				check = true;
				break;
			}
		}
		if(i==count)
		{
			check = false;
		}
		if(check)
		{
			var user_waiting_index = users_waiting_list.indexOf(name);
			users_waiting_list.splice(user_waiting_index, 1);
			for(j=0;j<count-1;j++)
			{
				var seconds = generating_avg_time();
				var number = j+1;
				var waitingTime = seconds*number;
				users[users_waiting_list[i]].emit("Finding admin", {what: "Queue", waiting_time: waitingTime, q_num: number});
			}
		}
	}
	
	//listening for something to get connect with our io, whenever a socket io thinks to connects with our app this will run
	io.on('connection', function(socket) {
		console.log("Some one connected :"+socket.id);
		
		// when a new user is added 
		socket.on("new user", function(data, callback) {
			if(data.username in users || data.username in admins){
				callback(false);
			} else {
				callback(true);
				socket.username = data.username;
				socket.chatwith = '';
				socket.chat_startTime = '';
				socket.chat_endTime = '';
				users[socket.username] = socket;
				console.log("user registered: "+socket.username);
				
				// allocating the admin to a specific user
				// case when no admin is logged in
				if(adminList.length==0)
				{
					users[socket.username].chatwith = '';
					console.log("No admins are available to chat, drop a message and we'll be back soon");
					socket.emit("Finding admin", {what: "Oops", time: data.time});
				} else {
					for(i=0;i<adminList.length;i++)
					{
						var check_admin = adminList[i];
						var chats = admins[check_admin].numOfChats;
						// when admin id found
						if(chats == 0 || chats == 1)
						{
							admins[check_admin].numOfChats += 1;
							console.log('Free admin found: '+check_admin);
							socket.emit("Finding admin", {admin: check_admin, time: data.time});
							admins[check_admin].emit('user ready', {name: socket.username, time: data.time, noOfUsers: chats});
							admins[check_admin].chatwith.push(socket.username);
							users[socket.username].chatwith = check_admin;
							users[socket.username].chat_startTime = data.time;
							break;
						} else {
							continue;
						}
					}
					// when none of the admin is free
					if(i == adminList.length)
					{
						users_waiting_list.push(socket.username);
						var number = users_waiting_list.length;
						console.log("You are on a waiting list, the number is: " + number);
						users[socket.username].chatwith = '';
						var seconds = generating_avg_time();
						var waitingTime = number * seconds;
						socket.emit("Finding admin", {what: "Queue", waiting_time: waitingTime,q_num: number});
					}
				}
			}
		});
		
		// when user starts another chat
		socket.on("another chat", function(data, callback) {
			callback(true);
			socket.username = data.username;
			socket.chatwith = '';				
			socket.chat_startTime = '';
			socket.chat_endTime = '';
			users[socket.username] = socket;
			console.log("user registered: "+socket.username);
			
			// allocating the admin to a specific user
			// case when no admin is logged in
			if(adminList.length==0)
			{
				users[socket.username].chatwith = '';
				console.log("No admins are available to chat, drop a message and we'll be back soon");
				socket.emit("Finding admin", {what: "Oops", time: data.time});
			} else {
				for(i=0;i<adminList.length;i++)
				{
					var check_admin = adminList[i];
					var chats = admins[check_admin].numOfChats;
					// when admin id found
					if(chats == 0 || chats == 1)
					{
						admins[check_admin].numOfChats += 1;
						console.log('Free admin found: '+check_admin);
						socket.emit("Finding admin", {admin: check_admin, time: data.time});
						admins[check_admin].emit('user ready', {name: socket.username, time:data.time, noOfUsers: chats});
						admins[check_admin].chatwith.push(socket.username);
						users[socket.username].chatwith = check_admin;
						users[socket.username].chat_startTime = data.time;
						break;
					} else {
						continue;
						}
				}
				// when none of the admin is free
				if(i == adminList.length)
				{
						users_waiting_list.push(socket.username);
						var number = users_waiting_list.length;
						console.log("You are on a waiting list, the number is: " + number);
						users[socket.username].chatwith = '';
						var seconds = generating_avg_time();
						var waitingTime = number * seconds;
						socket.emit("Finding admin", {what: "Queue", waiting_time: waitingTime,q_num: number});
				}
			}
		});
		
		// when user sends the message
		socket.on("message-to-admin", function(data){
			if(data.chatroom_data.chat_createdBy == undefined)
			{	
				admins[data.to].emit('new-message',{message: data.msg, time: data.time, name: socket.username, by: 'user'});
				socket.emit('new-message',{message: data.msg, time: data.time, by: 'self'});
			} else {
				if(data.chatroom_data.user_connected == socket.username)
				{
					var createdBy = data.chatroom_data.chat_createdBy;
					var len = data.chatroom_data.admins_connected.length;
					for(i=0;i<len;i++)
					{
						var name = data.chatroom_data.admins_connected[i];
						admins[name].emit('new-message', {message: data.msg, time: data.time, what: 'Chatroom', createdBy: createdBy, myname: name, name: socket.username, sendbywhom: socket.username, by: 'user'});
					}						
				socket.emit('new-message',{message: data.msg, time: data.time, by: 'self', what: 'Chatroom'});
				}
			}
		});
		
		// when admin sends the message
		socket.on("message-to-user", function(data){
			if(data.to in users){
				if(data.chatroom_data.room_createdBy == '')
				{
					socket.emit("new-message", {message: data.msg, time: data.time, by: 'self', name: data.to, myname: socket.adminname});
					users[data.to].emit('new-message',{message: data.msg, time: data.time, by: 'admin'});
				} else if(data.chatroom_data.room_createdBy != '')
				{
					var createdBy = data.chatroom_data.room_createdBy;
					var len = data.chatroom_data.admins_connected.length;
					for(i=0;i<len;i++)
					{
						var name = data.chatroom_data.admins_connected[i];
						admins[name].emit('new-message', {message: data.msg, time: data.time, what: 'Chatroom', myname: name, name: data.to, createdBy: createdBy, by: 'self', sendbywhom: socket.adminname});
					}
					users[data.to].emit('new-message',{message: data.msg, time: data.time, sendbywhom: socket.adminname, by: 'admin', what: 'Chatroom'});
				}
			} else {
				socket.emit('no user', {what: 'You are not connected with any user to chat with', time: data.time});
			}
		});
		
		// when admin tries to login
		socket.on("admin-login", function(data, callback) {
			var login_name = data.adminName;
			var login_pass = data.password;
			var temp=0;
			for(i=0;i<adminLoginDetails.length;i++)
			{
				if(login_name==adminLoginDetails[i].adminName&&login_pass==adminLoginDetails[i].password)
				{	
					temp = 1;
					console.log("An admin has logged in: "+ socket.id);
					callback(true);
					break;
				}
			}
			if(i==adminLoginDetails.length)
			{
				callback(false);
			}
		});
		
		// when a new admin is added 
		socket.on("new admin", function(data, callback) {
			if(data in admins || data in users){
				callback(false);
			} else {
				callback(true);
				socket.adminname = data;
				adminList.push(socket.adminname);
				socket.numOfChats = 0;
				socket.chatwith = [];
				admins[socket.adminname] = socket;
				console.log("Admin ready for chat: "+socket.adminname);
			}
		});
		
		
		// when someone disconnects by closing the chat window
		socket.on("disconnect", function(data) {
			if(!socket.username&&!socket.adminname) {
				console.log("Someone disconnected before registering"+socket.id);
				return;
			} else {
				if(socket.username){
					if(users[socket.username].GroupChats != undefined && users[socket.username].GroupChats.user_connected == socket.username)
					{
						var length = users[socket.username].GroupChats.admins_connected.length;
						for(i=0;i<length;i++){
							var name = users[socket.username].GroupChats.admins_connected[i];
							if(name in admins)
							{
								if(name == users[socket.username].GroupChats.chat_createdBy){
									admins[name].numOfChats -= 1;
									var index = admins[name].chatwith.indexOf(socket.username);
									admins[name].chatwith.splice(index, 1);
								}
								admins[name].emit("user disconnected", {username: socket.username, what: 'user'});
								var now = getCurrentTime();
								users[socket.username].chat_endTime = now;
								counter++;
								var username = socket.username;
								calcAverageTime(username);
							}
						}
						in_waiting_list(socket.username);
						delete users[socket.username];
						console.log("User disconnected " + socket.username);						
					} else {
						var notify_whom = users[socket.username].chatwith;
						if(notify_whom in admins){
							admins[notify_whom].numOfChats -= 1;
							var index = admins[notify_whom].chatwith.indexOf(socket.username);
							admins[notify_whom].chatwith.splice(index, 1);
							admins[notify_whom].emit("user disconnected", {username: socket.username, what: 'user'});
							var now = getCurrentTime();
							users[socket.username].chat_endTime = now;
							counter++;
							var username = socket.username;
							calcAverageTime(username);
						}
						in_waiting_list(socket.username);
						delete users[socket.username];
						console.log("User disconnected " + socket.username);						
					}

				}
				if(socket.adminname){
					if(admins[socket.adminname].GroupChats != undefined)
					{
						for(var key in admins[socket.adminname].GroupChats)
						{
							var username = admins[socket.adminname].GroupChats[key].user_connected;
							if(username in users)
							{
								var length = admins[socket.adminname].GroupChats[key].admins_connected.length;
								if(length == 1)
								{
									users[username].emit("admin disconnected", {adminname: socket.adminname});
									users[username].chatwith = '';
									var now = getCurrentTime();
									users[username].chat_endTime = now;
									counter++;
									calcAverageTime(username);
									delete users[username].GroupChats;
								} else {
									var admin_disconnecting = socket.adminname;
									for(i=0;i<length;i++)
									{
										console.log(admins[socket.adminname].GroupChats);
										var name = admins[socket.adminname].GroupChats[key].admins_connected[i];
										admins[name].emit("Chat Left", {adminname: socket.adminname, userName: username});
										var index = admins[name].GroupChats[key].admins_connected.indexOf(admin_disconnecting);
										admins[name].GroupChats[key].admins_connected.splice(index, 1);
									}
									var index = users[username].GroupChats.admins_connected.indexOf(socket.adminname);
									users[username].GroupChats.admins_connected.splice(index, 1);
									//users[username].emit("Chat Left", {adminname: socket.adminname});
								}	
							}
						}
						adminList.splice(adminList.indexOf(socket.adminname), 1);
						delete admins[socket.adminname];
					} else {
						var notify_whom1 = admins[socket.adminname].chatwith[0];
						var notify_whom2 = admins[socket.adminname].chatwith[1];
						if(notify_whom1 in users)
						{
							users[notify_whom1].emit("admin disconnected", {adminname: socket.adminname});
							users[notify_whom1].chatwith = '';
							var now = getCurrentTime();
							users[notify_whom1].chat_endTime = now;
							counter++;
							calcAverageTime(notify_whom1);
						}
						if(notify_whom2 in users)
						{
							users[notify_whom2].emit("admin disconnected", {adminname: socket.adminname});
							users[notify_whom2].chatwith = '';
							var now = getCurrentTime();
							users[notify_whom2].chat_endTime = now;
							counter++;
							calcAverageTime(notify_whom2);
						}
						adminList.splice(adminList.indexOf(socket.adminname), 1);
						delete admins[socket.adminname];
						console.log("Admin disconnected "+socket.adminname);						
					}
				}
			}
		});
			
			
			
		// when user disconnects manually	
		socket.on("user disconnecting", function(data) {
			if(socket.chatwith == ''){
				socket.emit("already disconnected", {what: 'You are not currently connected with any active chat sessions', time: data.time});
			} else {
				if(!socket.username) {
					users[socket.username].emit("admin disconnected", {what: 'self', time: data.time});
					console.log("Someone disconnected before registering"+socket.id);
					return;
				} else {
					if(socket.username){
						var notify_whom = users[socket.username].chatwith;
						if(notify_whom in admins){
							admins[notify_whom].numOfChats -= 1;
							var index = admins[notify_whom].chatwith.indexOf(socket.username);
							admins[notify_whom].chatwith.splice(index, 1);
							admins[notify_whom].emit("user disconnected", {what: 'user', username: socket.username, time: data.time});
							users[socket.username].emit("admin disconnected", {what: 'self', time: data.time});
							users[socket.username].chatwith = '';
							users[socket.username].chat_endTime = data.time;
							counter++;
							var username = socket.username;
							calcAverageTime(username);
						}
						in_waiting_list(socket.username);
						delete users[socket.username];
						console.log("User disconnected "+socket.username);
						delete socket.username;
					}
				}
			}	
		});
		
		// when admin disconnects manually
		socket.on("admin disconnecting", function(data, callback) {
			if(data.username == 'Live Chat'){
				callback(true);
			} else {
				if(!socket.adminname) {
					
				} else {
					if(socket.adminname) {
						var notify_whom = data.username;
						if(notify_whom in users) {
							admins[socket.adminname].numOfChats -= 1;
							var index = admins[socket.adminname].chatwith.indexOf(data.username);
							admins[socket.adminname].chatwith.splice(index, 1);
							admins[socket.adminname].emit("user disconnected", {what: 'self', time: data.time, username: notify_whom});
							users[notify_whom].emit("admin disconnected", {adminname: socket.adminname, what: 'admin', time: data.time});
							users[notify_whom].chatwith = '';
							users[notify_whom].chat_endTime = data.time;
							counter++;
							calcAverageTime(notify_whom);
						}					
					}
				}
			}
			
		});
		
		socket.on("connect automatically", function(data) {
			if(users_waiting_list.length>0) {	
				var user_connecting = users_waiting_list[0];
				in_waiting_list(user_connecting);	
				var chats = admins[socket.adminname].numOfChats;
				admins[socket.adminname].numOfChats += 1;		
				users[user_connecting].emit("Finding admin", {admin: socket.adminname, time: data.time});
				socket.emit('user ready', {name: user_connecting, time:data.time, noOfUsers: chats});
				admins[socket.adminname].chatwith.push(user_connecting);
				users[user_connecting].chatwith = socket.adminname;
				users[user_connecting].chat_startTime = data.time;
			}
		});
		
		socket.on("admins name", function(data) {
			var user_name = data.username;
			if(user_name in users) {
				socket.emit("Listing admins", {adminList: adminList, username: user_name, myname: socket.adminname});
			} else {
				return;
			}
		});

		socket.on("Sending Chat Request", function(data, callback) {
			var admin_name = data.admin_name;
			var userConnected = data.user_name;
			var time = data.time;
			if(admin_name in admins)
			{	
				if(admins[admin_name].GroupChats == undefined)
				{	
					var length;
					if(admins[socket.adminname].GroupChats == undefined || admins[socket.adminname].GroupChats[userConnected] == undefined)
					{	
						length = 0;
					} else {
						length = admins[socket.adminname].GroupChats[userConnected].admins_connected.length;
					}
					if(length < 3)
					{
						admins[admin_name].emit("Recieving chat Request", {requestBy: socket.adminname, userConnected: data.user_name, time: data.time}, function(data) {
							if(data) 
							{
								if(admins[socket.adminname].GroupChats == undefined)
								{
									admins[socket.adminname].GroupChats = {};
									admins[socket.adminname].GroupChats[userConnected] = {};
									admins[socket.adminname].GroupChats[userConnected].admins_connected = [];
									admins[socket.adminname].GroupChats[userConnected].chat_createdBy = socket.adminname;
									admins[socket.adminname].GroupChats[userConnected].user_connected = userConnected;
									admins[socket.adminname].GroupChats[userConnected].admins_connected.push(socket.adminname);
									admins[socket.adminname].GroupChats[userConnected].admins_connected.push(admin_name);
									console.log(socket.adminname+ ": 1st");
									console.log(admins[socket.adminname].GroupChats);
								} else {
									if(admins[socket.adminname].GroupChats[userConnected] == undefined)
									{								
										admins[socket.adminname].GroupChats[userConnected] = {};
										admins[socket.adminname].GroupChats[userConnected].admins_connected = [];
										admins[socket.adminname].GroupChats[userConnected].chat_createdBy = socket.adminname;
										admins[socket.adminname].GroupChats[userConnected].user_connected = userConnected;
										admins[socket.adminname].GroupChats[userConnected].admins_connected.push(socket.adminname);
										admins[socket.adminname].GroupChats[userConnected].admins_connected.push(admin_name);
										console.log('2nd');
									} else if(admins[socket.adminname].GroupChats[userConnected].user_connected == userConnected){
										admins[socket.adminname].GroupChats[userConnected].admins_connected.push(admin_name);	
										var len = admins[socket.adminname].GroupChats[userConnected].admins_connected.length;
										var index = admins[socket.adminname].GroupChats[userConnected].admins_connected.indexOf(socket.adminname);
										var temp1;
										var temp2;
										for(i=0;i<len-1;i++)
										{
											if(i==index)
											{	
												continue;
											} else {
												for(j=i+1;j<len;j++)
												{
													if(j==index)
													{	
														continue;
													} else {
														temp1 = admins[socket.adminname].GroupChats[userConnected].admins_connected[i];
														temp2 = admins[socket.adminname].GroupChats[userConnected].admins_connected[j];
														if(admins[temp1].GroupChats != undefined)
														{
															console.log(admins[temp1].GroupChats);
															admins[temp1].GroupChats[userConnected].admins_connected.push(temp2);
														}
														if(admins[temp2].GroupChats != undefined)
														{
															admins[temp2].GroupChats[userConnected].admins_connected.push(temp1);
														}
													} 
												}	
											}
										}
										
										if(admins[temp1].GroupChats != undefined && admins[temp1].GroupChats[userConnected] != undefined)
										{
											admins[temp1].emit("Getting Request data", {chat_data: admins[temp1].GroupChats[userConnected]});		
										} 
										if(admins[temp2].GroupChats != undefined && admins[temp2].GroupChats[userConnected] != undefined)
										{
											admins[temp2].emit("Getting Request data", {chat_data: admins[temp2].GroupChats[userConnected]});		
										} 
										console.log(temp1+ ": 3");
										console.log(admins[temp1].GroupChats);
										console.log(temp2+ ": 3");
										console.log(admins[temp2].GroupChats);
									}
									console.log(socket.adminname+ ": 3+1");
									console.log(admins[socket.adminname].GroupChats);
								}
								
								if(admins[admin_name].GroupChats == undefined)
								{
									admins[admin_name].GroupChats = {};
									admins[admin_name].GroupChats[userConnected] = {};
									admins[admin_name].GroupChats[userConnected].chat_createdBy = socket.adminname;
									admins[admin_name].GroupChats[userConnected].user_connected = userConnected;
									admins[admin_name].GroupChats[userConnected].admins_connected = [];
									var len = admins[socket.adminname].GroupChats[userConnected].admins_connected.length;
									for(i=0;i<len;i++)
									{
										var name = admins[socket.adminname].GroupChats[userConnected].admins_connected[i];
										admins[admin_name].GroupChats[userConnected].admins_connected.push(name);
									}
									admins[admin_name].groupChat = 'Unable';
									admins[admin_name].emit("Getting Request data", {chat_data: admins[admin_name].GroupChats[userConnected]});	
									console.log(admin_name + ": 4");
									console.log(admins[admin_name].GroupChats);
								} else {
									if(admins[admin_name].GroupChats[userConnected] == undefined)
									{
										admins[admin_name].GroupChats[userConnected] = {};
										admins[admin_name].GroupChats[userConnected].admins_connected = [];
										admins[admin_name].GroupChats[userConnected].chat_createdBy = socket.adminname;
										admins[admin_name].GroupChats[userConnected].user_connected = userConnected;	
										var len = admins[socket.adminname].GroupChats[userConnected].admins_connected.length;								
										for(i=0;i<len;i++)
										{
											var name = admins[socket.adminname].GroupChats[userConnected].admins_connected[i];
											admins[admin_name].GroupChats[userConnected].admins_connected.push(name);
										}
										admins[admin_name].GroupChat = 'Unable';									
										admins[admin_name].emit("Getting Request data", {chat_data: admins[admin_name].GroupChats[userConnected]});
									} else if(admins[admin_name].GroupChats[userConnected].user_connected == userConnected){
										admins[admin_name].GroupChats[userConnected].admins_connected.push(admin_name);						
										admins[admin_name].emit("Getting Request data", {chat_data: admins[admin_name].GroupChats[userConnected]});			
									}
									console.log(socket.adminname+ ": 5");
									console.log(admins[socket.adminname].GroupChats);
									
								}
								socket.emit("Request Response", {time: time, joinedBy: admin_name, myname: socket.adminname, complete_data: admins[socket.adminname].GroupChats[userConnected]});
								admins[admin_name].emit("Request Response", {time: time, what: 'self', myname: admin_name, complete_data: admins[admin_name].GroupChats[userConnected]});
								users[userConnected].GroupChats = {};
								users[userConnected].GroupChats.admins_connected = [];
								users[userConnected].GroupChats.chat_createdBy = socket.adminname;
								users[userConnected].GroupChats.user_connected = userConnected;	
								var len = admins[socket.adminname].GroupChats[userConnected].admins_connected.length;								
								for(i=0;i<len;i++)
								{
									var name = admins[socket.adminname].GroupChats[userConnected].admins_connected[i];
									users[userConnected].GroupChats.admins_connected.push(name);
								}
								users[userConnected].emit("Chat Room", {joinedBy: admin_name, time: time, complete_data: users[userConnected].GroupChats});
								console.log("users :");
								console.log(users[userConnected].GroupChats);
							}
						});
						callback(true);
					} else {
						callback(false);
					}
				} else {
					callback(false);
				}
			}
		});
	});
 

server.listen(8080);