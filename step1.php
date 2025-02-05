<?php

include_once "dbconf.php";
$message = NULL;
session_start();

if (empty($_SESSION['nom']) || empty($_SESSION['postnom']) ){
   header("Location:step0.php");
}else {
    $_SESSION['nom'];
    $_SESSION['postnom'];
}

    $message = $_SESSION['nom'].$_SESSION['postnom'];
$message = $_SESSION['nom'].$_SESSION['postnom']."@gmail.com";


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($_POST['email']) || empty($_POST['password'])) {
        
     $message = "Veuillez remplir tous les champs !!";
  

    }else {
        
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['postnom'] = $_POST['postnom'];
        $_SESSION['email'] =$_POST['email'];
        $_SESSION['password']= $_POST['password'];
        header("Location:step2.php");

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATION DU COMPTE</title>
</head>
<body>
    <form  method="post"><br><br>
    <center>2</center>
    <h1>INSCRIPTION</h1>
   <?php
    if ($message) {
        ?>
         <p><?php echo $message; ?></p>
        <?php
        
    }
    
    ?>
        <label for="email">EMAIL</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="password">PASSWORD</label><br>
        <input type="text" name="password" id="password"><br>
        <button type="submit" name="submit">SUIVANT</button>
        <div><a href="step0.php">RETOUR</a></div>
    </form>
    
</body>
</html>
<style>
    body{
        background: #000;
        background: #123456;
        background: #6D7B8D;
        background: #36454F;
        font-family:verdana, 'sans serif';
        display:flex;
        justify-content:center;
        align-items:center;
        text-align:center;
        padding:0;
        margin:0;
        box-sizing:border-box;
    }form{
        width: 40%;
        height:400px;
        position:absolute;
        bottom:340px;
        background: #dcdcdc;
        background: #98AFC7;
        background: #778899;
        background: #566D7E;
        background: #2B547E;
        background: #36454F;
        background: #123456;
        background: #151B54;
        background: #BDEDFF;
        background: #50C878;
        background: #36454F;
        background: #6D7B8D;
        justify-content:center;
        align-items:center;
        text-align:center;
        display:block;
        border-radius:15px;
    }form:before{
        /* content:""; */
        width: 40%;
        height:450px;
        position:absolute;
        bottom:340px;
        background: linear-gradient(#50C878,#566D7E);

    }form input{
        width: 50%;
        height:20px;
        padding:10px;
        margin:10px;
        border-radius:20px;
        border:2px solid green;
        outline:none;
    }form input{
        
        }form button{
        width: 20%;
        height:30px;
        bottom:0px;
        right:0;
        margin:10px;
        position:absolute;
        border-radius:15px;
        outline:none;
        border:none;
    }p{
        color:red;
        font-size:20px;
        background:rgb(107, 70, 70);
    }div {
        width: 20%;
        height:30px;
        background: #000;
        justify-content:center;
        align-items:center;
        text-align:center;
        display:flex;
        bottom:0px;
        left:0;
        margin:10px;
        position:absolute;
        border-radius:15px;
        outline:none;
        border:none;
    }div a{
        text-decoration:none;
    }center{
        color:blue;
        font-size:20px;
    }
</style>