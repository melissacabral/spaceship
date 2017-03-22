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

	<?php 
	//custom query to get up to 5 recent products 
	$products_query = new WP_Query( array(
		'post_type' 		=> 'product', //any registered post type
		'posts_per_page' 	=> 5,  		//maximum limit
	) );

	//custom "Loop"
	if( $products_query->have_posts() ){
	?>
	<section class="featured-products">
		<h2>Featured Products:</h2>
		<ul>
			<?php while( $products_query->have_posts() ){
					$products_query->the_post();
			 ?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<div class="caption">
						<h3><?php the_title(); ?></h3>
						<div class="price"><?php the_price(); ?></div>
					</div>
				</a>
			</li>
			<?php } //end while ?>
		</ul>		
	</section>
	<?php } //end custom Loop 
	wp_reset_postdata(); //clean up
	?>

	

<?php get_sidebar( 'home' ); // includes sidebar-home.php ?>

<?php get_footer(); //includes footer.php ?>