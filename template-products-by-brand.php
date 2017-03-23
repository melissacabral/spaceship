<?php 
/*
Template Name: Products by Brand
*/

//edit these variables to match your site's needs:
$post_type 	= 'product';
$taxonomy 	= 'brand';

get_header();  //includes header.php 
?>

	<main id="content">
		
		<?php 
		//THE LOOP.
		if( have_posts() ){
		 	while( have_posts() ){
		 		the_post(); 
		 ?>
		
		 <h2><?php the_title(); ?></h2>

		 <?php the_content(); ?>

		<?php 
			} //end while
		} //end of default loop 
		?>

		
		<?php 
		//get all the terms in the taxonomy
		$terms = get_terms( $taxonomy );
		//print_r($terms);
		
		//go through each term and show its name
		foreach( $terms as $term ){
			
			//get 3  products in THIS "term"
			$custom_query = new WP_Query( array(
				'post_type' 		=> $post_type,
				'posts_per_page' 	=> 3,
				'taxonomy' 			=> $taxonomy,
				'term' 				=> $term->slug,
			) );

			//custom loop
			if( $custom_query->have_posts() ){
		?>
		<section class="featured-products">
			<h3 class="brand-name"><?php echo $term->name; ?></h3>

			<ul>
				<?php while( $custom_query->have_posts()  ){
					$custom_query->the_post();
				?>
				<li>
					<a href="<?php the_permalink(); ?>"></a>	
					<?php the_post_thumbnail('thumbnail'); ?>
					<div class="caption">
						<?php the_title(); ?>
					</div>
					</a>
				</li>
				<?php } //end while ?>
			</ul>

		</section>
		<?php
			} //end custom loop
			wp_reset_postdata();
		} //end foreach
		?>
		

	</main>
	<!-- end #content -->

<?php get_footer(); //includes footer.php ?>