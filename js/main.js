// Validate and submit the form
$("#form").validate({
	rules: {
		sex_alias: {
			required: true
		},
		first_name: "required",
		last_name: "required",
		sys_email: {
			required: true,
			email: true
		}
	},

	messages: {
	  first_name: "Bitte geben Sie Ihren Vornamen ein.",
	  last_name: "Bitte geben Sie Ihren Nachnamen ein.",
	  sys_email: {
	    required: "Bitte geben Sie Ihre E-Mail Adresse ein.",
	    email: "Ihre E-Mail sollte folgendes Format haben: name@domain.com"
	  }
	},

	debug: true,
    errorClass: 'error',
    validClass: 'success',
    errorElement: 'span',
    
    highlight: function(element, errorClass, validClass) {
      $(element).addClass(errorClass).removeClass(validClass);
      if ($(element).attr('type') === 'radio') {
      	$('.check').addClass(errorClass).removeClass(validClass);
      }
    },

    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass(errorClass).addClass(validClass);
      if ($(element).attr('type') === 'radio') {
      	$('.check').removeClass(errorClass).addClass(validClass);
      }
    },

    submitHandler: function(form) {
	  	$.ajax({
            url: "https://www.xcampaign.de/dispatcher/service", 
            type: "POST",             
            data: $(form).serialize(),
            cache: false,             
            processData: false,      
            success: function(data) {
                submitSuccessful();
            }
        });
        return false;
    },

    errorPlacement: function(error, element){
		error.insertAfter(element).animate({opacity: 1});
    }
});

function submitSuccessful() {
	$('#form').fadeOut('fast');

	$('h1').fadeOut('fast', function() {
		$(this).html('Vielen Dank für Ihre Anmeldung zum Newsletter!').fadeIn('fast', function() {
			$('#onSuccess').fadeIn();
		});
	});
}