<?php
session_start();
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";

$ids = $_GET["ids"];

loai_multipleDelete($ids);

$_SESSION['delete_loai_hang'] = 'success';

header('location: ./?btn_list');
