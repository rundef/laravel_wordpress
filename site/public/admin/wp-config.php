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
define('AUTH_KEY',         '@GJz0g/_MElaB[dG ?KBBytfOJYOQ5!}7O5Ut)7y=X{|-FXdFj@1L 0^qlD17aNd');
define('SECURE_AUTH_KEY',  'DJS`tm}cVl;!ckbI!<u3J.&#HC2)L+PF.y1eoy!9{Trf3-i0bC*V9) ;WBqzYn)T');
define('LOGGED_IN_KEY',    'b>uU04rnd>^-BOfxq2Y(< c8oG&)gt7@hKNyGhX8s:..c%*Du)Z RC,872b1jZAP');
define('NONCE_KEY',        'Kz!-OsgOIs!eO^$axh9v$_8HZX-]|9fl tys;rHv$:tOk*643~]u?/~pn1bC;uh-');
define('AUTH_SALT',        'z|s6>SNTk!%?1/dIX^WZ!E<Dw/wll-<F+w!1UK4_F3x ,vRvE7IqTNtyBf(,Bq,)');
define('SECURE_AUTH_SALT', '>$up^9Q]h$t[+iY|D$,n/hk4X,Qth3G-H`bo)_Vd%/8GoKMY}(frD+`A@6_c~lH#');
define('LOGGED_IN_SALT',   'l|4PF[tlM~BMU[EUe1_<QU]]!?&g+tTO,S}$-@IDk+*IS&xa=|aD^!@gA})&hd<C');
define('NONCE_SALT',       'I`~XWU?-=vWLvYb-c?L{P|dwaZ[EpWP8g^=&Vz+UcYNIu`lHL^DYr0,#XVQ~T7+0');

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
