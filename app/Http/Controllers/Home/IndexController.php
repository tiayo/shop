<?php

namespace App\Http\Controllers\Home;

use App\Commodity;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected $commodity;

    public function __construct(Commodity $commodity)
    {
        $this->commodity = $commodity;
    }

    public function index()
    {
        //新品上市
        $new_commodity = $this->commodity
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('home.index.index', [
            'new_commodity' => $new_commodity,
        ]);
    }
}