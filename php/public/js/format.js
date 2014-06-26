function inputColoration(type, element_id){
	var element = document.getElementById(element_id);
	if (type == "warning"){
		$(element).parents(".form-group").removeClass().addClass("form-group");
		$(element).parent().find("span").remove();
		$(element).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
		$(element).parents(".form-group").addClass("has-warning has-feedback");
	}
	if (type == "error"){
		$(element).parents(".form-group").removeClass().addClass("form-group");
		$(element).parent().find("span").remove();
		$(element).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
		$(element).parents(".form-group").addClass("has-error has-feedback");
	}
	if (type == "reset"){
		$(element).parent().find("span").remove();
		$(element).parents(".form-group").removeClass().addClass("form-group");
	}

}