<?php
function user_selectAll()
{
    $sql = "SELECT * FROM khach_hang";
    return pdo_query($sql);
}

function client_selectAll()
{
    $sql = "SELECT * FROM khach_hang WHERE vai_tro = 0";
    return pdo_query($sql);
}

function user_selectById($id)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_khach_hang = $id";
    return pdo_query_one($sql);
}

function user_selectByEmail($email)
{
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    return pdo_query_one($sql);
}

function user_delete($id)
{
    $sql = "DELETE FROM binh_luan WHERE ma_khach_hang = $id";

    pdo_execute($sql);

    $sql = "DELETE FROM khach_hang WHERE ma_khach_hang = ?";

    pdo_execute($sql, $id);
}

function user_add($email, $so_dien_thoai, $mat_khau, $ho_ten, $hinh_anh, $kich_hoat)
{
    $users = user_selectAll();

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            return false;
        }
    }

    if (isset($hinh_anh)) {
        $sql = "INSERT INTO khach_hang VALUES (null, '$email', '$so_dien_thoai', '$mat_khau', '$ho_ten', '$hinh_anh', b'$kich_hoat', DEFAULT)";
    } else {
        $sql = "INSERT INTO khach_hang VALUES (null, '$email', '$so_dien_thoai', '$mat_khau', '$ho_ten', null, b'$kich_hoat', DEFAULT)";
    };

    pdo_execute($sql);
}

function user_update($id, $email, $so_dien_thoai, $mat_khau, $ho_ten, $hinh_anh, $kich_hoat)
{
    if (isset($hinh_anh)) {
        $sql = "UPDATE khach_hang SET email = '$email', so_dien_thoai = '$so_dien_thoai', mat_khau = '$mat_khau', ho_ten = '$ho_ten', hinh_anh = '$hinh_anh', kich_hoat = b'$kich_hoat' WHERE ma_khach_hang = '$id'";
    } else {
        $sql = "UPDATE khach_hang SET email = '$email', so_dien_thoai = '$so_dien_thoai', mat_khau = '$mat_khau', ho_ten = '$ho_ten', hinh_anh = null, kich_hoat = b'$kich_hoat' WHERE ma_khach_hang = '$id'";
    };

    pdo_execute($sql);
}

function user_multipleDelete($ids)
{
    $sql = "DELETE FROM binh_luan WHERE ma_khach_hang IN ($ids)";

    pdo_execute($sql);

    $sql = "DELETE FROM khach_hang WHERE ma_khach_hang IN ($ids)";

    pdo_execute($sql);
}
