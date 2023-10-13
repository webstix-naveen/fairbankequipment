<?php
/**
 * Init action
 * Runs after WordPress has finished loading but before any headers are sent
 */
function add_ajax_script_header(){
   add_action('wp_head', 'add_fairbankequipment_ajax_script_enqueue');
   add_action('wp_ajax_fairbankequipment_ajax', 'fairbankequipment_ajax_callback');
   add_action('wp_ajax_nopriv_fairbankequipment_ajax', 'fairbankequipment_ajax_callback');   
}
add_action('init', 'add_ajax_script_header');

/**
 * Ajax script
 */
function add_fairbankequipment_ajax_script_enqueue() {
   wp_register_script('fairbankequipment-localize-js', FB_ASSETS_DIR.'/js/localize.js',array('jquery'),false, '1.0.0', true );
   wp_localize_script('fairbankequipment-localize-js','ajax_params',array('ajax_url'=>admin_url('admin-ajax.php')));
   wp_enqueue_script('fairbankequipment-localize-js');
}

/**
* Ajax Call back function
*/
function fairbankequipment_ajax_callback(){
   if( $_REQUEST['action'] == "fairbankequipment_ajax" && $_REQUEST['mode'] == "checkMode" ){
      //Code here
   }
   wp_die();
}
?>