<?php
/*
 * THIS FILE IS AUTOMAGICALLY INCLUDED WHEN YOUR PLUGIN IS ACTIVATED!!!
 */

function wpsea_dir_add_routes( $router ) {
    
    $route_args = array(
        'path' => '^contractors',
        'query_vars' => array( ),
        'page_callback' => 'wpsea_dir_contractors_callback',
        'page_arguments' => array( ),
            'access_callback' => true,
            'title' => __( 'Contractors' ),
            'template' => array(
                'views/contractor-directory/contractors.php',
                CONTRACTOR_DIRECTORY_PLUGIN_DIR . 'views/contractors.php',
        )
    );

    $router->add_route( 'demo-route-id', $route_args );
}

function wpsea_dir_contractors_callback() {
    echo 'Contractors callback';
}