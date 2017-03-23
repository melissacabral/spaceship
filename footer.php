  </div>
  <!-- end wrapper -->
  
	<footer id="footer" role="contentinfo">

	<?php $alt_logo =  get_theme_mod( 'spaceship_alt_logo' );
	if($alt_logo){
		echo '<img src="' . $alt_logo . '" alt="Logo" class="footer-logo">';
	} 
	?>

		<a href="#header" class="to-top" title="Back to Top">&uarr;</a>
		<?php dynamic_sidebar( 'Footer Widgets' ); ?>
	</footer>
<?php wp_footer(); //hook. required for the admin bar to work, and plugins ?>
</body>
</html>