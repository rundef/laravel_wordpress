<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'laravel_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ih]hl||Dw|nRVg^mKnfC{u`h^{gnE]-H;l[^RD)p=f,Cjn^lda#`60;}FPe+yuuF');
define('SECURE_AUTH_KEY',  '[vLzQ[`d-^dNuW Zrm3,|dF+Rbhd=Zo,h&&oy>D[Cj]|{s|1ngU6%k*zi(OgJvjI');
define('LOGGED_IN_KEY',    'Emfx<9nwx<~Z%-t;^a_w{(RHc#C*HwCA#d| i)R^m1U/uz[WG$uMO|eek9Sf+l&-');
define('NONCE_KEY',        '}V/L98]qE+d0)vIU9+wZ4]+:jY/Re.|bvjPpqq4k|L*l^% )CwzW8N<:cez<eUPb');
define('AUTH_SALT',        '7<ynh;Q<$ N.T^}GaOwDqO6Xmd/?jQMH|4n7BvIfaujs2 )2V+r{ `83A2#=ZC7e');
define('SECURE_AUTH_SALT', 'f2vya^MapE-HXJs:.<+RyCpmgk2bHVqh+}/vly0j:]x` ]!Ox}&0E2)SbJJpMp{|');
define('LOGGED_IN_SALT',   '-I=;nT1&be8UBvo|1Los&Z~^/ -U_n?RhJl6!LG76h5Cok+O3HI=Gj5`G~b+W= m');
define('NONCE_SALT',       'R_7p`F,q`UvS`tw)x}+Q>nh&Xt/pa_~y~,(KC^brp4J_lfYno3A~mDs4ke+fj3FL');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
