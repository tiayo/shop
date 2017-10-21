<?php

return [
    'administrator' => env('SITE_ADMINISTRATE'),
    'upload_image_size' => 1024,
    'list_num' => env('SITE_LIST_NUM'),
    'title' => 'S&C球鞋购物商城', //网站标题
    'order_status' => [ //订单状态
        0 => '等待支付',
        1 => '等待发货',
        2 => '运输中',
        3 => '待确认',
        4 => '完成',
        5 => '取消',
        6 => '退货中',
        7 => '退货完成',
    ],
    'order_type' => [
        1 => '快递',
        2 => '送货上门',
    ],
    'week' => [
        1 => '周一',
        2 => '周二',
        3 => '周三',
        4 => '周四',
        5 => '周五',
        6 => '周六',
        0 => '周日',
    ],
    'user_status' => [
        0 => '禁用',
        1 => '正常'
    ],
    'commodity_status' => [
        0 => '下架',
        1 => '上架',
    ],
    'commodity_type' => [
        0 => '普通商品',
        1 => '新品上市',
        2 => '本月主推',
        3 => '折扣专区',
    ],
];