<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'database' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's&}71aruFFXxlte#Rf9Inw~*=R=APK78#}82FYn$n$1jL9 JvV}lVbv [{w[N^Se' );
define( 'SECURE_AUTH_KEY',  'fdX=.PF=n&4J_5s(?+%<@`n|m=]VhBy0j%Fx|L&cO,Vo/@JUCwJfXiOof;A4Y[}H' );
define( 'LOGGED_IN_KEY',    's[.~qq` i,pOt|pOS*yY%7)*te9>kD]_vieI*:hKL^gPFv4b|]{0&A8[A5W==XZo' );
define( 'NONCE_KEY',        ';XdH>$N,[BKL$1nU>h*|,K0]kkO?w_1L*<Osr8P1U`,)l0hNxBO7_Q[.7kt2]j69' );
define( 'AUTH_SALT',        'ZRS(?8 $!ZvS>^7A7[n/G(Mw#$1op2H%^SrLJeW;+0z!1#8xV|~Lvp6fF5@/GHRO' );
define( 'SECURE_AUTH_SALT', 'iitYbhIYDX*2dLwKZ_g+QY4C>}Z$:!VWuzfjkK}_~nSsUBxQ^sp$Xoq/PMh<0#;a' );
define( 'LOGGED_IN_SALT',   'GiA)%x;^6kx~l+/Zii4~qW?,<{?GiLIjM=ow%9<zfJSii%h7u{;Mw!aXiaD%]X4,' );
define( 'NONCE_SALT',       '<~cXq]EuV~V{_0]%3:HR2XgY)H5yzu*xNb(#VGOEe e<*HQS<zV{50Faf^0$v.di' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
