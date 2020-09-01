<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function my_custom_posts() {
	$labels = array(
	  'name'               => _x( 'Portfolio', 'post type general name' ),
	  'singular_name'      => _x( 'Portfolio Item', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'book' ),
	  'add_new_item'       => __( 'Add New Portfolio Item' ),
	  'edit_item'          => __( 'Edit Portfolio item' ),
	  'new_item'           => __( 'New Portfolio item' ),
	  'all_items'          => __( 'All Portfolio items' ),
	  'view_item'          => __( 'View Portfolio' ),
	  'search_items'       => __( 'Search Portfolio' ),
	  'not_found'          => __( 'No portfolio items found' ),
	  'not_found_in_trash' => __( 'No portfolio items found in the Trash' ), 
	  'menu_name'          => 'Portfolio'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Our projects and portfolio items',
	  'public'        => true,
	  'menu_position' => 10,
	  'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
	  'has_archive'   => true,
	);
	register_post_type( 'portfolio', $args ); 
  }
  add_action( 'init', 'my_custom_posts' );