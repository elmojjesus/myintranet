function formSubmit(formName){
	$(formName).submit();
}

function addOneMore($class){
	var html = $('.template').html();
	$(".many" + $class).append("<br>" + html);
}