<?php
//required - max width of embeds for youtube, twitter, etc
if ( ! isset( $content_width ) ) $content_width = 719;

//turn on sleeping features
add_theme_support( 'post-formats', array( 'image', 'gallery', 'audio', 'video',
				'status', 'quote', 'aside', 'chat', 'link') );

add_theme_support( 'post-thumbnails' );

				//name, width, height, crop?
add_image_size( 'banner', 1070, 300, true );

//activates customizer stuff
add_theme_support( 'custom-background' );

//don't forget to put header_image() in  header.php
add_theme_support( 'custom-header', array(
									'width'			=> 1200,
									'height' 		=> 500,
									) );

//don't forget to put the_custom_logo() anywhere in your templates
add_theme_support( 'custom-logo', array(
									'width' 		=> 180,
									'height' 		=> 50,
									) );

//activate HTML5 on forms and galleries
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 
	'gallery', 'caption' ) );

//remove <title> from header and let WP generate dynamic page titles
add_theme_support( 'title-tag' );

//improve the feeds for 3rd party readers and apps. important for blogs and news sites
add_theme_support(	'automatic-feed-links' );

//lets us create editor-style.css to style the editor window
add_editor_style();


/**
 * Change the length of excerpts - search results will show 20 words, 
 * all others will show 100 words
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
 */
function mmc_excerpt_length(){
	if( is_search() ){
		return 20;
	}else{
		return 100;
	}
}
add_filter( 'excerpt_length', 'mmc_excerpt_length' );


/**
 * Change the excerpt's [...] to a button that says "Read More"
 */
function mmc_readmore_button(){
	return '&hellip; <a href="' . get_permalink() . '" class="readmore">Read More</a>';
}
add_filter( 'excerpt_more', 'mmc_readmore_button' );

/**
 * Add JavaScript
 */
function mmc_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'spaceship-js', get_stylesheet_directory_uri() . '/scripts/spaceship.js', array('jquery'), '0.1', true );
}
add_action( 'wp_enqueue_scripts', 'mmc_scripts' );

/**
 * Set up all the menu areas needed (two!)
 */
function mmc_nav_menus(){
	register_nav_menus( array(
		'main_menu'  	=> 'Main Navigation',
		'social'		=> 'Social Media',
	) );
}
add_action( 'init', 'mmc_nav_menus' );


/**
 * Helper function to handle pagination for any template
 */
function mmc_pagination(){
	echo '<div class="pagination">';

	if( is_singular() ){
		//single post, page, etc.
		previous_post_link( '%link', '&larr; %title' );
		next_post_link(  '%link', '%title &rarr;' );
	}
	elseif( function_exists( 'the_posts_pagination' ) AND ! wp_is_mobile() ){
		the_posts_pagination();
	}
	else{
		//archive, blog, search, etc.		
		previous_posts_link( '&larr; Newer Posts' );
		next_posts_link( 'Older Posts &rarr;' );
	}

	echo '</div>';
}

/**
 * Create 4 Widget Areas (Dynamic Sidebars)
 */
function mmc_widget_areas(){
	register_sidebar( array(
		'name' 			=> 'Blog Sidebar',
		'id'			=> 'blog_sidebar',
		'description' 	=> 'Appears on the blog posts and archive pages',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 			=> 'Footer Widgets',
		'id'			=> 'footer_widgets',
		'description' 	=> 'Appears at the bottom of every page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 			=> 'Home Area',
		'id'			=> 'home_area',
		'description' 	=> 'Appears in the middle of the front page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
}
add_action( 'widgets_init', 'mmc_widget_areas' );

//improve UX on comment replies
function mmc_comment_reply(){
	if( is_singular() ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mmc_comment_reply' );

/**
 * Display the price of any product
 */
function the_price(){
	global $post; //look at the post defined outside this function
	echo '<span class="price">';
	echo get_post_meta( $post->ID, 'Price', true );
	echo '</span>';
}

function the_sizes(){
	global $post;
	echo '<span class="size">';
										//get multiple sizes
	$sizes =  get_post_meta( $post->ID, 'Size', false );

	echo implode(", ", $sizes);

	echo '</span>';
}
//no close php