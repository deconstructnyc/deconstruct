<?php
	/*
	Template Name: Pre-Order
	*/
?>
<?php get_header(); ?>
<?php require_once("includes/page_header.php"); ?>

<section class="center_contain">
	<div class="view_filers">View All</div>
	<section class="short_left_column">
		<div class="left_column">
			<nav class="page_nav">
				<?php wp_nav_menu(array('container' => 'ul', 'menu_class' => 'navigation')); ?>
			</nav>
		</div>
		<div class="right_column">
			<ul class="product_list">
				<?php
					query_posts(array('post_type' => 'product'));
					if(have_posts()): while(have_posts()): the_post();					
				?>
					<?php if(have_rows('products')): while(have_rows('products')): the_row(); ?>					
						<?php if(get_sub_field('product_availability') == "Pre-Order"): ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="product_message">Pre Order</div>
									<div class="product_image"><img src="<?php the_sub_field('product_image'); ?>"></div>
									<div class="product_info">
										<span class="product_name"><?php the_title(); ?> - <?php the_sub_field('product_color'); ?></span>
										<span class="product_price">$<?php the_field('product_price'); ?>.00</span>
									</div>
								</a>
							</li>
						<?php endif; ?>
					<?php endwhile; endif; ?>
				<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
		</div>
	</section>
</section>

<?php get_footer(); ?>