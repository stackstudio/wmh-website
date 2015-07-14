<?php
/**
 * _mbbasetheme functions and definitions
 *
 * @package _mbbasetheme
 */

/****************************************
Theme Setup
*****************************************/

/**
 * Theme initialization
 */
require get_template_directory() . '/lib/init.php';

/**
 * Custom theme functions definited in /lib/init.php
 */
require get_template_directory() . '/lib/theme-functions.php';

/**
 * Helper functions for use in other areas of the theme
 */
require get_template_directory() . '/lib/theme-helpers.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/lib/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/lib/inc/jetpack.php';


/**
 * et meta options such as taxonomies and custom post types
 */
require get_template_directory() . '/lib/meta-options.php';


/****************************************
Require Plugins
*****************************************/

require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
require get_template_directory() . '/lib/theme-require-plugins.php';

add_action( 'tgmpa_register', 'mb_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/

/**
 * Define custom post type capabilities for use with Members
 */
add_action( 'admin_init', 'mb_add_post_type_caps' );
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}

add_filter('show_admin_bar', '__return_false');

/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/
$user = wp_get_current_user();
if($user && isset($user->user_login) && 'Developer' == $user->user_login) {

    //do naff all here

} else {
	add_filter('acf/settings/show_admin', 'my_acf_show_admin');

	function my_acf_show_admin( $show ) {
	    
	    return current_user_can('manage_options');
	    
	}
}


/*-----------------------------------------------------------------------------------*/
/* Adding ACF data for posts inside the rest api for that post */
/*-----------------------------------------------------------------------------------*/

function wp_api_encode_acf($data,$post,$context){
	$data['meta'] = array_merge($data['meta'],get_fields($post['ID']));
	return $data;
}
if( function_exists('get_fields') ){
	add_filter('json_prepare_post', 'wp_api_encode_acf', 10, 3);
}




/**
 * WP_Query as JSON
 */
function wpquery_scripts($not_in) {

    // custom query
    $posts = new WP_Query( array(
        'post_type' => 'case-studies',
        'post__not_in' => $not_in,
        'meta_key' => 'meta_long',
    ) );

    // to json
    $json = json_decode( $posts );
    echo $json;
}




/* testing function here */

function object_group_assoc($array, $key) {
    $return = array();
    foreach($array as $object) {
        $return[$object->$key][] = $object;
    }
    return $return;
}


// get taxonomies terms links
function custom_taxonomies_terms_links() {
    global $post, $post_id;
    // get post by post id
    $post = &get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $taxonomies = get_object_taxonomies($post_type);

    //<h5>'.$t.':</h5>

    $out = "<ul class='terms'>";
    foreach ($taxonomies as $taxonomy) {

    	if ( $taxonomy === 'brand-types' && 'categories' ) {
    		
    	} else if ( $taxonomy === 'awards' ) {
	    $out .= '<h5>awards</h5>';
	    //$out .= "<li>".$taxonomy.": ";
        // get the terms related to post
        $terms = get_the_terms( $post->ID, $taxonomy );

        if ( !empty( $terms ) ) {

        	$terms_by_id = object_group_assoc($terms, 'term_id');
            $terms_by_parent = object_group_assoc($terms, 'parent');
            krsort($terms_by_parent);

            foreach ( $terms_by_parent as $parent_id => $children_terms ){

            	$t = str_replace('-', ' ', $taxonomy);

            	//$out .= "<h5>".$t.":</h5>";

                if($parent_id != 0){//Childs
                    //Add parent to out string
                    $parent_term = $terms_by_id[$parent_id][0]; //[0] because object_group_assoc return each element in an array
                    $out .= '<li class="item"><a href="' .get_term_link($parent_term->slug, $taxonomy) .'">'.$parent_term->name.'</a>';
                    //Add children to out string
                    $out .= '<ul>';
                    foreach ($children_terms as $child_term) {

                        $out .= '<li class="item"><a href="' .get_term_link($child_term->slug, $taxonomy) .'">'.$child_term->name.'</a></li>';
                    }
                    $out .= '</ul></li>';

                } else {//parent_id == 0

                    foreach ($children_terms as $child_term) {
                        if(!array_key_exists($child_term->term_id, $terms_by_parent)){//Not displayed yet becouse it doesn't has children
                            $out .= '<li class="item"><a href="' .get_term_link($child_term->slug, $taxonomy) .'">'.$child_term->name.'</a></li>';
                        }

                    }
                    //$out .= '</ul>';
                }
            }

        } else {  

        }
        $out .= "</li>";

    	} else if ( $taxonomy === 'press' ) {
	    $out .= '<h5>press</h5>';
	    //$out .= "<li>".$taxonomy.": ";
        // get the terms related to post
        $terms = get_the_terms( $post->ID, $taxonomy );

        if ( !empty( $terms ) ) {

        	$terms_by_id = object_group_assoc($terms, 'term_id');
            $terms_by_parent = object_group_assoc($terms, 'parent');
            krsort($terms_by_parent);

            foreach ( $terms_by_parent as $parent_id => $children_terms ){

            	$t = str_replace('-', ' ', $taxonomy);

            	//$out .= "<h5>".$t.":</h5>";

                if($parent_id != 0){//Childs
                    //Add parent to out string
                    $parent_term = $terms_by_id[$parent_id][0]; //[0] because object_group_assoc return each element in an array
                    $out .= '<li class="item"><a href="' .get_term_link($parent_term->slug, $taxonomy) .'">'.$parent_term->name.'</a>';
                    //Add children to out string
                    $out .= '<ul>';
                    foreach ($children_terms as $child_term) {

                        $out .= '<li class="item"><a href="' .get_term_link($child_term->slug, $taxonomy) .'">'.$child_term->name.'</a></li>';
                    }
                    $out .= '</ul></li>';

                } else {//parent_id == 0

                    foreach ($children_terms as $child_term) {
                        if(!array_key_exists($child_term->term_id, $terms_by_parent)){//Not displayed yet becouse it doesn't has children
                            $out .= '<li class="item"><a href="' .get_term_link($child_term->slug, $taxonomy) .'">'.$child_term->name.'</a></li>';
                        }

                    }
                    //$out .= '</ul>';
                }
            }

        } else {  

        }
        $out .= "</li>";

    	}// end of else statement for the brand-types
    }
    $out .= "</ul>";
    return $out;
}


function remove_hentry( $classes ) {

	$classes = array_diff($classes, array('hentry'));	

	return $classes;
}
// function jrh_post_names($classes) {
// 	$classes = array_diff($classes, array("tag-link", "tag-links"));
// 	return $classes;
// }
add_filter('post_class','remove_hentry');
