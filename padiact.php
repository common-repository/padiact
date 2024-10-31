<?php
/*
Plugin Name: PadiAct
Plugin URI: http://wordpress.org/extend/plugins/padiact/
Description: Increase your email subscription rates with <a href="http://padiact.com">PadiAct</a> on your Wordpress installation.
Version: 1.2
Author: Claudiu Murariu
Author URI: http://www.padicode.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_padiact() {
  add_option('padiact_code', '');
}

function deactive_padiact() {
  delete_option('padiact_code');
}

function admin_init_padiact() {
  register_setting('padiact', 'padiact_code');
}

function admin_menu_padiact() {
  add_options_page('PadiAct - Increase Email Subscription', 'PadiAct', 'manage_options', 'padiact', 'options_page_padiact');
}

function options_page_padiact() {
  include(WP_PLUGIN_DIR.'/padiact/options.php');  
}

function insert_padiact($padiact_code) {
?>
<!-- PadiAct Code -->
<script type="text/javascript">
(function() {
  var pa = document.createElement('script'), ae = document.getElementsByTagName('script')[0]
  , protocol = (('https:' == document.location.protocol) ? 'https://' : 'http://');pa.async = true;  
  pa.src = protocol + 'd2xgf76oeu9pbh.cloudfront.net/<?php echo $padiact_code;?>.js'; pa.type = 'text/javascript'; ae.parentNode.insertBefore(pa, ae);
})();
</script>
<?php
}



function padiact() { 
  
  $padiact_code = get_option('padiact_code');
  if ($padiact_code != "") insert_padiact($padiact_code);
      
}



if (is_admin()) {
	register_activation_hook(__FILE__, 'activate_padiact');
	register_deactivation_hook(__FILE__, 'deactive_padiact');
	add_action('admin_init', 'admin_init_padiact');
	add_action('admin_menu', 'admin_menu_padiact');
}

add_action('wp_footer', 'padiact');


?>
