<?php
	/*
	Template Name: Product Review
	*/
?>
<?php get_header(); ?>
<?php require_once("includes/page_header.php"); ?>
<script type="text/javascript">
	$(function(){
		$(".page_header .shopping_cart_contain").hover(function(){
			$(this).removeClass("active_cart");
		})
	})
</script>
<section class="content_wrap center_contain">
	<section class="short_left_column">
		<div class="left_column">
			<nav class="page_nav">
				<?php wp_nav_menu(array('container' => 'ul', 'menu_class' => 'navigation')); ?>
			</nav>
		</div>
		<div class="right_column" id="product_review">
			<h1 class="page_title"><?php the_title(); ?></h1><br/>
			<section class="short_right_column">
				<div class="left_column">
					<div class="shopping_cart_items_contain product_review">
						<ul class="shopping_cart_items">
							<?php echo cart_show(); ?>
						</ul>
						<div class="continue_shopping"><a href="<?php echo home_url(); ?>/shop/">&lt; - - Continue Shopping</a></div>
					</div> <!-- End of product_review -->
				</div>
				<div class="right_column">
					<ul>
						<li class="item_total">
							Sub Total: <?php	echo "$".$total_price; ?>
						</li>
					</ul>		
					<div class="checkout_btn">
						<a href="<?php echo home_url(); ?>/payment-options/">Checkout</a>
					</div>
				</div> <!-- End of right_column -->
			</section>
			
		</div>
	</section>
</section>

<?php get_footer(); ?>