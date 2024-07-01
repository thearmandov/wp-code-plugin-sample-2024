<?php

class CD_View {
    public function display_discount ($discount_amount) {
        WC()->cart->add_fee(__('Wholesale Discount', 'custom-discount'), -$discount_amount);
    }
}