<?php
/**
 * Conditionally show the submit button
 * https://wpforms.com/developers/how-to-conditionally-show-the-submit-button/
 * 
 * This functionality hides the submit button on the form when the user selects the "Enquire about training & commercial services" radio button.
 * The purpose is to guide the user towards using the appropriate Commercial Services form instead, for these types of requests.
 */
  
add_action( 'wp_head', function () { ?>
   
    <style>
  
    /* CSS hide submit button on page load */
    #wpforms-form-2192 .wpforms-submit-container .wpforms-submit {
            visibility:hidden;
        }
  
    #wpforms-form-2192 .wpforms-submit-container .wpforms-submit.show-submit {
            visibility:visible;
        }
   
    </style>
   
<?php } );
   
   
// Conditional logic for Submit button
function wpf_dev_form_redirect() {
    ?>
    <script>
        jQuery(function($){
            $( "form#wpforms-form-2192" ).click(function(){
                var selectedval = $( ".wpforms-form input[type='radio']:checked" ).val();
                if(selectedval != "Enquire about training & commercial services"){
                    $( ".wpforms-submit" ).addClass( "show-submit" );
                }
            });
        });
    </script>
    <?php
}
add_action( 'wpforms_wp_footer_end', 'wpf_dev_form_redirect', 10 );