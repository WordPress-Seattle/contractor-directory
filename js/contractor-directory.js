jQuery(document).ready(function($) {
    // Removes the personal options section on the user profile page
    jQuery(document).ready(function($) { 
        $('form#your-profile > h3:first').hide(); 

        $('form#your-profile > table:first').hide(); 
        $('form#your-profile').show(); 
    });

});
