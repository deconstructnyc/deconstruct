		<footer>
			<div class="center_contain">
				<div class="footer_left">
					<ul class="footer_links">
						<li><a href="/contact-us/">Contact Us</a></li>
						<li><a href="/return-policy">Return Policy</a></li>
						<li><a href="/customer-service/">Customer Service</a></li>
					</ul>
					<ul class="footer_links">
						<li><a href="/privacy-policy/">Privacy Policy</a></li>
						<li><a href="/terms-conditions/">Terms &amp; Conditions</a></li>
					</ul>
				</div>
				<div class="footer_right">
					<div class="email_subscription">
						<h3>Email Subscription</h3>
						<?php echo do_shortcode('[contact-form-7 id="7" title="Subscription"]') ?>
					</div>
					<div class="footer_socialmedia">
						<ul>
							<?php if(have_rows("social_media", 13)): while(have_rows("social_media", 13)): the_row(); ?>
								<li><a href="<?php the_sub_field('social_link'); ?>" target="_blank"><img src="<?php the_sub_field('social_image'); ?>"/></a></li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
				</div>	
			</div>
			<div class="copyright">&copy; copyright 2014</div>
		</footer>
	</body>
</html>