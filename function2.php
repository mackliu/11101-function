<?php

sum(1,999);
echo "<hr>";
sum(1,2,3,4,5);
echo "<hr>";
sum(55,99,88);
echo "<hr>";
sum(1);
echo "<hr>";
function sum(...$arg){ //參數會被放入一個陣列中
    echo array_sum($arg);
/*     $sum=0;
    foreach($arg as $i){
        $sum=$sum+$i;
    }
    echo $sum; */

}

$name="mack";
$p1=['name'=>'衣服','price'=>100];
$p2=['name'=>'鞋子','price'=>200];
$p3=['name'=>'帽子','price'=>300];
$p4=['name'=>'背包','price'=>400];

total($name,$p1,$p2,$p3,$p4);

function total($name,...$cart){
    $sum=0;
    echo "<h1>$name 以下是你的購物內容</h1>";
    echo "<ul>";
    foreach($cart as $item){
        echo "<li>";
        echo $item['name'];
        echo "==>";
        echo $item['price'];
        echo "</li>";
        $sum=$sum+$item['price'];
    }
    echo "<li>總計".$sum."元";
    echo "</ul>";
}

?>