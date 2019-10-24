<?php 
/*
Template name: [Example Custom Page Template]
*/
get_header();
while(have_posts()):the_post();
?>


<div class="container">
	<div class="row">

		<div class="col-md-8">
			<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<header>
						<h1 itemprop="headline"><?php the_title(); ?></h1>
						<p class="byline vcard">
							<?php printf( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
						</p>
					</header>
					<section class="entry-content" itemprop="articleBody">
						<?php the_content(); ?>
					</section>
					<footer class="article-footer"></footer>
				</article>
			</main>
		</div><!-- /.col -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.container -->


<?php endwhile;
get_footer(); ?>