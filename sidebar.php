<aside id="sidebar">

<?php if( ! dynamic_sidebar( 'Blog Sidebar' ) ){ ?>

	<section id="categories" class="widget">
		<h3 class="widget-title"> Categories </h3>
		<ul>
			<?php 
				//show the 20 most common categories
			wp_list_categories( array(
				'title_li'		=> '',
				'show_count' 	=> true,
				'orderby'		=> 'count',
				'order'			=> 'DESC',
				'depth'			=> -1,
				'number'		=> 20,
				) ); ?>
			</ul>
		</section>
		<section id="archives" class="widget">
			<h3 class="widget-title"> Archives </h3>
			<ul>
				<?php wp_get_archives( array(
					'type'	=> 'yearly',
					) ); ?>
				</ul>
			</section>
			<section id="tags" class="widget">
				<h3 class="widget-title"> Tags </h3>
				<?php wp_tag_cloud( array(
					'smallest' 	=> 1,
					'largest'	=> 1,
					'unit'		=> 'em',
					'format'	=> 'list',
					'number'	=> 20,
					) ); ?>
				</section>
				<section id="meta" class="widget">
					<h3 class="widget-title"> Meta </h3>
					<ul>
						<li><a href="<?php echo get_admin_url(); ?>">Site Admin</a></li>
						<li><?php wp_loginout(); ?></li>
					</ul>
	</section>
	<?php } //end if no widgets ?>
</aside>
<!-- end #sidebar -->