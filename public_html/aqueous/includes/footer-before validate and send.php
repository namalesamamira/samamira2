<footer>
    <div class='footerbackground'>
        &copy; 2016. CIS Kenya | Privacy Policy
    </div>
</footer>
<script src='js/jquery.min.js'></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="fonts/fontsmoothie.min.js"></script>
<script>
    jQuery.noConflict();
    jQuery(document).ready(function() {
        jQuery("#submit").click(function(event) {

            var name = jQuery("input#name").val();
            var email = jQuery("input#email").val();
            var phone = jQuery("input#phone").val();

            var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone;

            jQuery.ajax({
                type: "POST",
                // url: jQuery.attr('action'),
                url: "includes/process.php",
                data: dataString,
                success: function(data) {
                    data=JSON.parse(data);
                    console.log(data);
                    jQuery('#registrationform').html("<div id='message'>...</div>");
                    jQuery('#message').html("<h2>"+data.message+"!</h2>")
                        .append("<p>We will be in touch soon.</p>")
                        .hide()
                        .fadeIn(1500, function() {
                            // jQuery('#message').append("<img id='checkmark' src='images/check.png' />");
                        });
                        //TODO: analytic code for conversions
                }
            });
            // return false;//prevents the form from submitting
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });
        jQuery('.bxslider').bxSlider();
    });
</script>
<!--analytics-->