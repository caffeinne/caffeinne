<?php

declare(strict_types=1);


namespace Caffeinne\Checkout\UseCases;


use Caffeinne\Core\Exceptions\DomainErrorException;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Interfaces\Repositories\CartRepositoryInterface;
use Caffeinne\Cart\Models\Cart;
use Caffeinne\Sales\Interfaces\Repositories\OrderRepositoryInterface;
use Caffeinne\Checkout\Services\CartService;

class ClosePurchaseUseCase
{

    private $cartRepository;

    private $orderRepository;

    private $cartService;

    private $cartId;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        OrderRepositoryInterface $orderRepository,
        CartService $cartService,
        ID $cartId
    ) {
        $this->cartRepository = $cartRepository;
        $this->orderRepository = $orderRepository;
        $this->cartService = $cartService;
        $this->cartId = $cartId;
    }

    public function execute()
    {
        /** @var Cart $cart */
        $cart = $this->cartRepository->find($this->cartId);

        if(!$cart){
            throw new DomainErrorException('Cart not found');
        }

        $order = $this->cartService->createNewOrderFromCart($cart);

        $this->orderRepository->save($order);
    }
}
