<?php
// +----------------------------------------------------------------------
// | RabbitMQ 配置
// +----------------------------------------------------------------------
return [
    'host' => '127.0.0.1',
    'port' => 5672,
    'user' => 'guest',
    'password' => 'guest',
    'vhost' => '/',
    // exchange
    'exchange_user'=>'user.exchange',
    'exchange_store'=>'store.exchange',
    'exchange_system'=>'system.exchange',
    'queue' => [
        'user_receive' => 'user.receive.queue',
        'store_receive' => 'store.receive.queue',
        'system_receive' => 'system.receive.queue',
    ],
    // route
    'routes' => [
        'user' => [
            'order', // 订单相关
            'profix', // 收益相关
            'withdraw', // 提现相关
            'refund', // 退款相关
        ],
        'store' => [
            'deliver_goods', // 发货
            'withdraw', //	提现相关
            'order', // 订单相关
            'goods', // 商品相关，比如发布商品审核
            'refund', // 退款、退货相关
            'store_status', // 店铺状态相关
        ],
        'system' => [
            'notice', // 公告
        ]
    ]
];
