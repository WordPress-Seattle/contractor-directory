<?php
/*
Plugin Name: Contractor Directory
Plugin URI: 
Description: Turns the user's profile into a listing of web contractors browsable on the front. Requires the WPSea User plugin to function with alteration
Version: 
Author: WordPress Seattle
Author URI: http://wpseattle.com
License: 
License URI: 
Text Domain: contractor-directory
*/
define( 'CONTRACTOR_DIRECTORY_TEXTDOMAIN', 'contractor-directory' );
define( 'CONTRACTOR_DIRECTORY_PLUGIN_DIR', trailingslashit( dirname( __FILE__) ) );
define( 'CONTRACTOR_DIRECTORY_PLUGIN_URL', trailingslashit ( WP_PLUGIN_URL . "/" . basename( __DIR__  ) ) );
define( 'CONTRACTOR_DIRECTORY_PLUGIN_FILE', CONTRACTOR_DIRECTORY_PLUGIN_DIR . basename( __DIR__  ) . ".php" );
define( 'WPSEA_USER_TEXTDOMAIN', 'wpsea-user' );
define( 'WPSEA_USER_PLUGIN_DIR', trailingslashit( dirname( __FILE__) ) );
define( 'WPSEA_USER_PLUGIN_URL', trailingslashit ( WP_PLUGIN_URL . "/" . basename( __DIR__  ) ) );
define( 'WPSEA_USER_PLUGIN_FILE', WPSEA_USER_PLUGIN_DIR . basename( __DIR__  ) . ".php" );

require_once( CONTRACTOR_DIRECTORY_PLUGIN_DIR . 'lib/bl/bl-includes.php' ); // Required to setup bl functionality


/*
 * **************************************************************************
 * **************************************************************************
 * ******** YOU MAY BEGIN YOUR CUSTOM PLUGIN CODE BELOW THIS COMMENT ********
 * **************************************************************************
 * **************************************************************************
 */


// Ensure that the WP Router is installed and active, otherwise this plugin
// will blow up and destroy the whole world. Attempt to find and load it
if( !class_exists( 'WP_Router' ) ) { // WP_Router class does not exist
    contractor_directory_debug( 'class WP_Router not loaded', 'The WP_Router class is not already loaded. Attempting to find it. ', 'warning' );
    
    if( is_dir( WP_PLUGIN_DIR . '/wp-router' ) ) {
        // The plugin does exist. Attempt to force it to start
        require_once( WP_PLUGIN_DIR . '/wp-router/wp-router.php' );
        
        if( !class_exists( 'WP_Router' ) ) { 
            contractor_directory_debug( 'Unable to start WP_Router', 'The WP Router plugin was found but could not be started', 'error' );
        }
    } else {
        contractor_directory_debug( 'WP Router plugin not installed!', 'The WP Router plugin MUST be install to continue', 'error' );
    }
            
}

require_once( CONTRACTOR_DIRECTORY_PLUGIN_DIR . 'lib/Contractors.class.php' );
new Contractors();

// Ensure WP Router exists
if( class_exists( 'WP_Router' ) ) {
    
    require_once( CONTRACTOR_DIRECTORY_PLUGIN_DIR . 'lib/Contractors.class.php' );
    // Setup new route for directory
    add_action( 'wp_router_generate_routes', 'wpsea_dir_add_routes', 20 );
    
} else {
    echo 'No WP_Router';
} // end if( class_exist( 'WP_Router' ) )