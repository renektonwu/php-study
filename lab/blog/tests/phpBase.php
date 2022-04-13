<?php

/**
 * 变量
 * 语法: $变量名
 * 1、常量
 * 2、浮点型
 * 3、布尔型
 * 4、php null值
 * 2、作用域
 */
echo "****变量****变量****变量****变量****变量****变量****\n";
$varia = 1;
$str = "aaa";
echo $varia;
echo PHP_EOL;
echo $str;
echo PHP_EOL;
//strS = 222; // PHP Parse error:  syntax error, unexpected '=' in /data/www/php-study/lab/blog/tests/phpBase.php on line 18
//echo strS;

$float1 = 0.2;
echo $float1;
echo PHP_EOL;

$trueBool = true;
echo $trueBool;
echo PHP_EOL;

echo "8888888888888888";
$falseBool = false;
echo $falseBool;
echo "===" . PHP_EOL; // ??? false 没有任何输出？？？
echo "8888888888888888";
echo PHP_EOL;

$nullStr = NULL;
echo $nullStr;  // NULL 没有任何输出！

/**
 * 数组
 * 1、索引数组
 * 2、关联数组
 * 3、数组定义
 * 4、数组取值
 * 5、获取数组长度
 * 6、遍历数组
 */
echo "****数组***数组****数组****数组****数组****数组****\n";

// 定义数据的方式1
$eMall = array("taobao", "jingdong", "pdd", 666); // 动态语言，所以可以各种类型放在一起
var_dump($eMall);

$eMall1 = ["taobao", "jingdong", "pdd", 777]; // 动态语言，所以可以各种类型放在一起
var_dump($eMall1);

echo "======索引数组=========\n";
echo "eMall->" . $eMall[0];
echo PHP_EOL;
// 综上 没有键的数组都是索引数组

// 关联数组
$relArray = array("k1" => "v1", "k2" => "v2");
var_dump($relArray);

$relArray1 = ["k1" => "v1", "k2" => "v2"];
var_dump($relArray1);

echo "======关联数组=========\n";

echo $relArray["k1"];

echo "======遍历数组=========\n";
// 方式1 foreach
// 索引数组
foreach ($eMall as $item) {
    echo "each item --> $item\n";
}

// 关联数组
foreach ($relArray1 as $k => $v) {
    echo "relate array -> key -> $k, value -> $v\n";
}

// 方式2 只用在索引数组
for ($i = 0; $i < count($eMall); $i++) {
    echo "item -> $eMall[$i]\n";
}

// 方式3 关联和索引都可以用
function print_item($key, $value)
{
    echo "$key -> $value\n";
}

array_walk($relArray, "print_item", "lll");


/**
 * 字符串
 * 1、字符串长度
 * 2、字符串索引
 * 通过substr 截取字符串的方式进行。
 * 3、字符串 常用api standard_1.php
 */
echo "****字符串***字符串****字符串****字符串****字符串****字符串****\n";
$strA = "php doc";
echo strlen($strA) . "\n";

echo substr($strA,0, 1) . "\n";


/**
 * 类型比较
 */
$lFalse = false;
$lNull = NULL;
if ($lFalse == $lNull) {
    echo "false equal NULL in value\n";
}else{
    echo "false not equal NULL in value\n";
}

if ($lFalse === $lNull) {
    echo "false equal NULL in type\n";
}else{
    echo "false not equal NULL in type\n";
}

/**
 * 递增递减运算符
 */


/**
 * 逻辑运算符
 * 与或非
 */

/**
 * 三元运算符
 */

/**
 * 循环
 * while
 * do...while...
 * for
 * foreach
 */

/**
 * 判断
 * if
 *
 * if...else if ...else
 *
 * switch
 */

echo "****判断***判断****判断****判断****判断****判断****\n";
if (1 == 2) {
    echo "1 == 2";
} else {
    echo "1 != 2";
}

/**
 * 超级全局变量
 * $GLOBALS
 * $_SERVER
 * $_REQUEST
 * $_POST
 * $_GET
 * $_FILES
 * $_ENV
 * $_COOKIE
 * $_SESSION
 */

/**
 * 魔术变量？？？
 * __LINE__
 * __FILE__
 * __DIR__
 * __FUNCTION__
 * __CLASS__
 * __TRAIT__
 * __METHOD__
 * __NAMESPACE__
 */
