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
define('DB_NAME', 'wp_horeihoon');

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
define('AUTH_KEY',         'xB75e:(tc6D4./_~/tF@pqi7oIc%EWMONR`YFYDliI2Z)(Q;1 $Hc?o:E6G}FOMQ');
define('SECURE_AUTH_KEY',  '~uS]m;`L;noLag,=@k`KB98r(FN unAv*}|6/G7!^E$/AAP=?]A_av#l4[0u}>Y;');
define('LOGGED_IN_KEY',    '+[=<F$lKKc;2H8Q{#_SCs0,mJl#{-oCZVdr/{M!VDKSH8o3rhTkfATk&$O,WiU(V');
define('NONCE_KEY',        'u/@1[&cn/1rzppsts|,-S57x,OJ?FbPY~)0&#$]7}b]d>>HzO39J_7;>Qb#&wLvv');
define('AUTH_SALT',        ')`ed;gEw&tyl#QrUtO*eJ]F*$j/0U>?#Zm/&O;^$X#XI:u+`ivFE^:AT.vBIv6QT');
define('SECURE_AUTH_SALT', ');?ga q{FuaJ*HkDWkHsY@2hS*#-ki;%!Y<?DShF)Q}9z*co0EP/v0c?1JZ;c*7#');
define('LOGGED_IN_SALT',   '9t1)Fc{*(u-!h5,XZd54s]#g+5Ms p.eamt6^KJjW.aW[:u wYvrxj=b.L|&7:R{');
define('NONCE_SALT',       '-+z_|KLwxy_e-?xJ[k2$h-)n] sSU~_s0@G6`Iu1:cHj|,`Mg-`?oH[1I)#&3eA+');

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
