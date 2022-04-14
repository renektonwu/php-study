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

echo substr($strA, 0, 1) . "\n";


/**
 * 类型比较
 */
$lFalse = false;
$lNull = NULL;
if ($lFalse == $lNull) {
    echo "false equal NULL in value\n";
} else {
    echo "false not equal NULL in value\n";
}

if ($lFalse === $lNull) {
    echo "false equal NULL in type\n";
} else {
    echo "false not equal NULL in type\n";
}

/**
 * 递增递减运算符
 * $i++
 * $i--
 * --$i
 * ++$i
 */
echo "********************递增递减运算符****************\n";
$i = 0;

echo $i++ . "\n"; // 先输出 后自增
echo "i-> $i\n";
echo ++$i . "\n"; // 先自增后输出


/**
 * 逻辑运算符
 * 与 and
 * 或 or ; 另一种写法 : |
 * 非 !
 */
echo "********************逻辑运算符****************\n";
$logicVaria1 = 1;
$logicVaria2 = 2;
if ($logicVaria1 == 1 and $logicVaria2 == 2) {
    echo "I am through and action.\n";
}

$logicVaria3 = 3;
//if ($logicVaria1 == 1 or $logicVaria3 == 2) {
if ($logicVaria1 == 1 | $logicVaria3 == 2) {
    echo "I am through or action.\n";
}

$logicVaria4 = 3;
if ($logicVaria4) {
    echo "I am through true act.\n";
}
$logicVaria4 = 3;
if (!$logicVaria4) {
    echo "I am through true act.\n";
} else {
    echo "I am through false act.\n";
}


/**
 * 三元运算符
 * (expr1) ? (expr2) : (expr3)
 * 即 expr1 true 返回 expr2的结果，否则返回expr3的结果
 */
echo "********************三元运算符****************\n";

$thirdVar1 = 1;
$thirdVar2 = 2;
// 普通写法
$thirdVar3 = ($thirdVar1 == $thirdVar2) ? 5 : 6;
echo $thirdVar3 . PHP_EOL; // 等价写法： echo $thirdVar3 , PHP_EOL;
$thirdVar4 = ($thirdVar1 == $thirdVar2) ? (1 == 2) : 6; // 此时$thirdVar4 为false 即和空值一样。
echo $thirdVar4 . PHP_EOL; // 等价写法： echo $thirdVar3 , PHP_EOL;


/**
 * 循环
 * while
 * do...while...
 * for
 * foreach
 */
echo "********************循环****************\n";
for ($i = 0; $i <= 9; $i++) {
    echo $i, PHP_EOL;;
}

echo "****while****\n";

$k = 0;
while ($k <= 9) {
    echo $k, PHP_EOL;
    $k++;
}

echo "****do****while****\n";
$j = 0;
do {
    echo $j, PHP_EOL;
    $j++;
} while ($j <= 9);

echo "****foreach****\n";
foreach (range(0, 9) as $number) {
    echo $number, PHP_EOL;
}


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
    echo "1 == 2\n";
} else {
    echo "1 != 2\n";
}

$wA = 2;
switch ($wA) {
    case 1:
        echo "wa-> 1\n";
        break;
    case 2:
        echo "wa-> 2\n";
        break;
    default:
        echo "default\n";
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
echo "********************超级全局变量****************\n";
//var_dump($GLOBALS); // 当前环境 所有的全局变量变量

// $_SERVER 变量中可以得到
// 1当前脚本的名字  ["SCRIPT_FILENAME"]=>string(11) "phpBase.php"
// 2old (print) working directory   ["OLDPWD"]=> string(19) "/data/www/php-study"
var_dump($_SERVER);

//var_dump($_REQUEST); // 其他的用到再记录
//var_dump($_POST);
//var_dump($_GET);
//var_dump($_FILES);
//var_dump($_ENV);
//var_dump($_COOKIE);
//var_dump($_SESSION);



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


/**
 * 被引用的函数
 *
 */
function test()
{
    echo "test\n";
}
