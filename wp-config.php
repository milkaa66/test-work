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
define('DB_NAME', 'wp');

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
define('AUTH_KEY',         '4?bra5[O)bFq ]e/<f?gwL$sTD^KB,ln2^&-~2-Y.XqjrGKro:<=p*xd/k,6%Z/S');
define('SECURE_AUTH_KEY',  '=%<$ j<BE>uE0Sk.D&-KoXQsSW.LKr>j- |S6~]H, W)ds>=f<FEwYY_cf:BLwQ`');
define('LOGGED_IN_KEY',    'v3rCO>>Nk:$Vdv=/g_h3uFF5~~iJ mieLI;>vjuK:l}l<:vlj.`f_M89sv1GPM]O');
define('NONCE_KEY',        'BRFxed._)`$()AZ)z3wQpzxlu[gqOO:$`R^Sdf^-.ldx7#I#XL%0;`)XWB/^L2t@');
define('AUTH_SALT',        'zf/zRyDOE.IBAp0C`S@c>emq:g-e8?02PYGTlX/GU{,M:LMku; eOV6 &-`eS[A_');
define('SECURE_AUTH_SALT', '5ks&8Ot#^ZGZb0+|d~ddW(cCO;{,&q~azD#y$VoN7B?W<py/lZBlLG4M9*,V/n<r');
define('LOGGED_IN_SALT',   'HLJtstr#KLq{=Jqhk> %zt@Al7c%2w(6q[H(0R}SW4{^J5C@28WYb*SikJ|J{-f*');
define('NONCE_SALT',       'hBO0(o/H/vUqsBE(^7eem}iHuh/9IUex{4g04Q2&-^1@YS3?tcV1Du5=8K:ubn,d');

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
