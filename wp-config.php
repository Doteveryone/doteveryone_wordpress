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


switch($_SERVER['SERVER_NAME']) {
    case 'dev.doteveryone.org.uk':
        define('WP_HOME','http://dev.doteveryone.org.uk');
        define('WP_SITEURL','http://dev.doteveryone.org.uk');
        /** The name of the database for WordPress */
        define( 'DB_NAME', 'doteveryone' );
        /** MySQL database username */
        define( 'DB_USER', 'root' );
        /** MySQL database password */
        define( 'DB_PASSWORD', 'password' );
        /** MySQL hostname */
        define( 'DB_HOST', '127.0.0.1' );
        /** Database Charset to use in creating database tables. */
        // define( 'DB_CHARSET', 'utf8' );
    break;          
    default:
      /** The name of the database for WordPress */
      define( 'DB_NAME', 'doteveryone' );
      /** MySQL database username */
      define( 'DB_USER', 'doteveryone' );
      /** MySQL database password */
      define( 'DB_PASSWORD', '02SOreqpM6h2' );
      /** MySQL hostname */
      define( 'DB_HOST', 'localhost' );
      /** Database Charset to use in creating database tables. */
      // define( 'DB_CHARSET', 'utf8' );
    break;
}
/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8dEVy1}r+Bv~uX<P(~/J0V}1EgAe;-g!4dX(?9Dd5k^T,`^tHf?sm&^OJsA+jO||');
define('SECURE_AUTH_KEY',  'jgn4J_ibx[xE,!ZG3H><B-sL:0+hD@[tbXUt! gJY!3M*a0R]G>:k$qw#25ap?vD');
define('LOGGED_IN_KEY',    'n--O]KWRF*E;[z^h[:sG +)gSp9VF{y>4z,IQ ?<^+W9sJvU^KD0j,/,L9!9>*V}');
define('NONCE_KEY',        '3mo{DvYB7T#oH6@7mz,1Vn6CbN[uxv{g:nR*jlqL%8i}(t=#I{gg|=c|JWO-qzN@');
define('AUTH_SALT',        '*@~y]ce|+LQ$tiaaYc:x.ABkX?/kH0!NW)TTakuAVE 7^h|4v*nhte# clg,lbH@');
define('SECURE_AUTH_SALT', 'DY+uMJ2E$-|OB9zIAI%|fD3cQvOjPQJF|}g0_7KhhUH70kCn1kr|yj6`Hi4,n+!)');
define('LOGGED_IN_SALT',   'dvhD|{Th-I1_0|EnLsJPt4b uuTUhmqn=N}g$[tqDTiZ_%3U}_h7[^,t2(wf%/i=');
define('NONCE_SALT',       '$ih_`U:V^E{;nHDMhAc4~no$dejQam-nT~i+WTDDrWTW*c~M&ahCd Ywf.0i m)v');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'de_';


/** https://codex.wordpress.org/Administration_Over_SSL */
define('FORCE_SSL_ADMIN', false);

define('WP_HOME', 'http://doteveryone.local:8080');
define('WP_SITEURL','http://doteveryone.local:8080');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
