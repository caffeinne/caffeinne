<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\Services;

use Caffeinne\Catalog\Models\Product;
use Caffeinne\Cart\Models\Cart;
use Caffeinne\Core\Interfaces\IdGeneratorInterface;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Interfaces\Factories\Cart\ItemFactoryInterface as CartItemFactoryInterface;
use Caffeinne\Sales\Interfaces\Factories\Order\ItemFactoryInterface as OrderItemFactoryInterface;
use Caffeinne\Sales\Interfaces\Factories\OrderFactoryInterface;

class CartService
{

    protected CartItemFactoryInterface $cartItemFactory;

    protected OrderItemFactoryInterface $orderItemFactory;

    protected IdGeneratorInterface $idGenerator;

    protected OrderFactoryInterface $orderFactory;

    public function __construct(
        OrderFactoryInterface $orderFactory,
        OrderItemFactoryInterface $orderItemFactory,
        CartItemFactoryInterface $cartItemFactory,
        IdGeneratorInterface $idGenerator
    ) {
        $this->orderFactory = $orderFactory;
        $this->cartItemFactory = $cartItemFactory;
        $this->orderItemFactory = $orderItemFactory;
        $this->idGenerator = $idGenerator;
    }

    public function convertProductInCartItem(
        Product $product,
        int $quantity
    ){
        return $this->cartItemFactory->create(
            new ID(
                $this->idGenerator->generate()
            ),
            $product->id(),
            $product->price(),
            $quantity
        );
    }

    /**
     * Create a new order based on items inside $cart
     *
     * @TODO Teste for this method
     * @param Cart $cart
     * @return \Caffeinne\Sales\Models\Order
     */
    public function createNewOrderFromCart(Cart $cart)
    {
        $id = $this->idGenerator->generate();

        $order = $this->orderFactory->create(
            new ID($id)
        );

        foreach($cart->items() as $cartItem){
            $orderItem = $this->orderItemFactory->create(
                new ID(
                    $this->idGenerator->generate()
                ),
                $cartItem->productId(),
                $cartItem->price(),
                $cartItem->quantity(),
            );

            $order->addItem($orderItem);
        }

        return $order;
    }
}
