<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _mbbasetheme
 */
?>

<article id="post-<?php the_ID(); ?> generic-bg" <?php post_class('work-block generic-bg'); ?> style="background-image: url(<?php _basetheme_post_thumbnail_helper(); ?>);">

	<div class="entry-content up">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
