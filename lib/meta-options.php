<?php
/**
 * Audience Theme Meta Options
 *
 * @package WordPress
 * @subpackage Audience
 * @since Audience 1.1
 */

/**
 * Engage all meta information for post types and taxonomies
 *
 *
 * @since Audience 1.1
 *
 */

//////////////////////////////////////////////////////////////
// Custom Post Types and Custom Taxonamies  NEWS
/////////////////////////////////////////////////////////////

    add_action('init', 'create_post_types_case_studies');

    function create_post_types_case_studies() {

        $labels = array(
            'name' => __('Case Studies'),
            'singular_name' => __('Case Study'),
            'add_new' => __('Add New Case Study'),
            'add_new_item' => __('Add New Case Study'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Case Study'),
            'new_item' => __('New Case Study'),
            'view' => __('View Case Study'),
            'view_item' => __('View Case Study'),
            'search_items' => __('Search Case Studies'),
            'not_found' => __('No Case Studies found'),
            'not_found_in_trash' => __('No Case Studies found in Trash'),
            'parent' => __('Parent Case Study'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'our-work' ),
            'capability_type' => 'post',
            'hierarchical' => true,
            'menu_position' => 8,
            'taxonomies' => array('category','brand-types'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions')
        );

        register_post_type('case-studies', $args);
        flush_rewrite_rules(true);
    }

    add_action('init', 'create_awards_taxonomies');

    function create_awards_taxonomies() {
        $labels = array(
            'name' => __('Awards Categories'),
            'singular_name' => __('Award Category'),
            'search_items' => __('Search Awards Category'),
            'all_items' => __('All Awards Categories'),
            'parent_item' => __('Parent Award'),
            'parent_item_colon' => __('Parent Award Category:'),
            'edit_item' => __('Edit Award Category'),
            'update_item' => __('Update Award Category'),
            'add_new_item' => __('Add Awards Category'),
            'new_item_name' => __('New Award Name')
        );

        register_taxonomy('awards', 'case-studies', array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_in_nav_menus' => true
        ));
        flush_rewrite_rules(false);
    }

    add_action('init', 'create_brand_types_taxonomies');
    add_action('init', 'create_press_taxonomies');

    function create_brand_types_taxonomies() {
        $labels = array(
            'name' => __('Brand Types Categories'),
            'singular_name' => __('Brand Type'),
            'search_items' => __('Search Brand Types'),
            'all_items' => __('All Brand Types'),
            'parent_item' => __('Parent Brand Type'),
            'parent_item_colon' => __('Parent Brand Type:'),
            'edit_item' => __('Edit Brand Type'),
            'update_item' => __('Update Brand Type'),
            'add_new_item' => __('Add Brand Type'),
            'new_item_name' => __('New Brand Type Name')
        );

        register_taxonomy('brand-types', 'case-studies', array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_in_nav_menus' => true
        ));
        flush_rewrite_rules(false);
    }

    function create_press_taxonomies() {
        $labels = array(
            'name' => __('Press'),
            'singular_name' => __('Press Item'),
            'search_items' => __('Search Press'),
            'all_items' => __('All Press'),
            'parent_item' => __('Parent Press'),
            'parent_item_colon' => __('Parent Press:'),
            'edit_item' => __('Edit Press Item'),
            'update_item' => __('Update Press Item'),
            'add_new_item' => __('Add Press Item'),
            'new_item_name' => __('New Press Name')
        );

        register_taxonomy('press', 'case-studies', array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_in_nav_menus' => true
        ));
        flush_rewrite_rules(false);
    }