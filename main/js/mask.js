jQuery(function($){
$('input[type="tel"]').mask('+7(999) 999-99-99');
$.validate({
    validateOnBlur : false,
    showHelpOnFocus : false
});
});