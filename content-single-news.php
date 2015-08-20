<?php
/**
 * @package _mbbasetheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-1-2 news-post'); ?> style="background-image: url(<?php _basetheme_post_thumbnail_helper(); ?>);">
	<div class="block">
		<div class="wrap">	
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">
					<?php _mbbasetheme_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<footer class="entry-footer">
				<?php
				?>

				<?php edit_post_link( __( 'Edit', '_mbbasetheme' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->
