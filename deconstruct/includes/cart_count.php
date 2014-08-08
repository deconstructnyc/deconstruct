<?php
	if(isset($_POST['item_delete'])){
		$delete_id = $_POST['delete_id'];
		unset($_SESSION['products'][$delete_id]);
	}
	if(isset($_POST['product_id'])){
		$product_id = $_POST['product_id'];
		$product_color = $_POST['product_color'];
		$product_size = $_POST['product_size'];

		$session_post = get_post($product_id);
		$product_title = $session_post->post_title;
		$product_price = get_field('product_price', $product_id);

		$product = array("id"=>$product_id, "color"=>$product_color, 'size'=>$product_size);

		//unset($_SESSION["products"]);

		$_SESSION["products"][] = $product;
	}

	function cart_show(){
		if(isset($_SESSION["products"]) && count($_SESSION['products']) > 0): ?>
			<?php foreach ($_SESSION['products'] as $products => $product): ?>
				<li>
					<span class="delete_cart_item">
						<form action="" method="post">
							<input type="hidden" name="delete_id" value="<?php echo $products; ?>">
							<input type="submit" name="item_delete" value="X"/>
						</form>
					</span>
					<ul class="cart_items">
						<?php if(have_rows('products', $product['id'])): while(have_rows('products', $product['id'])): the_row(); ?>
							<?php if(get_sub_field('product_color') == $product['color']): ?>
								<li class="cart_item_image">
									<a href="<?php echo home_url(); echo '/?p=' . $product[id] . '&c=' . $product['color']; ?>"><img src="<?php echo get_sub_field('product_image')['sizes']['medium']; ?>"/>
										<?php if(get_sub_field('product_availability') == "Pre-Order"): ?>
											<div class="cart_preorder">Pre-Order</div>
										<?php endif; ?>
									</a>
								</li>
								<li class="cart_item_info">
									<strong><?php $terms = get_the_terms($product['id'], "designers"); foreach($terms as $term ){echo $term->name;} ?></strong><br/>	
									<?php $post = get_post($product['id']) ?>
									<?php echo $post->post_title; ?><br/>
									<div class="item_subs">
										Color: <?php echo $product['color'] ?><br/>
										Size: <?php echo $product['size'] ?>
									</div>
								</li>
								<li class="cart_item_price">									
									$<?php the_field('product_price', $product['id']); ?>
								</li>
							<?php endif; ?>
						<?php endwhile; endif; ?>
					</ul>					
				</li>
			<?php endforeach ?>			
		<?php else: ?>
			<li class="empty_cart">There are no items in your cart</li>
		<?php endif;

	}
?>