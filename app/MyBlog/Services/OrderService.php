<?php

namespace MyBlog\Services;

use Illuminate\Support\Facades\DB;
use MyBlog\Repositories\OrderRepository;
use MyBlog\Repositories\ProductRepository;

class OrderService
{
    /** @var OrderRepository */
    protected $orderRepository;
    /** @var ProductRepository */
    protected $productRepository;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(OrderRepository $orderRepository,
        ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * 結帳後負責更新資料庫
     *
     * @param $id
     */
    public function checkout($id)
    {
        DB::transaction(function () use ($id) {
            $productId = $this->orderRepository->updateStatusToY($id);
            $this->productRepository->stockMinusOne($productId);
        });
    }
}