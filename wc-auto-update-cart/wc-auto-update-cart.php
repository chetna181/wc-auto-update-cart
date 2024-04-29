<?php
/*
* Plugin Name: QuickCart Update
* Plugin URI: 
* Description: This plugin allows to auto update Cart Quantities without clicking on "Update" button.
* Version: 1.0.0
* Author: Chetna Bhutka
* Author URI:
* Text Domain: wc-auto-update-cart
*/

if ( ! class_exists( 'wc_auto_update_cart' ) ) {

    /**
     * It will add the hooks, filters, menu and the variables and all the necessary actions for the plugins which will be used 
     * all over the plugin.
     * @since 1.0
     * @package updatecart/Core
     */
    class wc_auto_update_cart {

/**
     * It will add the hooks, filters, menu and the variables and all the necessary actions for the plugins which will be used 
     * all over the plugin.
     * @since 1.0
     * @package updatecart/Core
     */        public function __construct(){
            add_action( 'wp_enqueue_scripts', array(&$this, 'load_cart_enqueue_script'));
            //add_action('wp_ajax_fetch_cart_items', array(&$this, 'fetch_cart_items'));
            //add_action('wp_ajax_nopriv_fetch_cart_items', array(&$this, 'fetch_cart_items'));    
        }
        /**
         * Call the function to load JS file on cart page
         */
        public static function load_cart_enqueue_script(){
            if ( is_cart() ) {
                //Custom Script with no dependencies, enqueued in footer
                wp_enqueue_script(
                    'update_cart',
                    plugin_dir_url(__FILE__) . 'assets/js/update-quantities.js',
                    array(),
                    1,
                    true
                );
            //Here we create a javascript object variable called "js_abject_vars". We can access any variable in the array using js_abject_vars.name_of_sub_variable
       
            //wp_localize_script('update_cart','js_abject_vars',array('ajax_url'=>admin_url('admin-ajax.php')));    
            }
        }   
    }
}
$wc_auto_update_cart = new wc_auto_update_cart();