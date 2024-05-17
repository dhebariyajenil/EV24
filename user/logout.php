<?php
	include "connection.php";
	session_start();
	unset($_SESSION['uemail']);
	header("location:index.php");
?>