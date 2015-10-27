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
define('DB_NAME', 'a56rmgri_crm');

/** MySQL database username */
define('DB_USER', 'a56rmgri_wellier');

/** MySQL database password */
define('DB_PASSWORD', 'a;a;1987');

/** MySQL hostname */
define('DB_HOST', '103.224.22.13');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '~TOd?dI!&d&VcBh1p1Sb@FHAjB|HV-f5U3E<B8F)-{bAmMeirQ`P7=lzRz%(z+50');
define('SECURE_AUTH_KEY',  '#V`oZ|=O/CaY0+pf2&s{Qz|#@2C-Q|[T/Q;70=-/|a(u +:?_-T|kS-LI).T-)#j');
define('LOGGED_IN_KEY',    'mrx?I6i2&_rhRK s;#F#-OT%4rp34C<d$%5-B2m3wt<-~?+NJnqFo^~!R(sR|*fj');
define('NONCE_KEY',        'j}Ok{N/;-elP~1*/|@Z ZTta@[@~MUOe[M.n0lc;m[.-qYklq/0HAwwV>Tv3+[)X');
define('AUTH_SALT',        '5e$$p-Az9m88Y~+a$ h ?h&6`jn$Fg0RdD]zTa[5q8o|ZY(ei=-b|inKFD1|]1hn');
define('SECURE_AUTH_SALT', 'GVCo[maIzM+ A=?[ZUI813>rd)}>Di}-e:%Wr-Tj(ts+*&cZ,IY|$d4:a7V)Vmf?');
define('LOGGED_IN_SALT',   '1VY:3BhW{r+/1Thg#C?wd7E|&j$?sHqL2TC-xxrsoe@GF[eb$HUjXl*37*h+5St+');
define('NONCE_SALT',       't_>(u5>R*d+*[_]-M1iQ$89A:FtP5SR+EhQ1KCwY]XebSdA@NGvEKu,p=`va-r&=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'crm_';

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
define('WP_DEBUG', true);
define('WP_ALLOW_REPAIR', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
