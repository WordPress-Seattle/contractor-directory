<?php

if( !function_exists( 'contractor_directory_debug' ) ) {
    /**
     * Sends debugging data to a custom debug bar extension
     * 
     * @since 1.0
     * @param String $title
     * @param Mixed $data
     * @param String $format Optional - (Default:log) log | warning | error | notice | dump
     */
    function contractor_directory_debug( $title, $data, $format='log' ) {
        do_action( 'contractor_directory_debug', $title, $data, $format );
    }
}

if( !function_exists( 'contractor_directory_dump' ) ) {
    /**
     * Sends an object to a custom debug bar extension to be dumped with a 
     * fancy var_dump variant
     * 
     * @since 1.0
     * @param String $title
     * @param Mixed $data 
     */
    function contractor_directory_dump( $title, $data) { 
        do_action( 'contractor_directory_debug', $title, $data, 'dump' );
    }
}

///*
// * Log that the plugin has initialized
// */
//add_action( 'admin_init', 'new_log_init');
///**
// * Logs that the plugin has started
// * @since 1.0 
// */
//function new_log_init() {
//    $data = get_plugin_data( WPSEA_USER_PLUGIN_FILE );
//    wpsea_user_debug( 'Plugin loaded', 'Plugin ' . $data['Name'] . ' successfully loaded' );
//}



/*
 * Load stuff that should ONLY happen in wp-admin
 */
if( is_admin() ) {
    add_action( 'admin_enqueue_scripts', 'contractor_directory_admin_enqueue_scripts' );
}

function contractor_directory_admin_enqueue_scripts() {
    wp_enqueue_style( 'wpsea_user-wp-admin-css', WPSEA_USER_PLUGIN_URL . 'css/wp-admin.css' );
    wp_register_script('wpsea_user-wp-admin-js', WPSEA_USER_PLUGIN_URL.'js/wp-admin.js', array('jquery'));
    wp_enqueue_script('wpsea_user-wp-admin-js');
}