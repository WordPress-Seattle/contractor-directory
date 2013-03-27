<?php



class Contractors {
    
    
    public function __construct() {
        //if( !is_admin() ) return;
            // Setup user contact methods
            add_filter( 'user_contactmethods', array( &$this, 'userContactMethods' ) );
            
            // Remove admin color scheme picker
            remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
            
            // JS to hide personal options
            add_action( 'admin_enqueue_scripts', array( &$this, 'addJs' ) );
            
            // Add additional fields
            add_action( 'show_user_profile', array( &$this, 'addAdditionalFields' ) );
            add_action( 'edit_user_profile', array( &$this, 'addAdditionalFields' ) );
            
            // Save additional fields
            add_action( 'personal_options_update', array( &$this, 'saveAdditionalFields' ) );
            add_action( 'edit_user_profile_update', array( &$this, 'saveAdditionalFields' ) );
            
            add_shortcode( 'contractors', array( &$this, 'contractorShortcode' ) );
    }
    
    public function find( $Args = null ) {
        
        $args = array(
            'meta_key' => 'share_in_directory',
            'meta_value' => 'on',
        );
        $query = new WP_User_Query( $args );
        $results = $query->get_results();
        
        foreach( $results AS $r ) {
            $r->website = $r->user_url;
            $r->twitter = get_user_meta( $r->ID, 'twitter', true );
            $r->twitter_url = "https://twitter.com/$r->twitter";
            $r->facebook = get_user_meta( $r->ID, 'facebook', true );
            $r->facebook_url = "https://facebook.com/$r->facebook";
            $r->linkedin = get_user_meta( $r->ID, 'linkedin', true );
            $r->github = get_user_meta( $r->ID, 'github', true );
            $r->github_url = "https://github.com/$r->github";
            $r->phone = get_user_meta( $r->ID, 'phone', true );
            $r->wporg = get_user_meta( $r->ID, 'wporg', true );
            $r->wporg_url = "http://profiles.wordpress.org/$r->wporg";
            $r->portfolio = get_user_meta( $r->ID, 'portfolio', true );
            $r->email = $r->user_email;
            $r->bio = get_user_meta( $r->ID, 'description', true );
            $r->first_name = get_user_meta( $r->ID, 'first_name', true );
            $r->last_name = get_user_meta( $r->ID, 'last_name', true );
            $r->i_do_design = get_user_meta( $r->ID, 'i_do_design', true );
            $r->i_do_theming = get_user_meta( $r->ID, 'i_do_theming', true );
            $r->i_do_development = get_user_meta( $r->ID, 'i_do_development', true );
            $r->i_do_user_training = get_user_meta( $r->ID, 'i_do_user_training', true );
            
        }
        
        return $results;
    }
    
    
     public function addJs() {
         // JS to hide personal options
        wp_register_script('wpsea-user-personal-options', CONTRACTOR_DIRECTORY_PLUGIN_DIR . 'js/wp-admin.js', array('jquery'));
        wp_enqueue_script('wpsea-user-personal-options');
           
    }
    
    public function userContactMethods( $ContactMethods ) {
        // Get rid of methods we do not need
        unset( $ContactMethods['aim'] );
        unset( $ContactMethods['yim'] );
        unset( $ContactMethods['jabber'] );
        
        // Add in the methods we want
        $ContactMethods['twitter'] = 'Twitter handle (no @)';
        $ContactMethods['facebook'] = 'Facebook username';
        $ContactMethods['linkedin'] = 'LinkedIn profile link';
        $ContactMethods['phone'] = 'Github username';
        $ContactMethods['wporg'] = 'WordPress.org username';
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
        if ( !current_user_can( 'edit_user', $UserId ) )
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
    
    public function contractorShortcode() {
        return "Hello World";
    }
} // end class