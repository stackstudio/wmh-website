<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _mbbasetheme
 */
?>
<?php
	function get_team() {
		// Grab the team vars here
// Type: repeater
$team = get_field('team_members');
		if( $team ):
			foreach( $team as $member ):
				echo '<article class="col-1-8 teams"><a href="'.$member['link'].'">';
					echo '<h4>'.$member['name'].'</h4><p>'.$member['title'].'</p>';
				echo '</a></article>';
			endforeach;
		endif;
	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('work-block'); ?>>

	<div class="entry-content up">
		<?php the_content(); ?>
		<h2 id="scroll-down" data-scroll="#team">See the team <span class="fa fa-angle-down"></span></h2>
	</div><!-- .entry-content -->
	<article id="generic-bg" class="generic-bg work-block" style="background-image: url(<?php _basetheme_post_thumbnail_helper(); ?>);">
	</article>

</article><!-- #post-## -->
<section id="team" style="">
	<h1>Key People</h1>
	<!-- <article id="generic-bg" class="generic-bg work-block"> -->
		<div id="team-roles" class="row">
			<?php get_team(); ?>
		</div>
	<!-- </article> -->
</section>
