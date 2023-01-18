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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $task_name = $_POST['task_name'];
        $city = $_POST['city'];
        $deadline = $_POST['deadline'];
        $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
        $task = $xml->addChild('item', '');
        $task->addAttribute('deadline', $deadline);
        $task->addChild('name', $task_name);
        $task->addChild('city', $city);
        $task->addAttribute('id', $xml->count());
        $xml->saveXML('data.xml');
    }
    ?>
    <form method="POST" action="create.php">
        <div style="background-color: #AFEEEE; margin-left:10px; margin-right:1030px; border-radius: 30px; padding-top: 10px; padding-bottom: 10px; margin-top:50px; padding-left: 30px; margin-bottom:40px; ">
            <p style="font-family:'Comfortaa';"> ФИО <input type="text" name="task_name" required /><br /></p>
            <p style="font-family:'Comfortaa';"> Номер <input type="text" name="city" /><br /></p>
            <p style="font-family:'Comfortaa';">Дата заселения  <input type="date" name="deadline" /><br /></p>
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