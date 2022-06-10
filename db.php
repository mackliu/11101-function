<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自訂函式練習</title>
    <style>
        body{
            font-family: 'Courier New', Courier, monospace;
        }
        h1{
            text-align: center;
        }
        .quiz{
            width:100%;
            padding:0.6rem 1rem;
            border:blue;
            background:lightblue;
            box-shadow: 1px 1px 10px #ccc;
            margin:0.5rem;
        }
    </style>
</head>
<body>
 <h1>自訂函式練習</h1>
 <div class="quiz">
 給定一個正整數的數值後，會印出對應行數的正三角形星星(依此類推可以設計印菱形，方形的函式)
 </div>
 <?php
$size=isset($_GET['size'])?$_GET['size']:3;
$shap=isset($_GET['shap'])?$_GET['shap']:'正三角形';

?>
 <form action="db.php">
     大小:<input type="number" name="size" value="<?=$size;?>">&nbsp;&nbsp;
     形狀: <select name="shap">
         <option value="正三角形" <?=($shap=='正三角形')?'selected':'';?>>正三角形</option>
         <option value="菱形" <?=($shap=='菱形')?'selected':'';?>>菱形</option>
     </select>
    <input type="submit" value="繪製">
 </form>
<?php

starts($size,$shap);
//diamond(30);
?>

 <div class="quiz">
 all()-給定資料表名後，會回傳整個資料表的資料
 </div>
 <?php
$table=isset($_GET['table'])?$_GET['table']:'dept'

?>
 <form action="db.php">
     資料表:<input type="text" name="table" value="<?=$table;?>">&nbsp;&nbsp;
     
    <input type="submit" value="列出">
 </form>
<?php

$rows=all($table);
echo "<ul>";
foreach($rows as $row){
    echo "<li>";
    show($row);
    echo "</li>";
    
}
echo "</ul>";
?>

 <div class="quiz">
 find()-會回傳資料表指定id的資料
 </div>
 <?php
$id=isset($_GET['id'])?$_GET['id']:'1';
$table=isset($_GET['table'])?$_GET['table']:'students';

?>
 <form action="db.php">
     資料表:<input type="text" name="table" value="<?=$table;?>">&nbsp;&nbsp;
     id:<input type="text" name="id" value="<?=$id;?>">&nbsp;&nbsp;
     
    <input type="submit" value="列出">
 </form>
<?php
    $row=find($table,$id);
    show($row);
?>

 <div class="quiz">
 update()-給定資料表的條件後，會去更新相應的資料。
 </div>
 <div class="quiz">
 insert()-給定資料內容後，會去新增資料到資料表
 </div>
 <div class="quiz">
 del()-給定條件後，會去刪除指定的資料
 </div>
 

</body>
</html>
<?php
//給定一個正整數的數值後，會印出對應行數的正三角形星星(依此類推可以設計印菱形，方形的函式)
function starts($lines,$type){
    switch($type){
        case '正三角形':
            for($i=0;$i<$lines;$i++){
   
                for($k=($lines-1);$k>$i;$k--){
            
                    echo "&nbsp;";
            
                }
                for($j=0;$j<($i*2+1);$j++){
            
                    echo "*";
            
                }
            
                echo "<br>";
            }
        break;
        case "菱形":
            diamond($lines);
        break;
    }
    
    
}
function diamond($lines){
    $size=$lines;

    //先判斷是否為奇數
    if($size%2==0){
        $size=$size+1;
    }
    if($size<3){
        $size=3;
    }
    
    for($i=0;$i<$size;$i++){
    
        if($i<=(($size-1)/2)){
            $space=($size-1)/2-$i;
            $stars=$i*2+1; 
        }else{
            $space=$i-($size-1)/2;
            $stars=($size-$i)*2-1; 
        }
    
        //印空白
        for($k=0;$k<$space;$k++){
            echo "&nbsp;";
        }
    
        //印星星
        for($j=0;$j<$stars;$j++){
            echo "*";
        }
        echo "<br>";
    }

}
//all()-給定資料表名後，會回傳整個資料表的資料
function all($table){
    $dsn="mysql:host=localhost;charset=utf8;dbname=school2";
    $pdo=new PDO($dsn,'root','');
    $sql="SELECT * FROM `$table`";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


//find()-會回傳資料表指定id的資料
function find($table,$id){
    $dsn="mysql:host=localhost;charset=utf8;dbname=school2";
    $pdo=new PDO($dsn,'root','');
    $sql="SELECT * FROM `$table` WHERE `id`='$id'";
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function show($row){
    
    if(is_array($row)){
        foreach($row as $key => $value){
            echo $value;
            echo "--";
        }
    }else{
        echo "這不是一筆標準的資料，請重新輸入";
    }
}

//update()-給定資料表的條件後，會去更新相應的資料。
function update(){

}


//insert()-給定資料內容後，會去新增資料到資料表
function insert(){

}


//del()-給定條件後，會去刪除指定的資料
function del(){

}

?>