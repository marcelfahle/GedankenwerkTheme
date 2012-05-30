<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  
 *
 * @package WordPress
 * @subpackage Gedankenwerk.com
 * @since Gedankenwerk.com 1.0
 */
?>
		
		
		</div>
		<p id="copyright">© 2011 Gedankenwerk</p>
		
		
	</div>



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/flowplayer-3.2.4.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/flowplayer.ipad-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scrollable.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scrollable.autoscroll.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/gedankenwerkcom.js"></script>
</body>
</html>
