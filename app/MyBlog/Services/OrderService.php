<?php
/**
 * Your file description
 *
 * @version 0.1.0
 * @author oomusou
 * @date 12/6/15
 * @since 12/6/15 description
 */

namespace MyBlog\Services;


use Illuminate\Support\Facades\DB;
use MyBlog\Repositories\OrderRepository;
use MyBlog\Repositories\ProductRepository;

class OrderService
{
    /** @var OrderRepository */
    private $orderRepository;
    /** @var ProductRepository */
    private $productRepository;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository)
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