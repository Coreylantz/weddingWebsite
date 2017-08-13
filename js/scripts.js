
// RSVP Animation

function animateThumb(name) {
	var hand = [];
	var face = [];
	var tm = TweenMax;
	if (name === 'briana') {
		hand.push('#bThumb');
		face.push('#bFace');
	} else if(name === 'corey') {
		hand.push('#cThumb');
		face.push('#cFace');
	} else if(name !== '') {
		hand.push('#bThumb','#cThumb');
		face.push('#bFace','#cFace');
	}
	handAni(hand, tm);
	faceAni(face, tm);
};

function handAni(hand, tm) {
	hand.map(function(e){
		var rot = 30;
		var y = -15;
		var x = -15;
		if (e === '#cThumb') {
			rot = -30;
			x = 15;

		}
		tm.set(e, {alpha:1})
		tm.from(e, 0.5, {alpha:0, x:x, y:y, ease: Power3.easeOut})
		tm.fromTo(e, 1, {rotation:0}, {rotation:rot, yoyo:true, repeat:1, delay:0.25, ease: Power3.easeOut})
		tm.to(e, 0.5, {alpha:0, delay:1.5})
	});
}

function faceAni(face, tm){
	face.map(function(e){
		var rot = 30;
		var y = -50;
		// var x = -15;
		if (e === '#cFace') {
			rot = -30;
			// x = 15;

		}
		tm.set(e, {alpha:1, x:rot})
		tm.from(e, 2, {alpha:0, y:-100, ease: Elastic.easeOut.config(1, 0.3)})
		tm.to(e, 0.5, {alpha:0, delay:1.5})
	});
}

// SmoothScrolling
function smoothScrolling() {
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

 }

  // Countdown

  function countdown() {
  	var newDate = new Date('YYYY-MM-DD');

  	$('.countdown').text(newDate);
  }

  // Hamburger menu 
  function hamMenu() {
  	$('.hamburger').click(function() {
  		$('div.hamburger').toggleClass('active');
  		$('ul.menu').toggleClass('show');
  	});
  }

  // INIT

function init() {
	// var theForm = document.querySelector('form');
	countdown();
	
	$( "#rsvpForm" ).submit(function(e) {
  		e.preventDefault();
  		animateThumb( $('#inputName').val() )
	})
	hamMenu();
	smoothScrolling();
};


$(function(){
	init();
});