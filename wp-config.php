<?php
# Database Configuration
define( 'DB_NAME', 'wp_koreconx' );
//define( 'DB_USER', 'koreconx' );
//define( 'DB_PASSWORD', 'tBybsJLIu5HQxrnwQwOA' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '))|QUa_`eh7aEM=|{C,;STgx0x!JI+{$i5v(*{Pv=ti1j:9V{<|QfK<^;Ua$V26r');
define('SECURE_AUTH_KEY',  '|)YL2-I1VQo45`!Po7Mv#!:[8+vIl#]?|g+ .#A0a)*)nEF:PU|,KgF/l&VLXpFt');
define('LOGGED_IN_KEY',    '[ya(XngOEG:a=0#QL$MjM-RPBp;d*6D3jd}HR>_dzl#yH W~*0ur:/ >)30>?(oK');
define('NONCE_KEY',        '3v-]<tR|d+Bxnc_AZBSu-PNkn]>Fe4(8_!~2nFO+U]:CWh&e_KO!z`Mjw^KfUu&+');
define('AUTH_SALT',        'BYuMU2:UZCkun{hAT/CTaxN[|@5P7Wo%V7|-a5+>Z]wFJhf]+t(vsC):b=.+-5CF');
define('SECURE_AUTH_SALT', 'u]KO70l]32b`<JWVo_5Xt _TYk8cBO5d!$B9IJeAbf=oE]3D06_+*g^<N_0Vg?5C');
define('LOGGED_IN_SALT',   '-#1%f$4O+nu{e@/H|OUnspb9%H:Q5.l#a9q<t4L|P1- >h*?*Factlgw.bW!E+8 ');
define('NONCE_SALT',       'CzMoD5K6|)3e<$P-U8W8:SG}e7{u :.ca`Hv-}k,,fm{#p}*uM~4TTEpiMc9%3Mc');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'koreconx' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '14dbef8397354b63cbb182d0d157d2900c2c06bd' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '42340' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_LBMASTER_IP', '45.79.87.252' );

define( 'WPE_CDN_DISABLE_ALLOWED', false );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'koreconx.dev', 1 => 'www.koreconx.dev', 2 => 'koreconx.wpengine.dev', );

$wpe_varnish_servers=array ( 0 => 'pod-42340', );

$wpe_special_ips=array ( 0 => '45.79.87.252', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

//$wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'koreconx.dev', 'zone' => 'jxuge3rx5ugfte1r3baihg7t', 'secure' => false, 'dns_check' => '0', ), 1 =>  array ( 'match' => 'koreconx.wpengine.dev', 'zone' => '2vf7aelh7464f4a02u8ohd54', 'secure' => false, 'dns_check' => '0', ), );
$wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'koreconx.dev', 'zone' => 'jxuge3rx5ugfte1r3baihg7t', 'secure' => false, 'dns_check' => '0', ), 1 =>  array ( 'match' => 'koreconx.wpengine.dev', 'zone' => '2vf7aelh7464f4a02u8ohd54', 'secure' => false, 'dns_check' => '0', ), );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );

define( 'WPE_SFTP_PORT', 2222 );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
