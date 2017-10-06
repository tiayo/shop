<?php

namespace App\Services\Home;

use App\Repositories\CarRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class CarService
{
    protected $car;

    public function __construct(CarRepository $car)
    {
        $this->car = $car;
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
        $salesman = $this->car->first($id);

        throw_if(empty($salesman), Exception::class, '未找到该记录！', 404);

        throw_if(can('control'), Exception::class, '没有权限！', 403);

        return $salesman;
    }

    /**
     * 获取需要的数据
     *
     * @param int $num
     * @param null $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function get()
    {
        return $this->car->get();
    }

    /**
     * 统计数量
     *
     * @return mixed
     */
    public function count()
    {
        return $this->car->count();
    }

    /**
     * 获取需要的数据
     *
     * @param array ...$select
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSimple(...$select)
    {
        return $this->car->getSimple(...$select);
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
     * 插入
     *
     * @param $post
     * @param null $id
     * @return mixed
     */
    public function create($post, $commodity_id)
    {
        //构造数组
        $data['user_id'] = Auth::id();
        $data['commodity_id'] = $commodity_id;
        $data['num'] = $post['num'];
        $data['price'] = $post['price'];

        //写入属性
        $data['remark'] = isset($post['color']) ?  'color:'.$post['color'].'|' : '';
        $data['remark'] .= isset($post['size']) ?  'size:'.$post['size'] : '';

        //执行插入
        return $this->car->create($data);
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
        $this->validata($id)->toArray();

        //执行删除
        return $this->car->destroy($id);
    }
}
