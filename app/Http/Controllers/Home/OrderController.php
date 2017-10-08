<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order, $request;

    public function __construct(OrderService $order, Request $request)
    {
        $this->order = $order;
        $this->request = $request;
    }

    public function view()
    {

    }

    public function add()
    {
        try{
            $this->order->add($this->request->all());
        } catch (\Exception $exception) {
            return response($exception->getMessage());
        }

        return redirect()->route('order_list');
    }

    public function changeStatus()
    {

    }

    public function destory()
    {

    }
}