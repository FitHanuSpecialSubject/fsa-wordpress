<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'YXMv[/$)8^{eR|e8Ac0WY&JkXWpn!}RgD_!c-EuT`z<+[bZ%>q(mBj][84-Wo@23' );
define( 'SECURE_AUTH_KEY',  'I%Ec2.iW&*@pnBXHEWU)HmWg50l$Gg3wr<66CG5hNF.U 5<rArje:3@@{!;Zbq0M' );
define( 'LOGGED_IN_KEY',    'XL?Tedas|XBOUC5<sC6jFs46X/>brHdA6OD$0>zZH}Pl@(c,i`CJ2z?;oB6+IZq3' );
define( 'NONCE_KEY',        'vrR@SI};!Q6d5uxYN?y i}] jm4^yF{&1VhwZVEkA)Kx_~FE6Qx*ct9+$~Tr3=JC' );
define( 'AUTH_SALT',        'iLt^3NruVUUw.yks VR3uSwAY$=UuVhmxet{RC!lZcx&5$!9/,#3IE#V:2/UhW(d' );
define( 'SECURE_AUTH_SALT', 'El)w&/AUqvo}@S{-Kf]lGjLHbEIf}0pFu[_BU5Rzk5SV,%|B+(u/ZL]i#:*}*MJ*' );
define( 'LOGGED_IN_SALT',   '68$P9o 2?X/ii4@~]$jSAk|fiXlkJ9$_MZL|.W2]4}Y1lAnY Zzld(S YxKKp$~A' );
define( 'NONCE_SALT',       'J$,W=acjl(}]V2lE46gt)/e?<yCbT]DvJr8`@7PwSnfR tc3K+h&|&_5PA0/Y%CL' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
