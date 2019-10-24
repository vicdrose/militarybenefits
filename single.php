<?php 
get_header();
while(have_posts()):the_post();
?>
<style>
.marg-bot{
	margin-bottom: 20px;
}
</style>
  <div class="container infinite">
  
  <h1 style="color:black"><?php $tmp=get_field('main_post');
    echo $tmp->post_title;
    //print_r($tmp)?></h1>

  <div class="row">
    <div class="col-md-8" style="border:2px white dotted;padding:12px;" onmouseover='history.pushState(null, null, "<?php print_r(get_permalink())?>");'>
    	<div class="container" style="padding-left:0px;padding-right:0px;">
      <?php
    $tmp=get_field('main_post');
    // the post id is accessed like this:
	// $my_post_id = $tmp->ID; //not doing anything
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'large_photo', $tmp->ID );
	echo  (has_post_thumbnail($tmp))  ? get_the_post_thumbnail($tmp, 'full', array( 'class' => 'img-fluid recentposts marg-bot' )) : '<img class="img-fluid" style="margin-bottom:10px;border: 1px #f5f5f5 solid;width:100%;" src="https://placehold.it/600x375&text=myMilitaryBenefits.com"></img>';
    ?>
</div>

 	<h1 style="color:black">
 		<?php //print_r($post)
	the_title();//echo $post->post_content;
	 ?>
	<!-- <?php $tmp=get_field('main_post');
    echo $tmp->post_title;
    print_r($tmp)?> --></h1>


<!-- <?php $tmp=get_field('post_content');
    echo $tmp;
    //print_r($tmp)?>  -->  
	<div> <?php //print_r($post)
	the_content();//echo $post->post_content;
	 ?></div>

    </div>
    <!-- <div class="vertical-seperator" style="background-color: darkgrey;width: 1px;"></div> -->
    <div class="col-sm d-md-block" style="padding:12px;">
    	<div class="latest"> <?php get_sidebar(); ?></div>
    	<!-- <div class="text-center" style="background-color:#ad2a2a;color:white;padding:30px;height:200px;margin:10px 0px 10px 0px;border: 1px darkgrey solid;">AD</div>
    	<div class="text-center" style="background-color:#ad2a2a;color:white;padding:30px;height:200px;margin:10px 0px 10px 0px;border: 1px darkgrey solid;">AD</div> -->

    </div>


	<a href="#" class="go-top" style="z-index: 5;display: block;">Back to Top</a>

<!-- infinite posts -->
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
$n=0;

$output = array();

//grab the post id from the current page
$my_post_id = get_the_ID();

// loop through your results:
while ($my_query->have_posts()) {
	$my_query->the_post(); // tells WordPress it is looping
	// get whatever post properties you want:
	$the_post_object  = $my_query->post;
	$the_post_id      = $my_query->post->ID;
	$the_post_title   = $my_query->post->post_title;
	$the_post_excerpt = $my_query->post->post_excerpt;
	$the_post_content = $my_query->post->post_content;
	$the_post_url     = get_permalink( $my_query->post->ID );
	


		if($my_post_id != $the_post_id){





	

	if (!$the_post_excerpt) {
		// …if so, generate an excerpt from the content field:
		$the_post_excerpt = wp_trim_words( $the_post_content, 36 ); // <-- sets 50 word limit. use whatever limit you want.
	} 

	// perhaps get custom fields if you need to:
	$my_custom_field = get_field('my_custom_field', $my_query->post->ID);
	$subtitle        = get_field('subtitle', $my_query->post->ID);
	$description     = get_field('description', $my_query->post->ID);
	$source          = get_field('source', $my_query->post->ID);
	$author          = get_field('author', $my_query->post->ID);
	$photo           = get_field('large_photo', $my_query->post->ID);
	if(!$photo){
		$photo = 'https://placehold.it/600x375&text=myMilitaryBenefits.com';
	}
	if(!$author){
		$author = 'myMilitaryBenefits.com';
	}

	// write out your HTML:
	$myHTML = "";
	$myHTML .= "<div style='border-top: 1px darkgrey solid; width: 100%; padding: 25px 0px 25px 0px;' onmouseover='history.pushState(null, null, &#39;".$the_post_url."&#39;);' >";
	$myHTML .= "<div class='row' style='padding:12px;'>";
	$myHTML .= "<div class='col-md-8 col-sm-12' style='margin-bottom: 20px;'><a style='color:black;text-decoration: none;' href='".$the_post_url."'>";
	$myHTML .=	(has_post_thumbnail($my_query->post->ID))	 ? get_the_post_thumbnail($my_query->post->ID, 'full', array( 'class' => 'img-fluid infiniteposts' )) : "<img class='img-fluid' src='https://placehold.it/600x375&text=myMilitaryBenefits.com' style='margin-right: 20px; border: 1px #f5f5f5 solid;'>";
	$myHTML .= "</a></div>";//.col-md 
	$myHTML .= "<div class='col-md-8'>";
	$myHTML .= "<h2 style='color:black;'>".$the_post_title."</h2>";
	$myHTML .= "<h4 style='color:black;font-size:16px'>" . $author . "</h4>";
	$myHTML .= "<div style='word-break: break-word;'>" . apply_filters('the_content', $the_post_content ). "</div>";
	$myHTML .= "</div>";//.col-md
	$myHTML .= "</div>";//.row
	$myHTML .= "</div>";//.border
	$myHTML .= "<br>";
	
	$output[] = nl2br(str_replace(PHP_EOL,"", $myHTML));
	//echo $myHTML;

	/*
	echo '<script type="text/javascript">
myContent.push("'.addslashes(str_replace(PHP_EOL,"", $myHTML)).'");
console.log("'.addslashes(str_replace(PHP_EOL,"", $myHTML)).'");
</script>';
	*/
}
} // endWhile

?>
<script>
myContent = <?php echo json_encode($output); ?>;
</script>



<!-- infinite posts -->
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.container -->	



<?php
echo '<script type="text/javascript">

var myContentArray = [];

jQuery(document).ready(function($) {
	// jQuery is ready!

	jQuery.get("/infinite-posts-feed", function(data) {
		//console.log(data);
		myContentArray = data;
	});

});

</script>'
?>

<?php endwhile;
get_footer(); ?>
