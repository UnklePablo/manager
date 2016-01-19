$(document).ready(function(){
	$('#myModal').modalSteps();
	$('.tip').tipr({'style':'dark','mode':'bottom'});
	$('.LinkCloseOpen').on('click',function() {
		if ( $('.sidebar').hasClass('col-md-2') == true ) {
			$('.nameli').hide();
			$('.sidebar').removeClass('col-md-2').addClass('col-md-1');
			$('.main').removeClass('col-md-10').removeClass('col-md-offset-2')
					.addClass('col-md-11').addClass('col-md-offset-1');

			$(this).removeClass('glyphicon-remove').addClass('glyphicon-eye-open');
		}
		else {
			$('.nameli').show();
			$('.sidebar').addClass('col-md-2').removeClass('col-md-1');
			$('.main').addClass('col-md-10').addClass('col-md-offset-2')
					.removeClass('col-md-11').removeClass('col-md-offset-1');
			
			$(this).removeClass('glyphicon-eye-open').addClass('glyphicon-remove');
		}
	});	
});
