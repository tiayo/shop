<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Services\Manage\AttributeService;
use App\Services\Manage\CategoryService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $attribute;
    protected $request;
    protected $category;

    public function __construct(AttributeService $attribute, Request $request, CategoryService $category)
    {
        $this->attribute = $attribute;
        $this->request = $request;
        $this->category = $category;
    }

    /**
     * 管理员列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listView($category_id)
    {
        $num = config('site.list_num');

        $categories = $this->attribute->get($num, $category_id);

        return view('manage.attribute.list', [
            'lists' => $categories,
        ]);
    }

    /**
     * 添加管理员视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addView($category_id)
    {
        $categories = $this->category->getSimple('id', 'name');

        return view('manage.attribute.add_or_update', [
            'lists' => $categories,
            'old_input' => $this->request->session()->get('_old_input'),
            'url' => Route('attribute_add', ['category_id' => $category_id]),
            'sign' => 'add',
        ]);
    }

    /**
     * 修改管理员视图
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateView($id)
    {
        $categories = $this->category->getSimple('id', 'name');

        try {
            $old_input = $this->request->session()->has('_old_input') ?
                session('_old_input') : $this->attribute->first($id);
        } catch (\Exception $e) {
            return response($e->getMessage(), $e->getCode());
        }

        return view('manage.attribute.add_or_update', [
            'lists' => $categories,
            'old_input' => $old_input,
            'url' => Route('attribute_update', ['id' => $id]),
            'sign' => 'update',
        ]);
    }

    /**
     * 添加提交
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPost($category_id)
    {
        $this->validate($this->request, [
            'name' => 'required',
            'alias' => 'required',
            'value' => 'required',
        ]);

        try {
            $this->attribute->updateOrCreate($this->request->all(), $category_id, 'add');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }

        return redirect()->route('attribute_list', ['category_id' => $category_id]);
    }

    /**
     * 添加提交
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updatePost($attribute_id)
    {
        $this->validate($this->request, [
            'name' => 'required',
            'alias' => 'required',
            'value' => 'required',
        ]);

        try {
            $this->attribute->updateOrCreate($this->request->all(), $attribute_id, 'update');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }

        return redirect()->route('attribute_list', [
            'category_id' => $this->attribute->first($attribute_id)->category_id
        ]);
    }

    /**
     * 删除记录
     *
     * @param $id
     * @return bool|null
     */
    public function destroy($id)
    {
        try {
            $this->attribute->destroy($id);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }

        return redirect()->route('attribute_list');
    }
}