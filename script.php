<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    $file = file("count.txt");
    $count = implode("", $file);
    $count++;
    $myfile = fopen("count.txt","w");
    fputs($myfile,$count);
    fclose($myfile);
?>
<span>Просмотров: <?=$count ?></span>
</body>
</html>