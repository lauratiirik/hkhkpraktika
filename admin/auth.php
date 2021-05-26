<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}


function require_admin() {
    if ($_SESSION['user']->Admin != 1) {
        header('Location: index.php');
        exit();
    }
}