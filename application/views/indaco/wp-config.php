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
define('DB_NAME', 'bdweb_qforsale');

/** MySQL database username */
define('DB_USER', 'bdweb');

/** MySQL database password */
define('DB_PASSWORD', 'X4L2hXRAiApR');

/** MySQL hostname */
define('DB_HOST', 'local_db');

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
define('AUTH_KEY',         'YdaBM5v~V1DO}>A8:C[.FQA)Y4RudK-6:pEmMg65@t@Ehg.b&Px!Y&o/W=t$(AF(');
define('SECURE_AUTH_KEY',  'H!pFq|T`j?FBa0>;YYs}$XQ6@RK?>5WtoQJK}vEmm@yq-3OU2[W,zy[Yn[b|~]?d');
define('LOGGED_IN_KEY',    '##0 -b?=M]aje2H5j<L%!<_W71&)v}@2GM?du]@+lIH@[;C>NuLjy%FcdgyvlCCC');
define('NONCE_KEY',        ')o-4=EM7_>JvTJCcC^XCN[3t<q~ 6y)QLN@&~|e5-5urRVkO$Zhn,xgm|h/WDxGs');
define('AUTH_SALT',        'kBX}5Fk][8[{-G%}b%;z!Ey_B~0g0X6#5N$Ai|::LoVKHF}I~jkd0:HXZ6uDU.#r');
define('SECURE_AUTH_SALT', 'YZM)ww#4|:`a#1o8&`r03B N//:xrkza0nA`1%BmhcJL[u@ESu5bXq!8NmT,9lRO');
define('LOGGED_IN_SALT',   '{`v9{Jz4azhGa>-)V`3@6,V1hB-o%1=0Jvqq|xUCm3-x[--N.rNflMZs>< ^3e.s');
define('NONCE_SALT',       'hpY23(#YEZ~G-/>}6>46]ZQqEUk-PZKzhy=I*V_Alg0FQEY.N$]/Oz[Ysv]%R[mz');

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
