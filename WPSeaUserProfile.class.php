<?php

class WPSeaUserProfile {
    
    
    public function __construct() {
            if( !is_admin() ) return;
            // Setup user contact methods
            add_filter( 'user_contactmethods', array( &$this, 'userContactMethods' ) );
            
            // Remove admin color scheme picker
            remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
            
            // JS to hide personal options
            wp_register_script('contractor-directory-personal-options', WP_PLUGIN_URL.'/contractor-directory/js/contractor-directory.js', array('jquery'));
            wp_enqueue_script('contractor-directory-personal-options');
            
            // Add additional fields
            add_action( 'show_user_profile', array( &$this, 'addAdditionalFields' ) );
            add_action( 'edit_user_profile', array( &$this, 'addAdditionalFields' ) );
            
            // Save additional fields
            add_action( 'personal_options_update', array( &$this, 'saveAdditionalFields' ) );
            add_action( 'edit_user_profile_update', array( &$this, 'saveAdditionalFields' ) );


    }
    
    public function userContactMethods( $ContactMethods ) {
        // Get rid of methods we do not need
        unset( $ContactMethods['aim'] );
        unset( $ContactMethods['yim'] );
        unset( $ContactMethods['jabber'] );
        
        // Add in the methods we want
        $ContactMethods['twitter'] = 'Twitter handle (no @)';
        $ContactMethods['facebook'] = 'Facebook username';
        $ContactMethods['linkedin'] = 'LinkedIn username';
        $ContactMethods['phone'] = 'Github username';
        $ContactMethods['portfolio'] = 'Portfolio link';
       
        return $ContactMethods;
    }
    
    public function addAdditionalFields( $User ) {
        $share_in_directory = get_the_author_meta( 'share_in_directory', $User->ID );
        if( 'on' == $share_in_directory ) {
            $share_in_directory = 'checked="checked"';
        } else {
            $share_in_directory = '';
        }
        
        $i_do_design = get_the_author_meta( 'i_do_design', $User->ID );
        if( 'on' == $i_do_design ) {
            $i_do_design = 'checked="checked"';
        } else {
            $i_do_design = '';
        }
        
        $i_do_theming = get_the_author_meta( 'i_do_theming', $User->ID );
        if( 'on' == $i_do_theming ) {
            $i_do_theming = 'checked="checked"';
        } else {
            $i_do_theming = '';
        }
        
        $i_do_development = get_the_author_meta( 'i_do_development', $User->ID );
        if( 'on' == $i_do_development ) {
            $i_do_development = 'checked="checked"';
        } else {
            $i_do_development = '';
        }
        
        $i_do_user_training = get_the_author_meta( 'i_do_user_training', $User->ID );
        if( 'on' == $i_do_user_training ) {
            $i_do_user_training = 'checked="checked"';
        } else {
            $i_do_user_training = '';
        }
        ?>

	<h3>Contact Directory Options</h3>

	<table class="form-table">

		<tr>
			<th><label for="share_in_directory">Share in directory</label></th>

			<td>
                            <label><input type="checkbox" name="share_in_directory" id="share_in_directory" <?php echo $share_in_directory;  ?> /> 
				<span class="description">Check to include your profile in the contractor directory</span></label>
			</td>
		</tr>
                
                <tr>
			<th>I can do</th>

			<td>
                            
                            <label><input type="checkbox" name="i_do_design" id="i_do_design" <?php echo $i_do_design;  ?> /> Design</label>
                            <br/><label><input type="checkbox" name="i_do_theming" id="i_do_theming" <?php echo $i_do_theming;  ?> /> Theming</label>
                            <br/><label><input type="checkbox" name="i_do_development" id="i_do_development" <?php echo $i_do_development;  ?> /> Development</label>
                            <br/><label><input type="checkbox" name="i_do_user_training" id="i_do_user_training" <?php echo $i_do_user_training;  ?> /> User Training</label>
                            
                            <br/><br/><span class="description">Check all that apply</span>
			</td>
		</tr>

	</table>
        <?php
    }
    
    public function saveAdditionalFields( $UserId ) {
        if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
        
        if( !isset( $_POST['share_in_directory'] ) ) $_POST['share_in_directory'] = 'off';
        update_usermeta( $UserId, 'share_in_directory', $_POST['share_in_directory'] );
        
        if( !isset( $_POST['i_do_design'] ) ) $_POST['i_do_design'] = 'off';
        update_usermeta( $UserId, 'i_do_design', $_POST['i_do_design'] );
        
        if( !isset( $_POST['i_do_theming'] ) ) $_POST['i_do_theming'] = 'off';
        update_usermeta( $UserId, 'i_do_theming', $_POST['i_do_theming'] );
        
        if( !isset( $_POST['i_do_development'] ) ) $_POST['i_do_development'] = 'off';
        update_usermeta( $UserId, 'i_do_development', $_POST['i_do_development'] );
        
        if( !isset( $_POST['i_do_user_training'] ) ) $_POST['i_do_user_training'] = 'off';
        update_usermeta( $UserId, 'i_do_user_training', $_POST['i_do_user_training'] );
        
        
    }
        
} // end class