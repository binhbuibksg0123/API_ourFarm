<?php
session_start();
$_SESSION["domainname"] = "mvc";
require_once "./mvc/Bridge.php";
$myApp = new App();
?>