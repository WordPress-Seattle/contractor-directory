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


require_once( CONTRACTOR_DIRECTORY_PLUGIN_DIR . 'lib/Contractors.class.php' );
new Contractors();
