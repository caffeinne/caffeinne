<?php

declare(strict_types=1);


namespace Caffeinne\TestSuite\Adapters\Repository;


use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Cart\Models\Cart;
use Caffeinne\Cart\Interfaces\Repositories\CartRepositoryInterface;

class CartRepositoryInMemory implements CartRepositoryInterface
{

    protected array $carts;

    protected array $firstDatas = [
        [
            'id' => '20741a4f-8951-4076-8092-4635d492b3a9',
            'owner_id' => '6eeafebc-ec76-442d-ae4f-8d570705f9bc'
        ]
    ];

    public function __construct()
    {
        foreach($this->firstDatas as $data){
            $this->carts = [
                $data['id'] => new Cart(
                    new ID($data['id']),
                    new ID($data['owner_id']),
                )
            ];
        }
    }

    /**
     * @param ID $id
     * @return Cart|null
     */
    public function find(ID $id): ?Cart
    {
        $idInString = (string) $id;

        return $this->carts[$idInString] ?? null;
    }

    public function findByOwner(ID $ownerId): ?Cart
    {
        foreach($this->carts as $cart){
            if($cart->ownerId()->isEqual($ownerId)){
                return $cart;
            }
        }

        return null;
    }

    public function save(Cart $cart): bool
    {
        $id = (string) $cart->id();

        $this->carts[$id] = $cart;

        return true;
    }

    public function count()
    {
        return count($this->carts);
    }
}
