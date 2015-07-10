$(document).ready(function()

{$(".toggle_tooltip").focus(function(a){

target=$(a.target).siblings();target.css("display","block");target.attr("aria-hidden","false")});

$(".toggle_tooltip").bind("focusout",function(a){

target=$(a.target).siblings();target.css("display","none");target.attr("aria-hidden","true")})});

var igovt;

if(!igovt){igovt={}}else{if(typeof igovt!="object"){
throw new Error("namespace var igovt already exists and is not an object")}}

if(top!=self){document.location=self.location}

igovt.logon=function(){

var a=false;

return{scrollToBottom:function(){

$("html, body").scrollTop($(document).height()-$(window).height())},onSubmitButton:function(b){if(!a){a=true}else{b.preventDefault()}}}();

$(document).ready(function(){$(".get_focus").first().focus();$("form").on("submit.igovtUtility",igovt.logon.onSubmitButton)});
