<?php

namespace App\UserListeners\Bargain\CreateBargainOrder;


use App\Models\ShoppingCart;
use App\UserEvents\Order\CreateOrder;
use ZhiEq\Contracts\Listener;

class DeleteShoppingCart extends Listener
{

    /**
     * @param CreateOrder $event
     * @return boolean|string|array
     */
    public function handle($event)
    {
        $cart = collect($event->input['products'])->where('shoppingCartId', '<>', '');
        return $cart->count() === $cart->map(function ($item) {
                if (!$shoppingCart = ShoppingCart::whereId($item['shoppingCartId'])->first()) {
                    return false;
                }
                return $shoppingCart->delete();
            })->count();
    }

    /**
     * @return integer
     */
    public function order()
    {
        return 5;
    }
}
