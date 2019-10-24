<?php
/*
template name: Homepage
*/
?>

<?php
get_header();
?>
<div class="container">

<?php
echo '<!-- dfp-header-desktop --><div class="ad-ctnr ad-ctnr--desktop ad-ctnr--dfp-in-feed-desktop">';
if( function_exists('the_ad_placement') ) { the_ad_placement('dfp-header-desktop'); }
echo '</div>';

echo '<!-- dfp-header-mobile --><div class="ad-ctnr ad-ctnr--mobile ad-ctnr--dfp-in-feed-mobile">';
if( function_exists('the_ad_placement') ) { the_ad_placement('dfp-header-mobile'); }
echo '</div>';

?>
</div>
<div id="page">
<div class="container-fluid" style="background-color: white;padding:15px;"> 
	

	<div class="container">
	


	<div class="row" style="padding:5px;">
		<div class="col-sm" style="background-color: white;padding:12px 30px 12px 12px;">

<?php $main_post=get_field('main_post');
//echo $main_post->post_content;
//print_r($main_post);
?>
<a style="color:black;text-decoration: none;" href="<?php 
	// $main_post=get_field('main_post');
	$the_post_url = get_permalink($main_post);
	//echo $the_post_url;
?>"><?php
// $main_post=get_field('main_post');
echo (has_post_thumbnail($main_post)) ? get_the_post_thumbnail($main_post, 'full', array( 'class' => 'img-fluid' )) : 'https://placehold.it/600x375&text=myMilitaryBenefits.com';
?>

<?php
$main_post=get_field('main_post');
// the post id is accessed like this:
$my_post_id = $main_post->ID;
// check if a featured image is set:
// $has_post_thumbnail = has_post_thumbnail( $main_post->ID );
$my_custom_field = get_field( 'source', $main_post->ID );
// echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
?>

<h1 style="color:black;"><?php $main_post=get_field('main_post');
		echo $main_post->post_title;
		//print_r($main_post)?></h1>
	<h4 style="color:black;font-size:16px">
		<?php
		$main_post=get_field('main_post');
		// the post id is accessed like this:
	$my_post_id = $main_post->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $main_post->ID );

	$my_custom_field = get_field( 'author', $main_post->ID );
	// if(!$my_custom_field){
	//	 $my_custom_field = 'myMilitaryBenefits.com';
	// }
	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
		?>
</h4>

<?php $main_post=get_field('main_post');
//echo $main_post->post_date;
//print_r($main_post)?>

		<div>
		<?php
		$main_post=get_field('main_post');
		// the post id is accessed like this:
		$my_post_id = $main_post->ID;
		// check if a featured image is set:
		// $has_post_thumbnail = has_post_thumbnail( $main_post->ID );
		// $my_custom_field = get_field( 'subtitle', $main_post->ID );


	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
		$the_post_excerpt = $main_post->the_post_excerpt; // <-- this only retrieves *manually* written excerpts.
	//$the_post_content = $main_post->post->post_content;
	// next check whether the excerpt is empty:
	if (!$the_post_excerpt) {
	// …if so, generate an excerpt from the content field:
		$the_post_excerpt = wp_trim_words( $main_post->post_content, 50 ); // <-- sets 50 word limit. use whatever limit you want.
		} 

// finally render the output in whatever markup you want:
echo '<div>' . $the_post_excerpt . '<span class="read-more" style="color: #254479;"> Read more &raquo;</span></div>';
?>
	</div> 
</a>
		

		</div>
		<div class="vertical-seperator " style="background-color: darkgrey;width: 1px;"></div>

		<div class="col-sm-4 d-md-block " style="background-color:white;padding:12px;">
		<div class="latest"> <div><?php get_sidebar(); ?></div>
	</div><br>

			<!-- <div class="text-center" style="background-color:#ad2a2a;color:white;padding:12px;height:200px;border: 1px #f5f5f5 solid;">AD</div> -->

		</div>
		</div>
	</div>
