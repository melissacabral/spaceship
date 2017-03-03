  </div>
  <!-- end wrapper -->
	<footer id="footer" role="contentinfo">
		<?php wp_nav_menu( array(
			'theme_location' => 'social',
			'container_class' => 'social-menu',
		) ); ?>
	</footer>
<?php wp_footer(); //hook. required for the admin bar to work, and plugins ?>
</body>
</html>