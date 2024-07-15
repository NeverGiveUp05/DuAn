<?php
require '../../global.php';
require "../../dao/pdo.php";
require "../../dao/khach_hang.php";

session_start();

$active = 'khach_hang';

if (exist_param("btn_list")) {
    $VIEW_NAME = "list.php";
} else if (exist_param("delete")) {
    $id = $_REQUEST['id'];
    $select = user_selectById($id);

    user_delete($id);

    $old_path = $select['hinh_anh'];

    if (isset($old_path)) {
        unlink($_SERVER['DOCUMENT_ROOT'] . $old_path);
    }

    $_SESSION['user_delete'] = 'success';

    header('location: ?btn_list');
} else if (exist_param("edit")) {
    $id = $_REQUEST['id'];
    $info = user_selectById($id);

    $VIEW_NAME = "edit.php";
} else {
    $VIEW_NAME = "add.php";
}

require "../layout.php";
