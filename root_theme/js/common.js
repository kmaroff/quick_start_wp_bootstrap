$(function() {

	$(window).load(function() {

		$(".loader_inner").fadeOut();
		$(".loader").delay(400).fadeOut("slow");

	});

	//fixed topmenu

	$(window).scroll(function() {

		if ($(this).scrollTop() > 90){  
			$('.navbar').addClass("navbar-color");
		}
		else{
			$('.navbar').removeClass("navbar-color");
		}
	});




});
