<!-- <div style="background-color: lightblue;padding:15px;border:2px white dotted;"> 
  
  <div class="container">
  
  <div class="row">
    <div class="col-sm" style="background-color: orange;border:2px white dotted;padding:12px;"><p>main post</p></div>
    <div class="col-sm d-none d-md-block" style="background-color:yellow;padding:12px;border:2px white dotted;"><p>latest news</p></div>
    </div>
  </div>
</div>
<div class="container-fluid" style="background-color:yellow;padding:12px;border:2px white dotted;">
  <div class="container">
    <div class="row">
      <div class="col-sm" style="background-color: #66b99f;border:2px white dotted;padding:12px;">recentposts1</div>
      <div class="col-sm" style="background-color: #66b99f;border:2px white dotted;padding:12px;">recentposts2</div>
      <div class="col-sm" style="background-color: #66b99f;border:2px white dotted;padding:12px;">recentposts3</div>
      <div class="col-sm" style="background-color: #66b99f;border:2px white dotted;padding:12px;">recentposts4</div>
      
      
    </div>
  </div>
  
</div>
<div class="container-fluid" style="background-color:pink;padding:12px;border:2px white dotted;">infinite posts slider</div>
 -->
<?php 
get_header();
while(have_posts()):the_post();
?>
<div class="text-center" style="color:white;margin-top: 20px;margin-left:10%;margin-right:10%;" ></div>

<div class="container">
	<div class="row">

		<div class="col-md-8">
			<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<header>
						<h1 itemprop="headline"><?php the_title(); ?></h1>
						<!-- <p class="byline vcard">
							<?php printf( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
						</p> -->
					</header>
					<section class="entry-content" itemprop="articleBody">
						<?php the_content(); ?>
					</section>
					<footer class="article-footer"></footer>
				</article>
			</main>
		</div><!-- /.col -->

		<div class="col-md-4 latest">
			<?php get_sidebar(); ?>
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.container -->


<?php endwhile;
get_footer(); ?>