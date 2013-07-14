		<div id="footer">
			<div id="footer-content">
			<?php if (get_option(THEME_PREFIX . "footer_text")) : ?>
				<p><?php echo get_option(THEME_PREFIX . "footer_text"); ?></p>
			<?php else : ?>
				<p>Site Designed by <a href="http://www.press75.com/" title="Press75.com" >Press75.com</a> &amp; Powered by <a href="http://www.wordpress.org/" target="_blank" title="WordPress.org">WordPress</a></p>
			<?php endif; ?>
			</div>
						
			<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
		</div> <!-- footer -->
		</duv> <!-- Wrapper child -->
		</div> <!-- Wrapper parent -->
	</div> <!-- content -->
	
	<?php wp_footer(); ?>
	
	<!-- enable google analytics -->
	<?php echo get_option(THEME_PREFIX . "analytics_code"); ?>
</body>
</html>