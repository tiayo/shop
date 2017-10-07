<?php

$this->group(['namespace' => 'Home'], function () {
    $this->get('/', 'IndexController@index')->name('home.index');
    $this->get('/search', 'IndexController@search')->name('home.search');
    $this->get('/commodity/{id}', 'DetailController@view')->name('home.commodity_view');
    $this->get('/category/{id}', 'ListController@view')->name('home.category_view');

    //登录后操作
    $this->group(['middleware' => 'manage_auth'], function () {
        $this->get('/car/list', 'CarController@view')->name('home.car');
        $this->post('/car/add/{commodity_id}', 'CarController@add')->name('home.car_add');
        $this->get('/car/destory/{commodity_id}', 'CarController@destory')->name('home.car_destory');
    });
});
