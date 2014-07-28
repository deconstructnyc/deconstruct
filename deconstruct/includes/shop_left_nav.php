<nav class="page_nav">
	<ul class="navigation" id="menu-menu-1">
		<li>
			<a href="<?php echo home_url(); ?>/shop/">Shop</a>
			<ul class="submenu">
				<?php wp_list_categories(array('taxonomy' => 'clothing_type', 'title_li' => "" )); ?>
			</ul>
		</li>
		<li><a href="<?php echo home_url(); ?>/pre-order/">Pre-Order</a></li>
		<li><a href="<?php echo home_url(); ?>/blog/">Blog</a></li>
		<li><a href="<?php echo home_url(); ?>/about-us/">About Us</a></li>
	</ul>
</nav>

<div class="designers_nav">
	<span class="left_nav_title">Designers</span>
	<ul class="designers_list">
		<?php wp_list_categories(array('taxonomy' => 'designers', 'title_li' => "")); ?> 
	</ul>
</div>