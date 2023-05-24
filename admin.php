<?php session_start(); 
 require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Database.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Item.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<body>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/header.php") ?> 
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
            $sql= "Select id from product";
            $mysqli = new Database ();
            $mysqli->getConnection();
            $dat = $mysqli->getArray($sql);
            foreach ($dat as $val)
            {
               $Product[$val['id']] = new Product ($val['id']);
               $Product[$val['id']]->displayCard('');
            }
        ?>
    </div>
    <div class="cleaner"></div>
</div> <!-- END of main -->
</div> <!-- END of main wrapper -->

</body>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/footer.php") ?> 
</html>