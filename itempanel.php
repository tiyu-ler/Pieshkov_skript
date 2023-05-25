<?php session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Database.php"); //берем путь от корня папки
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Item.php"); //берем путь от корня папки
$product = new Product ($_GET['id']);

if ($_POST['Send'])
{
$url = '/images/product/';
   // 1)Проверяем, существует ли имя.
if($_FILES['FILE']['name']){
   
    if($_FILES['FILE']['type'] == 'image/jpeg' || $_FILES['FILE']['type'] == 'image/png') 
 {
    
// 2)Проверяем размер файла
        if($_FILES['FILE']['size'] > 0 && $_FILES['FILE']['size'] <= 1024000) 
    {
       // 3)Проверяем загрузился ли файл на сервер
        if(is_uploaded_file($_FILES['FILE']['tmp_name'])) {
            // 4)Перемещаем загруженный файл в необходимую папку $url
            $id_img = md5($_FILES['FILE']['name'].date("YmdHis"));
            if(move_uploaded_file($_FILES['FILE']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$url.$id_img.($_FILES['FILE']['type'] == 'image/jpeg' ? ".jpg":".png"))) 
            {
                  $_POST['image_URL']=$url.$id_img.($_FILES['FILE']['type'] == 'image/jpeg' ? ".jpg":".png");
                //
                    //Выводим сообщение что файл обработа и загружен
                


                                                     
            }
            else { echo 'Error to move image to '.$url;}

                                                                              
        }
        else {echo 'Error to downloads images on serve';}

                                                        
    }
    else { echo 'Size of images is  more then 1000 Kb';}
                            
  }

  else { echo 'Format is not  JPG or PNG' ;}
                             
}
else { echo 'Images must have name!';}
$product->saveData($_POST);
}
?>
<head>
    <title>Product Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/templatemo.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/item.css">
    <?php $product->displayInput();
?>