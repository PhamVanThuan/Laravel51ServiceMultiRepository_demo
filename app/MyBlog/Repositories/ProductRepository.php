<?php

namespace MyBlog\Repositories;

use MyBlog\Product;

class ProductRepository extends EloquentRepository
{
    /** @var Product */
    private $product;


    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}