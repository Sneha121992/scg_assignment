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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'scg_assignment' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'gsUKSPZ2pH*rl,qUSD=LNM?LMi|Q@6!s&x#;zE^Y+U;G!s)%nAHWV;/K9^[1i{]?' );
define( 'SECURE_AUTH_KEY',  'Em}kYNs5:CnEgLZ(~!?7_B]XOK`TPf0pROf,Sfuj&6gY8TM|){QTmj>jX&9`r8du' );
define( 'LOGGED_IN_KEY',    '55,b<|xB-[$/_O=}yi.qg6-DRDU^1x5^y%_/ q5Y<N|sT/H,._q ))/h;(C34&>4' );
define( 'NONCE_KEY',        '@6|F2e[{hr~?Q$f!wr0*B]/l8Qp7[Yue>s3xB:RHJ[>CWBKK[XBjx#a95#s:|<LT' );
define( 'AUTH_SALT',        '`+OKuG91>fOK W!.G,g}9[<2X%]*GZ_Ue`-sP*JML@4:[d}EWo}>g.fMzAyI0iy9' );
define( 'SECURE_AUTH_SALT', ';SD@}=U0w_6*FpdRdXo^s6@.:jO`uxW~H4I6RAakppVMZ@8Io%7K^0o;EyN=Zo$-' );
define( 'LOGGED_IN_SALT',   'muC3VOD-lPuB%0[U<h<j0fS@  7$fc B*WSsy)ISL~iQx{*`Ijg4<@qCSr%HxTQZ' );
define( 'NONCE_SALT',       'L}S8I@OObWpQJY=pGflX?J:VBP b#=h1R?d.4C_L{o kpXqCHaTZj$0PS%.EfAD|' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/** Change Media Upload Directory */
define('UPLOADS', "files");

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
