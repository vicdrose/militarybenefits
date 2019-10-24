<?php get_header(); ?>

<!-- <div style="background-color: lightblue;padding:15px;border:2px white dotted;"> 
  
  <div class="container">
  
  <div class="row">
    <div class="col-sm" style="padding:12px;"><p>main post<br>main post<br>main post<br>main post<br>main post<br>main post<br>main post<br></p></div>
    <div class="col-sm d-none d-md-block" style="padding:12px;"><p>latest news -->
    	
			<!-- <div style="width:150px;height:150px;">Ad space</div>
		</div><!-- /.col --><!-- </p>< -->
    <!-- </div>
  </div>
</div>
 --><!-- <div class="container-fluid" style="padding:12px;border:2px white dotted;">
  <div class="container">
   
  </div>
  
</div> -->
<div class="container-fluid" style="padding:12px;border:2px white dotted;"><!-- infinite posts slider --><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
					<header class="article-header">
						<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<p class="byline entry-meta vcard">
<?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
/* the time the post was published */
'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
/* the author of the post */
'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
); ?>
						</p>
					</header>
					<section class="entry-content cf">
<?php echo bones_thumbnail(array('classes'=>'alignleft')); ?>
<?php the_content(); ?>
					</section>

					<footer class="article-footer cf">
						<p class="footer-comment-count">
							<?php comments_number( '<span>No</span> Comments', '<span>One</span> Comment', '<span>%</span> Comments' );?>
						</p>
<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>
<?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
					</footer>
				</article>
<?php endwhile; ?>
<?php bones_page_navi(); ?>
<?php else : ?>
<!-- post not found -->
<?php endif; ?></div>


<div class="container">
	<div class="row">

		<div class="col-md-8">
			<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">


			</main>
		</div><!-- /.col -->

		

	</div><!-- /.row -->
</div><!-- /.container -->
<div class="col-md-4 latest">
			<?php get_sidebar(); ?>
			<br>
			</div>

<?php get_footer(); ?>
