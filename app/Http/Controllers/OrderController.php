<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use MyBlog\Services\OrderService;

class OrderController extends Controller
{
    /** @var OrderService */
    private $orderService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $this->orderService->checkout($id);
    }


}
