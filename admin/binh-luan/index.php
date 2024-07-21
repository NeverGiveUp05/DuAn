<?php
require '../../global.php';
require "../../dao/pdo.php";
require "../../dao/khach_hang.php";
require "../../dao/binh_luan.php";
require '../../dao/hang_hoa.php';

session_start();

$active = 'binh_luan';

if (exist_param("detail")) {
    $VIEW_NAME = "detail.php";
} else if (exist_param("delete")) {
    $id = $_REQUEST['id'];

    comment_delete($id);

    $_SESSION['comment_delete'] = 'success';

    $location = 'location: ?detail&id=' . $_SESSION["current-pro"];

    header($location);
} else {
    $VIEW_NAME = "tong_hop.php";
}

require "../layout.php";