</div>

<div class="container-fluid" style="background-color:#f3f3f3;padding:12px;">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-left" style="background-color: #f3f3f3;padding:12px;">
			<a style="text-decoration: none; display:block;" href="
			<?php 
	$recent_posts_1=get_field('recent_posts_1');
	$the_post_url = get_permalink($recent_posts_1);
	echo $the_post_url;?>">		

				
		<?php
		$recent_posts_1=get_field('recent_posts_1');
		// the post id is accessed like this:
	$my_post_id = $recent_posts_1->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_1->ID );
	$my_custom_field = get_field( 'large_photo', $recent_posts_1->ID );
	echo	(has_post_thumbnail($recent_posts_1))	? get_the_post_thumbnail($recent_posts_1, 'mmbthumb', array( 'class' => 'img-fluid recentposts' )) : '<img class="img-fluid" style="margin-bottom:10px;border: 1px #f5f5f5 solid;" src="https://placehold.it/600x375&text=myMilitaryBenefits.com"></img>';
		?>

 <!--	 <h4>
		<?php
		
		// the post id is accessed like this:
	$my_post_id = $recent_posts_1->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_1->ID );
	$my_custom_field = get_field( 'source', $recent_posts_1->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
		?>
</h4> -->

<h4 style="color:black"><?php
		echo $recent_posts_1->post_title;
		//print_r($recent_posts_1)?></h4>
</a>
	 <!-- <h4>
		</a> 
		<?php
		// the post id is accessed like this:
	//$my_post_id = $recent_posts_1->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_1->ID );
	$my_custom_field = get_field( 'author', $recent_posts_1->ID );
	// echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
		?>
</h4> -->

<!-- <h4><?php
		//echo $recent_posts_1->post_date;
		//print_r($recent_posts_1)?></h4> -->
			
		</div>

			<div class="col-md-3 text-left" style="background-color: #f3f3f3;padding:12px;">
<a style="display:block; text-decoration: none;" href="<?php 
	$recent_posts_1=get_field('recent_posts_2');
	$the_post_url = get_permalink($recent_posts_1);
	echo $the_post_url;?>"> 

	<?php
		$recent_posts_2=get_field('recent_posts_2');
		// the post id is accessed like this:
	$my_post_id = $recent_posts_2->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_2->ID );
	$my_custom_field = get_field( 'large_photo', $recent_posts_2->ID );
	echo	(has_post_thumbnail($recent_posts_2))	? get_the_post_thumbnail($recent_posts_2, 'mmbthumb', array( 'class' => 'img-fluid recentposts' )) : '<img class="img-fluid" style="margin-bottom:10px;border: 1px #f5f5f5 solid;" src="https://placehold.it/600x375&text=myMilitaryBenefits.com"></img>';
		?>

