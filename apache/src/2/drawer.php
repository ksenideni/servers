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

if(isset($_GET['num']))
{
    if(!is_numeric($_GET['num'])){
        echo 'ERROR';
    }
    $number = (int)$_GET['num'];

    $shape = $number & 1;
    $cx = (($number & 3) <<7)+100;
    $cy = (($number >>2 & 3)<<7)+100;

    $svg_code = '<svg width = "' . $cx . '" height= "' . $cy . '">';
    switch($shape){
        case 0:
            $cx>$cy?$cx=$cy:$cy=$cx;
            $svg_code .= '<circle cx="' . $cx / 2 . '" cy ="' . $cy / 2 . '" r="' . $cx / 2;
            break;
        case 1:
            $cx>$cy?$cx=$cy:$cy=$cx;
            $svg_code .= '<rect x="0" y="0" width="' . $cx . '" height="' . $cy;
            break;
    }
    $color=sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    $svg_code .=  '" fill="' . $color . '" />' . '</svg>';
    echo $svg_code;
}
?>
</body>
</html>