function formSubmit(formName){
	$(formName).submit();
}

function enableInput(selectId, inputId){
	$('#myForm').find(':input').prop("disabled", true);
	$(selectId).prop("disabled", false);
	$(inputId).prop("disabled", false);
}
