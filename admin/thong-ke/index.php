<?php
require '../../global.php';
require "../../dao/pdo.php";
require "../../dao/loai_hang.php";
session_start();

if (exist_param("btn_list")) {
    $VIEW_NAME = "list.php";
} else {
    $VIEW_NAME = "chart.php";
}

require "../layout.php";
