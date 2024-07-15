<?php
session_start();
require "../../dao/pdo.php";
require "../../dao/khach_hang.php";

$ids = $_GET["ids"];
$arrId = explode(",", $ids);

foreach ($arrId as $id) {
    $select = user_selectById($id);

    $old_path = $select['hinh_anh'];

    $arrImg[] = $old_path;
}

user_multipleDelete($ids);

foreach ($arrImg as $img_path) {
    unlink($_SERVER['DOCUMENT_ROOT'] . $img_path);
}

$_SESSION['user_multiDelete'] = 'success';

header('location: ./?btn_list');
