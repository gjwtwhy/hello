<?php
/**
 * 春天是鲜花的季节，水仙花就是其中最迷人的代表，数学上有个水仙花数，他是这样定义的： “水仙花数”是指一个三位数，它的各位数字的立方和等于其本身，比如：153=1^3+5^3+3^3。 现在要求输出所有在m和n范围内的水仙花数。
编写一个php函数测试输入的数字是否为水仙花数。（提示：不能将数字当作字符串处理），函数原型为：
flower($n)  $n为任意正整数 返回 true/false
 * User: guojuan
 * Date: 2019/1/15
 * Time: 8:25
 */

//获取m 和 n 之间所有的正整数
$m = isset($_GET['m'])?$_GET['m']:1;
$n = isset($_GET['n'])?$_GET['n']:1000;
if ($n<$m){//$n<$m时调换为m小n 大
    $s = $m;
    $m = $n;
    $n = $s;
}
$data = range($m,$n);

//循环数字
foreach ($data as $k => $n) {
    $result = flower($n);
    if ($result){
        echo $n."<br/>";
    }
}


/**
 * 思路：
//1,先判断$n是正整数，且是三位数
//2，获取$n的每一位数字
//3，计算每一位数字的立方，相加
//4，判断立方和是否等于$n
 * @param $n
 * @return bool
 */
function flower($n){
    //1,先判断$n是正整数，且是三位数
    if (!is_numeric($n)){
        return false;
    }
    if ($n<100 || $n>999){
        return false;
    }

    //方法一：把数字当字符串处理方法
    //2，获取$n的每一位数字
    //$arr = str_split($n);
    //3，计算每一位数字的立方，相加
//    $total = 0;
//    foreach ($arr as $k => $v) {
//        $total += pow($v,3);
//    }

    //方法二：分别取出三位数的百位、十位、个位
//    $a = intval($n/100);
//    $b = intval(($n-$a*100)/10);
//    $c = intval($n-$a*100-$b*10);
//    $total = pow($a,3)+pow($b,3)+pow($c,3);

    //方法三：取余算法
    $a = intval($n/100);
    $b = intval(($n/10)%10);
    $c = intval($n%10);
    $total = pow($a,3)+pow($b,3)+pow($c,3);

    //4，判断立方和是否等于$n
    if ($total==$n){
        return true;
    }

    return false;
}