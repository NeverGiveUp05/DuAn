<?php
require '../../global.php';
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
require "../../dao/khach_hang.php";
require "../../dao/hang_hoa.php";

session_start();

$active = 'thong_ke';

if (exist_param("chart")) {
    $VIEW_NAME = "chart.php";
} else {
    $VIEW_NAME = "list.php";
}

require "../layout.php";
