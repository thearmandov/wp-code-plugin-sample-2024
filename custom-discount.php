<?php 

/*
Plugin Name: Custom Discount
Description: Adds a custom discount for specific user roles.
Version: 1.0
Author: Armando Villanueva
*/


if (!defined('ABSPATH')) exit;

spl_autoload_register(function( $class ){
    if (strpos($class, 'CD_') === 0) {
        include_once dirname( __FILE__ ) . 
        '/includes/class-' . 
        strtolower(str_replace('_', '-', $class )) . '.php';
    }
});

add_action('plugins_loaded', 'cd_initialize_plugin');
function cd_initialize_plugin() {
    if (class_exists('WooCommerce')) {
        CD_Controller::get_instance();
    }
}