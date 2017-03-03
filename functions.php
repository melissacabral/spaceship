<?php
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



//no close php