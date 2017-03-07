<?php get_header();  //includes header.php ?>

	<main id="content">
		<?php 
		//THE LOOP.
		if( have_posts() ){
		 	while( have_posts() ){
		 		the_post(); 
		 ?>

		<?php the_post_thumbnail( 'banner' ); ?>

		<article id="post-ID" <?php post_class(); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
		</article>
		<!-- end post -->
		<?php 
			} //end while
		} //end if 
		?>


	</main>
	<!-- end #content -->

<?php get_sidebar( 'home' ); // includes sidebar-home.php ?>

<?php get_footer(); //includes footer.php ?>