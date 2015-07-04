width=screen.width, height=screen.height;
var body = d3.select("body");

var svg = body.append("svg")
    .attr("height", height)
    .attr("width", width);

var workspace = svg.append("svg")
    .attr("x", 0)
    .attr("y", 0)
    .attr("height", height)
    .attr("width", width);

var test = workspace.append("rect")
    .attr("x", 0).attr("y", 50)
    .attr("height", 300).attr("width", width)
    .attr("fill", "orange");


var userinput = workspace.append("foreignObject")
    .attr("x", 413)
    .attr("class", "username")
    .attr("width", 250)
    .attr("height", 50)
    .attr("y", 112.5)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 20pt; border: 0px solid lightgray; outline: none; ' id='username' class='foo' rows='13' cols='40' type='text'></textarea>");

var userinput = workspace.append("foreignObject")
    .attr("x", 413)
    .attr("class", "password")
    .attr("width", 250)
    .attr("height", 50)
    .attr("y", 212.5)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 20pt; border: 0px solid lightgray; outline: none; ' id='username' class='foo' rows='13' cols='40' type='text'></textarea>");

var text = workspace.append("text")
    .attr("x", 275).attr("y", 140)
    .attr("font-size", 25)
    .text("Username :");
var text = workspace.append("text")
    .attr("x", 275).attr("y", 240)
    .attr("font-size", 25)
    .text("Password :");

var submit = workspace.append("image")
    .attr("x", 565)
    .attr("y", 265)
    .attr("width", 100)
    .attr("height", 100)
    .attr("xlink:href", "bin/submit.png")
    .on("mouseover", function(d){d3.select(this).attr("opacity", 0.7)})
    .on("mouseout", function(d) {d3.select(this).attr("opacity", 1)})
    .on("click", function(d) {

	//send login data to database
	//retrieve single user from database
	//send user to visual.html
	//make that single user data/json available on that page's javascript
	
    });
