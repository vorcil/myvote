$(document).ready(function(){

$("#logon").validate({
submitHandler:handleSubmit,rules:{

"logon:username:input":usernameValidation.rules.existingUsername,"logon:userPassword:input":passwordValidation.rules.existingPassword,"logon:igovtcode":sixDigitCodeValidator.rules.code
},messages:{

"logon:username:input":usernameValidation.messages.existingUsername,"logon:userPassword:input":passwordValidation.messages.existingPassword
}})
});
