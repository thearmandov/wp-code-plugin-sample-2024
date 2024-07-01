<?php

class CD_Controller {
    private static $instance = null;

    private function __construct() {
        add_action('woocommerce_cart_calculate_fees', array($this, 'apply_custom_discount'));
    }

    public static function get_instance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function apply_custom_discount() {
        if (is_admin() &&  !defined('DOING_AJAX')) {
            return;
        }

        $user = wp_get_current_user();
        $discount_model = new CD_Model();

        if ($discount_model->is_eligible_for_discount($user)) {
            $discount_amount = $discount_model->calculate_discount();
            
            $view = new CD_View();
            $view->display_discount($discount_amount);
        }
    }
}