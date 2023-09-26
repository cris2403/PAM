<?php
include "BDconection.php";

connectToDatabase("LocalHost", "root", "", "loja");
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
exit();
?>
