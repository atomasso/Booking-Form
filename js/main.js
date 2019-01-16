/**
 * Contains basic initialization and configuration procedures for included libraries and
 * the logic for creating additional resevation comment field.
 *
 * @author Ante Tomas
 */

/* TELEPHONE INPUT LIBRARY INITIALIZATION AND CONFIGURATION */
 
// initialize international telephone input
var input = document.querySelector("#phone");
  
var iti = window.intlTelInput(input, {
  initialCountry: "auto",
  geoIpLookup: function(callback) {
    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : ""; 
      callback(countryCode);
    });
  },
  utilsScript: "resources/library/tel/js/utils.js?1537727621611" // just for formatting/placeholders etc
});

// set initial country
var selectedCountry = iti.getSelectedCountryData().name;

// listen to the telephone input for changes
input.addEventListener('countrychange', function(e) {
	selectedCountry = iti.getSelectedCountryData().name;
});
 

/* FORM VALIDATION LOGIC */
 
// custom method for email validation
jQuery.validator.addMethod("checkEmail", function(value, element) {
	return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?!gmail.com)(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address.');

// validate form
$("form").validate( {
	rules: {
		firstname: "required",
		lastname: "required",  	
		email: {
			required: true,
			checkEmail: true
		},
		phone: "required",
		guests: "required",  	
		date: "required",
		time: "required",
		"other-reservation-comment": "required"	
	},
	messages: {
		firstname: "Please enter your first name",
		lastname: "Please enter your last name",  		
		email: {
			required: "Please enter a value"
		},
		phone: {
			required: "Please enter a valid phone number"
		},
		guests: "Please enter number of guests",
		date: "Please enter date",  		
		time: "Please enter time",
		"other-reservation-comment": "Please enter a value",
	},
	errorElement: "em",
	errorPlacement: function (error, element) {
		// Add the `help-block` class to the error element
		error.addClass( "help-block" );

		// Add `has-feedback` class to the parent div.form-group in order to add icons to inputs
		element.parents( ".parents" ).addClass( "has-feedback" );
  	
		// Add the error message, after the help text, if it exists
		if ($( element ).next("small")[0] ) {
			error.insertAfter($(element).next("small")[0]);			
		} else if ($(element ).attr("id") === "phone") {
			var parent = element.parents(".parents")
			error.appendTo(parent);
		} else {			
			error.insertAfter(element);
		}
		  
		// Add the span element, if doesn't exists, and apply the icon classes to it.
		if (!element.next("span")[0]) {
			$("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
		}
	},
	success: function (label, element) {
		// Add the span element, if doesn't exists, and apply the icon classes to it.
		if (!$(element).next("span")[0]) {
			$("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
		}
	},
	highlight: function (element, errorClass, validClass) {
		$(element).parents( ".parents" ).addClass( "has-error").removeClass("has-success");
		$(element).next( "span" ).addClass( "glyphicon-remove").removeClass("glyphicon-ok");
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).parents(".parents").addClass("has-success").removeClass("has-error");
		$(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
	}
});    


/* SELECT2 - INITIALIZATION AND CONFIGURATION OF THE CUSTOMIZABLE SELECT BOX */

function format(state) {
	if (!state.id) {
		return state.text;
	} 
	var selectedValueArray = state.id.split(',');
  
	return $('<span><i class="fas ' + selectedValueArray[0] + '"></i> &nbsp;&nbsp;'+ state.text + '</span>');
};

$("select").select2({
	templateResult: format
});


/* ADDING ADDITIONAL COMMENT BOX FOR RESERVATION */

// get select list for reservation
var reservation = $('#reservation');
// reservation section for additional comment
var nextFormGroup = null;	

// check selected option
$(reservation).on('change', function() { 
	var selectedReservation = reservation.find(":selected").text();
  
    // remove additional comment field if it exists and if 'Other' option is not selected
	if (nextFormGroup != null && selectedReservation !== 'Other') {
		var v = $('#next-form-group');
		nextFormGroup.remove();
		nextFormGroup = null;
	// create additional comment field if 'Other' option is selected
	} else if (selectedReservation === 'Other') {
		var reservationSection = $("#reservation-section");
			
		// create new div and inside it input element for additional comment 
		var nextDiv = $(document.createElement('div')).attr("class", "col-sm-8 col-sm-offset-4 parents");
		var nextTextBox = $(document.createElement('input')).attr("type", "text");
		nextTextBox.attr("class", "form-control");
		nextTextBox.attr("name", "other-reservation-comment");
		nextTextBox.attr("id", "other-reservation-comment");
		nextTextBox.attr("placeholder", "Please tell more...");
		nextDiv.append(nextTextBox);
				
		// add the new form group for additional comment after the existing reservation selection element
		nextFormGroup = $(document.createElement('div')).attr("class", "form-group row");	
		nextTextBox.attr("id", "next-form-group");
		reservationSection.after(nextFormGroup);
		
		// add new div to the new form group			
		nextFormGroup.append(nextDiv);		
	}  
});


/* TIMEPICKER INITIALIZATION */

$(document).ready(function(){	
	// initialize timepicker
	$("input.timepicker").timepicker({
		timeFormat: 'h:mm p',
		interval: 30,
		minTime: '10',
		maxTime: '6:00pm',
		startTime: '10:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true
	});
	
	// initialize datepicker
	$('[data-toggle="datepicker"]').datepicker({ 
	
	});	
});  
