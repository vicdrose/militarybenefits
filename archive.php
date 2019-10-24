<?php get_header(); ?>


<div class="container" style="background-color: white;padding:15px;"> 
	<div class="row">

		<div class="col-md-8">
			<main role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
<?php
the_archive_title( '<h2 class="page-title" style="font-weight: 700;">', '</h2>' );
the_archive_description( '<div class="taxonomy-description">', '</div>' );
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="entry-header article-header">

									
									<!-- <p class="byline entry-meta vcard"> -->
<!-- <?php printf( 'Posted %1$s %2$s',
	/* the time the post was published */
	'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
	/* the author of the post */
	'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
); ?> -->
									<!-- </p> -->

								</header>

								<section class="entry-content">
									<div class="text-left" style="border-bottom: 1px darkgrey solid; padding: 25px 0px 25px 0px;">
					<div class="row">
						<div class="col-md-4">
<?php echo bones_thumbnail(array('classes'=>'archiveposts img-fluid')); ?>
</div>
<div class="col-md-8">
<h3 style="margin-top:20px;color:black;" class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" style="color:black;" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<div style="color:black;"><?php the_excerpt(); ?></div>
</div>
</div>
</div>
								</section>

								<footer class="article-footer"></footer>

							</article>

<?php endwhile; ?>
<?php bones_page_navi(); ?>
<?php else : ?>
<!-- post not found -->
<?php endif; ?>
			</main>
		</div><!-- /.col -->

		<div class="col-md-4">
			<div style="margin-top:20px;" class="latest"> <?php get_sidebar(); ?></div>
			<br>

    	<!-- <div class="text-center" style="background-color:#ad2a2a;color:white;padding:12px;height:200px;border: 1px #f5f5f5 solid;">AD</div> -->

		</div><!-- /.col -->

	</div><!-- /.row -->
</div><!-- /.container -->


<?php get_footer(); ?>
