<?php session_start(); 
 require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Database.php"); //берем путь от корня папки
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Item.php"); //берем путь от корня папки
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<body>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/header.php");//берем путь от корня папки ?>
<div id="templatemo_main_wrapper">
<div id="templatemo_main">
	<div id="sidebar" class="left">
    	<div class="sidebar_box"><span class="bottom"></span>
            <h3>Admin Panel</h3>   
            <div class="content"> 
                <ul class="sidebar_list">
                    <li><a href="itempanel.php" target="_blank">Add new item</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="content" class="right">
		<h2>Welcome to control panel</h2>      
        <?php
            $sql= "Select id from product"; //запрос по которому ми випишем айди
            $mysqli = new Database ();  //создаем новий обект дб
            $mysqli->getConnection(); //подключаемся к дб
            $dat = $mysqli->getArray($sql); //берет все айди из продукта (масив)
            foreach ($dat as $val) //переберает строки (масив дат)
            {
               $Product[$val['id']] = new Product ($val['id']); //для каждого айди создаем обьект Продукт
               $Product[$val['id']]->displayCard(''); //для каждого обьекта Продут виполняем функцию 
            }
        ?>
    </div>
    <div class="cleaner"></div>
</div> <!-- END of main -->
</div> <!-- END of main wrapper -->

</body>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/footer.php");//берем путь от корня папки ?> 
</html>