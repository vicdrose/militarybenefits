
<div class="bottom-of-page-divider"></div>

<footer class="page-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter" style="background-color: white;padding:20px;">

	<div class="container">

		<div class="row">

			<div class="col-sm-6 col-md-3">
<?php if ( is_active_sidebar( 'footer1' ) ) : 
	dynamic_sidebar( 'footer1' ); else : ?>
<?php endif; ?>
			</div>

			<div class="col-sm-6 col-md-3">
<?php if ( is_active_sidebar( 'footer2' ) ) : 
	dynamic_sidebar( 'footer2' ); else : ?> 
<?php endif; ?>
			</div>

			<div class="col-sm-6 col-md-3">
<?php if ( is_active_sidebar( 'footer3' ) ) : 
	dynamic_sidebar( 'footer3' ); else : ?>
<?php endif; ?>
			</div>

			<div class="col-sm-6 col-md-3">
<?php if ( is_active_sidebar( 'footer4' ) ) : 
	dynamic_sidebar( 'footer4' ); else : ?>
<?php endif; ?>
			</div>

		</div><!-- /.row -->


		<div class="row">
			<div class="col-sm-12 text-center">
<?php 
if ( is_active_sidebar( 'footer_byline' ) ) : 
	dynamic_sidebar( 'footer_byline' ); 
else : 
endif; 
?>
				<p class="source-org copyright">&copy; <?php echo date('Y'); ?> myMilitaryBenefits. </p>
			</div>
		</div><!-- /.row -->

	</div><!-- /.container -->

</footer> <!-- /.footer -->




<?php wp_footer(); ?>


<script>
jQuery(document).ready(function($) {
	jQuery('.ad-ctnr--resp').addClass('ad-ctnr--resp--'+(adSlotSizes[screenSize].join('x')));
});
</script>
</body>
</html>