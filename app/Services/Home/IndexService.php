<?php

namespace App\Services\Home;

use App\Repositories\CategoryRepository;
use App\Repositories\CommodityRepository;

class IndexService
{
    protected $commodity, $category;

    public function __construct(CommodityRepository $commodity, CategoryRepository $category)
    {
        $this->commodity = $commodity;
        $this->category = $category;
    }

    /**
     * 获取最新商品
     *
     * @return mixed
     */
    public function getNewCommodity()
    {
        return $this->commodity->getNewCommodity();
    }

    /**
     * 获取父级栏目
     * 
     * @return mixed
     */
    public function getCategoryParent()
    {
        return $this->category->getParent();
    }

    /**
     * 通过父级id获取下级
     *
     * @param $parent_id
     * @return mixed
     */
    public function getCategoryChildren($parent_id)
    {
        return $this->category->selectGet([
            ['parent_id', $parent_id],
        ], 'name', 'id');
    }
}