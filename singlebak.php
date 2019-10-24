<?php 
get_header();
while(have_posts()):the_post();
?>

  <div class="container">
  
  <h1 style="color:black"><?php $tmp=get_field('main_post');
    echo $tmp->post_title;
    //print_r($tmp)?></h1>

  <div class="row">
    <div class="col-md-8" style="border:2px white dotted;padding:12px;">

      <?php
    $tmp=get_field('main_post');
    // the post id is accessed like this:
	// $my_post_id = $tmp->ID; //not doing anything
	// check if a featured image is set:
	// $has_post_thumbnail = has_post_thumbnail( $tmp->ID );
	$my_custom_field = get_field( 'large_photo', $tmp->ID );
	echo  (has_post_thumbnail($tmp))  ? get_the_post_thumbnail($tmp, 'full', array( 'class' => 'img-fluid recentposts' )) : '<img class="img-fluid" style="margin-bottom:10px;border: 1px #f5f5f5 solid;width:100%!important;" src="https://placehold.it/600x375&text=myMilitaryBenefits.com"></img>';
    ?>

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
    </div>
  </div>
  <!-- 
<div class="container">
	<div class="row">

		<div class="col-md-8">
			<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<header>
						<h1 itemprop="headline"><?php the_title(); ?></h1>
							<p class="byline entry-meta vcard">
								<?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
									 /* the time the post was published */
									 '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
									 /* the author of the post */
									 '<span class="by">'.__( 'by', 'bonestheme' ).'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
								); ?>
							</p>
					</header>
					<section class="entry-content" itemprop="articleBody">
						<?php echo bones_thumbnail(array('classes'=>'alignleft')); ?>
						<?php the_content(); ?>
					</section>
					<footer class="article-footer">
						<?php printf( __( 'filed under', 'bonestheme' ).': %1$s', get_the_category_list(', ') ); ?>
						<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
					</footer>
				</article>
			</main>
		</div> --><!-- /.col -->

		<div class="col-md-4">
			
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.container -->


<?php endwhile;
get_footer(); ?>
