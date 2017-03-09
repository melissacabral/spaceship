<?php 
//if this post is password protected, exit this file
if( post_password_required() ){
	return;
}


//fix the comment counts so we have distinct comment and pingback counts
$comments_by_type = separate_comments( get_comments( array(
	'status' => 'approve',
	'post_id' => $id,
	) ) );

//TODO: get this to show more than just 1 page count of comments
$comments_count = count( $comments_by_type['comment'] );
$pings_count = count( $comments_by_type['pings'] );
 ?>
<section class="comments">
	<h3><?php 
	if( $comments_count == 1 ){
		echo '1 Comment';
	}elseif( $comments_count == 0 ){
		echo 'No Comments';
	}else{
		echo $comments_count . ' Comments';
	} 
	?> | Leave a Comment</h3>

	<ol>
		<?php wp_list_comments( array(
			'type' => 'comment', //only show human-comments
			'avatar_size' => 50, //pixels, square
		) ); ?>
	</ol>	

	<div class="pagination">
		<?php 
		previous_comments_link();
		next_comments_link(); 
		?>
	</div>

</section>
<section class="comments-form">
	<?php comment_form(); ?>
</section>

<?php if( $pings_count >= 1 ){ ?>
<section class="pings">
	<h3><?php 
	//ternary operator example for funzies
	echo $pings_count == 1 ? '1 site' : $pings_count . ' sites' ; ?>  mentioned this post:</h3>
	<ul>
		<?php wp_list_comments( array(
			'type' => 'pings', // show pingbacks and trackbacks
			'short_ping' => true,
		) ); ?>
	</ul>
</section>
<?php }//end if there are pingbacks or trackbacks ?>