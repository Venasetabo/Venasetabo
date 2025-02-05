<?php

include_once "dbconf.php";
session_start();
// if(isset(['annee'])) {
    // if ((time(),$_SESSION['last_login_timestamp'])>9) {

        header("Location:step0.php");

    // }
// }
// if (empty($_SESSION['sexe']) || empty($_SESSION['telephone']) || empty($_SESSION['nom']) || empty($_SESSION['postnom']) || empty($_SESSION['email']) || empty($_SESSION['ln'])|| empty($_SESSION['jour']) || empty($_SESSION['mois']) || empty($_SESSION['annee'])) {

//     header("Location:step3.php");
    
// }

// $message = array();

// session_start();

$message =  $_SESSION['nom'].$_SESSION['postnom'].$_SESSION['email'].$_SESSION['password'].$_SESSION['sexe'].$_SESSION['telephone'].$_SESSION['jour'].$_SESSION['mois'].$_SESSION['annee'];



$_SESSION['nom'];
$_SESSION['postnom'];
$_SESSION['email'] ;;
$_SESSION['telephone'];
$_SESSION['sexe'];
$_SESSION['ln'];
$_SESSION['jour'];
$_SESSION['mois'];
$_SESSION['annee'];

$nom = $_SESSION['nom'];
$postnom = $_SESSION['postnom'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$telephone = $_SESSION['telephone'];
$sexe = $_SESSION['sexe'];

$ln = $_SESSION['ln'];
$jour = $_SESSION['jour'];
$mois = $_SESSION['mois'];
$annee = $_SESSION['annee'];
$dn = $jour.'/'.$mois.'/'.$annee;

if (isset($_POST['submit'])) {

    echo $_SESSION['telephone'];
    
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
    <center>4</center>
    <h1>INSCRIPTION</h1>
   <?php
    if ($message) {
        ?>
         <p><?php echo $message; ?></p>
        <?php   
    }
    
    ?>
    <input type="checkbox" name="checked">
        <button type="submit" name="submit">ENREGISTRER</button>
        <div><a href="step3.php">RETOUR</a></div>
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
        /* bottom:340px; */
        margin-top:600px;
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
        color:black;
        /* background: #36454F; */
    }form input:focus{
        /* background: white; */
        background: #6D7B8D;
        
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
    }select{
        color:black;
        width: 15%;
        height:40px;
        border-radius:15px;
        padding:10px;
    }
    select:focus{
        border:3px solid green;
        background: #36454F;
        outline:none;
    }
</style>