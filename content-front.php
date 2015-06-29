<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _mbbasetheme
 */
?>
<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php
$objects = get_field('case_studies');
if( $objects ): ?>
	<?php foreach( $objects as $p ): ?>
	<?php 
	$t = wp_get_post_terms($p->ID, 'brand-types', array("fields" => "names")); 
	$d = get_the_terms( $p->ID, 'brand-types' );
	$d_text = array();

	foreach ( $d as $ds ) {
		$d_text[] = $ds->description;
	}
	$on_descriptions = join( ", ", $d_text );
	?>
	    <article style="background-image: url(<?php _basetheme_post_thumbnail_helper(); ?>);" id="post-<?php $p->ID ?>" <?php post_class('case-study col-1-2')?>>
			<div class="module menu-item">
				<a href="<?php echo get_permalink( $p->ID ); ?>">
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
<?php endif; ?>