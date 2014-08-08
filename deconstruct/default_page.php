<?php
	/*
	Template Name: Default Page
	*/
?>
<?php get_header(); ?>
<?php require_once("includes/page_header.php"); ?>

<section class="content_wrap center_contain">
	<section class="short_left_column">
		<div class="left_column">
			<nav class="page_nav">
				<?php wp_nav_menu(array('container' => 'ul', 'menu_class' => 'navigation')); ?>
			</nav>
		</div>
		<div class="right_column html_norm">
			<?php if(have_posts()): while(have_posts()): the_post(); the_content(); endwhile; endif; ?><br/><br/><br/>
		</div>
	</section>
</section>

<?php get_footer(); ?>