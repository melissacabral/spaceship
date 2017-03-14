<?php get_header();  //includes header.php ?>

	<main id="content">
		
		<?php 
		//THE LOOP.
		if( have_posts() ){ ?>

		<h1>Showing all products by <?php single_cat_title(); ?></h1>

		 <?php	while( have_posts() ){
		 		the_post(); 
		 ?>
		<article id="post-ID" <?php post_class(); ?>>
			
			<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<div class="entry-content">
				<?php the_excerpt(); ?>

				<?php the_price(); ?>
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