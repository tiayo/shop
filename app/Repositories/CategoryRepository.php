<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create($data)
    {
        return $this->category->create($data);
    }

    /**
     * 获取所有显示记录（带分页）
     *
     * @param $page
     * @param $num
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function get($num)
    {
        return $this->category
            ->orderBy('id', 'desc')
            ->paginate($num);
    }

    /**
     * 获取所有显示顶级分类
     *
     * @param $page
     * @param $num
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getParent()
    {
        return $this->category
            ->where('parent_id', 0)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * 获取所有显示记录(简易)
     *
     * @param $page
     * @param $num
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSimple(...$select)
    {
        return $this->category
            ->select($select)
            ->orderBy('id', 'desc')
            ->get();
    }
    
    /**
     * 获取显示的搜索结果
     *
     * @param $num
     * @param $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearch($num, $keyword)
    {
        return $this->category
            ->where(function ($query) use ($keyword) {
                $query->where('categories.name', 'like', "%$keyword%");
            })
            ->orderBy('id', 'desc')
            ->paginate($num);
    }
    
    public function first($id)
    {
        return $this->category->find($id);
    }

    public function destroy($id)
    {
        return $this->category
            ->where('id', $id)
            ->delete();
    }

    public function selectFirst($where, ...$select)
    {
        return $this->category
            ->select($select)
            ->where($where)
            ->first();
    }

    public function update($id, $data)
    {
        return $this->category
            ->where('id', $id)
            ->update($data);
    }
}