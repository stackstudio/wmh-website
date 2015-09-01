<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _mbbasetheme
 */

if ( ! function_exists( '_mbbasetheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function _mbbasetheme_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', '_mbbasetheme' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', '_mbbasetheme' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', '_mbbasetheme' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( '_mbbasetheme_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function _mbbasetheme_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', '_mbbasetheme' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav"></span>&nbsp;%title', 'Previous post link', '_mbbasetheme' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav"></span>', 'Next post link',     '_mbbasetheme' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( '_mbbasetheme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function _mbbasetheme_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', '_mbbasetheme' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', '_mbbasetheme' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $time_string . '</span>';

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function _mbbasetheme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( '_mbbasetheme_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( '_mbbasetheme_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so _mbbasetheme_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so _mbbasetheme_categorized_blog should return false.
		return false;
	}
}

/**
 * Create post thumbnail url helper
 */
if ( ! function_exists( '_basetheme_post_thumbnail_helper' ) ) :
function _basetheme_post_thumbnail_helper() {

	$image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'full');

	if(isset($image_url[0])){
	    echo $image_url[0];
	} else {
		echo get_stylesheet_directory_uri(); echo '/assets/images/dummy-header.jpg';
	}
	
}
endif;


/**
 * Create a url image helper for custom fields
 */
if ( ! function_exists( '_basetheme_image_thumbnail_helper' ) ) :
function _basetheme_image_thumbnail_helper() {

	// $image = get_field('main_image');
	// var_dump($image);
	$image_id = $image['id'];  

	$image_url = wp_get_attachment_image_src($image_id,'full');

	if(isset($image_url[0])){
	    echo $image_url[0];
	} else {
		echo get_stylesheet_directory_uri(); echo '/assets/images/dummy-header.jpg';
	}
	
}
endif;



/**
 * Flush out the transients used in _mbbasetheme_categorized_blog.
 */
function _mbbasetheme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( '_mbbasetheme_categories' );
}
add_action( 'edit_category', '_mbbasetheme_category_transient_flusher' );
add_action( 'save_post',     '_mbbasetheme_category_transient_flusher' );


// if ( ! function_exists( 'get_awards_items' ) ) :
// 	function get_awards_items() {
// 		global $post;
// 		$aw = wp_get_post_terms($post->ID, 'awards', array("fields" => "ids"));
// 		$term_parent_ID = $aw[0];
// 		$term_children = get_terms( 'awards', array(
// 	        'child_of' => $term_parent_ID,
// 	        'orderby'  => 'term_group',
// 	        'order'    => 'ASC',
//         ));

// 		var_dump($term_children); 
// 	}
// endif;

/**
 * Get top level term id from a post id
 *
 * @param int $post_id post id
 * @param string $taxonomy taxonomy
 * @return int
 */
function get_top_level_term_id( $post_id, $taxonomy ) {
 
    $terms = wp_get_post_terms( $post_id, $taxonomy );
 
    $term = $terms[0];
    $term_id = $term->term_id;
 
    while( $term->parent ) {
        $term_id = $term->parent; 
        $term = get_term_by( 'id', $term_id, $taxonomy );
    }
    return $term_id;
}

/**
 * Get last child term id(s) from a post id
 *
 * @param int $post_id post id
 * @param string $taxonomy taxonomy
 * @param bool $multiple array or single term id
 * @return mixed
 */
function list_hierarchical_terms($taxo) {
	global $post;
	$taxonomy = $taxo; // change this to your taxonomy
	$terms = wp_get_post_terms( $post->ID, $taxonomy, array( "fields" => "ids" ) );
	if( $terms ) {
		echo '<ul>';
		echo 
		$terms = trim( implode( ',', (array) $terms ), ' ,' );
		wp_list_categories( 'title_li=&taxonomy=' . $taxonomy . '&include=' . $terms );
		echo '</ul>';
	}
}


// class Walker_Simple_Example extends Walker_Category {  

//     function start_lvl(&$output, $depth=1, $args=array()) {  
//         $output .= "\n<ul class=\"children\">\n";  
//     }  

//     function end_lvl(&$output, $depth=0, $args=array()) {  
//         $output .= "</ul>\n";  
//     }  

//     function start_el(&$output, $item, $depth=0, $args=array()) {  
//         $output .= "<li class=\"cat-item\">" . "<a class=\"parent\">\n" .esc_attr( $item->name ) . "</a>\n";
//     }  

//     function end_el(&$output, $item, $depth=0, $args=array()) {  
//         $output .= "</li>\n";  
//     }  
// } 








class My_Category_Walker extends Walker_Category {

