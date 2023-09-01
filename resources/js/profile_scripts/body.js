import {saveNewPassword, saveUserInfo} from './functions/body.js'

$("#exampleInputName").on('input keyup', function() {
	if($("#exampleInputName").val() == nameDefault){
		$("#saveUserButton").addClass('disabled');
		$(this).removeClass('border-primary');
	} else{
		$("#saveUserButton").removeClass('disabled');
		$(this).addClass('border-primary');
	}
});
$("#exampleInputEmail").on('input keyup', function() {
	if($("#exampleInputEmail").val() == emailDefault){
		$("#saveUserButton").addClass('disabled');
		$(this).removeClass('border-primary');
	} else{
		$("#saveUserButton").removeClass('disabled');
		$(this).addClass('border-primary');

	}				
});
$("#exampleInputPhone").on('input keyup', function() {
	if($("#exampleInputPhone").val() == phoneDefault){
		$("#saveUserButton").addClass('disabled');
		$(this).removeClass('border-primary');
	} else{
		$("#saveUserButton").removeClass('disabled');
		$(this).addClass('border-primary');
	}				
});
$("#savePasswordButton").click(saveNewPassword);
$("#saveUserButton").click(saveUserInfo);