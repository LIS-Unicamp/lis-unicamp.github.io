<?php
/*
Template Name: Index page
*/
?>

<?php get_header(); ?>
    <div class='clearfix row'>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('index1') ) : ?>
		<?php endif; ?>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('index2') ) : ?>
		<?php endif; ?>


	</div> <!-- end #content -->
</div>
<?php get_footer(); ?>