<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'ba'=>'index/ba/index',
    'tie/index/:id/:ido/:idt'=>'index/tiezi/index',
    'tiezi'=>'index/tiezi/index',
    'tie/tiecontent/:id'=>'index/tiezi/tiecontent',
    'tie/list/:id/:tieid'=>'index/tiezi/list',
    'tiezi/add'=>'index/tiezi/add',
    'tie/add/:id'=>'index/tiezi/add',
    'log/login'=>'index/log/login',
    'log/logdo'=>'index/log/logdo',
    'log'=>'index/log/index',
    'log/log'=>'index/log/log',
    'log/logout'=>'index/log/logout',
    'tiezi/adddo'=>'index/tiezi/adddo',
    'tie/huifu/:tieid'=>'index/tiezi/huifu',
    'tiezi/huifudo/'=>'index/tiezi/huifudo',
    'tie/huifu_/:tieid'=>'index/tiezi/huifu_',

];
