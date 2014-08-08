<header class="page_header">
	<div style="overflow:visible;" class="center_contain">
		<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url') ?>/images/page_logo.png"/></a></div>
		<div class="shopping_cart_contain">
			<div class="shopping_cart">
				<a href="<?php echo home_url(); ?>/product-review/">
					<img class="shopping_img" src="<?php bloginfo('template_url') ?>/images/shopping_icon.png"/>
					<div class="shopping_count"><?php echo count($_SESSION['products']); ?> items</div>
				</a>
			</div>
			<div class="shopping_cart_items_contain">
				<ul class="shopping_cart_items">
					<?php echo cart_show(); ?>					
				</ul>
				<?php	if(isset($_SESSION["products"]) && count($_SESSION['products']) > 0): ?>
					<ul>
						<li class="item_total">
						<div class="checkout_btn">
							<a href="<?php echo home_url(); ?>/payment-options/">Checkout</a>
						</div>
						Subtotal:						
						<?php
							foreach ($_SESSION['products'] as $products => $product){
								$total_price += get_field('product_price', $product['id']);
							}
							echo "$".$total_price;
						?>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</div> <!-- End of shopping_cart_contain -->
	</div>
</header>