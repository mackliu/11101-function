<?php
$name="mack";

 //to('test.php');
$sum=sum(22,10);
echo $sum;
/*
dd(['a'=>11,'b'=>12,'count'=>['G'=>"a man","T"=>"dfasdfsdfsa"]]); */

//to('test.php');

//dd => direct dump




function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}



function to($url='index.php'){
    header('location:'.$url);
}

function sum($num1,$num2){
    return $num1+$num2;
}


?>
