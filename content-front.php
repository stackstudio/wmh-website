<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _mbbasetheme
 */
?>
<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php 

$posts = get_field('case_studies');

if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

        <?php setup_postdata($post); ?>
        <?php 
	$t = wp_get_post_terms($post->ID, 'brand-types', array("fields" => "names")); 
	$d = get_the_terms( $post->ID, 'brand-types' );
	$d_text = array();

	foreach ( $d as $ds ) {
		$d_text[] = $ds->description;
	}
	$on_descriptions = join( ", ", $d_text );

	$img = get_field('main_image');
	?>
        <article style="background-image: url(<?php echo $img['url']; ?>);" id="post-<?php echo $post->ID ?>" class="case-study col-1-2">
			<div class="module menu-item">
				<a href="<?php echo get_permalink( $post->ID ); ?>">
					<div class="entry-content">
						<p class="category-name"><?php 
							foreach ($t as $tax) {
								echo $tax;
							}
						?></p>
					</div><!-- .entry-content -->
					<header class="entry-header">
						<h1 class="category-description"><?php echo $on_descriptions; ?></h1>
					</header><!-- .entry-header -->
				</a>
			</div>
	    </article>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>