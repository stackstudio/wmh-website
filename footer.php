<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _mbbasetheme
 */
?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<p class="copyright">&copy; <?php echo date( "Y" ); echo " "; bloginfo( 'name' ); ?></p>
		</div><!-- .site-info -->
	</footer>
	<!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!--[if lte IE 8]>
    <script>
        $("img[src$='.svg']").each(function() {$(this).attr("src", $(this).attr("src").replace('.svg', '.png')); });
    </script>
<![endif]-->

</body>
</html>
