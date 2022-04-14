<?php

/**
 * 函数(用户定义的函数名和关键字对大小写不敏感)
 */

// 可以显式指定类型,调用时不匹配会报错，
// 也可以不指定。但是子类覆盖父类方法时，必须匹配父类类型。
//
function mySum($a, int $b)
{
    return $a + $b;
}

echo mySum(2, 3), PHP_EOL;

function myRuturn($a, $b)
{
    $strA = "straa";
    return [$a + $b, $strA]; // 不能同时返回多个值
}

$res = myRuturn(2, 3);
foreach ($res as $v) {
    echo $v, PHP_EOL;
}

/**
 * 类
 * 类属性
 * 类方法
 * trait？？？
 */
echo "********************class****************\n";

class A
{
    var $a;
    var $b;

    function mySum($a, $b)
    {
        return $a + $b;
    }

    function setVar($aVal, $bVal)
    {
        $this->a = $aVal;
        $this->b = $bVal;
    }

    function getVar()
    {
        return [
            $this->a,
            $this->b,
        ];
    }
}

$a = new A();
$a->setVar(2, 66);
list($v1, $v2) = $a->getVar(); // 复制给变量
echo $a->mySum($v1, $v2), PHP_EOL;


/**
 * 导入（引用）文件
 */
include "phpBase.php";
include "./Unit/test2.php";
test();
test2();
