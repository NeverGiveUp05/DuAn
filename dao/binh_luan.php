<?php
function comment_getAllByLoaiHang($id)
{
    $sql = "SELECT * FROM binh_luan WHERE ma_hang_hoa = $id";
    return pdo_query($sql);
}

function comment_add($comment, $date, $ma_hang_hoa, $ma_khach_hang)
{
    $sql = "INSERT INTO binh_luan VALUES (null, '$comment', '$date', '$ma_hang_hoa', '$ma_khach_hang')";
    pdo_execute($sql);
}

function comment_delete($id)
{
    $sql = "DELETE FROM binh_luan WHERE ma_binh_luan = $id";
    pdo_execute($sql);
}

function comment_multipleDelete($ids)
{
    $sql = "DELETE FROM binh_luan WHERE ma_binh_luan IN ($ids)";
    pdo_execute($sql);
}
