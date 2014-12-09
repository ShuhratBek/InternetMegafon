$(function () {
    $('[data-toggle="tooltip"], .pluso a').tooltip();
    $(window).scroll(function () {
        $('body').each(function(){
    		var topOfWindow = $(window).scrollTop();
			if ($(window).height()/4 < topOfWindow) {
				$('.navbar').addClass('smaller');
			} else {
                $('.navbar').removeClass('smaller');
			}
		});
    });
    $('#sec4 li').hover(
        function() {
            $(this).find('i').removeClass('fa-circle xs').addClass('fa-question-circle');
        },
        function() {
            $(this).find('i').addClass('fa-circle xs').removeClass('fa-question-circle');
        }
    );
    $('#sec1 .counter').counter({
        initial: $(this).html(),
        direction: 'up',
        interval: '3000',
        format: '999 999',
        stop: '999 999'
    });
    $('#sec3 .counter').counter({
        initial: $(this).html(),
        direction: 'down',
        interval: '30000',
        format: '999',
        stop: '0'
    });
    /* =================================
    ===  WOW ANIMATION             ====
    =================================== */
    wow = new WOW(
      {
        mobile: false
      });
    wow.init();
});