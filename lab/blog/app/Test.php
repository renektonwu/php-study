<?php

namespace App;

use Alipay\EasySDK\Base\Image\Models;
use Illuminate\Support\Facades\DB;

class Test extends Model
{
    protected $table = 'test';
    public $timestamps = false;

    /**
     * 查
     */
    public static function getAllitem()
    {
//        $test = DB::table('test')->get();
        $test = DB::table('test')->where('name', 'tom')->pluck('age');
        dump($test);
        foreach ($test as $name => $age) {
            echo $name . "---" . $age;
            echo "lll";
        }

        echo "\n\n";
        $x = array(1 => "Google", 2 => "Runoob", 3 => "Taobao");
        foreach ($x as $key => $value) {
            echo "key  为 " . $key . "，对应的 value 为 " . $value . PHP_EOL;
        }
        return $test;
    }

    /**
     * 增
     */

    /**
     * 删
     */

    /**
     * 改
     */
}
