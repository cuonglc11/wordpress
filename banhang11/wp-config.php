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
define( 'DB_NAME', 'hocw' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'M<Nf9t_xkZN0&Ym6(&I3)g:w19cUlY}^tjF]%LzYbZ(GsTs:TgC/`e+o771Ty:_D' );
define( 'SECURE_AUTH_KEY',  '<~8sJY(x>T*xjZjbn?gb2ge)[Y[?,[c8qt%V=rf(oUc@x}^#*{=d;zon*]266I T' );
define( 'LOGGED_IN_KEY',    'D}3zRw[zl^Wbn8(mE<Rk]s)V(~pqy9Fh2<)dg`cy+W}7 4yTTjSDyv]r4^4~(DO{' );
define( 'NONCE_KEY',        'osX?*lyR9$tr-VSGS2AuQdNl_i#ucd*/wQ=w7$u*+J+A<<#IuSX5d}*rs^n9Y.AE' );
define( 'AUTH_SALT',        'BOgS_NrcK/1IpMc<lp!X@vD6+Ep%#jQ2AK}F|MD>9UcM~N,o9GQ^mFRtzAk~<W.N' );
define( 'SECURE_AUTH_SALT', '5Q^A%6HuU-X{{mf}8FCBma;.jn->IbSQ=812y=lzzf4xE/I(@d`VI]_pvtFm(r+R' );
define( 'LOGGED_IN_SALT',   '[D!~|sh[zi(N~k0>hD@W%Pj!1=b6_}>&vQ<ON$}#ks%:n3bp00S1E%`Ii>*R9c5=' );
define( 'NONCE_SALT',       'Vqq UIi2lpL2i4Z$OYC$$3Alx=Rp5D75cSeLF}Q&6H3<%djZKI!R+WEPW#dp,r4_' );

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
