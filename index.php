<?php

$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

?>

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
        padding: 15px 30px;
        padding-left: 10px;
        margin: 4px 2px;
        width:250px;
        font-family:'Comfortaa';
      }
    </style>
  </head>

  <body>
    <div class="container">
        <?php
        foreach ($xml->item as $item) {
        ?>
        <div class="form-inner">
               
                <?php 
                  if ($item['id'] == 1) { ?>
                  <div class="name" style="background-color: #AFEEEE; text-align:center; border-radius: 30px; padding-top: 1px; padding-bottom:1px;">
                    <H2 style="font-family:'Comfortaa';">База данных посетителей отеля на данный момент</H2>
                  </div>
                  <div class = "table"style=" margin-top:20px;margin-bottom:0px;text-align:center; padding-top:10px; padding-bottom:10px;">
                    <a href="create.php?id=<?= $item['id']?>"><input type="submit" value="Добавить посетителя"></a>
                  </div>
                  <div style="margin-left:670px; margin-bottom:20px;">
                    <img src="https://img1.picmix.com/output/stamp/thumb/3/1/4/4/474413_3a0b7.gif">
                  </div>
                  <?php }
                  else {?>
                  <div class = "table2"style="margin-left:140px;">
                    <span class="task-card-name"><input type="text" placeholder="<?= $item->name ?>"></span>
                    <span class="task-card-city"><input type="text" placeholder="<?= $item->city ?>"></span>
                    <span class="task-card-city"><input type="text" placeholder="<?= $item['deadline'] ?>"></span>
                        <a href="delete.php?id=<?= $item['id']?>"><input type="submit" value="Удалить"></a>
                        <a href="update.php?id=<?= $item['id']?>"><input type="submit" value="Изменить"></a>
                  </div>
                  <?php
                  }?>     
        <?php
        }
        ?>
    </div>
  </body>
</html>