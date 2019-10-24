<?php
/*
template name: [Infinite Posts Feed]
*/

header('Content-Type: text/json; charset=utf-8');

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
	$myHTML .= "<div class='text-left' style='border-bottom: 1px darkgrey solid; width: 100%; padding: 25px 0px 25px 0px;'><a style='color:black;text-decoration: none;' href='".$the_post_url."'>";
	$myHTML .= "<div class='row'>";
	$myHTML .= "<div class='col-md-4'>";
	$myHTML .=	(has_post_thumbnail($my_query->post->ID))	 ? get_the_post_thumbnail($my_query->post->ID, 'mmbthumb', array( 'class' => 'img-fluid infiniteposts' )) : "<img class='img-fluid' src='https://placehold.it/600x375&text=myMilitaryBenefits.com' style='float: left; margin-right: 20px; margin-bottom: 20px;border: 1px #f5f5f5 solid;'>";
	$myHTML .= "</div>";//.col-md 
	$myHTML .= "<div class='col-md-8'>";
	$myHTML .= "<h2 style='color:black;'>".$the_post_title."</h2>";
	$myHTML .= "<h4 style='color:black;font-size:16px'>" . $author . "</h4>";
	$myHTML .= "<div>" . $the_post_excerpt . "<span class='read-more' style='color: #254479;'> Read more &raquo;</span></div>";
	$myHTML .= "</div>";//.col-md
	$myHTML .= "</div>";//.row
	$myHTML .= "</a></div>";//.border
	$myHTML .= "<br>";
	
	$output[] = $myHTML;

} // endWhile

echo json_encode($output);

?>