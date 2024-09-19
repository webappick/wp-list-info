<?php

// Load WordPress
require '/Users/webappick-imac-m1-pc1/Sites/ctxfeed/wp-load.php';

// Load WooCommerce (if applicable)
if ( ! class_exists( 'WooCommerce' ) ) {
	require '/Users/webappick-imac-m1-pc1/Sites/ctxfeed/wp-content/plugins/woocommerce/woocommerce.php';
}

// Additional setup or autoload if necessary