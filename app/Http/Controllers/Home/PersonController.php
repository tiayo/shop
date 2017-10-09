<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\OrderService;

class PersonController extends Controller
{
    protected $order;

    public function __construct(OrderService $order)
    {
        $this->order = $order;
    }

    public function view()
    {
        //全部
        $orders_all = $this->order->get();

        //待发货
        $orders_1 = $this->order->get(1);

        //待收货
        $orders_2 = $this->order->get(2);

        //已完成
        $orders_4 = $this->order->get(4);

        return view('home.person.view', [
            'orders_all' => $orders_all,
            'orders_1' => $orders_1,
            'orders_2' => $orders_2,
            'orders_4' => $orders_4,
        ]);
    }
}