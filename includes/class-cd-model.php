<?php

class CD_Model {
    public function is_eligible_for_discount($user) {
        return in_array('wholesale_customer', (array) $user->roles);
    }

    public function calculate_discount() {
        return WC()->cart->subtotal * 0.10;
    }
}