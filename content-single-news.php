<?php
/**
 * @package _mbbasetheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-1-2 news-post'); ?> style="background-image: url(<?php _basetheme_post_thumbnail_helper(); ?>);">
	<a href="<?php echo the_permalink(); ?>" rel="bookmark">
	<div class="block">
			<div class="wrap">	
				<header class="entry-header">
					<div class="entry-meta">
						<?php _mbbasetheme_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
	</div>
	</a>
	<div class="trans-bg"></div>
</article><!-- #post-## -->
