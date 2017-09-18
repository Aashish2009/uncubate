<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{{Session::token()}}}'
    }
});

/* contsct us */
$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var company = $("#company").val();
    var business = $("#business").val();
    var seats = $("#seats").val();
    var moveindate = $("#moveindate").val();
    var workhour = $("#workhourval").val();
    var months = $("#months").val();
    var consulting = $("input[name='consulting']:checked").val();
    var location = $("input[name='location']:checked").val();
    var message = $("#message").val();

    $.ajax({
        type: "POST",
        url: "{{URL::route('contact_us_submit')}}",
        data: "name=" + name + "&email=" + email + "&mobile=" + mobile + "&company=" + company + "&business=" + business + "&seats=" + seats + 
        	  "&moveindate=" + moveindate + "&workhour=" + workhour + "&months=" + months + "&consulting=" + consulting + "&location=" + location + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Thank you :) We will soon get back to you!")
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}
$("#subBtn").click(function(){
	    if ($("#newsEmail").val() == '' || !isEmail($("#newsEmail").val())) {
	        // handle the invalid form...
	        $("#newsSubscriptionForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		        $(this).removeClass();
		    });
	        var msgClasses = "h3 text-center text-danger";
	        $("#newsSubmitMsg").removeClass().addClass(msgClasses).text("Please enter valid email id.");
	    } else {
	    	$.ajax({
	            type: "POST",
	            url: "{{URL::route('subscribe_news_letter')}}",
	            data: "email=" + $("#newsEmail").val(),
	            success : function(text){
	                if (text == "success"){
	                	$("#newsEmail").val('');
	                	var msgClasses = "h3 text-center tada animated text-success";
	                	$("#newsSubmitMsg").removeClass().addClass(msgClasses).text("Thank you for subscribing!");
	                } else {
	                    
	                }
	            }
	        });
	    }
})

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
</script>