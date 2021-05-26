<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
	exit();
}
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: index.php');
	exit();
}
?>