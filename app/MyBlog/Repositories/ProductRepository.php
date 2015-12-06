<?php

namespace MyBlog\Repositories;

use MyBlog\Product;

class ProductRepository extends EloquentRepository
{
    /** @var Product */
    protected $product;

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * 將已售出的產品庫存減1
     *
     * @param integer $productId
     */
    function stockMinusOne($productId)
    {
        $product = $this->find($productId);
        $product->stock = $product->stock - 1;
        $product->save();
    }
}