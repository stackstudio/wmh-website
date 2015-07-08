<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
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
