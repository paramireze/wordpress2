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
define('DB_NAME', 'wordpresstest');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'M8wCnuRmY{Q,Zvhh4Vja)E(`j9gAr(P~z~)E8Acpve_RhKG4W(>,@=,n}Stz|{D)');
define('SECURE_AUTH_KEY',  'swuJ9Yk|@[]%A|l5#v*MHzVV>[_3*Oe}i%M{S,j0I^gkJ/<(xrjtyf5F_ 6Hj~J^');
define('LOGGED_IN_KEY',    'keLpZh_fR*(pWEOyE.<l^Qz_.4uNjZ<,z?,~s>2`k@2E$m1-3(/qR6*E(Dep:0H.');
define('NONCE_KEY',        'dN2`:<H>|4dyr9yN0_h<1fxJC5w^m[r(=qS;7z*Idqawr~[XI|e0RW-CyMhIY`(k');
define('AUTH_SALT',        'f^2pO9?dCJdNPcnV^0VM:y~_BG8NEH8K**r^nyw%$7D986pRj@1.~1Y.N~uISj]v');
define('SECURE_AUTH_SALT', ')S*.v)[)I6L]C3>c;m0?aTEgat2zpMCji$A7xSzT/JR&Y6E[85SyI13aXOwt<!Mv');
define('LOGGED_IN_SALT',   'K70Pv</AI{96/F<@xH_6fU!`g?1,%G~rJ30H][-GyfN kbcjxU7y>wIGKn60zBG/');
define('NONCE_SALT',       '&`LOsO7,xro|[>v<5`[1RFu430>|7Fp[NKpXTpd3gocBXF_t+h%QT/dDTE=*PU;y');

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
