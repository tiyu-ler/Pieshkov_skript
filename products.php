<?php session_start();  
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Database.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/class/Item.php"); ?>
<!-- templatemo 385 floral shop -->
<!-- 
Floral Shop Template 
http://www.templatemo.com/preview/templatemo_385_floral_shop 
-->
<body>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/header.php") ?> 
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
    <h2>Our products:</h2>  
    <?php
     $sql= "Select id from product";
     $mysqli = new Database ();
     $mysqli->getConnection();
     $dat = $mysqli->getArray($sql);
     foreach ($dat as $val)
     {
        $Product[$val['id']] = new Product ($val['id']);
        $Product[$val['id']]->displayCard('noadmin');
     }?>
    </div>
    <div class="cleaner"></div>
</div> <!-- END of main -->
</div> <!-- END of main wrapper -->
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/footer.php") ?> 
</body>
</html>