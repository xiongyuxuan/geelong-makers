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
define('DB_USER', 'guest');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'bi5^MN-6IA8@k(iV/091xWhrsiTrwp~F69Hi&*P&YEQ)?Mfi`F19zmn*cRE*!<6h');
define('SECURE_AUTH_KEY',  '|^^Ln*YpcYRR.=zwhTRiT!goeuT%e9ML%(EAV9#+p5uGLBRTQGGZ=CWX0;dlqZs/');
define('LOGGED_IN_KEY',    '8npGD6~]B UulYm`>4k`G(sNJT[@sWIQI./%dN[<b/y*>W%AS%3<+`+soWVbbA`,');
define('NONCE_KEY',        'MOd]HPKJ39VpxY.SdOG_T]oAR(x9NiE4KxhyDEA[/u`W>:!w^2@I-$[cw(lz0#ad');
define('AUTH_SALT',        'SoC]W6NWu (NSqA97_};} Si~HD^p/gBLbR@*`/a$py5r_9,~!Hn=dhWPiX!cyt>');
define('SECURE_AUTH_SALT', 'n8^L];b4@eM.m2uz_W$jPg!e8*aT>u)V@3yY_2Iy~3|$}NWN$D4K[7 $AO!KT<Pr');
define('LOGGED_IN_SALT',   'TFEW3bjrG*}Nh;VD- YHhCcm<CC{fFGL}$HEg0mvqr49*);ZVE7$ Z`FhtSX~Qp5');
define('NONCE_SALT',       'J80CYLw,%C`[H1V&Xr9Nr40#ON`QTK*boIX~R{Vs?.=ps3)6L:8[IgN87,?~y$iL');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sit374';

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

define( 'JETPACK_DEV_DEBUG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
