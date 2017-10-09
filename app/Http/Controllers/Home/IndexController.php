<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $index;

    public function __construct(IndexService $index)
    {
        $this->index = $index;
    }

    public function index()
    {
        //新品上市
        $new_commodity = $this->index->getByType(1, 6);

        //本月主推
        $recommend_commodity = $this->index->getByType(2, 8);

        //折扣专区
        $discount_commodity = $this->index->getByType(3, 9);


        return view('home.index.index', [
            'new_commodity' => $new_commodity,
            'recommend_commodity' => $recommend_commodity,
            'discount_commodity' => $discount_commodity
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        $commodities = $this->index->getSearch($keyword);

        return view('home.list.list', [
            'commodities' => $commodities,
        ]);
    }
}