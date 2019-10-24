<?php 
get_header();
while(have_posts()):the_post();
?>


<div class="container">
	<div class="row">

		<div class="col-md-8">
			<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<header>
						<h1 itemprop="headline">Our Apologies! That Article Was Not Found.</h1>
					</header>
					<section class="entry-content" itemprop="articleBody">
						<p>The article you were looking for was not found, but maybe try looking again.</p>

						<div>
							<?php get_search_form(); ?>
						</div>

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
