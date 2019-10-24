<?php
/*
template name: Homepage
*/
?>

<?php
get_header();
?>

<div style="background-color: white;padding:15px;"> 
  

  <div class="container">
  


  <div class="row" style="padding:5px;">
    <div class="col-sm" style="background-color: white;padding:12px 30px 12px 12px;">
    
     
	
	<!-- <?php $tmp=get_field('main_post');
    echo $tmp->post_content;
    //print_r($tmp)?>   -->  
<a style="color:black;text-decoration: none;" href="
    	<?php 
	$tmp=get_field('main_post');
	$the_post_url = get_permalink($tmp);
	print_r($the_post_url);?>"> 
<img style="width:100%;" src="
    <?php
    $tmp=get_field('main_post');
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'large_photo', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>	"></img>

<!--   <h4>//SOURCE
    <?php
    $tmp=get_field('main_post');
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'source', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<h1 style="color:black;"><?php $tmp=get_field('main_post');
    echo $tmp->post_title;
    //print_r($tmp)?></h1>

<!--   <h4>
    <?php
    $tmp=get_field('main_post');
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	// $my_custom_field = get_field( 'author', $tmp->ID );
	// echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
		</h4> -->

<!-- <h6><?php $tmp=get_field('main_post');
    //echo $tmp->post_date;
    //print_r($tmp)?></h6> -->

		<h6>
    <?php
    $tmp=get_field('main_post');
    // the post id is accessed like this:
	  $my_post_id = $tmp->ID;
	  // check if a featured image is set:
	  // $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	  // $my_custom_field = get_field( 'subtitle', $tmp->ID );


	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    $the_post_excerpt = $tmp->the_post_excerpt; // <-- this only retrieves *manually* written excerpts.
	//$the_post_content = $tmp->post->post_content;
	// next check whether the excerpt is empty:
	if (!$the_post_excerpt) {
	// …if so, generate an excerpt from the content field:
		$the_post_excerpt = wp_trim_words( $tmp->post_content, 50 ); // <-- sets 50 word limit. use whatever limit you want.
    } 

// finally render the output in whatever markup you want:
echo '<div>' . $the_post_excerpt . '</div>';
    ?>
		</h6> 

</a>
    

    </div>
    <div class="vertical-seperator " style="background-color: darkgrey;width: 1px;"></div>

    <div class="col-sm d-md-block " style="background-color:white;padding:12px;">
    <div class="latest"> <div><?php get_sidebar(); ?></div>
  </div><br>

    	<div class="text-center" style="background-color:#ad2a2a;color:white;padding:12px;height:200px">AD</div>

    </div>
    </div>
  </div>
</div>

<div class="container-fluid" style="background-color:#f3f3f3;padding:12px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 text-center" style="background-color: #f3f3f3;padding:12px;">
    	<a style="text-decoration: none;" href="
    	<?php 
	$tmp=get_field('recent_posts_1');
	$the_post_url = get_permalink($tmp);
	print_r($the_post_url);?>"> 	

      	<img class="img-fluid"  src="
    <?php
    $tmp=get_field('recent_posts_1');
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'large_photo', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>	"></img>

 <!--  <h4>
    <?php
    
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'source', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<h4 style="color:grey"><?php
    echo $tmp->post_title;
    //print_r($tmp)?></h4>

<!--   <h4>
    <?php
    // the post id is accessed like this:
	//$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	//$my_custom_field = get_field( 'author', $tmp->ID );
	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<!-- <h4><?php
    //echo $tmp->post_date;
    //print_r($tmp)?></h4> -->
    	</a> 
    </div>

      <div class="col-md-3 text-center" style="background-color: #f3f3f3;padding:12px;">
	<a style="text-decoration: none;" href="
    	<?php 
	$tmp=get_field('recent_posts_2');
	$the_post_url = get_permalink($tmp);
	print_r($the_post_url);?>"> 

	<img class="img-fluid"  src="
    <?php
    $tmp=get_field('recent_posts_2');
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'large_photo', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>	"></img>

<!--   <h4>
    <?php
    
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'source', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<h4 style="color:grey"><?php
    echo $tmp->post_title;
    //print_r($tmp)?></h4>
