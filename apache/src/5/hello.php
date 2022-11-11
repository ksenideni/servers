<?php
    session_start();
    $theme = null;
    $name = null; 
    $lang = null;
    if (array_key_exists('theme', $_GET)) {
        $_SESSION['theme'] = $_GET['theme'];
    }
    if (array_key_exists('theme', $_SESSION)) {
        $theme = $_SESSION['theme'];
    }
    if (array_key_exists('name', $_GET)) {
        $_SESSION['name'] = $_GET['name'];
        $name = $_SESSION['name'];
    }
    if (array_key_exists('name', $_SESSION)) {
        $name = $_SESSION['name'];
    }
    if (array_key_exists('lang', $_GET)) {
        $_SESSION['lang'] = $_GET['lang'];
        $lang = $_SESSION['lang'];
    }
    if (array_key_exists('lang', $_SESSION)) {
        $lang = $_SESSION['lang'];
    }
    if ($theme == null){
        $theme = 'light';
    }
    if ($name == null) {
        $name = 'nobody';
    } 
    if ($lang == null) {
        $lang = "ru";
    }
    $phrases = [
        'ru' => [
            0 => 'Привет, ' . $name,
            1 => 'Насройки',
            2 => 'Файлы'
        ],
        'en' => [
            0 => 'Hi, ' . $name,
            1 => 'Settings',
            2 => 'Files'
        ]
    ];
?>

<!DOCTYPE html>
<html lang="$lang">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        switch($theme) {
            case "light":
                echo "<link rel=\"stylesheet\" href=\"/light.css\">";
                break;
            case "dark":
                echo "<link rel=\"stylesheet\" href=\"/dark.css\">";
                break;
        }
    ?>
    <title>Document</title>
</head>
<body>
    <header class="header"><?php echo $phrases[$lang][0] ?></header>

    <h2><?php echo $phrases[$lang][1] ?></h2>
    <form method='GET' action='/5/hello.php'>
        <select name='theme'>
            <option value='light'>light</option>
            <option value='dark'>dark</option>
        </select>
        <select name='lang'>
            <option value='ru'>Русский</option>
            <option value='en'>English</option>
        </select>
        <input type='text' name='name'/>
        <input type='submit'/>
    </form>

    <h2><?php echo $phrases[$lang][2] ?></h2>

    <form method='POST' action='/5/hello.php' enctype="multipart/form-data">
        <input type='file' name='file' id='file'>
        <input type='submit'>
    </form>


    <?php
    $path = "storage/";
    if (array_key_exists('file', $_FILES)) {
        if(mime_content_type($_FILES['file']['tmp_name'])=='application/pdf'){
            move_uploaded_file($_FILES['file']['tmp_name'], $path . "/" . $_FILES['file']['name']);
        }
        else{
            echo "<h2>У вас не PDF, вы обманщик!)</h2>";
        }
    }
    $files = scandir($path);
    foreach($files as $file) {
        echo "<a href=\"loader.php?file=" . $file . "\">" . $file . "</a>";
        echo "<br>";
    }
    ?>

</body>
</html>