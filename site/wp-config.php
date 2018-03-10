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
define('DB_NAME', 'abbeymill');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

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
define('AUTH_KEY',         'a7`KH}Y[X(y!C|e7bqS;u83aymSl0#$cJj6;H;=!+:I5:[7+yjI-2q(-#2>&)~zM');
define('SECURE_AUTH_KEY',  ':t8vMDAVPnc0TE.:C7h(`9.3wTu`O&{?pd~BJ5WEk!ww;3mh][VC7L?Y&2du>eE7');
define('LOGGED_IN_KEY',    '3Z(@=A/c.UqYZz)yRTs!vXE3 =o$4y|ack*Q56|(ec|*<<Yi.`r]1lgNn&G/N.o~');
define('NONCE_KEY',        'iui6^H+HU5Z--E!jh+P`wS8O#^169&$E7rcGTEf|(LJQr}0;!YfrtDNIj>GBe*2 ');
define('AUTH_SALT',        '%F~drxea</Ps2.p34%unIDO^XD-aY_a5Tc>,3NxDxnK[4W)#f><x>S,cCat.zHz0');
define('SECURE_AUTH_SALT', '(NdyAA=?^0WO?[Z)]`fz$$+<%#j/1cGiUa-:xEl5Yra[xpKf&Jf}~FdPx<q;1ui#');
define('LOGGED_IN_SALT',   '-_~O9g_UG}l*KO^-^5wj}13~LieJw87P#$B]MJgx3ktj$$1/V8k:bc`pB56PlPuZ');
define('NONCE_SALT',       'H)js=:sym9q98U;L-/%|6u6PK2 r;Ld S-]K/EM6zb0]3}y/TV+o*?Y2![Nj7,74');

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