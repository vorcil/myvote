$.validator.addMethod("usernameSpecialCharacters",function(c,a){var b=/^(@|\-|\.|\w)(@|\-|\.|\w|(\x20*(@|\-|\.|\w)))*$/i;

return this.optional(a)||b.test(c)},messages.username.invalidCharacters);

$.validator.addMethod("usernameSpaces",function(c,b){var a=/(^\s+.*$)|(^.*\s\s.*$)|(^.*\s+$)/i;

return this.optional(b)||!a.test(c)},messages.username.invalidSpace);

usernameValidation={
rules:{
createUsername:{
required:true,rangelength:[4,64],usernameSpecialCharacters:true,usernameSpaces:true,remote:{
url:"/cls/usernamevalidation",data:{

k:igovt.logon.uniquePageKeyUsernameCheck},dataType:"text",contentType:"application/x-www-form-urlencoded",error:function(a,b){}}},existingUsername:{required:true,rangelength:[4,64],usernameSpecialCharacters:true,usernameSpaces:true}},messages:{
createUsername:{
required:messages.username.required,rangelength:messages.username.length,usernameSpecialCharacters:messages.username.invalidCharacters,usernameSpaces:messages.username.invalidSpaces},existingUsername:{
required:messages.username.length,rangelength:messages.username.length,usernameSpecialCharacters:messages.username.invalidCharacters,usernameSpaces:messages.username.invalidSpaces}}};


var capsLockEnabled=null;
function checkCapsWarning(){if(capsLockEnabled){
$("#capsWarning").show()
}else{
$("#capsWarning").hide()
}}

$(document).ready(function(){$("#logon\\:userPassword\\:input").on("keypress",function(a){var b=String.fromCharCode(a.which);

if(b===b.toUpperCase()&&b!==b.toLowerCase()){
capsLockEnabled=!a.shiftKey}else{if(b===b.toLowerCase()&&b!==b.toUpperCase()){capsLockEnabled=a.shiftKey
}}});

$("#logon\\:userPassword\\:input").on("keydown",function(a){var b=a.keyCode||a.charCode;

if(b==20&&capsLockEnabled!==null){capsLockEnabled=!capsLockEnabled}});

$("#logon\\:userPassword\\:input").on("keyup",function(a){
checkCapsWarning()
});

$("#logon\\:userPassword\\:input").on("blur",function(a){
$("#capsWarning").hide()});
$("#logon\\:userPassword\\:input").on("focus",function(a){checkCapsWarning()
})});

var igovt;
if(!igovt){
igovt={}
}else{
if(typeof igovt!="object"){
throw new Error("namespace var igovt already exists and is not an object")}}

if(top!=self){
document.location=self.location
}igovt.logon=function(){

var a=false;
return{
scrollToBottom:function(){
$("html,body").scrollTop($(document).height()-$(window).height()
)},onSubmitButton:function(b){if(!a){a=true}else{b.preventDefault()
}}}}();

$(document).ready(function(){

$(".get_focus").first().focus();
$("form").on("submit.igovtUtility",igovt.logon.onSubmitButton)});
