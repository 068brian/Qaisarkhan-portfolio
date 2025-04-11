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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'b9SGkfz&rlk;3vB7w?Zs@GN?!z_kf_ApWfUBZIh@EqhAdQ(D|&!4;o[JPRZ.Kca]' );
define( 'SECURE_AUTH_KEY',   'eJ=CkW. J63{Z1z[x$X`BlivaXH6.0Ci_%1E JDM(_e|oyW_N$OTG%g>pBbh5 k?' );
define( 'LOGGED_IN_KEY',     'PO_bdGc$S}wgr.uD05;hz8si;0=r<,;zhWIi=BW&^(ZpdZJ+P9&FkYr#9Z[(}8y/' );
define( 'NONCE_KEY',         'P3i5rwJ@lQ+}`YY;%](Lh^0#zN2s,lUxHR7og&EP%_ kdTq[aA`M:.BySkyt *ZG' );
define( 'AUTH_SALT',         'gM`q:%v6dS ?l8aU>(k`jQp~BG%bBBhY`S4!$b? G~~IRbVj].Y~>F g]bIRw^`S' );
define( 'SECURE_AUTH_SALT',  'Dz?npdDLWNo;w<hxc0&LX$0kT>?cl-uap21~k67;Yi=8j;$&bYl,2NAcNHM:1DD^' );
define( 'LOGGED_IN_SALT',    'jOPPXPL,ha=G-!Kj8/_inz/r|iaOcxBCl!QCV?<}k8Ho>cPOt0DNT589^|Nz1,;X' );
define( 'NONCE_SALT',        'Z3bi$X$Wt3lyD:}}WXxh<Y&kd}ZRjdNsL^p:%sOW%*)^1^Q:.ysCdBZUhD=*wXMy' );
define( 'WP_CACHE_KEY_SALT', '&0Qif|gEQMN$b/Ln_DY3RO$g,ZJ*[|/(O@9CWN|yV+zW:xc*Gq,g6OntkVdmb)nA' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
