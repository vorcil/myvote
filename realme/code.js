$.validator.addMethod("invalidSixDigitCode",function(c,b){var a=(c.search(/^\d{6}$/)!=-1);

if(a){
$(b).closest(".enter_code").addClass("complete")}
else{
$(b).closest(".enter_code").removeClass("complete")}return a},"Code has to be six digits long");

$.validator.addMethod("invalidFiveDigitCode",function(c,b){var a=(c.search(/^\d{5}$/)!=-1);

if(a){
$(b).closest(".enter_code").addClass("complete")
}
else{$(b).closest(".enter_code").removeClass("complete")}return a},messages.pin.invalidLength);
sixDigitCodeValidator={rules:{code:{invalidSixDigitCode:true}}};fiveDigitCodeValidator={rules:{code:{invalidFiveDigitCode:true}}};
