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

//express.static will do all the magic to set up a static directory for us
app.use(express.static('app'));

var message = '';
	
	//listening for something to get connect with our io, whenever a socket io thinks to connects with our app this will run
	io.on('connection', function(socket) {
		console.log("Some one connected :"+socket.id);
		
		// when a new user is added 
		socket.on("new user", function(data, callback) {
			if(data in users || data in admins){
				callback(false);
			} else {
				callback(true);
				socket.username = data;
				socket.chatwith = 'none';
				users[socket.username] = socket;
				console.log("user registered: "+socket.username);
				
				// allocating the admin to a specific user
				if(adminList.length==0)
				{
					console.log("No admins are available to chat, drop a message and we'll be back soon");
					socket.emit("Finding admin", "Oops");
				} else {
					for(i=0;i<adminList.length;i++)
					{
						var check_admin = adminList[i];
						var chats = admins[check_admin].numOfChats;
						if(chats == 0 || chats == 1)
						{
							admins[check_admin].numOfChats += 1;
							console.log('Free admin found: '+check_admin);
							socket.emit("Finding admin", check_admin);
							admins[check_admin].emit('user ready', {name: socket.username, noOfUsers: chats});
							admins[check_admin].chatwith.push(socket.username);
							users[socket.username].chatwith = check_admin;
							break;
						} else {
							continue;
						}
					}
					if(i == adminList.length)
					{
						console.log("No admins are available to chat, drop a message and we'll be back soon");
						socket.emit("Finding admin", "Oops");
					}
				}
			}
		});
		
		// when user sends the message
		socket.on("message-to-admin", function(data){
			admins[data.to].emit('new-message',{message: data.msg, name: socket.username});
			socket.emit('new-message',data.msg);
		});
		
		// when admin sends the message
		socket.on("message-to-user", function(data){
			socket.emit('new-message',{message: data.msg, name: data.to});
			users[data.to].emit('new-message',data.msg);
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
		
		
		// when someone disconnects
		socket.on("disconnect", function(data) {
			if(!socket.username&&!socket.adminname) {
				console.log("Someone disconnected before registering"+socket.id);
				return;
			} else {
				if(socket.username){
					var notify_whom = users[socket.username].chatwith;
					if(notify_whom in admins){
						admins[notify_whom].emit("user disconnected", socket.username);
					}
					delete users[socket.username];
					console.log("User disconnected "+socket.username);
				}
				if(socket.adminname){
					var notify_whom1 = admins[socket.adminname].chatwith[0];
					var notify_whom2 = admins[socket.adminname].chatwith[1];
					if(notify_whom1 in users)
					{
						users[notify_whom1].emit("admin disconnected", socket.adminname);
					}
					if(notify_whom2 in users)
					{
						users[notify_whom2].emit("admin disconnected", socket.adminname);
					}
					adminList.splice(adminList.indexOf(socket.adminname), 1);
					delete admins[socket.adminname];
					console.log("Admin disconnected "+socket.adminname);
				}
			}
			
		});
		
		
	});
 

server.listen(8080);