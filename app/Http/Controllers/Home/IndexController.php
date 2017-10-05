<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\IndexService;

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
        $new_commodity = $this->index->getNewCommodity();

        return view('home.index.index', [
            'new_commodity' => $new_commodity,
        ]);
    }
}