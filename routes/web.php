<?php

$this->group(['namespace' => 'Home'], function () {
    $this->get('/', 'IndexController@index')->name('home.index');
});
