<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\UseCases;


use Caffeinne\Cart\Interfaces\Factories\CartFactoryInterface;
use Caffeinne\Catalog\Models\Product;
use Caffeinne\Checkout\Services\CartService;
use Caffeinne\Core\Exceptions\DomainErrorException;
use Caffeinne\Core\Interfaces\IdGeneratorInterface;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Interfaces\Factories\Cart\ItemFactoryInterface;
use Caffeinne\Cart\Models\Cart;
use Caffeinne\Cart\Interfaces\Repositories\CartRepositoryInterface;

class AddProductToCartUseCase
{
    protected CartRepositoryInterface $cartRepository;

    protected ID $idOwner;

    protected Product $product;

    protected ItemFactoryInterface $itemFactory;

    protected int $quantity;

    protected IdGeneratorInterface $idGenerator;

    protected CartService $cartService;

    protected CartFactoryInterface $cartFactory;

    public function __construct(
        CartFactoryInterface    $cartFactory,
        CartRepositoryInterface $cartRepository,
        ItemFactoryInterface    $itemFactory,
        IdGeneratorInterface    $idGenerator,
        CartService             $cartService,
        ID                      $idOwner,
        Product                 $product,
        int                     $quantity
    ) {
        $this->cartRepository = $cartRepository;
        $this->idOwner = $idOwner;
        $this->product = $product;
        $this->itemFactory = $itemFactory;
        $this->quantity = $quantity;
        $this->idGenerator = $idGenerator;
        $this->cartService = $cartService;
        $this->cartFactory = $cartFactory;
    }

    /**
     * @throws DomainErrorException
     */
    public function execute()
    {
        /** @var Cart $cart */
        $cart = $this->cartRepository->findByOwner($this->idOwner);

        if(!$cart){
            $cart = $this->cartFactory->create(
                new ID(
                    $this->idGenerator->generate()
                ),
                $this->idOwner
            );
        }

        $item = $this->cartService->convertProductInCartItem($this->product, $this->quantity);

        if(!$this->product->haveStock($this->quantity)){
            throw new DomainErrorException("Product doesn't have enough stock");
        }

        $cart->addItem($item);

        $this->cartRepository->save($cart);
    }
}
