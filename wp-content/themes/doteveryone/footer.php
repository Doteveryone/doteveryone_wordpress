<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package doteveryone
*/

?>

</div><!-- #content -->

<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php the_field('contact_us', 'options'); ?>
			</div>
			<div class="col-sm-4 footer_right">
				<?php the_field('social_media', 'options'); ?>
				<?php the_field('mailing_list', 'options'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<h4>&nbsp;</h4>
				<div class="row">
						<?php 					
						if( get_field('funders', 'options') )
						{
						    while( the_repeater_field('funders', 'options') )
						    {
						    		$image = get_sub_field('image');
						        echo '<div class="col-sm-2 col-xs-3 funder"><a href="'.get_sub_field('link').'" target="_blank"><img src='.$image['sizes']['medium'].' alt="'.get_sub_field('name').'"></a></div>';
						    }
							} ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<?php the_field('rubric', 'options'); ?>
			</div>
			<div class="col-sm-2">					
				<?php the_field('logo_etc', 'options'); ?>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120354258-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-120354258-1');
</script>
</body>
</html>
