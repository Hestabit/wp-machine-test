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
define( 'DB_NAME', 'demo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '6>4+E;<E.[B+k9k,:4431.Y=um;py*~X,N&HPf?L`5sA1:lVtR^s1zbx)d_&{`DW' );
define( 'SECURE_AUTH_KEY',  '6] [8VU7eCXJ~:3ekq2/8m[/Q&`q).+ynnD4z! $yP:y.G[Q}0gKWY||<@KCCDA*' );
define( 'LOGGED_IN_KEY',    '*S@O2B&dq>uC/Q+cvG|}`L;%tW{$#3Kl1;`lVCZPk{kdI+W1g`@/)931jxGgsf[c' );
define( 'NONCE_KEY',        '4*Z5~GUzylEe*DEJ.<J{2w.jmUN/v ^uj{`Sr)6jxLK;K}_YTtw2_ll6FqHZ 6/z' );
define( 'AUTH_SALT',        'hX]Ub~pTzB?Ds1pU8&(Thi:Md}0X2DX6hxxe55jrv~5$pg6aKs8Jde[# |5+^H}y' );
define( 'SECURE_AUTH_SALT', '>deK[3UJy(V2:!nr<*D|h{r4Pjj9Hk/y)|f KUd!tefCn]t7G`d_311JedPE| rx' );
define( 'LOGGED_IN_SALT',   'Xn3;Rx~dZZEFNSWipUo[.Wo0Z${/<+lPHI!j)j J[2v3f+]Ea1z5h65^k>+c1Q$]' );
define( 'NONCE_SALT',       'Kg i.>De3I=Z;x^.at0R[SR>>g&aE@YGn&q;-v.gbfmlth[`c!Cu!/h/0XH&6`dx' );

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
