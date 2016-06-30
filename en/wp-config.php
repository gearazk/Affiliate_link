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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'M`6wooNu)oGiTmE0DcTa(d%f#7rufbP3cJc?^cM=-YIQ%JejkdkWKC) DM/]3]L3');
define('SECURE_AUTH_KEY',  '<BK#2,c_B6C,62=L_opAyz1kj+.0gSuX=wYyv2h*P~-s+32m.!tOPx|hpF6+,G_f');
define('LOGGED_IN_KEY',    'R$^GZk/K$6rum>:k^_#[+R)[-uIQS,$)Drcxw=D%+ho5;a9C{6Hlx:]P#kxp/` E');
define('NONCE_KEY',        '>j(r7t1c_qC@T>PP(L8WUD=rFg8t4U.0E 3Y|Irhgj#eJ_B]DwlkICi6UD^0X%UZ');
define('AUTH_SALT',        'a>FGa=;YRY/Z9)KN!ks]_mxz(`+0(]g[Vh*C~=e2q{l@F%*do<G$V=M1UpB>`DIy');
define('SECURE_AUTH_SALT', 'L0j-kBS~|IJ=QO?Ef.w#mBtw$U9Otp[PO-(^.e.:N6QU4Xlq[.)gCSkJF&@X=lxo');
define('LOGGED_IN_SALT',   'Y6Ph/go*bN;wt[Wu(xY]qyDco%d$^9Y/o6gk5L d~WM/1/dT:C%59_l?A[r)1UWX');
define('NONCE_SALT',       '%!jCi?#DcF/ktOJ3B;+F7){WB3D+xth/=Q3.wfW2q0@lw|Ai9m4*[Y^A.xd{PN35');

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
