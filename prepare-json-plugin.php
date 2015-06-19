<?php

/**
 * @package Prepare JSON
 */
/*
Plugin Name: Prepare JSON
Plugin URI: http://wmh.dev
Description: Cleaning json data for front-end usage
Version: 1.1.1
Author: Stack Studio
Author URI: http://markdunbavan.co.uk
License: GPLv2 or later
Text Domain: prepare-json
*/

function qod_remove_extra_data( $data, $post, $context ) {
  // We only want to modify the 'view' context, for reading posts
  if ( $context !== 'view' || is_wp_error( $data ) ) {
    return $data;
  }
  
  // Here, we unset any data we don't want to see on the front end:
  unset( $data['status'] );
  // continue unsetting whatever other fields you want

  return $data;
}

add_filter( 'json_prepare_post', 'qod_remove_extra_data', 12, 3 );