</a>
<!--   <h4>
    <?php
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	//$my_custom_field = get_field( 'author', $tmp->ID );
	//echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<!-- <h4><?php
    echo $tmp->post_date;
    //print_r($tmp)?></h4> -->
      </div>

      <div class="col-md-3 text-center" style="background-color: #f3f3f3;padding:12px;">
    
      	<a style="text-decoration: none;" href="
    	<?php 
	$tmp=get_field('recent_posts_3');
	$the_post_url = get_permalink($tmp);
	print_r($the_post_url);?>"> 

      <img class="img-fluid" src="
    <?php
    $tmp=get_field('recent_posts_3');
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'large_photo', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>	"></img>

<!--   <h4>
    <?php
    
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'source', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<h4 style="color:grey"><?php
    echo $tmp->post_title;
    //print_r($tmp)?></h4>
</a>
<!--   <h4>
    <?php
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'author', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<!-- <h4><?php
    echo $tmp->post_date;
    //print_r($tmp)?></h4> -->
      </div>

      <div class="col-md-3 text-center" style="background-color: #f3f3f3;padding:12px;">
    
      	<a style="text-decoration: none;" href="
    	<?php 
	$tmp=get_field('recent_posts_4');
	$the_post_url = get_permalink($tmp);
	print_r($the_post_url);?>"> 

      	<img class="img-fluid" src="
    <?php
    $tmp=get_field('recent_posts_4');
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'large_photo', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>	"></img>

<!--   <h4>
    <?php
    
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'source', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<h4 style="color:grey"><?php
    echo $tmp->post_title;
    //print_r($tmp)?></h4>
</a>
<!--   <h4>
    <?php
    // the post id is accessed like this:
	$my_post_id = $tmp->ID;
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'author', $tmp->ID );
	echo ( !empty($my_custom_field) ) ? $my_custom_field : '<p>That field is empty.</p>';
    ?>
</h4> -->

<!-- <h4><?php
    echo $tmp->post_date;
    //print_r($tmp)?></h4> -->
      </div>
    </div>
  </div>
  
</div>
<div class="container-fluid" style="background-color:white;padding:12px;"><?php 

while(have_posts()):the_post();
?>


<div class="container">
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
	'posts_per_page' => -1,   // no limit
);

// run your query:
$my_query = new WP_Query($my_args);

// loop through your results:
while ($my_query->have_posts()) {
	$my_query->the_post(); // tells WordPress it is looping

	// get whatever post properties you want:
	$the_post_object  = $my_query->post;
	$the_post_id      = $my_query->post->ID;
	$the_post_title   = $my_query->post->post_title;
	$the_post_excerpt = $my_query->post->post_excerpt;
	$the_post_content = $my_query->post->post_content;
	//
	$the_post_url = get_permalink( $my_query->post->ID );

	if (!$the_post_excerpt) {
	// …if so, generate an excerpt from the content field:
	$the_post_excerpt = wp_trim_words( $the_post_content, 36 ); // <-- sets 50 word limit. use whatever limit you want.
		} 

	// perhaps get custom fields if you need to:
	$my_custom_field     = get_field('my_custom_field', $my_query->post->ID);
	$subtitle     = get_field('subtitle', $my_query->post->ID);
	$description     = get_field('description', $my_query->post->ID);
	$source     = get_field('source', $my_query->post->ID);
	$photo = get_field('large_photo', $my_query->post->ID);
	

	// write out your HTML:
	echo '<div class="text-left" style="border-bottom: 2px black solid; width: 100%;    padding: 25px 0px 25px 0px;"><a style="color:black;text-decoration: none;" href="'.$the_post_url.'">';
	echo '<img class="img-fluid " src="'.$photo.'" style="float: left; padding-right: 20px;">';
  echo '<div >';
	echo '<h2 style="color:black;">'.$the_post_title.'</h2>';
	// finally render the output in whatever markup you want:
	echo '<div>' . $the_post_excerpt . '</div>';
	//echo '<h6 style="color: grey;">'.$subtitle.'</h6>';
	//echo '<h3 style="color: #353577;">'.$description.'</h3>';
	echo '</div>';
  echo '</a></div>';
	echo '<br>';

} // endWhile

// close your loop with this special function:
wp_reset_postdata();
?>
	</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.container -->


<?php endwhile;
get_footer(); ?>

</div>

