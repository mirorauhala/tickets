<?php

namespace Domain\Carts\Actions;

class AddToCartAction implements Actionable {
    public function run(Cart $cart, Product $product) {
        $cart->products()->create($product);
    }
}
