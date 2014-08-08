<?php
	/*
	Template Name: Customer Checkout
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
			<section class="short_right_column">
				<div class="left_column">
					<form class="guest_checkout_form" action="<?php echo home_url(); ?>/payment-review/" method="POST">
						<ul>
							<li>
								<div class="click_title">Customer Info</div>
								<div class="click_display">
									<table width="100%" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td>
													<label for="first_name">First Name *</label>
													<input required type="text" name="first_name"/>
												</td>
												<td>
													<label for="last_name">Last Name *</label>
													<input required type="text" name="last_name"/>
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<label for="email">Email *</label>
													<input required type="email" name="email"/>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</li>
							<li>
								<div class="click_title">Shipping Address</div>
								<div class="click_display">
									<table width="100%" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td colspan="3">
													<label for="address">Address *</label>
													<input required type="text" name="address"/>
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<label for="address2">Address 2 (Optional)</label>
													<input type="text" name="address2"/>
												</td>
											</tr>
											<tr>
												<td>
													<label for="city">City *</label>
													<input required type="text" name="city"/>
												</td>
												<td>
													<label for="state">State *</label>
													<input required type="text" name="state"/>
												</td>
												<td>
													<label for="zipcode">Zip/Postal Code *</label>
													<input required type="text" name="zipcode"/>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</li>
							<li>
								<div class="click_title">Credit Card Info</div>
								<div class="click_display">
									<table width="100%" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td colspan="2">
													<label for="cc_type">Credit Card Type</label>
													<select name="cc_type">
														<option value="visa">Visa</option>
														<option value="master_card">Master Card</option>
														<option value="discover">Discover</option>
														<option value="american_express">American Express</option>
													</select>
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<label for="cc_number">Credit Card Number *</label>
													<input required type="text" name="cc_number"/>
												</td>
											</tr>
											<tr>
												<td>
													<label for="cc_exp_date">Experation Date *</label>
													<input required type="text" name="cc_exp_date"/>
												</td>
												<td>
													<label for="cc_cvv">Credit Card CCV *</label>
													<input required type="text" name="cc_ccv"/>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</li>
							<li>
								<div class="click_title">Billing Address</div>
								<div class="click_display">
									<table width="100%" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td colspan="3">
													<input style="display: inline; width: auto; margin-right: 5px;" type="checkbox" name="shipping_address"/>
													<label style="display: inline" for="address">Check if Same as Shipping Address</label>													
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<label for="billing_address">Address *</label>
													<input required type="text" name="billing_address"/>
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<label for="billing_address2">Address 2 (Optional)</label>
													<input type="text" name="billing_address2"/>
												</td>
											</tr>
											<tr>
												<td>
													<label for="billing_city">City *</label>
													<input required type="text" name="billing_city"/>
												</td>
												<td>
													<label for="billing_state">State *</label>
													<input required type="text" name="billing_state"/>
												</td>
												<td>
													<label for="billing_zipcode">Zip/Postal Code *</label>
													<input required type="text" name="billing_zipcode"/>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</li>
							<li>
								<span style="font-size: 12px;">* required</span>
								<input class="payment_review" type="submit" name="submit_review" value="Submit and Review"/>
							</li>
						</ul>
					</form> <!-- End of guest_checkout_form -->
				</div> <!-- End of left_column -->
				<div class="right_column">
					<div class="items_title">Items in Cart</div>
					<ul class="checkout_product_list">
						<?php echo cart_show(); ?>
						<li class="item_total">
							Subtotal: <?php echo "$".$total_price; ?>
						</li>
					</ul>
				</div>
			</section> <!-- End of short_right_column -->
		</div> <!-- End of main right_column -->
	</section> <!-- End of layout short_left_column -->
</section> <!-- End of content_wrap -->
<?php get_footer(); ?>