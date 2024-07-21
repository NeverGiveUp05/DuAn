<?php
session_start();
require "../../dao/pdo.php";
require "../../dao/binh_luan.php";

$ids = $_GET["ids"];

comment_multipleDelete($ids);

$_SESSION['comment_delete'] = 'success';

$location = 'location: ./?detail&id=' . $_SESSION["current-pro"];

header($location);
