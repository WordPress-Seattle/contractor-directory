<?php

/*
 * @todo Add rating to column on listing page
 * @todo Add rating metabox
 * @todo Add 5 star to rating meta box
 * @todo Add "will hire again" to rating meta box
 * @todo Create front end submission forms
 */

class WPSeaUserRating {
    
    
    public function __construct() {
        // Add user rating post type
        add_action( 'init', array( &$this, 'registerPostType' ) );
        
        // Add Metabox that will show the rating
    }
    
    public function registerPostType() {
        $labels = array(
            'name' => __('User Rating'),
            'singular_name' => __('User Rating'),
            'add_new' => __('New Rating'),
            'add_new_item' => __('Add New Rating'),
            'edit_item' => __('Edit Rating'),
            'new_item' => __('New Rating'),
            'all_items' => __('All Ratings'),
            'view_item' => __('View Rating'),
            'search_items' => __('Search Ratings'),
            'not_found' =>  __('No Ratings found'),
            'not_found_in_trash' => __('No Ratings found in Trash'),
            'parent_item_colon' => '',
            'menu_name' => 'User Rating'

        );
        $args = array(
            'labels' => $labels,
            'public' => true, 
            'publicly_queryable' => true, 
            'exclude_from_search' => true,
            'show_in_menu' => true, 
            //'menu_icon' => plugins_url( 'logo-icon.png', __FILE__ ),// . '/blobNotes/logo-icon.png',
            'rewrite' => false, 
            'has_archive' => false,
            'capability_type' => 'post',
            'hierarchical' => false, 
            'supports' => array('editor'),
            'taxonomies' => array('category'),
            'show_in_nav_menus' => false
        ); 
        register_post_type('wpsea_user_rating',$args);
    }
} // end class