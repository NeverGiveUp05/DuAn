<?php
function selectHangById($id)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hang_hoa = $id";
    return pdo_query_one($sql);
}

function loai_selectAll()
{
    $sql = "SELECT * FROM loai_hang";
    return  pdo_query($sql);
}

function loai_selectTop3()
{
    $sql = "SELECT * FROM loai_hang LIMIT 3";
    return pdo_query($sql);
}

function loai_selectById($id)
{
    $sql = "SELECT * FROM loai_hang WHERE ma_loai_hang = ?";
    return pdo_query_one($sql, $id);
}

function loai_add($ten_loai_hang)
{
    $sql = "INSERT INTO loai_hang VALUES (null, ?)";
    pdo_execute($sql, $ten_loai_hang);
}

function loai_delete($ma_loai)
{
    $sql = "UPDATE hang_hoa SET ma_loai_hang = NULL WHERE ma_loai_hang = ?";

    pdo_execute($sql, $ma_loai);

    $sql = "SELECT ma_hang_hoa FROM hang_hoa WHERE ma_loai_hang IS NULL";

    $array = pdo_query($sql);

    foreach ($array as $product) {
        $id = $product['ma_hang_hoa'];

        $productCurrent = selectHangById($id);

        $old_path = $productCurrent['hinh_anh'];
        $old_path1 = $productCurrent['hinh_anh_nen'];
        $old_path2 = $productCurrent['hinh_anh_1'];
        $old_path3 = $productCurrent['hinh_anh_2'];

        $arrayImg[] = $old_path;
        $arrayImg[] = $old_path1;
        $arrayImg[] = $old_path2;
        $arrayImg[] = $old_path3;
    }

    foreach ($arrayImg as $img_path) {
        unlink($_SERVER['DOCUMENT_ROOT'] . $img_path);
    }

    $sql = "DELETE FROM hang_hoa WHERE ma_loai_hang IS NULL";

    pdo_execute($sql);

    $sql = "DELETE FROM loai_hang WHERE ma_loai_hang = ?";

    pdo_execute($sql, $ma_loai);
}

function loai_update($id, $name)
{
    $sql = "UPDATE loai_hang SET ten_loai_hang = ? WHERE ma_loai_hang = ?";
    pdo_execute($sql, $name, $id);
}

function loai_multipleDelete($ids)
{
    $sql = "UPDATE hang_hoa SET ma_loai_hang = NULL WHERE ma_loai_hang IN ($ids)";

    pdo_execute($sql);

    $sql = "SELECT ma_hang_hoa FROM hang_hoa WHERE ma_loai_hang IS NULL";

    $array = pdo_query($sql);

    foreach ($array as $product) {
        $id = $product['ma_hang_hoa'];

        $productCurrent = selectHangById($id);

        $old_path = $productCurrent['hinh_anh'];
        $old_path1 = $productCurrent['hinh_anh_nen'];
        $old_path2 = $productCurrent['hinh_anh_1'];
        $old_path3 = $productCurrent['hinh_anh_2'];

        $arrayImg[] = $old_path;
        $arrayImg[] = $old_path1;
        $arrayImg[] = $old_path2;
        $arrayImg[] = $old_path3;
    }

    foreach ($arrayImg as $img_path) {
        unlink($_SERVER['DOCUMENT_ROOT'] . $img_path);
    }

    $sql = "DELETE FROM hang_hoa WHERE ma_loai_hang IS NULL";

    pdo_execute($sql);

    $sql = "DELETE FROM loai_hang WHERE ma_loai_hang IN ($ids)";

    pdo_execute($sql);
}
