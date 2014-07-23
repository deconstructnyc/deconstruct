<header>
	<div class="center_contain">
		<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.png"/></a></div>
		<nav>
			<?php wp_nav_menu(array('container' => 'ul', 'menu_class' => 'navigation')); ?>
		</nav>
		<div class="shopping_cart">
			<img class="shopping_img" src="<?php bloginfo('template_url') ?>/images/shopping_icon.png"/>
			<div class="shopping_count">0 items</div>
		</div>
	</div>
</header>