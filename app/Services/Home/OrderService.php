<?php

namespace App\Services\Home;

use App\Repositories\CommodityRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected $order, $car, $orderDetail, $commodity;

    public function __construct(OrderRepository $order,
                                CarService $car,
                                OrderDetailRepository $orderDetail,
                                CommodityRepository $commodity)
    {
        $this->order = $order;
        $this->car = $car;
        $this->orderDetail = $orderDetail;
        $this->commodity = $commodity;
    }

    public function add($post)
    {
        //获取当前用户购物车所有商品
        $cars = $this->car->get();

        //构造订单
        $order['user_id'] = Auth::id();
        $order['address'] = $post['address'] ?? Auth::user()['address'];
        $order['phone'] = $post['phone'] ?? Auth::user()['phone'];
        $order['price'] = $this->car->total_price($cars);
        $order['type'] = $post['type'] ?? 1;

        //创建订单
        $id = $this->order->create($order)->id;

        //创建订单详情以及减少库存
        foreach ($cars as $car) {
            //减少库存操作
            $this->commodity->decrement($car['num']);

            //订单详情数据
            $order_detail['order_id'] = $id;
            $order_detail['user_id'] = $car['user_id'];
            $order_detail['commodity_id'] = $car['commodity_id'];
            $order_detail['num'] = $car['num'];
            $order_detail['price'] = $car['price'];
            $order_detail['remark'] = $car['remark'];
            $order_detail['status'] = $car['status'];

            //写入订单详情数据库
            $this->orderDetail->create($order_detail);

            //删除购物车
            $this->car->destroy($car['id']);
        }

        return true;
    }
}