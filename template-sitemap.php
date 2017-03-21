<?php 
/*
Template Name: Automatic Sitemap
*/

get_header();  //includes header.php ?>

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
				<div class="onethird">
					<h3>Pages:</h3>
					<ul>
						<?php wp_list_pages( array(
							'title_li' 		=> '',
							'sort_column' 	=> 'post_title', //alphabetical
							'exclude' 		=> $post->ID, //exclude THIS page
						) ); ?>
					</ul>
				</div>
				<div class="onethird">
					<h3>Posts:</h3>
					<ul>
						<?php wp_get_archives( array(
							'type' => 'alpha', //posts in alpha order
						) ); ?>
					</ul>
				</div>
				<div class="onethird">
					<h3>Categories:</h3>
					<ul>
						<?php wp_list_categories( array(
							'title_li' 		=> '',
							'show_count' 	=> true,
						) ); ?>
					</ul>
				</div>
			</div>
			
		</article>
		<!-- end post -->
		<?php 
			} //end while
		} //end if 
		?>

	</main>
	<!-- end #content -->

<?php get_footer(); //includes footer.php ?>