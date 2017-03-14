<?php get_header();  //includes header.php ?>

	<main id="content">
		
		<?php 
		//THE LOOP.
		if( have_posts() ){
		 	while( have_posts() ){
		 		the_post(); 
		 ?>
		<article id="post-ID" <?php post_class(); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php the_terms( $post->ID, 'brand', '<h3 class="brand">', '&nbsp;', 
					'</h3>' ); ?>

			<?php the_post_thumbnail( 'medium' ); ?>

			<div class="entry-content">
				<p>Price: <?php the_price(); ?></p>
				<p>Sizes: <?php the_sizes(); ?></p>
				<?php the_content(); ?>				
			</div>
			
		</article>
		<!-- end post -->
		<?php 
			} //end while

			//defined in functions.php
			mmc_pagination();

		} //end if 
		?>

		

	</main>
	<!-- end #content -->

<?php get_sidebar('shop'); // includes sidebar-shop.php ?>

<?php get_footer(); //includes footer.php ?>