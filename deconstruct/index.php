<?php
	/*
	Template Name: Home
	*/
?>
<?php get_header(); ?>
<?php require_once("includes/home_header.php"); ?>
<div style="padding:0" class="center_contain">
	<ul class="home_slider">
		<?php if(have_rows('slider')): while(have_rows('slider')): the_row(); ?>
			<li><a href="<?php the_sub_field('slide_link') ?>"><img src="<?php the_sub_field('slide_image'); ?>"/></a></li>
		<?php endwhile; endif; ?>
	</ul>
</div>
<?php get_footer(); ?>