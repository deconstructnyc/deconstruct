<?php
	/*
	Template Name: Shop Page
	*/
?>
<?php
	$color = $_GET["c"];
?>
<?php get_header(); ?>
<?php require_once("includes/page_header.php"); ?>

<section class="content_wrap center_contain">
	<section class="short_left_column">
		<div class="left_column">
			<?php require_once("includes/shop_left_nav.php"); ?>
		</div>
		<div class="right_column">
			<section class="short_right_column">
				<div class="left_column">
					<ul class="single_product_img_list">
						<?php if(have_rows('products')): while(have_rows('products')): the_row(); ?>
							<?php if(get_sub_field('product_availability') == "Available" || "Pre-Order"): ?>
								<li name="<?php the_sub_field('product_color'); ?>">
									<div class="single_product_image_contain">
										<?php if(get_sub_field('product_availability') == "Pre-Order"): ?>
											<div class="product_message">Pre Order</div>
										<?php endif; ?>
										<div class="single_product_image"><img src="<?php echo get_sub_field('product_image')['url'];?>"/></div>
									</div>
									<ul class="product_gallery">
										<li><img src="<?php echo get_sub_field('product_image')['url'];?>"/></li>
										<?php if(have_rows('product_gallery')): ?>
											<?php while(have_rows('product_gallery')): the_row(); ?>
												<li><img src="<?php the_sub_field('gallery_image'); ?>"/></li>
											<?php endwhile; ?>
										<?php endif; ?>
									</ul>
								</li>
							<?php endif; ?>
						<?php endwhile; endif; ?>
					</ul>					
				</div>
				<div class="right_column">
					<div class="product_content">
						<h2><?php $terms = get_the_terms(get_the_id(), "designers"); foreach($terms as $term ){echo $term->name;} ?></h2>
						<h1><?php the_title(); ?></h1>
						<div class="price">$<?php the_field('product_price'); ?></div>							
						<div class="product_form">
							<form class="price_input" action="" method="post">
								<input type="hidden" name="product_id" value="<?php the_id(); ?>">
								<label for="color">Color</label>
							   <select id="color" name="product_color">
									<?php if(have_rows('products')): while(have_rows('products')): the_row(); ?>
										<?php if(get_sub_field('product_availability') == "Available" || "Pre-Order"): ?>
											<option <?php if(get_sub_field('product_color') == $color){ echo "selected";} ?>
											 value="<?php the_sub_field('product_color'); ?>"><?php the_sub_field('product_color'); ?></option>
										<?php endif; ?>
									<?php endwhile; endif; ?>
								</select>
								<div id="size_select">
									<?php if(have_rows('products')): while(have_rows('products')): the_row(); ?>
										<?php if(get_sub_field('product_color') == $color): ?>
											<label for="size">Size</label>
											<select id="size" name="product_size">
												<?php if(have_rows('variations')): while(have_rows('variations')): the_row(); ?>
													<option value"<?php the_sub_field('product_size'); ?>"><?php the_sub_field('product_size'); ?></option>
												<?php endwhile; endif; ?>
											</select>
										<?php endif; ?>
									<?php endwhile; endif; ?>
								</div>
								<input type="submit" name="submit" border="0" value="ADD TO CART">						  
							</form>
						</div> <!-- End of product_form -->
						<?php if(have_posts()): while(have_posts()): the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div> <!-- End of product_content -->
				</div> <!-- End of right_column -->
			</section> <!-- End of short_right_column -->
		</div>
	</section>
</section>

<?php get_footer(); ?>