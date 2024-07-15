<?php
session_start();
require "../../dao/pdo.php";
require "../../dao/hang_hoa.php";

$ids = $_GET["ids"];
$arrId = explode(",", $ids);

foreach ($arrId as $id) {
    $product = hang_selectById($id);

    $old_path = $product['hinh_anh'];
    $old_path1 = $product['hinh_anh_nen'];
    $old_path2 = $product['hinh_anh_1'];
    $old_path3 = $product['hinh_anh_2'];

    $arrImg[] = $old_path;
    $arrImg[] = $old_path1;
    $arrImg[] = $old_path2;
    $arrImg[] = $old_path3;
}

hang_multipleDelete($ids);

foreach ($arrImg as $img_path) {
    unlink($_SERVER['DOCUMENT_ROOT'] . $img_path);
}

$_SESSION['hang_multiDelete'] = 'success';


header('location: ./?btn_list');
