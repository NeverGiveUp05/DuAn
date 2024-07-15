<?php
require '../../global.php';
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/hang_hoa.php";

session_start();

$active = 'hang_hoa';

if (exist_param("btn_list")) {
    $VIEW_NAME = "list.php";
} else if (exist_param("delete")) {
    $id = $_REQUEST['id'];
    $product = hang_selectById($id);

    hang_delete($id);

    $old_path = $product['hinh_anh'];
    $old_path1 = $product['hinh_anh_nen'];
    $old_path2 = $product['hinh_anh_1'];
    $old_path3 = $product['hinh_anh_2'];


    unlink($_SERVER['DOCUMENT_ROOT'] . $old_path);
    unlink($_SERVER['DOCUMENT_ROOT'] . $old_path1);
    unlink($_SERVER['DOCUMENT_ROOT'] . $old_path2);
    unlink($_SERVER['DOCUMENT_ROOT'] . $old_path3);

    $_SESSION['hang_delete'] = 'success';

    header('location: ?btn_list');
} else if (exist_param("edit")) {
    $id = $_REQUEST['id'];
    $product = hang_selectById($id);

    $VIEW_NAME = "edit.php";
} else {
    $VIEW_NAME = "add.php";
}

require "../layout.php";