  var $lev = -1;
  var $skip = 0;
  static $current_parent;

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $this->lev = 0;
    $output .= "<ul>" . PHP_EOL;
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "</ul>" . PHP_EOL;
    $this->lev = -1;
  }

  function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
    extract($args);
    $cat_name = esc_attr( $category->name );
    $class_current = $current_class ? $current_class . ' ' : 'current ';
    if ( ! empty($current_category) ) {
      $_current_category = get_term( $current_category, $category->taxonomy );
      if ( $category->term_id == $current_category ) $class = $class_current;
      elseif ( $category->term_id == $_current_category->parent ) $class = rtrim($class_current) . '-parent ';
    } else {
      $class = '';
    }
    if ( ! $category->parent ) {
      if ( ! get_term_children( $category->term_id, $category->taxonomy ) ) {
          $this->skip = 1;
      } else {
        if ($class == $class_current) self::$current_parent = $category->term_id;
        $output .= "<li class='" . $class . $level_class . "'>" . PHP_EOL;
        $output .= sprintf($parent_title_format, $cat_name) . PHP_EOL;
      }
    } else { 
      if ( $this->lev == 0 && $category->parent) {
        $link = get_term_link(intval($category->parent) , $category->taxonomy);
        $stored_parent = intval(self::$current_parent);
        $now_parent = intval($category->parent);
        $all_class = ($stored_parent > 0 && ( $stored_parent === $now_parent) ) ? $class_current . ' all' : 'all';
        $output .= "";
        //$output .= "<li class='" . $all_class . "'><a href='" . $link . "'>" . __('All') . "</a></li>\n";
        //,&#160;
        self::$current_parent = null;
      }
      $link = '<a href="' . esc_url( get_term_link($category) ) . '" >' . $cat_name . '</a>';
      $output .= "<li";
      $class .= $category->taxonomy . '-item ' . $category->taxonomy . '-item-' . $category->term_id;
      $output .=  ' class="' . $class . '"';
      $output .= ">" . $link;
    }
  }

  function end_el( &$output, $page, $depth = 0, $args = array() ) {
    $this->lev++;
    if ( $this->skip == 1 ) {
      $this->skip = 0;
      return;
    }
    $output .= "</li>" . PHP_EOL;
  }

}

function custom_list_categories( $args = '' ) {
  $defaults = array(
    'taxonomy' => 'category',
    'show_option_none' => '',
    'echo' => 1,
    'depth' => 2,
    'wrap_class' => '',
    'level_class' => '',
    'parent_title_format' => '%s',
    'current_class' => 'current'
  );
  $r = wp_parse_args( $args, $defaults );
  if ( ! isset( $r['wrap_class'] ) ) $r['wrap_class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];
  extract( $r );
  if ( ! taxonomy_exists($taxonomy) ) return false;
  $categories = get_categories( $r );
  $output = "<ul class='" . esc_attr( $wrap_class ) . "'>" . PHP_EOL;
  if ( empty( $categories ) ) {
    if ( ! empty( $show_option_none ) ) $output .= "<li>" . $show_option_none . "</li>" . PHP_EOL;
  } else {
    if ( is_category() || is_tax() || is_tag() ) {
      $current_term_object = get_queried_object();
      if ( $r['taxonomy'] == $current_term_object->taxonomy ) $r['current_category'] = get_queried_object_id();
    }
    $depth = $r['depth'];
    $walker = new My_Category_Walker;
    $output .= $walker->walk($categories, $depth, $r);
  }
  $output .= "</ul>" . PHP_EOL;
  if ( $echo ) echo $output; else return $output;
}



/**
 * Get post classes
 */
if ( ! function_exists( 'getSimilarPosts' ) ) :
function getSimilarWork() {
	//Optional:
	global $post;
	$postID = $post->ID;
	$theCategories = get_the_category($postID);

	$args = array(
		'posts_per_page'   => 10,
		//'category'         => $theCategories,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'exclude'          => $postID,
		'post__not_in' => array($postID),
		'post_type'        => 'case-studies'
	);
	$posts = get_posts( $args );
	foreach ( $posts as $post ) :
	  setup_postdata( $post );
	$title = get_the_title();
	$perm = get_the_permalink();
	$img = get_field('main_image');

		echo '<article class="col-1-4">';
		echo '<a href="'.$perm.'"><img src="'.$img['url'].'" alt="'.$img['title'].' image"></a>';
		echo '<h3><a href="'.$perm.'">'.$title.'</a></h3>';
		echo '</article>';

	endforeach; 
	wp_reset_postdata();

}
endif;






// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}

// so once you have this function you can just loop over the results returned by wp_get_object_terms

function project_get_item_classes($taxonomy, $results = 1) {
    // get terms for current post
    $terms = wp_get_object_terms( get_the_ID(), $taxonomy );
    // set vars
    $top_parent_terms = array();
    foreach ( $terms as $term ) {
        //get top level parent
        $top_parent = get_term_top_most_parent( $term->term_id, $taxonomy );
        //check if you have it in your array to only add it once
        if ( !in_array( $top_parent, $top_parent_terms ) ) {
            $top_parent_terms[] = $top_parent;
        }
    }
    // build output (the HTML is up to you)
    $names = array();
    foreach ( $top_parent_terms as $term ) {
        //echo $term->slug;
        $names[] = $term->slug;
    }
    $parent_slugs = join( "&", $names );
    echo $parent_slugs;
}
