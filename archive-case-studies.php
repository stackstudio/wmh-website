<?php
/**
 * The template for displaying archive pages.
 *
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>
				<div id="work-filter"><span>Sectors<img style="display: none;" id="close-filter" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/filter-icon-open.svg" alt="close filter icon"></span></div>
				<div class="hidden-filter">
					<nav class="secondary-nav" role="navigation">
						<?php
						$terms = get_terms( 'sectors' );
						 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						     echo '<ul>';
						     echo '<li data-filter="*">All</li>';
						     foreach ( $terms as $term ) {
						       echo '<li data-filter=".'.$term->slug.'">' . $term->name . '</li>';
						        
						     }
						     echo '</ul>';
						 }
						?>
					</nav>
				</div>
				
				<section class="work" id="our-work">
				</section>

			<?php _mbbasetheme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
