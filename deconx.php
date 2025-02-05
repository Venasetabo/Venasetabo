<?php

include_once "dbconf.php";
session_start();
session_destroy();
header("location:connexion.php");


?>