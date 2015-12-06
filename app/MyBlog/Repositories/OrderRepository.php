<?php
/**
 * Your file description
 *
 * @version 0.1.0
 * @author oomusou
 * @date 12/6/15
 * @since 12/6/15 description
 */

namespace MyBlog\Repositories;


use MyBlog\Order;

class OrderRepository extends EloquentRepository
{
    /** @var Order */
    private $order;


    /**
     * OrderRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}