<?php

namespace App\Services\Manage;

use App\Repositories\AttributeRepository;
use Exception;

class AttributeService
{
    protected $attribute;

    public function __construct(AttributeRepository $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * 通过id验证记录是否存在以及是否有操作权限
     * 通过：返回该记录
     * 否则：抛错
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function validata($id)
    {
        $salesman = $this->attribute->first($id);

        throw_if(empty($salesman), Exception::class, '未找到该记录！', 404);

        return $salesman;
    }

    /**
     * 获取需要的数据
     *
     * @param int $num
     * @param null $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function get($num = 10000, $category_id = null)
    {
        return $this->attribute->get($num, $category_id);
    }

    /**
     * 获取需要的数据
     *
     * @param array ...$select
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSimple(...$select)
    {
        return $this->attribute->getSimple(...$select);
    }

    /**
     * 查找指定id的用户
     *
     * @param $id
     * @return mixed
     */
    public function first($id)
    {
        return $this->validata($id);
    }

    /**
     * 更新或编辑
     *
     * @param $post
     * @param null $id
     * @return mixed
     */
    public function updateOrCreate($post, $id, $type)
    {
        //统计数据
        $data['name'] = $post['name'];
        $data['value'] = $post['value'];
        $data['alias'] = $post['alias'];

        //添加时操作
        if ($type == 'add') {
            $data['category_id'] = $id;
        }

        //执行插入或更新
        return $type == 'add' ? $this->attribute->create($data) : $this->attribute->update($id, $data);
    }

    /**
     * 删除管理员
     *
     * @param $id
     * @return bool|null
     */
    public function destroy($id)
    {
        //验证是否可以操作当前记录
        $attribute = $this->validata($id)->toArray();

        //执行删除
        $this->attribute->destroy($id);

        return $attribute;
    }
}