<?php
/**
 * Theme Footer Widget Template
 * @package themeim
 * @since 1.0.0
 */

if (!is_active_sidebar('footer-widget')){
	return;
}
?>
<div class="footer-top padding-top-80 padding-bottom-65">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar('footer-widget');?>
		</div>
	</div>
</div>