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
    protected $order;

    /**
     * OrderRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * 將訂單狀態改成已付費Y
     * 並傳回product_id
     *
     * @param integer $id
     * @return integer
     */
    function updateStatusToY($id)
    {
        $order = $this->find($id);
        $order->status = 'Y';
        $productId = $order->product_id;
        $order->save();

        return $productId;
    }
}