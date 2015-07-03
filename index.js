//load index.js
initialise();

/* initialize application */
function initialise(){
    /* Load database 
       d3.json("database.json", function(data){
       //global reference for database
       jsonData=data; */
    /*Global variables */
    width=screen.width, height=screen.height, xpos=(width/8)-(width/7)+40;
    usernamecheck="1", passwordcheck="1";
    /*Local variables */
    var username="", password="";

    /*Select body*/
    var body = d3.select("body");

    /*svg bodyspace*/
    var svg= body.append("svg")
	.attr("width", width)
	.attr("height", height);
    
    /*svg workspace*/
    var workspace = svg.append("svg")
	.attr("x", 0)
	.attr("y", 0)
	.attr("height", height)
	.attr("width", width);

    /*Navigation Bar */
    var nav = svg.append("rect")
	.attr("x", 0)
	.attr("y", 0)
	.attr("width", width)
	.attr("height", 40)
	.attr("fill", "#FFB84D");
    /*Nav under*/
    var under = svg.append("rect")
	.attr("x", 0)
	.attr("y", 40)
	.attr("width", width)
	.attr("height", 5)
	.attr("fill", "#444");

    navLoad();
    loadLogin();


















    function loadVote(){
	workspace.selectAll("*").remove();


	var mainwindow = workspace.append("rect")
	    .transition()
	    .attr("width", (width/2))
	    .attr("height", 500)
	    .attr("x", -600)
	    .attr("y", 50)
	    .attr("rx", 10)
	    .attr("fill", "#444")
	    .transition()
	    .attr("x", xpos);
    }



    



    function loadEnroll(){
	d3.json("check.json", function(data){
	    workspace.selectAll("*").remove();
	    jsonCheck=data;

	    var mainwindow = workspace.append("rect")
		.transition()
		.attr("width", (width/3))
		.attr("height", 400)
		.attr("x", -600)
		.attr("y", 50)
		.attr("rx", 10)
		.attr("fill", "#444")
		.transition()
		.attr("x", xpos);

	    var enrollText=  workspace.append("text")
		.attr("x", -600)
		.transition()
		.duration(1000)
		.attr("x", 25)
		.attr("y", 100)
		.attr("fill", "#CCC")
		.text("Please check over your enrollment details and update if necessary.");
	    //at this point the server will create a separate (smaller) json and send it to the user; for now stored in file
	    /* implementation halted just draw user data */

	    var nameText=  workspace.append("text")
		.attr("x", -600)
		.transition()
		.duration(1000)
		.attr("x", 25)
		.attr("y", 150)
		.attr("fill", "#CCC")
		.text("Name:  " + jsonCheck[0].name);

	    var addressText=  workspace.append("text")
		.attr("x", -600)
		.transition()
		.duration(1000)
		.attr("x", 25)
		.attr("y", 200)
		.attr("fill", "#CCC")
		.text("Address:  " + jsonCheck[0].address);
	    
	    var cityText=  workspace.append("text")
		.attr("x", -600)
		.transition()
		.duration(1000)
		.attr("x", 25)
		.attr("y", 250)
		.attr("fill", "#CCC")
		.text("Current city: " + jsonCheck[0].city);
	    console.log(jsonCheck);
	    
	    
	});

    }

    function drawVoteNav(){
	loadEnroll();
	
	var enroll = svg.append("rect")
    	    .attr("x", xpos)
	    .attr("y", 0)
	    .attr("class", "navbutton")
	    .attr("width", 200)
	    .attr("height", 40)
	    .attr("rx", 10)
	    .attr("ry", 10)
	    .attr("fill", "#444")
	    .attr("selected", "true")
    	    .on("mouseover", function(d) {mouseoverChange(d3.select(this))})
	    .on("mouseout", function(d) {mouseoutChange(d3.select(this))})
	    .on("click", function(d) {
		if(d3.select(this).attr("selected")=="false"){
		    d3.selectAll(".navbutton").attr("fill", "#FFB84D");
		    d3.select(this).attr("fill", "#444");
		    d3.selectAll("rect").attr("selected", "false");
		    d3.select(this).attr("selected", "true");
		    d3.selectAll("text").attr("fill", "#444");
		    d3.selectAll(".enrollText").attr("fill", "#CCC");
		    loadEnroll();
		}
	    });

	var vote = svg.append("rect")
    	    .attr("x", xpos+200)
	    .attr("y", 0)
	    .attr("class", "navbutton")
	    .attr("width", 200)
	    .attr("height", 40)
	    .attr("rx", 10)
	    .attr("ry", 10)
	    .attr("fill", "#FFB84D")
	    .attr("selected", "false")
    	    .on("mouseover", function(d) {mouseoverChange(d3.select(this))})
	    .on("mouseout", function(d) {mouseoutChange(d3.select(this))})
	    .on("click", function(d) {
		if(d3.select(this).attr("selected")=="false"){
		    d3.selectAll(".navbutton").attr("fill", "#FFB84D");
		    d3.select(this).attr("fill", "#444");
		    d3.selectAll("rect").attr("selected", "false");
		    d3.select(this).attr("selected", "true");
		    d3.selectAll("text").attr("fill", "#444");
		    d3.selectAll(".votingText").attr("fill", "#CCC");
		    loadVote();
		 
		    
		}
	    });

	var about = svg.append("rect")
    	    .attr("x", xpos+400)
	    .attr("y", 0)
	    .attr("class", "navbutton")
	    .attr("width", 200)
	    .attr("height", 40)
	    .attr("rx", 10)
	    .attr("ry", 10)
	    .attr("fill", "#FFB84D")
	    .attr("selected", "false")
    	    .on("mouseover", function(d) {mouseoverChange(d3.select(this))})
	    .on("mouseout", function(d) {mouseoutChange(d3.select(this))})
	    .on("click", function(d) {
		if(d3.select(this).attr("selected")=="false"){
		    d3.selectAll(".navbutton").attr("fill", "#FFB84D");
		    d3.select(this).attr("fill", "#444");
		    d3.selectAll("rect").attr("selected", "false");
		    d3.select(this).attr("selected", "true");
		    d3.selectAll("text").attr("fill", "#444");
		    d3.selectAll(".aboutText").attr("fill", "#CCC");
		    loadAbout();
		}
	    });
	var votingText = svg.append("text")
	    .transition()
	    .attr("x", xpos+220)
	    .attr("y", 25)
	    .attr("class", "votingText")
	    .attr("font-size", 25)
	    .attr("fill", "#444")
	    .text("My Vote");

	var enrollText = svg.append("text")
	    .transition()
	    .attr("x", xpos+20)
	    .attr("y", 25)
	    .attr("class", "enrollText")
	    .attr("font-size", 25)
	    .attr("fill", "#CCC")
	    .text("Enrollment");
	
	var aboutText = svg.append("text")
	    .transition()
	    .attr("x", xpos+450)
	    .attr("y", 25)
	    .attr("class", "aboutText")
	    .attr("font-size", 25)
	    .attr("fill", "#444")
	    .text("About");

	
    }
    
    function signName(name){
	svg.append("text")
	    .attr("x", width-300)
	    .attr("y", 25)
	    .attr("fill", "#444")
	    .text("Signed in as: " + username);
    }
    


    function drawVote(){
	workspace.selectAll("*").remove();
	d3.selectAll('.navbutton').remove();
	d3.selectAll('.loginText').remove();
	d3.selectAll('.aboutText').remove();
	signName(username);
	//server passes in city information;

	drawVoteNav();
	
    }

















    








    
    
    function loadLogin(){
	workspace.selectAll("*").remove();
	
	var mainwindow = workspace.append("rect")
	    .transition()
	    .attr("width", 400)
	    .attr("height", 400)
	    .attr("x", -600)
	    .attr("y", 50)
	    .attr("rx", 10)
	    .attr("fill", "#444")
	    .transition()
	    .attr("x", xpos);

	var text1 = workspace.append("text")
	    .attr("x", -600)
	    .transition()
	    .duration(500)
	    .attr("x", 25)
	    .attr("y", 100)
	    .attr("fill", "#CCC")
	    .text("Username:");
	
	var userinput = workspace.append("foreignObject")
	    .attr("x", 150)
	    .attr("class", "username")
	    .attr("width", 200)
	    .attr("height", 30)
	    .attr("y", 75)
	    .style("resize", 'none')
	    .append("xhtml:body")
	    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='username' class='foo' rows='13' cols='40' type='text'></textarea>");

	var text2 = workspace.append("text")
	    .attr("x", -600)
	    .transition()
	    .duration(500)
	    .attr("x", 25)
	    .attr("y", 200)
	    .attr("fill", "#CCC")
	    .text("Password:");
	
	var userinput = workspace.append("foreignObject")
	    .attr("x", 150)
	    .attr("class", "Password")
	    .attr("width", 200)
	    .attr("height", 30)
	    .attr("y", 175)
	    .style("resize", 'none')
	    .append("xhtml:body")
	    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='password' class='foo' rows='13' cols='40' type='text'></textarea>");

	var submit = workspace.append("image")
	    .attr("x", 350).attr("y", 400)
	    .attr("xlink:href", "bin/submit.png")
	    .attr("width", 50).attr("height", 50)
	    .on("mouseover", function(d) {mouseoverChange(d3.select(this))})
	    .on("mouseout", function(d) {mouseoutChange(d3.select(this))})
	    .on("click", function(d) {
		username = document.getElementById('username').value;
		password = document.getElementById('password').value;

		console.log("username: " + username);
		console.log("password: " + password);
		/*Send off to server - retrieve "loggedIn" 
		  if true update to Draw vote
		  if false update login note*/

		if(username==usernamecheck && password==passwordcheck){
		    drawVote();
		} else if (password != passwordcheck){
		    var passFail = workspace.append("text")
			.attr("x", 50)
			.attr("y", 250)
			.attr("fill", "red")
			.text("Incorrect username or password");
		}
		
	    });

	
	
    }


    
    function loadAbout(){
	workspace.selectAll("*").remove();
	
	var mainwindow = workspace.append("rect")
	    .transition()
	    .attr("width", 400)
	    .attr("height", 400)
	    .attr("x", -600)
	    .attr("y", 50)
	    .attr("rx", 10)
	    .attr("fill", "#444")
	    .transition()
	    .attr("x", xpos);

	var aboutText = workspace.append("text")
	    .transition().duration(2000)
	    .attr("x", 100)
	    .attr("y", 100)
	    .attr("fill", "#CCC")
	    .text("This is a place to put about info");
    }










    
    function navLoad(){

	var login = svg.append("rect")
	    .attr("x", xpos)
	    .attr("y", 0)
	    .attr("class", "navbutton")
	    .attr("width", 200)
	    .attr("height", 40)
    	    .attr("rx", 10)
	    .attr("ry", 10)
	    .attr("fill", "#444")
	    .attr("selected", "true")
    	    .on("mouseover", function(d) {mouseoverChange(d3.select(this))})
	    .on("mouseout", function(d) {mouseoutChange(d3.select(this))})
	    .on("click", function(d) {
		location.href="index.html";
	    });
	
	var about = svg.append("rect")
    	    .attr("x", xpos+200)
	    .attr("y", 0)
	    .attr("class", "navbutton")
	    .attr("width", 200)
	    .attr("height", 40)
	    .attr("rx", 10)
	    .attr("ry", 10)
	    .attr("fill", "#FFB84D")
	    .attr("selected", "false")
    	    .on("mouseover", function(d) {mouseoverChange(d3.select(this))})
	    .on("mouseout", function(d) {mouseoutChange(d3.select(this))})
	    .on("click", function(d) {
		if(d3.select(this).attr("selected")=="false"){
		    d3.selectAll(".navbutton").attr("fill", "#FFB84D");
		    d3.select(this).attr("fill", "#444");
		    d3.selectAll("rect").attr("selected", "false");
		    d3.select(this).attr("selected", "true");
		    d3.selectAll("text").attr("fill", "#444");
		    d3.selectAll(".aboutText").attr("fill", "#CCC");
		    loadAbout();
		}
	    });

	var loginText = svg.append("text")
	    .transition()
	    .attr("x", xpos+50)
	    .attr("y", 25)
	    .attr("class", "loginText")
	    .attr("font-size", 25)
	    .attr("fill", "#CCC")
	    .text("Login");

	
	var aboutText = svg.append("text")
	    .transition()
	    .attr("x", xpos+250)
	    .attr("y", 25)
	    .attr("class", "aboutText")
	    .attr("font-size", 25)
	    .attr("fill", "#444")
	    .text("About");

	
    }

    
    //load database end bracket }
    function mouseoverChange(d){
	if(d.attr("selected")=="true"){
	    d.transition().duration(500).attr("opacity", 0.7);
	} else if(d.attr("selected")=="false"){
	    d.transition().duration(500).attr("fill", "#444").attr("opacity", 0.7);
	} else d.attr("opacity", 0.3);
    }
    function mouseoutChange(d){
	if(d.attr("selected")=="true"){ 
	    d.transition().duration(500).attr("opacity", 1);
	} else if(d.attr("selected")=="false"){
	    d.transition().duration(500).attr("fill", "#FFB84D").attr("opacity", 1);
	} else d.attr("opacity", 1);
    }
}
