<?php
	/*
	Template Name: Payment Review
	*/
?>
<?php get_header(); ?>
<?php
	if(isset($_POST["submit_review"])){
		$first_name = sanitize_text_field($_POST['first_name']);
		$last_name = sanitize_text_field($_POST['last_name']);
		$email = sanitize_email( $_POST['email']);
		$address = sanitize_text_field( $_POST['address']);
		$address2 = sanitize_text_field( $_POST['address2']);
		$city = sanitize_text_field( $_POST['city']);
		$state = sanitize_text_field( $_POST['state']);
		$zipcode = sanitize_text_field( $_POST['zipcode']);
		$cc_type = sanitize_text_field($_POST['cc_type']);
		$cc_number = sanitize_text_field($_POST['cc_number']);
		$cc_exp_date = sanitize_text_field($_POST['cc_exp_date']);
		$cc_ccv = sanitize_text_field($_POST['cc_ccv']);
		$billing_address = sanitize_text_field($_POST['billing_address']);
		$billing_address2 = sanitize_text_field($_POST['billing_address2']);
		$billing_city = sanitize_text_field($_POST['billing_city']);
		$billing_state = sanitize_text_field($_POST['billing_state']);
		$billing_zipcode = sanitize_text_field($_POST['billing_zipcode']);
	}
?>
<?php require_once("includes/page_header.php"); ?>
<section class="content_wrap center_contain">
	<section class="short_left_column">
		<div class="left_column">
			<nav class="page_nav">
				<?php wp_nav_menu(array('container' => 'ul', 'menu_class' => 'navigation')); ?>
			</nav>
		</div> <!-- End of main left column -->
		<div class="right_column" id="payment_review">
			<h1 class="page_title"><?php the_title(); ?></h1><br/>
			<section class="short_right_column">
				<div class="left_column">
					<ul class="guest_checkout_form">
						<li>
							<div class="click_title">Customer Info</div>
							<div class="click_display">
								<table width="100%" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td>
												<label for="first_name">First Name</label>
												<?php echo $first_name; ?>
											</td>
											<td>
												<label for="last_name">Last Name</label>
												<?php echo $last_name; ?>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<label for="email">Email</label>
												<?php echo $email; ?>
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
												<label for="address">Address</label>
												<?php echo $address; ?>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<label for="address2">Address 2 (Optional)</label>
												<?php echo $address2; ?>
											</td>
										</tr>
										<tr>
											<td>
												<label for="city">City</label>
												<?php echo $city; ?>
											</td>
											<td>
												<label for="state">State</label>
												<?php echo $state; ?>
											</td>
											<td>
												<label for="zipcode">Zip/Postal Code</label>
												<?php echo $zipcode; ?>
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
												<?php echo $cc_type; ?>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<label for="cc_number">Credit Card Number</label>
												<?php echo $cc_number; ?>
											</td>
										</tr>
										<tr>
											<td>
												<label for="cc_exp_date">Experation Date</label>
												<?php echo $cc_exp_date; ?>
											</td>
											<td>
												<label for="cc_cvv">Credit Card CCV</label>
												<?php echo $cc_cvv; ?>
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
												<label for="billing_address">Address</label>
												<?php echo $billing_address; ?>
											</td>
										</tr>
										<tr>
											<td colspan="3">
												<label for="billing_address2">Address 2 (Optional)</label>
												<?php echo $billing_address2; ?>
											</td>
										</tr>
										<tr>
											<td>
												<label for="billing_city">City</label>
												<?php echo $billing_city; ?>
											</td>
											<td>
												<label for="billing_state">State</label>
												<?php echo $billing_state; ?>
											</td>
											<td>
												<label for="billing_zipcode">Zip/Postal Code</label>
												<?php echo $billing_zipcode; ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</li>
					</ul><br/><br/>
				</div> <!-- End of short right left column -->
				<div class="right_column">
					<form>
						<ul class="payment_total">
							<li class="shipping_select">
								<span class="shipping_select_title">Select Shipping:</span>
								<select name="shipping_select">
									<option value="8">Standard Shipping (3-5 Business Days): $8.00</option>
									<option value="10">2 Day Shipping (2 Business Days): $10.00</option>
									<option value="13">Next Day Shipping (1 Business Days): $13.00</option>
								</select><br/>
							</li>
							<li class="total_calc">
								Subtotal: $<span class="sub_total"><?php echo $total_price; ?></span><br/>
								Shipping: $<span class="shipping_calc">8</span><br/>
							</li>
							<li class="full_total">
								Total Price: $<span><?php echo $total_price; ?></span>
							</li>
							<li>
								<input class="payment_review" type="submit" name="submit_review" value="Submit Payment"/>								
							</li>
						</ul>
					</form>
				</div> <!-- End of short right right_column -->
			</section>			
		</div> <!-- End of main right column -->
	</section>
</section>
<?php get_footer(); ?>