<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" rel="stylesheet">
    
</head>
<body>
<h1>Калорийность продуктов</h1>
<table>
    <tr><th>Название</th><th>Калорийность</th></tr>
<?php
$mysqli = new mysqli("my-sql", "user", "password", "appDB");
$result = $mysqli->query("SELECT name, caloric FROM products");
foreach ($result as $row){
    echo "<tr><td>{$row['name']}</td><td>{$row['caloric']}</td></tr>";
}
?>
</table>
</body>
</html>