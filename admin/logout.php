<?php 

if(!$_SESSION['mykadi']){
	Header("Location:login.php");
}

session_start();
session_destroy();
Header("Location:../index.php");



?>