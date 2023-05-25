<?php session_start(); //создаем $_SESSION ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css" type="text/css" media="screen">
    <title>Account</title>
</head>
<?php
    if ($_POST['email'])
    {
        if ($_POST['password'] == $_POST['confirmPassword'])
        {
            $email = addslashes($_POST['email']);
            unset($_GET['action']);
            
            require_once ($_SERVER['DOCUMENT_ROOT'].'/class/Database.php'); //берем путь от корня папки
            $mysqli = new Database();
            $mysqli->getConnection();
           
            $sql = "Select * from user where email='$email'"; 
            $mysqli->runQuery($sql);
            if ($mysqli->num_rows)
            {
                $error="This Email is already in use";
            }
            else
            {
                $sql = "INSERT into user (firstName, lastName, mobile, email, passwordHash,registeredAt) values 
                (
                        '".addslashes($_POST['firstName'])."',
                        '".addslashes($_POST['lastName'])."',
                        '".addslashes($_POST['mobile'])."',
                        '".addslashes($_POST['email'])."',
                        '".md5($_POST['password'])."',now())";
                  $mysqli->runQuery($sql);

            }
        }else{
          $error="Passwords aren`t equal";
        }
    }else{
      session_destroy(); //отключение от сессии
      unset($_SESSION); //очищение переменной
  }
?>
<body style="height:1100px">

<div class="center">
  <h1 style="margin-top:20px;margin-bottom:30px;margin-left:40px">Floral</h1>
  <h2 style="text-align: center;margin-bottom:30px"><?= $_GET['action'] == 'new' ? 'Create' : 'Login' ?></h2>
  <form style="padding: 40px;width:325px" <?= $_GET['action'] == 'new' ? '' : 'action="index.php"' // $_GET визуально(в строке запроса - атрибут) ?> method="post"> 
    <?php 
    if ($_GET['action'] == 'new') { 
      ?>
    <div class="inputbox" style="margin-top:-10px;margin-bottom:35px;width:300px">
      <input name="firstName" type="text" required="required">
      <span>First Name</span>
    </div>
    <div class="inputbox" style="margin-top:-10px;margin-bottom:35px;width:300px">
      <input name="lastName" type="text" required="required">
      <span>Last Name</span>
    </div>
    <div class="inputbox" style="margin-top:-10px;margin-bottom:35px;width:300px">
      <input name="mobile" type="phone" required="required">
      <span>Mobile</span>
    </div>
    <?php } ?>
    <div class="inputbox" style="margin-top:-10px;margin-bottom:35px;width:300px">
      <input name="email" type="email" required="required">
      <span>Email</span>
    </div>
    <div class="inputbox" style="margin-top:-10px;margin-bottom:35px;width:300px">
      <input name="password" type="password" required="required">
      <span>Password</span>
    </div>
    <?php if ($_GET['action'] == 'new') { ?>
    <div class="inputbox" style="margin-top:-10px;margin-bottom:35px;width:300px">
      <input name="confirmPassword" type="password" required="required">
      <span>Confirm Password</span>
    </div>
    <?= $error ? "<h3 style='color:red;'>$error</h3>":''?>
    <?php } ?>
    <div class="inputbox" style="margin-top:-10px;margin-bottom:35px;width:300px">
      <input type="submit" value="<?= $_GET['action'] == 'new' ? 'Create' : 'Login' ?>">
    </div>
    <?= $_GET['action'] == 'new' ? ' <a href="?">Return to login</a>' : ' <a href="?action=new">Create new account</a>' //тернальний оператор if?> 
    </div>
  </form>
</div>
</body>
</html>