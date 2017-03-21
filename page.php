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
			<div class="entry-content">
				<?php 
				//example of a 'conditional tag'
				if( is_singular() ){
					the_content();
					//support for paged posts
					wp_link_pages( array(
					'next_or_number' 	=> 'next',
					'before'			=> '<div class="pagination">Keep Reading: ',
					'after'				=> '</div>',					
					) );
				}else{
					the_post_thumbnail('thumbnail', array('class' => 'featured-image'));
					the_excerpt();
				}
				?>
			</div>
			
		</article>
		<!-- end post -->
		<?php 
			} //end while
		} //end if 
		?>

	</main>
	<!-- end #content -->

<?php get_sidebar('page'); // includes sidebar.php ?>

<?php get_footer(); //includes footer.php ?>