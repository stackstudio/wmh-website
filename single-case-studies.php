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
				<!-- <h5><?php //echo strtoupper('Awards'); ?></h5> -->
				<?php
				/*$args = array(
				  'taxonomy' => 'awards',
				  'show_option_none' => __('No Menu Items.'),
				  'echo' => 1,
				  'depth' => 3,
				  'wrap_class' => 'awards',
				  'level_class' => 'item',
				  'parent_title_format' => '%s',
				  'current_class' => 'selected'
				);
				custom_list_categories( $args );*/
				?>
				<?php echo custom_taxonomies_terms_links();?>
			</div>
		</div><!-- .entry-content -->
		<?php
			//function getTaxos($taxonomy, $postid) {
				/*$t = wp_get_post_terms($pt, 'awards', array("fields" => "names")); 
				//$d = get_the_terms($pt, 'awards' );
				$d_name = array();

				foreach ( $t as $ds ) {
					//$d_name[] = $ds->name;
					$parent = $ds;
					//var_dump($parent);
					$parentterm = get_term( $parent, 'awards');
					//var_dump($parentterm);
				}
				$on_names = join( "&", $d_name );
				//echo $on_names;
			//}*/
		?>
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

				        	$video = get_sub_field('the_video');
				        	$videoObject = get_sub_field('video_upload'); 
				        	if ( $video ) {
				        		echo '<div class="col col-video">'.$video.'</div>';
				        	} elseif ( $videoObject ) {
				        		echo '<div class="col col-video">'.$videoObject.'</div>';
				        	} else {
				        		
				        	}
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

				<footer class="entry-footer">
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
		</noscript>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
