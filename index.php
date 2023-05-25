<?php 
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/Database.php'); //берем путь от корня папки
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Item.php"); //берем путь от корня папки
if ($_POST['email'] && $_POST['password'])
{
    // Если присутствуют значения для email и password
    $email = addslashes($_POST['email']); // Экранирование специальных символов в email
    $password = md5($_POST['password']); // Хэширование пароля с использованием MD5

    $_POST['password'] .= "=" . $password; // Добавление хэшированного пароля к строке в $_POST

    $mysqli = new Database; // Создание объекта базы данных
    $mysqli->getConnection(); // Установка соединения с базой данных

    $sql = "SELECT * FROM user WHERE email = '$email' AND passwordHash = '$password';"; // SQL-запрос для выборки пользователя по email и паролю
    $mysqli->runQuery($sql); // Выполнение SQL-запроса

    if ($mysqli->num_rows == 1)
    {
        // Если найдена одна строка, то пользователь существует
        $_SESSION['user'] = $mysqli->getRow(); // Сохранение данных пользователя в сессию
        $_SESSION['user_id'] = $_SESSION['user']['id']; // Сохранение ID пользователя в сессию
    }
    else
    {
        // Если пользователь не найден
        session_destroy(); // Уничтожение сессии
        unset($_SESSION); // Очистка массива $_SESSION
    }
}

if ($_GET['exit'] == 1)
{
    // Если присутствует параметр exit в URL и равен 1
    session_destroy(); // Уничтожение сессии
    unset($_SESSION); // Очистка массива $_SESSION
}
?>

<!-- templatemo 385 floral shop -->
<!-- 
Floral Shop Template 
http://www.templatemo.com/preview/templatemo_385_floral_shop 
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/header.php"); //берем путь от корня папки?>  
<div id="templatemo_main_wrapper">
<div id="templatemo_main">
	<div id="sidebar" class="left">
    	<div class="sidebar_box"><span class="bottom"></span>
            <h3>Promotional activities</h3>   
            <div class="content"> 
                <ul class="sidebar_list">
                    <li><a>Free shipping on order over 25$</a></li>
                    <li><a>-10% on order over 50$</a></li>
                    <li><a>ClubCard with special bonuses</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="content" class="right">
		<h2>Welcome to Floral Shop</h2>
		<p>Floral Shop is free website template by templatemo. Sed in suscipit risus, eget consectetur justo. Praesent lacinia, nisi quis commodo consectetur, diam magna laoreet felis, a pulvinar mauris enim in felis. Phasellus in mauris velit. In pellentesque massa in nisl auctor pellentesque. Donec fermentum convallis purus, id luctus nulla tempus in. Aliquam diam nibh, consectetur quis fringilla facilisis, egestas sed odio.</p>
        <div class="col-md-8 offset-md-2">

                <div class="row">
                <?php
                     $sql= "Select id from product";
                     $mysqli = new Database ();
                     $mysqli->getConnection();
                     $dat = $mysqli->getArray($sql); //записиваем в $dat массив массивов
                     foreach ($dat as $val) //перебераем
                     {
                        $Product[$val['id']] = new Product ($val['id']); //создаем обьект класса датабази
                        $Product[$val['id']]->displayCard('noadmin'); //показиваем карточку с атрибутом, что уберет кнопки админа


                     }?>
                </div>
            </div>
        <div class="blank_box">
        	<img src="images/free_shipping.jpg" alt="Free Shipping" />
        </div>    
    </div>
    <div class="cleaner"></div>
</div> <!-- END of main -->
</div> <!-- END of main wrapper -->
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/footer.php"); //берем путь от корня папки?> 

</body>
</html>