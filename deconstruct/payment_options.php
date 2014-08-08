<?php
	/*
	Template Name: Payment Options
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
			<ul class="tri_column">
				<li>
					<h3>Create An Account</h3>
					<p>
						Benifits of creating an account:<br/>
						- Purchase History<br/>
						- Save your Billing Address<br/>
						- Save your Shipping Address				
					</p>
					<a class="payment_btn" href="">
						Create An Account
					</a>
				</li>
				<li>
					<h3>Sign In</h3>
					<form class="signin_form" action="" method="POST">
						<input type="text" name="login_username" placeholder="Email"/>
						<input type="password" name="login_password" placeholder="Password"/>
						<input class="payment_btn" type="submit" name="login_submit" value="Sign In"/>
					</form>					
				</li>
				<li>
					<h3>Checkout</h3>
					<a class="payment_btn" href="<?php echo home_url(); ?>/customer-checkout/">
						Checkout As a Guest
					</a>

					<div class="checkout_separator">OR</div>

					<form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="upload" value="1">
						<input type="hidden" name="business" value="BGUDMNYCFD2ML">
						<?php $val=0; foreach($_SESSION['products'] as $products => $product): $val++; ?>
							<?php $post = get_post($product['id']) ?>
							<input type="hidden" name="item_name_<?php echo $val; ?>" value="<?php echo $post->post_title; ?>">
							<input type="hidden" name="amount_<?php echo $val; ?>" value="<?php the_field('product_price', $product['id']); ?>">
							<input type="hidden" name="on0_<?php echo $val; ?>" value="Color">
							<input type="hidden" name="os0_<?php echo $val; ?>" value="<?php echo $product['color'] ?>">
							<input type="hidden" name="on1_<?php echo $val; ?>" value="Size">
							<input type="hidden" name="os1_<?php echo $val; ?>" value="<?php echo $product['size'] ?>">
						<?php endforeach ?>				
						<input class="payment_btn" type="submit" value="Checkout with PayPal">
					</form>
				</li>
			</ul>
		</div>
	</section>
</section>

<?php get_footer(); ?>