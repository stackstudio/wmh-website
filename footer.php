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
<script>
</script>
<script>
var GA = <?php echo get_field('ga_code', 'option'); ?>;
///'UA-23990080-1'
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php if(get_field('ga_code', 'option')) { echo get_field('ga_code', 'option'); } ?>', 'auto');
  ga('send', 'pageview');

</script>
<!--[if lte IE 8]>
    <script>
        $("img[src$='.svg']").each(function() {$(this).attr("src", $(this).attr("src").replace('.svg', '.png')); });
    </script>
<![endif]-->
</body>
</html>
