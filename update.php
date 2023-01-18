<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap');
    body {
        
	    background-image: url("https://placepic.ru/wp-content/uploads/2018/03/201408190045-more-u-ostrova-sulavesi-indoneziya-kashamalasha-com.jpg");
        min-height:100%;
        padding: 10px;
        background-size:cover;
    } 
    input[type=submit] {
        background-color: #AFEEEE;
        border: 0.1;
        padding: 15px 30px;
        margin: 4px 2px;
        font-family:'Comfortaa';
      }
      input[type=text] {
        background-color: white;
        border: 0.1;
        padding: 10px 30px;
        margin: 4px 2px;
        font-family:'Comfortaa';
      }
      input[type=date] {
        background-color: white;
        border: 0.1;
        padding: 15px 30px;
        margin: 4px 2px;
        font-family:'Comfortaa';
      }

    </style>
</head>

<body>
    <?php
    $id = 0;
    $name = '';
    $city = '';
    $deadline = '';

    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $name = $item->name;
                $city = $item->city;
                $deadline = $item['deadline'];
                $node = $item;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $item->name = $_POST['task_name'];
                $item->city = $_POST['city'];
                $item['deadline'] = $_POST['deadline'];
                break;
            }
        }
        $xml->saveXML('data.xml');
    }
    ?>

    <form method="POST" action="update.php?id=<?= $id ?>">
        <div style="background-color: #AFEEEE; margin-left:10px; margin-right:1030px; border-radius: 30px; padding-top: 10px; padding-bottom: 10px; margin-top:50px; padding-left: 30px; margin-bottom:40px; ">
            <p style="font-family:'Comfortaa';">ФИО <input type="text" name="task_name" required value="<?= $name ?>" /><br /></p>
            <p style="font-family:'Comfortaa';">Номер <input type="text" name="city" value="<?= $city ?>" /><br /></p>
            <p style="font-family:'Comfortaa';">Дата заселения <input type="date" name="deadline" value="<?php $deadline ?>" /><br /></p>
            <input type="hidden" value="<?= $id ?>" name="id"/>
        </div>
        <div style="margin-left:150px;margin-bottom:20px;">
            <input type="submit" value="Сохранить" />
        </div>
    </form>
    <div  style="margin-left:145px; border-radius: 30px; padding-left: 30px;">
    <a href="index.php"><input type="submit" value="Назад"></a>
    </div>
</body>

</html>