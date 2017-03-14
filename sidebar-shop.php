<aside id="sidebar">

	<?php if( ! is_post_type_archive( 'product' ) ){ ?>
	<section class="widget">
		<a class="button" href="<?php echo get_post_type_archive_link('product'); ?>">
		View All Products
		</a>
	</section>
	<?php } //end if not on post type archive ?>


	<section class="widget">
		<h3 class="widget-title">Filter by Brand:</h3>
		<ul>
			<?php 
			//show a list of all available brands
			wp_list_categories( array(
				'taxonomy' => 'brand',  //any registered taxonomy
				'title_li' => '', 		//hide 'Categories' heading
			) );
			?>
		</ul>
	</section>
</aside>