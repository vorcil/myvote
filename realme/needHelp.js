$(document).ready(function(){$(".toggle_tooltip").focus(function(a){target=$(a.target).siblings();target.css("display","block");target.attr("aria-hidden","false")});$(".toggle_tooltip").bind("focusout",function(a){target=$(a.target).siblings();target.css("display","none");target.attr("aria-hidden","true")})});