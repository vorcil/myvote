width=1000, height=1000;

var body = d3.select("body");

var svg=body.append("svg")
.attr("width", width)
.attr("height", height);

var workspace =svg.append("svg")
.attr("x", 0)
.attr("y", 0)
.attr("height", height)
.attr("width", width);

var realimg = workspace.append("image")
.attr("x", -500)
.transition()
.attr("x", 500)
.attr("y", 35)
.attr("xlink:href", "bin/realme.jpg")
.attr("width", 100)
.attr("height", 100);


writeText("Name: ", 50, 50);
writeText("D.O.B (dd/mm/yy):",50,75);
writeText("Place of birth: ", 50, 100);
writeText("Gender: ", 50, 125);
writeText("Phone: ", 50, 150);
writeText("Address: ", 50, 175);
writeText("City: ", 50, 200);
writeText("Email: ", 50, 225);
	var nameinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "nameinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 35)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='nameinput' rows='13' cols='40' type='text'></textarea>");
	var dobinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "dobinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 60)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='dobinput' rows='13' cols='40' type='text'></textarea>");
var pobinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "pobinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 85)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='pobinput' rows='13' cols='40' type='text'></textarea>");

	var genderinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "genderinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 110)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='genderinput' rows='13' cols='40' type='text'></textarea>");

	var phoneinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "phoneinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 135)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='phoneinput' rows='13' cols='40' type='text'></textarea>");

	var addressinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "addressinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 160)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='addressinput' rows='13' cols='40' type='text'></textarea>");
	
	
	var cityinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "cityinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 185)
    .style("resize", 'none')
    .append("xhtml:body")
    .html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='cityinput' rows='13' cols='40' type='text'></textarea>");

	var emailinput = workspace.append("foreignObject")
    .attr("x", 250)
    .attr("class", "emailinput")
    .attr("width", 200)
    .attr("height", 25)
    .attr("y", 210)
    .style("resize", 'none')
	.append("xhtml:body")
	.html("<textarea style='font: Times; resize: none; font-size: 15pt; border: 1px solid lightgray; outline: none; ' id='emailinput' rows='13' cols='40' type='text'></textarea>");

	var submit = workspace.append("image")
	.attr("x", 250)
	.attr("y", 250)
	.attr("xlink:href", "bin/submit.png")
	.attr("height", 100).attr("width", 100)
	.on("mouseover", function(d) { d3.select(this).attr("opacity", 0.7)})
	.on("mouseout", function(d) { d3.select(this).attr("opacity", 1)})
	.on("click", function(d) {
				name=document.getElementById('nameinput').value;
				dobinput=document.getElementById('dobinput').value;
				pobinput=document.getElementById('pobinput').value;
				genderinput=document.getElementById('genderinput').value;
				phoneinput=document.getElementById('phoneinput').value;
				addressinput=document.getElementById('addressinput').value;
				cityinput=document.getElementById('cityinput').value;
				emailinput=document.getElementById('emailinput').value;
				temp = [{"name":name,"dob":dobinput,"pob":pobinput, "gender":genderinput,"address":addressinput,"city":cityinput,"email":emailinput}]
				//your php server load script here;
				//location.href="index.html";
            console.log("temp",temp)
            $.ajax({
                url :"test.php",
                dataType : 'jsonp',
                data : temp,
                type : 'POST',
                success : function(response){
                        console.log("response",response)
                },
                error: function(response){
                        console.log("response",response)

                }
            })


			});
			
		
function writeText(text,x,y){
	var text=workspace.append("text")
	.attr("x", x)
	.attr("y", y)
	.attr("fill", "black")
	.text(function(d) {return text;});
}