<!--	 <h4>
		<?php
		
		// the post id is accessed like this:
	$my_post_id = $recent_posts_2->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_2->ID );
	$my_custom_field = get_field( 'source', $recent_posts_2->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
		?>
</h4> -->

<h4 style="color:black"><?php
		echo $recent_posts_2->post_title;
		//print_r($recent_posts_2)?></h4>
</a>
 <!-- <h4>
		<?php
		// the post id is accessed like this:
	$my_post_id = $recent_posts_2->ID;
	// check if a featured image is set:
	$has_post_thumbnail = has_post_thumbnail( $recent_posts_2->ID );
	$my_custom_field = get_field( 'author', $recent_posts_2->ID );
	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
		?>
</h4> -->

<!-- <h4><?php
		echo $recent_posts_2->post_date;
		//print_r($recent_posts_2)?></h4> -->
			</div>

			<div class="col-md-3 text-left" style="background-color: #f3f3f3;padding:12px;">
		
<a style="display:block; text-decoration: none;" href="<?php 
$recent_posts_3=get_field('recent_posts_3');
$the_post_url = get_permalink($recent_posts_3);
echo $the_post_url;?>"> 

<?php
$recent_posts_3=get_field('recent_posts_3');
// the post id is accessed like this:
$my_post_id = $recent_posts_3->ID;
// check if a featured image is set:
// $has_post_thumbnail = has_post_thumbnail( $recent_posts_3->ID );
$my_custom_field = get_field( 'large_photo', $recent_posts_3->ID );
echo	(has_post_thumbnail($recent_posts_3))	? get_the_post_thumbnail($recent_posts_3, 'mmbthumb', array( 'class' => 'img-fluid recentposts' )) : '<img class="img-fluid" style="margin-bottom:10px;border: 1px #f5f5f5 solid;" src="https://placehold.it/600x375&text=myMilitaryBenefits.com"></img>';
?>

<?php
// the post id is accessed like this:
$my_post_id = $recent_posts_3->ID;
// check if a featured image is set:
// $has_post_thumbnail = has_post_thumbnail( $recent_posts_3->ID );
$my_custom_field = get_field( 'source', $recent_posts_3->ID );
//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
?>

<h4 style="color:black"><?php echo $recent_posts_3->post_title; ?></h4>
</a>
<?php
// the post id is accessed like this:
$my_post_id = $recent_posts_3->ID;
// check if a featured image is set:
// $has_post_thumbnail = has_post_thumbnail( $recent_posts_3->ID );
$my_custom_field = get_field( 'author', $recent_posts_3->ID );
// echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
?>

</div>

			<div class="col-md-3 text-left" style="background-color: #f3f3f3;padding:12px;">
		
<a style="display:block; text-decoration: none;" href="<?php 
	$recent_posts_4=get_field('recent_posts_4');
	$the_post_url = get_permalink($recent_posts_4);
	echo $the_post_url ;
?>"> 
<?php
	$recent_posts_4=get_field('recent_posts_4');
	// the post id is accessed like this:
	$my_post_id = $recent_posts_4->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_4->ID );
	$my_custom_field = get_field( 'large_photo', $recent_posts_4->ID );
	echo (has_post_thumbnail($recent_posts_4))	? get_the_post_thumbnail($recent_posts_4, 'mmbthumb', array( 'class' => 'img-fluid recentposts' )) : '<img class="img-fluid" style="margin-bottom:10px;border: 1px #f5f5f5 solid;" src="https://placehold.it/600x375&text=myMilitaryBenefits.com"></img>';
?>

<?php
	// the post id is accessed like this:
	$my_post_id = $recent_posts_4->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_4->ID );
	$my_custom_field = get_field( 'source', $recent_posts_4->ID );
	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
?>

<h4 style="color:black"><?php echo $recent_posts_4->post_title; ?></h4>
</a>
<?php
	// the post id is accessed like this:
	$my_post_id = $recent_posts_4->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $recent_posts_4->ID );
	$my_custom_field = get_field( 'author', $recent_posts_4->ID );
	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
?>
			</div>
		</div>
	</div>
	
</div>
<div class="container-fluid" style="background-color:white;padding:12px;"><?php 

while(have_posts()):the_post();
?>


<div class="container" style="padding-bottom:20px;">
	<div class="container">
	<div class="row">
<?php
// define what kinds of posts you want to get (category, author, dates, specific IDs, etc…):
// see here: https://www.billerickson.net/code/wp_query-arguments/
$my_args = array(
	'post_type'      => 'post',
	'orderby'        => 'name',
	'order'          => 'ASC',
	'nopaging'       => true, // no limit
	'posts_per_page' => -1,		// no limit
);

// run your query:
$my_query = new WP_Query($my_args);

