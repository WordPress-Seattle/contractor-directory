<?php



class Contractors {
    
    
    public function __construct() {
        ;
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
} // end class