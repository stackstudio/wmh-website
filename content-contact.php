<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _mbbasetheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('work-block'); ?>>
	<div class="entry-content up">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<div id="map"></div>
</article><!-- #post-## -->