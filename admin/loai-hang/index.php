<?php
require '../../global.php';
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
session_start();

$active = 'loai_hang';

if (exist_param("btn_list")) {
    $VIEW_NAME = "list.php";
} else if (exist_param("delete")) {
    $id = $_REQUEST['id'];

    loai_delete($id);

    $_SESSION['delete_loai_hang'] = 'success';

    header('location: ?btn_list');
} else if (exist_param("edit")) {
    $id = $_REQUEST['id'];
    $info = loai_selectById($id);

    $VIEW_NAME = "edit.php";
} else {
    $VIEW_NAME = "add.php";
}

require "../layout.php";
