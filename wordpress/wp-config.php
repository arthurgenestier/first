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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'a11y' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd^4->PvDvnN6BQK}U1wacFI2hh_~ThK+(Y_Ehi(^pA]3z{w)cR93l|?9$CThP/T$' );
define( 'SECURE_AUTH_KEY',  '|oCD7,1rvE> ~2bX7!?i91%mw191_KZv*W/W8s2 h&0eZH)@1EWx3>4tu4@_;hAM' );
define( 'LOGGED_IN_KEY',    'g~ZfG{d@mddH{v}GQ>z>7}!YhaR[i91yKmP[#o}~0g]aS2Ee3upcL,_gk|W%XY:K' );
define( 'NONCE_KEY',        '[~kr{AO,QE$I^bPRoEuxQLI89QO``,zjLu^8g(L1Y}t})]Ud}! ~1V0x#l.Qj1T!' );
define( 'AUTH_SALT',        'LH.qgB_:b=p}Ah]lbS)g>[uF_20$RTqT7mv:q={hLO{XBaYl!Qo]q[_*kP3[H#zj' );
define( 'SECURE_AUTH_SALT', '!TXU3^}U $JXgx=;>a{*r}PGB~cItX`);Fq?3oN3xh|?xrW%&)KIhodWv1=Aopn^' );
define( 'LOGGED_IN_SALT',   'XC*?w}5ZAcUp@JM=4D<j*FU,}qmV3wXZZ1p5ND|oqXkEI]GOKpBgg{pNtE*@w4O&' );
define( 'NONCE_SALT',       '7UB?25#N:;FGO:I1/]JjSH,ncvOXa]p^Qs?kHU4FiL$?5_4Z+<9{$3jY~npLG!4:' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
