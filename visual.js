/* Globals */
width=screen.width, height=screen.height;
selectedParty="";
selectedMP="";


var body = d3.select("body");

var svg = body.append("svg")
    .attr("height", height)
    .attr("width", width);

var workspace = svg.append("svg")
    .attr("x", 0)
    .attr("y", 0)
    .attr("height", height)
    .attr("width", width);


/* Server passes in the user file 
Using my info as a test for now*/
var user = [{
    "name" : "Rajol",
    "phone" : "0276666366",
    "address" : "21 Jump street",
    "city" : "Wellington",
    "email" : "rajol.kochlashvili@medcorp.co.nz",
    "dob" : "15/03/1991",
    "pob" : "kvaisi",
    "party" : "null",
    "mp" : "null"
}];


enroll();











function loadParty(){
    d3.json("partys.json", function(data){
	jsonData=data;
	
	workspace.selectAll("text").transition().duration(1000).attr("x", -width);
	workspace.select('.enroll').transition().duration(1500).attr("width", 1000).attr("height", 600).attr("x", 500);
	d3.selectAll('.forward').transition().attr("opacity", 0).duration(1000).remove();
	writeText("Please select from the following teams:", 500,100);
	var partys=workspace.selectAll("image").data(jsonData).enter().append("image");

	var logos=partys
	    .attr("x", function(d) {return d.x})
	    .attr("y", function(d) {return d.y})
	    .attr("xlink:href", function(d) { return d.path})
	    .attr("width", 100)
	    .attr("height", 100);

    })
}
	    










function enroll(){
    workspace.selectAll("*").remove();
    drawbg();
    
    //move in enrollment details for user to check
    var mainbox = workspace.append("rect")
	.attr("class", "enroll")
	.attr("x", width+1000)
	.transition()
	.duration(1000)
	.attr("x", 50)
	.attr("y", 150)
	.attr("rx", 10)
	.attr("ry", 10)
	.attr("width", 500)
	.attr("height", 500)
	.attr("fill", "white");

    writeText("Please check over your enrolment details, if you need to change it apply online @ oijasld.com", 60, 80);
    writeText("Name: " + user[0].name, 70,175);
    writeText("Address: " + user[0].address, 70,225);
    writeText("City: " + user[0].city, 70,275);
    writeText("Phone: " + user[0].phone, 70,325);
    writeText("Date of Birth: " + user[0].dob, 70,375);
    writeText("Place of Birth: " + user[0].pob, 70,425);
    writeText("Email: " + user[0].email, 70,475);

    var forward = workspace.append("image")
	.attr("x", 450)
	.attr("class", "forward")
	.attr("y", 550)
	.attr("width", 100)
	.attr("height",100)
	.attr("xlink:href", "bin/forward.png")
	.on("click", function(d) {
	    loadParty();
	    
	});
    
   
}

function drawbg(){
//drawing a space to look nice
var frame = workspace.append("rect")
    .attr("x", 0).attr("y", 50)
    .attr("height", height).attr("width", width)
    .attr("fill", "#444");
var frame2 = workspace.append("rect")
    .attr("x", 0).attr("y", 50)
    .attr("height", 100).attr("width", width)
    .attr("fill", "orange");
}
 function writeText(text,x,y){
	var text = workspace.append("text")
	    .attr("x", width+1000).transition().duration(1000)
	    .attr("class", "enroll")
	    .attr("x", x).attr("y", y).attr("font-size", 18)
	    .text(text);
    }
