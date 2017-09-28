<?php

return [
    'administrator' => env('SITE_ADMINISTRATE'),
    'upload_image_size' => 1024,
    'list_num' => env('SITE_LIST_NUM'),
    'title' => '商城系统', //网站标题
    'order_status' => [ //订单状态
        0 => '等待',
        1 => '接受',
        2 => '拒绝',
        3 => '超时',
        4 => '完成',
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
];