<?php
	include "connection.php";
	session_start();
	unset($_SESSION['aemail']);
	header("location:index.php");
?>