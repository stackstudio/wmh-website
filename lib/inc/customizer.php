<?php
/**
 * _mbbasetheme Theme Customizer
 *
 * @package _mbbasetheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _mbbasetheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', '_mbbasetheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _mbbasetheme_customize_preview_js() {
	wp_enqueue_script( '_mbbasetheme_customizer', get_template_directory_uri() . 'assets/js/vendor/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', '_mbbasetheme_customize_preview_js' );

/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

// function remove_acf(){
//   remove_menu_page( 'edit.php?post_type=acf' ); 
// }
// add_action( 'admin_menu', 'remove_acf',100 );

// function remove_admin_menu_items() {
// 	$remove_menu_items = array(__(''));
// 	global $menu;
// 	end ($menu);
// 	while (prev($menu)){
// 		$item = explode(' ',$menu[key($menu)][0]);
// 		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
// 		unset($menu[key($menu)]);}
// 	}
// }

// add_action('admin_menu', 'remove_admin_menu_items');
