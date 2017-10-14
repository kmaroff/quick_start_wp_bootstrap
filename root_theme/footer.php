	</div>
		</div>
			</div>
	<!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'your_theme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'your_theme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'your_theme' ), 'your_theme', '<a href="https://automattic.com/" rel="designer">Artem Komarov</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->
	<div class="hidden"></div>


<?php wp_footer(); ?>
	<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/libs/html5shiv/es5-shim.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/libs/html5shiv/html5shiv.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/libs/html5shiv/html5shiv-printshiv.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/libs/respond/respond.min.js"></script>
<![endif]-->
</body>
</html>
