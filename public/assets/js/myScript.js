function formSubmit(formName){
	$(formName).submit();
}

function addSport(){
	var html = $('.template').html();
	$(".manySports").append("<br>" + html);
}