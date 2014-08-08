<?php
	function product_list(){ ?>
		<li>
			<a href="<?php the_permalink(); ?>?c=<?php the_sub_field('product_color'); ?>">
				<?php if(get_sub_field('product_availability') == "Pre-Order"): ?>
					<div class="product_message">Pre Order</div>
				<?php endif; ?>
				<div class="product_image">
					<?php if(get_sub_field('product_gallery')): ?>
					<div class="flip_container">
						<div class="flip_card">
							<section class="front_flip">
								<img src="<?php echo get_sub_field('product_image')['url'];?>"/>
							</section>
							<section class="back_flip">
								<?php
									$rows = get_sub_field('product_gallery'); // get all the rows
									$first_row = $rows[0]; // get the first row
									$first_row_image = $first_row['gallery_image'];
								?>
								<img width="252px" height="325px" src="<?php echo $first_row_image; ?>">								
							</section>
						</div>
					</div>
					<?php else: ?>
						<img src="<?php echo get_sub_field('product_image')['url'];?>"/>
					<?php endif; ?>
				</div> <!-- End of product_image -->
				<div class="product_info">
					<span class="product_designer"><?php $terms = get_the_terms(get_the_id(), "designers"); foreach($terms as $term ){echo $term->name;} ?></span>
					<span class="product_name"><?php the_title(); ?> - <?php the_sub_field('product_color'); ?></span>
					<span class="product_price">$<?php the_field('product_price'); ?>.00</span>
				</div>		
			</a>
		</li>
	<?php }



?>