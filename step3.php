<?php

include_once "dbconf.php";
$message = NULL;
session_start();
    if (empty($_SESSION['sexe']) || empty($_SESSION['telephone'])) {

        header("Location:step2.php");
        
}
$message =  $_SESSION['nom'].$_SESSION['postnom'].$_SESSION['email'].$_SESSION['password'].$_SESSION['sexe'].$_SESSION['telephone'];

if (isset($_POST['submit'])) {

    $ln = $_POST['ln'];
    $jour = $_POST['jour'];
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];

    if (empty($_POST['ln'])  || empty($_POST['jour'])  || empty($_POST['mois'])  || empty($_POST['annee'])) {
        
     $message = "Veuillez remplir tous les champs !!";

    }else {
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['postnom'] = $_POST['postnom'];
        $_SESSION['email'] =$_POST['email'];
        $_SESSION['password']= $_POST['password'];
        $_SESSION['telephone'] =$_POST['telephone'];
        $_SESSION['sexe']= $_POST['sexe'];
        $_SESSION['ln'] =$_POST['ln'];
        $_SESSION['jour']= $_POST['jour'];
        $_SESSION['mois']= $_POST['mois'];
        $_SESSION['annee']= $_POST['annee'];
        $message = $jour.'/'.$mois.'/'.$annee;
        header("Location:step4.php?message=$message");
        

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
    <center>4</center>
    <h1>INSCRIPTION</h1>
   <?php
    if ($message) {
        ?>
         <p><?php echo $message; ?></p>
        <?php
        
    }
    
    ?>
        <label for="ln">Lieu de naissance</label><br>
        <input type="text" name="ln" id="ln"><br>
        <label>Date de naissance</label><br><br>
        <select name="jour" >
            <option>JOUR</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>
        <select name="mois" >
            <option >Mois</option>
            <option value="01">Janvier</option>
            <option value="02">Fevrier</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Août</option>
            <option value="09">Septemnbre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Decembre</option>
        </select>
        <select name="annee">
            <option value="2025">2025</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
            <option value="1969">1969</option>
          
            
        </select>
        <button type="submit" name="submit">SUIVANT</button>
        <div><a href="step2.php">RETOUR</a></div>
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