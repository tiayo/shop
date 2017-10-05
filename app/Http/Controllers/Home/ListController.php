<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\CommodityRepository;

class ListController extends Controller
{
    protected $commodity;
    public function __construct(CommodityRepository $commodity)
    {
        $this->commodity = $commodity;
    }

    public function view($category_id)
    {
        $commodities = $this->commodity->getByCategory($category_id);

        return view('home.list.list', [
            'commodities' => $commodities,
        ]);
    }
}