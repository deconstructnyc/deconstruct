<?php
	function product_list(){ ?>
		<li class="flip_image">
			<div class="flip_container">
				<div class="flip_card">
					<section class="front_flip">
						<a href="<?php the_permalink(); ?>?c=<?php the_sub_field('product_color'); ?>">
							<?php if(get_sub_field('product_availability') == "Pre-Order"): ?>
								<div class="product_message">Pre Order</div>
							<?php endif; ?>
							<div class="product_image"><img src="<?php the_sub_field('product_image'); ?>"></div>
							<div class="product_info">
								<span class="product_designer"><?php $terms = get_the_terms(get_the_id(), "designers"); foreach($terms as $term ){echo $term->name;} ?></span>
								<span class="product_name"><?php the_title(); ?> - <?php the_sub_field('product_color'); ?></span>
								<span class="product_price">$<?php the_field('product_price'); ?>.00</span>
							</div>
						</a>
					</section>
					<section class="back_flip">
						<a href="<?php the_permalink(); ?>?c=<?php the_sub_field('product_color'); ?>">
							<?php if(get_sub_field('product_availability') == "Pre-Order"): ?>
								<div class="product_message">Pre Order</div>
							<?php endif; ?>
							<div class="product_image"><img src="<?php the_sub_field('product_image'); ?>"></div>
							<div class="product_info">
								<span class="product_designer"><?php $terms = get_the_terms(get_the_id(), "designers"); foreach($terms as $term ){echo $term->name;} ?></span>
								<span class="product_name"><?php the_title(); ?> - <?php the_sub_field('product_color'); ?></span>
								<span class="product_price">$<?php the_field('product_price'); ?>.00</span>
							</div>
						</a>
					</section>
				</div>
			</div>			
		</li>
	<?php }



?>