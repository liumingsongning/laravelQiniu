# laravelQiniu
一个laravel获取qiniu的token的sdk
==============================
1，composer 安装
```
composer require liuming/laravel-qiniu

```
2,发布一下
```
php artisan vendor:publish
```
3,找到config/laravelQiniu.php配置一下
```
<?php
return [
    'options' => [
        'accessKey' =>'',
        'secretKey' =>'',
        'Bucket_Open'=>'',
        'Bucket_Private'=>'',
    ] // 只是为了演示
];
```
4,在controller里调用
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kalnoy\Nestedset\NestedSet;
use Kalnoy\Nestedset\Category;
use Schema;
use Illuminate\Database\Schema\Blueprint;
use laravelQiniu;
class testController extends Controller
{
    public function test(Request $request,laravelQiniu $laravelQiniu)
    {
        $token = $laravelQiniu->qiniuToken();
        return ['token'=>$token];
    }
}
```
