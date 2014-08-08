<?php
	/*
	Template Name: Pre-Order
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
		<div class="right_column">
			<div class="view_filers">View All</div>
			<ul class="product_list">
				<?php
					query_posts(array('post_type' => 'product'));
					if(have_posts()): while(have_posts()): the_post();					
				?>
					<?php if(have_rows('products')): while(have_rows('products')): the_row(); ?>					
						<?php if(get_sub_field('product_availability') == "Pre-Order"): ?>
							<?php product_list(); ?>
						<?php endif; ?>
					<?php endwhile; endif; ?>
				<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
		</div>
	</section>
</section>

<?php get_footer(); ?>