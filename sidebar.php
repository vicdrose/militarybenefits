<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
<div class="well">
	<?php dynamic_sidebar( 'sidebar1' ); ?>
</div>
<?php else : ?>
	<!-- no widgets to show -->
<?php endif; ?>




