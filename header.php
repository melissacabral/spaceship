<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">

	<?php wp_head(); //HOOK. ?>
</head>
<body <?php body_class(); ?>>
	<header role="banner" id="header" style="background-image:url(<?php header_image(); ?>);">

	<div class="header-bar">
		<?php 
		//CUSTOM LOGO
		if( function_exists( 'the_custom_logo' ) AND has_custom_logo() ){
			the_custom_logo();
		}else{ ?>
		<h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php 
		} //end custom logo
		 ?>

		<h2><?php bloginfo( 'description' ); ?></h2>
		<nav>
			<ul class="nav">
				<?php wp_list_pages( array(
					'title_li'	=> '',  //hide the "pages" heading
				) ); ?>
			</ul>
		</nav>

		<?php get_search_form(); ?>
		</div>
	</header>
	<div class="wrapper">