// make counter variable 'n'
$article_count = 1;
$ad_count      = 1;
// loop through your results:
while ($my_query->have_posts()) {
	//echo $n;
			if ($article_count%4==0){
				
				echo "
<!-- 

  article_count = {$article_count} 
  ad_count      = {$ad_count} 

--> ";

				echo '<!-- dfp-in-feed-desktop-'.$ad_count.' --><div class="ad-ctnr ad-ctnr--desktop ad-ctnr--dfp-in-feed-desktop">';
				if( function_exists('the_ad_placement') ) { the_ad_placement(('dfp-in-feed-desktop-'.$ad_count)); }
				echo '</div>';

				echo '<!-- dfp-in-feed-mobile-'.$ad_count.' --><div class="ad-ctnr ad-ctnr--mobile ad-ctnr--dfp-in-feed-mobile">';
				if( function_exists('the_ad_placement') ) { the_ad_placement(('dfp-in-feed-mobile-'.$ad_count)); }
				echo '</div>';

				$ad_count++;

			}
				$my_query->the_post(); // tells WordPress it is looping
// or if (counter!=4){
	// get whatever post properties you want:
	$the_post_object	= $my_query->post;
	$the_post_id			= $my_query->post->ID;
	$the_post_title		= $my_query->post->post_title;
	$the_post_excerpt = $my_query->post->post_excerpt;
	$the_post_content = $my_query->post->post_content;
	//
	$the_post_url = get_permalink( $my_query->post->ID );

	if (!$the_post_excerpt) {
	// …if so, generate an excerpt from the content field:
	$the_post_excerpt = wp_trim_words( $the_post_content, 36 ); // <-- sets 50 word limit. use whatever limit you want.
		} 

	// perhaps get custom fields if you need to:
	$my_custom_field		 = get_field('my_custom_field', $my_query->post->ID);
	$subtitle			= get_field('subtitle', $my_query->post->ID);
	$description		 = get_field('description', $my_query->post->ID);
	$source			= get_field('source', $my_query->post->ID);
	$author			= get_field('author', $my_query->post->ID);
	$photo = get_field('large_photo', $my_query->post->ID);
	if(!$photo){
		 $photo = 'https://placehold.it/600x375&text=myMilitaryBenefits.com';
	}
	if(!$author){
		 $author = 'myMilitaryBenefits.com';
	}

	// write out your HTML:
	echo '<div class="text-left" style="border-bottom: 1px darkgrey solid; width: 100%; padding: 25px 0px 25px 0px;"><a style="color:black;text-decoration: none;" href="'.$the_post_url.'">';
	echo '<div class="row">';
	echo '<div class="col-md-4">';
	//echo '<img class="img-fluid " src="'.$photo.'" style="float: left; margin-right: 20px; margin-bottom: 20px;border: 1px #f5f5f5 solid;">';
	echo	(has_post_thumbnail($my_query->post->ID))	 ? get_the_post_thumbnail($my_query->post->ID, 'mmbthumb', array( 'class' => 'img-fluid infiniteposts' )) : '<img class="img-fluid " src="https://placehold.it/600x375&text=myMilitaryBenefits.com" style="float: left; margin-right: 20px; margin-bottom: 20px;border: 1px #f5f5f5 solid;">';
	echo '</div>';//.col-md 
	echo '<div class="col-md-8">';
	echo '<h2 style="color:black;">'.$the_post_title.'</h2>';
	// finally render the output in whatever markup you want:
	echo '<h4 style="color:black;font-size:16px">' . $author . '</h4>';
	echo '<div>' . $the_post_excerpt . '<span class="read-more" style="color: #254479;"> Read more &raquo;</span></div>';
	//echo '<h6 style="color: grey;">'.$subtitle.'</h6>';	 
	//echo '<h3 style="color: #353577;">'.$description.'</h3>';
	echo '</div>';//.col-md
	echo '</div>';//.row
	echo '</a></div>';//.border
	echo '<br>';
	

	$article_count++; //working with the counter
} // endWhile

// close your loop with this special function:
wp_reset_postdata();
?>
	</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.container -->

</div>
</div>
<?php endwhile;
get_footer(); ?>


<!-- tags that aren't closed -->
<!-- </a></div></div></div></div></div> -->
