<?php
session_start();
if(!isset($_SESSION["Usernames"])&&!isset($_SESSION["UserID"])&&!isset($_SESSION["FullName"])){
header("Location: login.php");
exit(); }
?>