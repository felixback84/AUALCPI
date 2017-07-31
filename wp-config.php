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
define('DB_NAME', 'aualcpi');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'O,zU}g/i{h#{(c:3.J=yh?4vZqW X~/2NHQyI*R d$#RYTM+k|kfyN2z`4I@nn U');
define('SECURE_AUTH_KEY',  '(l]PqlihWp?3Vs~o$E%F3#s5k->ZkUo7[7fF]ccm`lZiUUc|J w0PN&n0a%NzsqM');
define('LOGGED_IN_KEY',    '4=Lpf$l}W6tzloSl~D;qL_d Mh.yr6tR}p?FeuZX5<P{lF)qCP]`)mQx-|@Bfoo)');
define('NONCE_KEY',        'sh3;GlF91*RfM`.>|L@34TAuP+yKT52j9t*Z~TE?J*a#vTB8e]IzxjpTo-Uha0l[');
define('AUTH_SALT',        '!.|ip8rw}5>j*XZ!T]5pacFkh{vjt}]y%y,D4EUb=ZJn`$xzkV&l]r8/3W71m&gk');
define('SECURE_AUTH_SALT', '>{Cr2.]0m$qpjEW84&KE@]+IllCEslOL7I781[)GMFA_RRS.z,1iS}_a`ojLR-,L');
define('LOGGED_IN_SALT',   'P:v1iUE,k>V=Y2>z%53gr>`NgP>sc^XCN ?@i6t_PKut7i;`*/1bCm c[C+SvO} ');
define('NONCE_SALT',       '[+,@&2Jj}ZjaO8E15O2&fI(p1+mZt0.9l1O;,yuqEL9NJYlb`El.gv!N-d~fLvO|');

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
