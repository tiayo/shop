<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $request;
    protected $car;

    public function __construct(Request $request, CarService $car)
    {
        $this->request = $request;
        $this->car = $car;
    }

    public function view()
    {
        //获取购物车列表
        $lists = $this->car->get();

        //统计数量
        $count = $this->car->count();

        return view('home.car.view', [
            'lists' => $lists,
            'count' => $count,
        ]);
    }

    public function add($commodity_id)
    {
        $this->validate($this->request, [
            'num' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        try {
            $this->car->create($this->request->all(), $commodity_id);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }

        return redirect()->route('home.car');
    }
}