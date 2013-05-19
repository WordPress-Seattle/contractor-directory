/* 
 * Custom Javascript code for wp-admin
 * 
 * NOTE: THIS JAVASCRIPT IS LOADED ON **EVERY** wp-admin PAGE LOAD
 */

jQuery(document).ready(function($) {
    
    
    
    /*
     * Remove the "Personal Options" from the user profile. This includes fields
     * 
     * - Visual Editor (yes/no)
     * - Admin Color Scheme
     * - Keyboard Shortcuts
     * - Toolbar
     */
    jQuery(document).ready(function($) { 
        $('form#your-profile > h3:first').hide(); 

        $('form#your-profile > table:first').hide(); 
        $('form#your-profile').show(); 
    });

});
