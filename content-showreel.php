<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _mbbasetheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('work-block'); ?>>

	<article id="showreel" class="generic-bg work-block">
	</article>
	<article id="showreel-mobile" class="mobile-show">
		<div class="block">
			<div class="wrap">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/ACDu1BuCCrI?rel=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</div>
	</article>
	<section class="controls">
		<ul>
			<li class="wmh-pause"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wmh-stop.svg" alt="play button"></li>
			<li class="wmh-play"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wmh-play.svg" alt="stop button"></li>
		</ul>
	</section>

</article><!-- #post-## -->
