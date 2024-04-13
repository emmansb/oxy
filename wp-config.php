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
define( 'AUTH_KEY',         '3oG.CPx4&oIM5[6*`lq-(30/FJLk-{F)iSt,!3ONqL*t;l#% o]wL``FVJ[./C!v' );
define( 'SECURE_AUTH_KEY',  'Y+l$8Dlw?L&(qFmT{,Sh3x-;E4J!Dn^lYd4HUo0)8QI3#H(gS,+a)yT$A]|jR3#(' );
define( 'LOGGED_IN_KEY',    'Oa%K@@s8B$8WdjK4&A<={+svb(mr|N,a6^{hn!So9/]2,sPAG^5N$HTqCm!22Fv]' );
define( 'NONCE_KEY',        '{s/;mTGcvQ2h>Wzr].tcxNoo:;}]o7|uc3(; Yp)F}eq RT@]H{Y#MT7YAwYiSse' );
define( 'AUTH_SALT',        '.UjO+]lH<#3*7MQQ*3:V0k_Gk#R{a== c+H=Z?^E*J@d!{+R93jh.dMPeZ;q>_xE' );
define( 'SECURE_AUTH_SALT', 'J#^N56|CVpX BE{aan$^}ha FBGE$SoN6!yp1b6ZIP: p%)xzwm0qyZ@)7CL9~dC' );
define( 'LOGGED_IN_SALT',   'LRBZx:w(Z7>,;TohT=2-!HckbUY3C>UC~DgY{+A@)DIS#b4rYPrqy5!&L f9h<#L' );
define( 'NONCE_SALT',       '<.&%qsW,IO| $.#Qv0ZTv2Lu4uiL=H4Ucp{*0qtdEKO(p.56p_O]<|4?;/7L[EaG' );

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
