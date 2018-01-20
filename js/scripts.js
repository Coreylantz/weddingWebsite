  var config = {
    apiKey: "AIzaSyCcNA4oTGuKy3e99W0wn4_4Zz41jf4Vdbc",
    authDomain: "weddinglist-1a717.firebaseapp.com",
    databaseURL: "https://weddinglist-1a717.firebaseio.com",
    projectId: "weddinglist-1a717",
    storageBucket: "weddinglist-1a717.appspot.com",
    messagingSenderId: "510672576648"
};
 firebase.initializeApp(config);

var database = firebase.database();
var ref = database.ref('masterSheet');

var rsvpList;
var keys;
var rsvpSessionNames = [];
var forWho;
  



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
	} else if(name === 'both') {
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
		// tm.to(e, 0.5, {alpha:0, delay:1.5})
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
		// tm.to(e, 0.5, {alpha:0, delay:1.5})
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

  // Hamburger menu 
  function hamMenu() {
  	$('.hamburger').click(function() {
  		$('div.hamburger').toggleClass('active');
  		$('ul.menu').toggleClass('show');
  	});
  }

  // coutdown
  function countdown() {
    var weddingDate = new Date("Aug 4, 2018 18:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = weddingDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.querySelector(".countdown").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
  }

function updateRsvpList(id, i) {
  // console.log(person)
  // console.log(i)
  var person = ref.child(i.toString());
  forWho = id[4];
  // console.log(person);
  person.update({
    2: true,
    5 : true
  });
  var associate = id[3].associated;
  // console.log(rsvpList[associate]);
  if (id[3].associated.length > 0) {
    offerAssociates(associate);
  } else {
    showConfirmation();
  }

}

function offerAssociates(associateArr) {

  var $fieldset = $("<fieldset>");
      $fieldset.attr({id: 'otherRSVP'});

  for (var i = 0; i < associateArr.length; i++) {
      var associateId = associateArr[i];
      var person = rsvpList[associateId];
      if (person[2] === false) {
        var personName = person[0] + " " + person[1] + " ";
        var personId = person[0] + person[1];
        
        //Create the label element
        var $label = $("<label>");
        $label.text(personName);
        $label.attr({for: personId})
        $label.appendTo($fieldset);
        //Create the input element
        var $input = $('<input type="checkbox">').attr({id: personId, name: 'rsvp'});
        $input.data('id', associateId);
        $input.appendTo($fieldset);
      }

  }

  $fieldset.insertAfter($('#alsoRSVP h4'));

  $( "#rsvpForm" ).hide(500, function(){
    $( "#rsvpForm" ).toggleClass('hidden');

    if ($('#alsoRSVP fieldset').children().length === 0) {
      showConfirmation(forWho);
    } else {
      $('#alsoRSVP').show(500, function(){
        $( "#alsoRSVP" ).toggleClass('hidden');      
      });
    }
  })

  $('#alsoRSVP').submit(function(e) {
    e.preventDefault();
    var values = checkboxValues();
    values.forEach(function(val){
      var attendee = rsvpList[val];
      var personName = attendee[0] + " " + attendee[1];
      rsvpSessionNames.push(personName);
      var person = ref.child(val.toString());
          person.update({
            2: true,
            5 : true
          });
      });

    $( "#alsoRSVP" ).hide(500, function(){
      $( "#alsoRSVP" ).toggleClass('hidden');
      showConfirmation(forWho);
    });
  });
}

function showConfirmation(name) {
  if (rsvpSessionNames.length === 1) {
    $('#confirmation').text("Yay, " + rsvpSessionNames[0] + ", you are RSVP'D!");
  } else if (rsvpSessionNames.length > 1) {
    var start = "Yay, ";
    var end = " are RSVP'D!";
    var middle = rsvpSessionNames.join(', ');
    $('#confirmation').text(start + middle + end);
  } else {
    $('#confirmation').text("Looks like you have already confirmed!");
    $( "#rsvpForm" ).hide(500, function(){
      $( "#rsvpForm" ).toggleClass('hidden');
    });
  }
  $('#confirmation').show(500, function(){
    $('#confirmation').toggleClass('hidden');
  });
  
  $('html, body').animate({
      scrollTop: $("#rsvp").offset().top
  }, 250);

  animateThumb(name);
}

function checkboxValues() {         
     var allVals = [];
     $('#alsoRSVP input:checked').each(function() {
       
       allVals.push($(this).data('id'));
     })
     return allVals;
}

function getGuestList(ref) {
  ref.on('value', gotData, errData);
}

function rsvpSubmit() {
  $( "#rsvpForm" ).submit(function(e) {
    e.preventDefault();
    var firstName = $('#inputFirstName').val().toLowerCase();
    var lastName = $('#inputLastName').val().toLowerCase();
    var coming = $('input[type=radio]:checked').val();
    var fullName = firstName + ' ' + lastName;
    
    var person = keys.map(function(key, i){
      var singlePerson = rsvpList[key];
        
      var matchedPerson = singlePerson[0] + ' ' + singlePerson[1];
      
      if (matchedPerson === fullName) {
        if (coming === 'true') {
          if (singlePerson[2]) {
            showConfirmation();
            
          } else {
            rsvpSessionNames.push(matchedPerson);
            updateRsvpList(singlePerson, i);
          }
        } else {
            var notComingPerson = ref.child(i.toString());
              
          // console.log(person);
            notComingPerson.update({
              5 : false
            });

            cantAttened(0);
          } 
        } else {
          if (!searchTree(firstName, 0) || !searchTree(lastName, 1)) {
            console.log(searchTree(firstName, 0));
            console.log(searchTree(lastName, 0));
            cantAttened(1);
          }
        }

  

    });

  });
}

function searchTree(name, num){
     
  for(i=0; i < rsvpList.length; i++){
       result = rsvpList[i];
       if (result[num] === name) {
        return true;
       }
  }
  return false;
}


function cantAttened(num) {
  $( "#rsvpForm" ).hide(500, function(){
    $( "#rsvpForm" ).toggleClass('hidden');
    if (num === 0) {
      $('#confirmation').text("We are :'c that you can't be there");
      $('#confirmation').show(500);
    
    } if (num === 1) {
      $('#confirmation').text("Something went wrong with our list. Do you want to try again?");
      $('#confirmation').show(500);
      $('#restart').show(500, function(){
        $('#tryAgain').on('click', function(){
          $('#restart').hide(500);
          $('#restart').toggleClass('hidden');
          $('#confirmation').hide();
          $('#rsvpForm').show(500);
        });
      });
      $( "#restart" ).toggleClass('hidden');
    }
  });
}

  // INIT
function init() {

  getGuestList(ref);
  countdown();
  hamMenu();
  smoothScrolling();
  rsvpSubmit();
};

function gotData(data) {
  rsvpList = data.val();
  keys = Object.keys(data.val());
  
}

function errData(err) {
  console.log('err');
  console.log(err);
}


$(function(){
	init();
});