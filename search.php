<?php get_header(); ?>


<div class="container">
	<div class="row">

		<div class="col-md-8">
			<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				<article <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<header>
						<h1 itemprop="headline">Search Results:</h1>
					</header>

					<section class="entry-content" itemprop="articleBody">
<?php while(have_posts()):the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
							<header class="entry-header article-header">
								<h3 itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p class="byline entry-meta vcard">
<?php printf( __( 'Posted %1$s by %2$s', 'bonestheme' ),
	/* the time the post was published */
	'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
			/* the author of the post */
			'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
); ?>
								</p>
							</header>
							<section class="entry-content">
								<?php the_excerpt( '<span class="read-more">Read more &raquo;</span>' ); ?>
							</section>
							<footer class="article-footer">
								<?php if(get_the_category_list(', ') != ''): ?>
								<?php printf( __( 'Filed under: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>
								<?php endif; ?>
								<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
							</footer> <!-- end article footer -->
						</article>
<?php endwhile;?>
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


<?php get_footer(); ?>
