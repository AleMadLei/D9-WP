<?php
$dir = dirname(__FILE__);
if (file_exists($dir . '/wp-config.local.php')) {
  require $dir . '/wp-config.local.php';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
