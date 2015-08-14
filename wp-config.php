<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_koreconx1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '2Uy0k4sg>B.*j*zygi;9{3FJ~;pt&PJGC9uMkOttr8SJFGrL9U+Nh1*DWD``3i>k');
define('SECURE_AUTH_KEY',  'iez?m%++Fb2>^<3Z6I+RzXU8sKRfd3GGA{[y0MLEzdQR-[dAp4L.Q=ubL>|H8j%|');
define('LOGGED_IN_KEY',    'frutAlEAO>-Yg$KCvuvm+|&_JKQD%6%P*v.gm-6gOA2#&ck@c;ooY+Q=hh?eTlNY');
define('NONCE_KEY',        ';X1iGApr?Dn7y=v0QYnX, m6p)++b?7~G!(EF7fg&7A.hc.gsDpY)i$y8JD![+g3');
define('AUTH_SALT',        'wbF<-+IiPyWCB3)8q0Cm*07!t|9bYLH8#tUxa*z`pIR;<x<mPN@m0#_2HhoWa~h-');
define('SECURE_AUTH_SALT', 'GNVg/Y}n^i>1`T4|66GL&`ua?7EO.Q?||pvkwai_Wc-w^Q`X<1[DO^]dB9?`!@M|');
define('LOGGED_IN_SALT',   'lhLH#LfDi EiT<V4xPEL}]J8IVYeG|@-/5+T@,mNp|bS9A,9-MkulikotE}![OFx');
define('NONCE_SALT',       'FCaBp+h!Hx5I-Uv8sW[|mR6=PQ9}ufZ 0D>iy-dZTM0ft! uEfpW*oc#Zk4v3FO0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
