<?php

$this->group(['namespace' => 'Home'], function () {
    $this->get('/', 'IndexController@index')->name('home.index');
    $this->get('/commodity/{id}', 'DetailController@view')->name('home.commodity_view');
});
