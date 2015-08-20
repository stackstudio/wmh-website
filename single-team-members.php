<?php
/**
 * The template for displaying all single posts.
 *
 * @package _mbbasetheme
 */

$pt = $post->ID;
get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="col-1-2">
						<img src="<?php echo _basetheme_post_thumbnail_helper(); ?>" alt="<?php echo $pt; ?>-post image">
					</div>
					<div class="col-1-2">
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article>
			<?php
			endwhile;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
