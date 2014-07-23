<?php
	/*
	Template Name: Shop Page
	*/
?>
<?php get_header(); ?>
<?php require_once("includes/page_header.php"); ?>

<section class="center_contain">
	<div class="view_filers">View All</div>
	<section class="short_left_column">
		<div class="left_column">
			<nav class="page_nav">
				<ul class="navigation" id="menu-menu-1">
					<li>
						<a href="<?php echo home_url(); ?>/shop/">Shop</a>
						<ul class="submenu">
							<?php wp_list_categories(array('taxonomy' => 'clothing_type', 'title_li' => " " )); ?>
						</ul>
					</li>
					<li><a href="<?php echo home_url(); ?>/pre-order/">Pre-Order</a></li>
					<li><a href="<?php echo home_url(); ?>/blog/">Blog</a></li>
					<li><a href="<?php echo home_url(); ?>/about-us/">About Us</a></li>
				</ul>
			</nav>
		</div>
		<div class="right_column">
			<ul class="product_list">
				<?php if(get_field('product_availability') == "Available"): ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="product_image"><?php the_post_thumbnail(array(187,254)); ?></div>
							<div class="product_info">
								<span class="product_name"><?php the_title(); ?></span>
								<span class="product_price">$<?php the_field('product_price'); ?>.00</span>
							</div>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</section>
</section>

<?php get_footer(); ?>