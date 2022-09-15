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
    $array=explode(",",$_GET['arr']);
    //Сортировка вставками
    $sorted_array=insertSort($array);
    for ($i = 0; $i < count($sorted_array); $i++){
        echo "$sorted_array[$i] ";
    }
    
    function insertSort(array $arr) {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }
     
        for ($i = 1; $i < $count; $i++) {
            $cur_val = $arr[$i];
            $j = $i - 1;
     
            while ($j>=0 && $arr[$j] > $cur_val) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $cur_val;
                $j--;
            }
        }
        return $arr;
    }
    ?>
</body>
</html>