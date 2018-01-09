///////////////////////
//     FADE OUTS     //
///////////////////////


///////////////////////
//     DOC READY     //
///////////////////////
$(document).ready(function () {
    
});

//////////////////////////
//     WINDOWS SIZE     //
//////////////////////////
$(window).resize(function () {
    
});

//HAMBURGUR ICON TOGGLE
$('#ham-icon-container').click(function () {
    if ($('#ham-mid').width() > 0) {
        if ($('.ham:animated').length > 0) {
            //DO NOTHING
        } else {
            $('#ham-mid').animate({
                'width': 0,
                'left': '50%'
            }, 600, 'swing', function () {
                $('#ham-top').css({
                    'transform': 'rotate(-45deg)',
                    'top': 'calc(50% - 2px)'
                });
                $('#ham-bot').css({
                    'transform': 'rotate(45deg)',
                    'bottom': 'calc(50% - 2px)'
                });
            });
            $('#dropdown-menu').css({
                'left': '-5%',
                'opacity': 1
            });
        }
    } else {
        if ($('.ham:animated').length > 0) {
            //DO NOTHING
        } else {
            $('#ham-top').css({
                'transform': 'rotate(0deg)',
                'top': 0
            });
            $('#ham-bot').css({
                'transform': 'rotate(0deg)',
                'bottom': 0
            });
            $('#ham-mid').delay(700).animate({
                'width': '76%',
                'left': '12%'
            }, 600, 'swing');
            $('#dropdown-menu').css({
                'left': '50%',
                'opacity': 0
            });
        }
    }
});

///////////////////////////////////////
//          CONTACT BUTTONS          //
///////////////////////////////////////
$('.contact-link').mouseenter(function() {
	$(this).next().stop(false, false).css({
		'left' : '100%'		
		});	
});
$('.contact-link').mouseleave(function() {
	$(this).next().stop(false, false).css({
		'left' : '-20%'		
		});	
});
//SCROLLS TO SIGN UP SECTION
$("#signup-button").click(function() {
    $('html, body').animate({
        scrollTop: $("#home-content-bottom").offset().top
    }, 1300);
});