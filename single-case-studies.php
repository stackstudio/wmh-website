<?php
/**
 * The template for displaying all single posts.
 *
 * @package _mbbasetheme
 */

$pt = $post->ID;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content up">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', '_mbbasetheme' ),
					'after'  => '</div>',
				));
			?>
			<div id="taxonomies">
				<?php echo custom_taxonomies_terms_links();?>
			</div>
		</div><!-- .entry-content -->
		<section id="work-area" data-current-id="<?php the_ID(); ?>" data-taxonomy-award="<?php project_get_item_classes('awards', $results = 1) ?>" data-taxonomy-type="<?php project_get_item_classes('brand-types', $results = 1) ?>">
		<noscript>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				// $url = get_the_permalink();
				// $title = get_the_title();
				$mainImage = get_field('main_image');


				// check if the flexible content field has rows of data
				if( have_rows('work_content') ):

					if($mainImage){
						echo '<div class="col"><img src="'. $mainImage['url'] .'" alt="'.$mainImage['title'].' image"></div>';
					}
				 
				     // loop through the rows of data
				    while ( have_rows('work_content') ) : the_row();
				 
				        if( get_row_layout() == 'full_screen_video' ):

				        	$video = get_sub_field('video_url');
				        	// $videoObject = get_sub_field('video_upload'); 
				        	if ( $video ):
							echo '<section id="full-screen" class="col col-video work-block">';
						    	echo '<iframe type="text/html" src="'.$video.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
							echo '</section>';
				        	endif;

				        elseif( get_row_layout() == 'single_full_image' ):
				        	$img = get_sub_field('image');

				        	echo '<div class="col"><img src="'. $img['url'] .'" alt="'.$img['title'].' image"></div>'; 
				 
				        elseif( get_row_layout() == 'content_area' ):

				        	$content = get_sub_field('text'); 
				 
				        	echo '<div class="col-1-2 half-col-text">'.$content.'</div>';

				        elseif( get_row_layout() == 'gallery' ):

				        	$gallery = get_sub_field('images');

				       		if( $gallery ):
				       		echo '<div class="col-1-2 half-col-images">';
				            foreach( $gallery as $image ):

				            	echo '<img src="'. $image['url'] .'"'. 'alt="'. $image['alt'] .'" />';

				            endforeach;
				            echo '</div>';
				            endif;


				        elseif( get_row_layout() == 'full_screen_quote' ):
				        	$quote = get_sub_field('quote');
				        	echo '<section class="col full-screen-quote work-block">';
				        		echo '<article class="block"><div class="wrap">'.$quote.'</div></article>';
				        	echo '</section>';

				        elseif( get_row_layout() == 'quote_with_image' ):
				        	$quote_next = get_sub_field('quote_text');
				        	$quote_image = get_sub_field('image');

				        	echo '<section class="col quote-image work-block">';
				        		echo '<article class="block"><div class="wrap">';
				        			echo '<div class="col-1-2">'.$quote_next.'</div><div class="col-1-2"><img src="'. $quote_image['url'] .'" alt="'.$quote_image['title'].' image"></div>';
				        		echo '</div></article>';
				        	echo '</section>';

				        elseif( get_row_layout() == 'fact_with_image' ):

				        	$fact_next = get_sub_field('fact');
				        	$fact_image = get_sub_field('image');

				        	echo '<section class="col fact-image work-block">';
				        		echo '<article class="block"><div class="wrap">';
				        			echo '<div class="col-1-2">'.$fact_next.'</div><div class="col-1-2"><img src="'. $fact_image['url'] .'" alt="'.$quote_image['title'].' image"></div>';
				        		echo '</div></article>';
				        	echo '</section>';

				        elseif( get_row_layout() == 'quote_with_fact' ):

				        	$quote = get_sub_field('quote');
				        	$fact = get_sub_field('fact');

				        	echo '<section class="col quote-fact work-block">';
				        		echo '<article class="block"><div class="wrap">';
				        			echo '<div class="col-1-2">'.$quote.'</div><div class="col-1-2">'.$fact.'</div>';
				        		echo '</div></article>';
				        	echo '</section>';
				 			

				 		elseif( get_row_layout() == '2_column_images' ):

				 			$imageLeft = get_sub_field('image_1'); 
				 			$imageRight = get_sub_field('image_2');
				        	$imageLinkL = $imageLeft['url']; $altL = $imageLeft['title'];
				        	$imageLinkR = $imageRight['url']; $altR = $imageRight['title'];

				        	echo '<div class="col col-image"><img src="'.$imageLinkL.'" alt="'.$altL.'" />';
				        	echo '<img src="'.$imageLinkR.'" alt="'.$altR.'" /></div>';

				        elseif( get_row_layout() == 'gallery' ):

				        	$gridimages = get_sub_field('grid_gallery');

				       		if( $gridimages ):
				       		echo '<div class="col- grid-gallery">';
				            foreach( $gridimages as $imageG ):
				            	$imageDM = $imageG['description'];
				            	echo '<img style="width:' . $imageDM . ';" src="'. $imageG['url'] .'"'. 'alt="'. $imageG['alt'] .'" />';
				            endforeach;
				            echo '</div>';
				            endif;
				 
				        endif;
				 
				    endwhile;
				 
				else :
				 
				    // no layouts found
				 
				endif;
				 
				?>

				<footer class="entry-footer" style="display: none;">
						<?php
							/* translators: used between list items, there is a space after the comma */
							$category_list = get_the_category_list( __( ', ', '_mbbasetheme' ) );

							/* translators: used between list items, there is a space after the comma */
							$tag_list = get_the_tag_list( '', __( ', ', '_mbbasetheme' ) );

							if ( ! _mbbasetheme_categorized_blog() ) {
								// This blog only has 1 category so we just need to worry about tags in the meta text
								if ( '' != $tag_list ) {
									$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '_mbbasetheme' );
								} else {
									$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '_mbbasetheme' );
								}
							} else {
								// But this blog has loads of categories so we should probably display them here
								if ( '' != $tag_list ) {
									$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '_mbbasetheme' );
								} else {
									$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', '_mbbasetheme' );
								}
							} // end check for categories on this blog

							printf(
								$meta_text,
								$category_list,
								$tag_list,
								get_permalink()
							);
						?>

						<?php edit_post_link( __( 'Edit', '_mbbasetheme' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

			<?php _mbbasetheme_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>
		<!-- Get some similar posts -->
		</noscript>
		</section>
		<?php 
		if ( is_preview() ) { ?>
		<section id="preview-area">
			<?php while ( have_posts() ) : the_post(); ?>

			<?php
				// $url = get_the_permalink();
				// $title = get_the_title();
				$mainImage = get_field('main_image');


				// check if the flexible content field has rows of data
				if( have_rows('work_content') ):

					if($mainImage){
						echo '<div class="col"><img src="'. $mainImage['url'] .'" alt="'.$mainImage['title'].' image"></div>';
					}
				 
				     // loop through the rows of data
				    while ( have_rows('work_content') ) : the_row();
				 
				        if( get_row_layout() == 'full_screen_video' ):

				        	$video = get_sub_field('video_url');
				        	// $videoObject = get_sub_field('video_upload'); 
				        	if ( $video ):
							echo '<section id="full-screen" class="col col-video work-block">';
						    	echo '<iframe type="text/html" src="'.$video.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
							echo '</section>';
				        	endif;

				        elseif( get_row_layout() == 'single_full_image' ):
				        	$img = get_sub_field('image');

				        	echo '<div class="col"><img src="'. $img['url'] .'" alt="'.$img['title'].' image"></div>'; 
				 
				        elseif( get_row_layout() == 'content_area' ):

				        	$content = get_sub_field('text'); 
				 
				        	echo '<div class="col-1-2 half-col-text">'.$content.'</div>';

				        elseif( get_row_layout() == 'gallery' ):

				        	$gallery = get_sub_field('images');

				       		if( $gallery ):
				       		echo '<div class="col-1-2 half-col-images">';
				            foreach( $gallery as $image ):

				            	echo '<img src="'. $image['url'] .'"'. 'alt="'. $image['alt'] .'" />';

				            endforeach;
				            echo '</div>';
				            endif;
				 			

				 		elseif( get_row_layout() == '2_column_images' ):

				 			$imageLeft = get_sub_field('image_1'); 
				 			$imageRight = get_sub_field('image_2');
				        	$imageLinkL = $imageLeft['url']; $altL = $imageLeft['title'];
				        	$imageLinkR = $imageRight['url']; $altR = $imageRight['title'];

				        	echo '<div class="col col-image"><img src="'.$imageLinkL.'" alt="'.$altL.'" />';
				        	echo '<img src="'.$imageLinkR.'" alt="'.$altR.'" /></div>';

				        elseif( get_row_layout() == 'gallery' ):

				        	$gridimages = get_sub_field('grid_gallery');

				       		if( $gridimages ):
				       		echo '<div class="col- grid-gallery">';
				            foreach( $gridimages as $imageG ):
				            	$imageDM = $imageG['description'];
				            	echo '<img style="width:' . $imageDM . ';" src="'. $imageG['url'] .'"'. 'alt="'. $imageG['alt'] .'" />';
				            endforeach;
				            echo '</div>';
				            endif;
				 
				        endif;
				 
				    endwhile;
				 
				else :
				 
				    // no layouts found
				 
				endif;
				 
				?>

		<?php endwhile; // end of the loop. ?>
		</section>
		<?php } ?>
		<section id="related-work">
			<section id="main-work" style="display: none;" class="inner-wrap">
				<h1>More like this</h1>
			</section>
			<noscript>
				<section class="inner-wrap">
					<h1>More like this</h1>
					<?php getSimilarWork(); ?>
				</section>
			</noscript>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
