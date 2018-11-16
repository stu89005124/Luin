<?php
$str = 'Apple,Dog,Pig,Cat,Egg' . ',test';
$str_sec = explode(",",$str);
// print_r($str_sec);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>切割函數</title>
</head>
<body>
<h1>切割函數</h1>
    <?php $Num= count($str_sec);
          foreach($str_sec as $value){
              echo "<h2>$value</h2><br>";
          }
    ?>
</body>
</html>