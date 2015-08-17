<?php
/**
 * The template for displaying all single posts.
 *
 * @package _mbbasetheme
 */

$pt = $post->ID;
get_header(); 
?>
<?php while ( have_posts() ) : the_post(); ?>
<?php var_dump( the_content() ); ?>
<?php
endwhile;
?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
