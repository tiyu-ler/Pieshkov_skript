<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Floral HTML CSS Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">
<link rel="stylesheet" href="css/fontawesome.min.css">
/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", 
	orientation: 'h', 
	classname: 'ddsmoothmenu', 
	contentsource: "markup" 
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 

</head>
<div id="templatemo_wrapper_h">
<div id="templatemo_header_wh">
	<div id="templatemo_header" class="header_home">
    	<div id="site_title"><a href="#">Floral Shop</a></div>
        <div id="templatemo_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="faqs.php">FAQs</a></li>
                <?php
                    if ($_SESSION['user_id'])
                    {
                ?>
                <li><a class="nav-icon position-relative text-decoration-none" href="index.php?exit=1">
                        <i class="fa fa-fw fa-user mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">Log Out</span>
                    </a></li>
                <?php
                    }
                    else
                    {
                ?>
                    
                        <li><a class="nav-icon position-relative text-decoration-none" href="login.php">
                            <i class="fa fa-fw fa-user mr-3 text-dark" title="Login"></i>
                            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">Login</span>
                        </a></li>
                <?php
                    }
                ?>
                 <?php
                        if ($_SESSION['user']['admin'] == 1)
                        {
                        ?>
                       
                        <li class="nav-item"><a class="nav-link" href="admin.php">
                            Admin panel
                        </a></li>
                        <?php } ?>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->

        <div class="slider-wrapper theme-orman">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
                <img src="images/portfolio/01.jpg" alt="slider image 1" />
                <a href="#">
                	<img src="images/portfolio/02.jpg" alt="slider image 2" title="This is an example of a caption" />
                </a>
                <img src="images/portfolio/03.jpg" alt="slider image 3" />
                <img src="images/portfolio/04.jpg" alt="slider image 4" title="#htmlcaption" />
                <img src="images/portfolio/05.jpg" alt="slider image 5" title="#htmlcaption" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>Example</strong> caption with <a href="http://dev7studios.com" rel="nofollow">a credit link</a> for <em>this slider</em>.
            </div>
        </div> 
		<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider({
				controlNav:false
			});
        });
        </script>
    </div> <!-- END of header -->
</div> <!-- END of header wrapper -->