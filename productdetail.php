<?php session_start();   ?>
<!-- templatemo 385 floral shop -->
<!-- 
Floral Shop Template 
http://www.templatemo.com/preview/templatemo_385_floral_shop 
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/header.php") ?> 
<div id="templatemo_main_wrapper">
<div id="templatemo_main">
	<div id="sidebar" class="left">
    	<div class="sidebar_box"><span class="bottom"></span>
            <h3>Most popular</h3>   
            <div class="content"> 
                <ul class="sidebar_list">
                    <li><a href="productdetail.php?action=1">Ut eu feugiat</a></li>
                    <li><a href="productdetail.php?action=3">Tristique Vitae</a></li>
                    <li><a href="productdetail.php?action=4">Hendrerit Eu</a></li>
                    <li><a href="productdetail.php?action=6">Curabitur et turpis</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="content" class="right">
      	<h2>Product Detail</h2>
          <div class="content_half left">
    <?php
    $action = $_GET['action']; // Assuming action is passed through the URL query string
    $imagePath = '';

    // Use a switch statement to determine the image path based on the action
    switch ($action) {
        case '1':
            $imagePath = 'images\product\01_l.jpg';
            $price = '$240';
            break;
        case '2':
            $imagePath = 'images\product\02_l.jpg';
            $price = '$160';
            break;
        case '3':
            $imagePath = 'images\product\03_l.jpg';
            $price = '$140';
            break;
        case '4':
            $imagePath = 'images\product\04_l.jpg';
            $price = '$320';
            break;
        case '5':
            $imagePath = 'images\product\05_l.jpg';
            $price = '$150';
            break;
        case '6':
            $imagePath = 'images\product\06_l.jpg';
            $price = '$110';
            break;
        case '7':
            $imagePath = 'images\product\07_l.jpg';
            $price = '$130';
            break;
        case '8':
            $imagePath = 'images\product\08_l.jpg';
            $price = '$170';
            break;
        default:
            $imagePath = 'images\templatemo_logo.png';
            break;
    }
    ?>
    <img style="width:360px" src="<?php echo $imagePath; ?>">
    </div>
            <div class="content_half right">
                <table>
                    <tr>
                        <td width="130">Price:</td>
                        <td width="84"><?php echo $price; ?></td>
                    </tr>
                    <tr>
                        <td>Availability:</td>
                        <td><strong>In Stock</strong></td>
                    </tr>
                </table>
                <br>
                <p>Their diverse shapes, sizes, and textures offer a visual feast for the eyes. Whether adorning a garden, brightening up a room, or serving as thoughtful gifts, flowers evoke emotions and create a sense of tranquility. From the delicate petals of roses to the vibrant hues of sunflowers and the intricate patterns of orchids, each flower has its unique charm, making them a timeless symbol of love, celebration, and natural beauty.</p>
                <div class="cleaner h20"></div>
			</div>
    </div>
    <div class="cleaner"></div>
</div> <!-- END of main -->
</div> <!-- END of main wrapper -->
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/footer.php") ?> 
</body>
</html>
