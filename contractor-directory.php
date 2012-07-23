<?php
/*
 Plugin Name: Contractor Directory
 Plugin URI:
 Description: Creates a browesable and searchable contractor directory on your site by updating the user profile page
 Author: WordPress Seattle
 Version: 0.8
 Author URI: http://www.meetup.com/SeattleWordPressMeetup/
 */

require_once( 'WPSeaUserProfile.class.php' );
require_once( 'WPSeaUserRating.class.php' );

new WPSeaUserProfile();
new WPSeaUserRating();