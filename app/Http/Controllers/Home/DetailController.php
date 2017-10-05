<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Manage\CommodityService;

class DetailController extends Controller
{
    protected $commodity;

    public function __construct(CommodityService $commodity)
    {
        $this->commodity = $commodity;
    }

    public function view($id)
    {
        $commodity = $this->commodity->first($id);

        //随机获取数据
        $rand_commodity  = $this->commodity->randCommodity();

        return view('home.detail.detail', [
            'commodity' => $commodity,
            'rand_commodity' => $rand_commodity,
        ]);
    }
}