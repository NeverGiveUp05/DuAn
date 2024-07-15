<?php

function hang_selectAll()
{
    $sql = "SELECT * FROM hang_hoa";
    return pdo_query($sql);
}

function hang_selectById($id)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hang_hoa = $id";
    return pdo_query_one($sql);
}

function hang_upView($id)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hang_hoa = $id";
    pdo_execute($sql);
}

function hang_add($name, $img_path, $img_path1, $img_path2, $img_path3, $cost, $discount, $type, $description)
{
    $sql = "INSERT INTO hang_hoa VALUES (null, '$name', '$img_path', '$img_path1', '$img_path2', '$img_path3', '$cost', '$discount', '$type', '$description', DEFAULT)";

    pdo_execute($sql);
}

function hang_update($id, $name, $img_path, $img_path1, $img_path2, $img_path3, $cost, $discount, $type, $description)
{
    $sql = "UPDATE hang_hoa SET ten_hang_hoa = '$name', hinh_anh = '$img_path', hinh_anh_nen = '$img_path1', hinh_anh_1 = '$img_path2', hinh_anh_2 = '$img_path3', don_gia = '$cost', muc_giam_gia = '$discount', ma_loai_hang = '$type', mo_ta_hang_hoa = '$description' WHERE ma_hang_hoa = $id";

    pdo_execute($sql);
}

function hang_delete($id)
{
    $sql = "DELETE FROM hang_hoa WHERE ma_hang_hoa = ?";

    pdo_execute($sql, $id);
}

function hang_multipleDelete($ids)
{
    $sql = "DELETE FROM hang_hoa WHERE ma_hang_hoa IN ($ids)";
    pdo_execute($sql);
}
