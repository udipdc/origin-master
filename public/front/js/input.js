// Check the text fields as soon as the document loads for data that 
// may have been added upon load

function floatLabel(){
	var $fields = $(".floatLabel");
	$fields.each(function(i, f){
	   	var $field = $(f);
	   	if($field.val().trim() === "" || $field.val() === "blank"){
	    	$field.next('label').removeClass("active");
	   	} else {
	    	$field.next('label').addClass("active");
	   	}
	});
}
(function($){
	floatLabel(".floatLabel");
	var $fields = $(".selectpicker");
	$fields.each(function(i, f){
	   	var $field = $(f);
	   	if($field.val().trim() === "" || $field.val() === "blank"){
	    	$field.parent().parent().find('label').removeClass("active");
	   	} else {
	    	$field.parent().parent().find('label').addClass("active");
	   	}
	});
})(jQuery);
// when data is entered...
$(document).on("input",'.floatLabel',function(){
	floatLabel();
});

$(document).on("click",'.js-datepicker',function(){
	floatLabel();
});

$(document).on("change",'.selectpicker',function(){
	var $fields = $(".selectpicker");
	$fields.each(function(i, f){
	   	var $field = $(f);
	   	if($field.val().trim() === "" || $field.val() === "blank"){
	    	$field.parent().parent().find('label').removeClass("active");
	   	} else {
	    	$field.parent().parent().find('label').addClass("active");
	   	}
	});
});

// textarea -show
function show1(id) {
	document.getElementById('text-area['+id+']').style.display = 'none';
}
function show2(id) {
	document.getElementById('text-area['+id+']').style.display = 'inline-block';
}
// 