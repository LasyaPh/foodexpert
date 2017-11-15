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
define('DB_NAME', 'food_expert');

/** MySQL database username */
define('DB_USER', 'food_expert');

/** MySQL database password */
define('DB_PASSWORD', 'food_expert1');

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
define('AUTH_KEY',         'PF:yGR4hDvr3dWN_O%KHKYAJGG]+~*/ERM_]+b#i>9e~)IiYj1i}0Ne=~@Dl&ry-');
define('SECURE_AUTH_KEY',  'x?rMhJG{uIC5.GA9oOVH4rHXCbt%E^{+BRWXDes-f+EAn~n @)t,W3?jB^TR#vo:');
define('LOGGED_IN_KEY',    'WT5I{CYC_q1x,aVX%*f#M{(`3d<>U=f8X_HS^U`Myco/5sCUoA8<g:;2:%K mHct');
define('NONCE_KEY',        '$DH??6ON^J1L-C#swX8pAHZ1mrRVMd&&(C8MjtVRRF{O;0oHn_,N^*% J : l%eg');
define('AUTH_SALT',        '^B- }vh3Q_?e9}g~DhWkTBdXhn0_fY{{e?hl[U_N]B8nJIW,%>_a}*MEi`*5>q|^');
define('SECURE_AUTH_SALT', '3$yz]Tq1X6Zs*ST+<lURku~yJ9D.H<<bpN8D/R#xLnrHyxT$: Or()._;;C{EQ^u');
define('LOGGED_IN_SALT',   'RIPxH,y>|M*Ytwzr1~%a]TFkY~?KIz9<eaBrnWzP4SG>z3tP=VVJ%9UqS`TzINa|');
define('NONCE_SALT',       '}w>^Tlr}|&H;e!JMi`cU6/RRo1YdL%IZULYe,*zeQQD+Glt]8x:h/,WBPsa9Hmpk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fe_';

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
