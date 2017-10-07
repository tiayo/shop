<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\AttributeRepository;
use App\Services\Manage\CommodityService;

class DetailController extends Controller
{
    protected $commodity, $attribute;

    public function __construct(CommodityService $commodity, AttributeRepository $attribute)
    {
        $this->commodity = $commodity;
        $this->attribute = $attribute;
    }

    /**
     * 商品详情页视图
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        //获取当前商品信息
        $commodity = $this->commodity->first($id);

        //随机获取商品
        $rand_commodity  = $this->commodity->randCommodity();

        //获取属性
        $attributes = $this->attribute->selectGet([
            ['category_id', $commodity['category_id']],
        ], '*');

        return view('home.detail.detail', [
            'commodity' => $commodity,
            'rand_commodity' => $rand_commodity,
            'attributes' => $attributes
        ]);
    }
}