<?php session_start();
if (isset($_SESSION['user-id'])) {
    unset($_SESSION['user-id']);
    header('location: ./layout.php');
}
