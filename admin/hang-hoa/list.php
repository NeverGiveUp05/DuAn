<?php
if (isset($_SESSION['hang_delete']) && $_SESSION['hang_delete'] == 'success') { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Success!',
            text: 'Xóa thành công',
            icon: 'success',
            confirmButtonText: 'Xác nhận',
        })
    </script>
<?php
    $_SESSION['hang_delete'] = null;
}; ?>

<?php
if (isset($_SESSION['update_hang']) && $_SESSION['update_hang'] == 'success') { ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Success!',
            text: 'Cập nhật dữ liệu thành công',
            icon: 'success',
            confirmButtonText: 'Xác nhận',
        })
    </script>

<?php
    $_SESSION['update_hang'] = null;
} ?>

<?php
if (isset($_SESSION['hang_multiDelete']) && $_SESSION['hang_multiDelete'] == 'success') { ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Success!',
            text: 'Xóa bản ghi thành công',
            icon: 'success',
            confirmButtonText: 'Xác nhận',
        })
    </script>

<?php
    $_SESSION['hang_multiDelete'] = null;
} ?>

<select style="width: 250px;" class="form-select mb-3 ms-auto" aria-label="Default select example" id="selectBtn">
    <?php
    $select = $_GET['select'] ? $_GET['select'] : null;
    ?>

    <option value="all" <?php if (isset($select)) {
                            if ($select == 'all') {
                                echo 'selected';
                            } else {
                                echo '';
                            }
                        } else {
                            echo 'selected';
                        } ?>>Lọc theo loại hàng</option>

    <?php $types = loai_selectAll();
    foreach ($types as $type) { ?>
        <option <?php if ($select == $type['ma_loai_hang']) {
                    echo 'selected';
                } ?> value="<?php echo $type['ma_loai_hang'] ?>">
            <?php echo loai_selectById($type['ma_loai_hang'])['ten_loai_hang'] ?>
        </option>
    <?php    } ?>
</select>

<style>
    td,
    th {
        align-content: center;
        text-align: center;
    }
</style>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col" style="font-weight: 600;"></th>
            <th scope="col" style="font-weight: 600;">Tên hàng hóa</th>
            <th scope="col" style="font-weight: 600;">Loại hàng</th>
            <th scope="col" style="font-weight: 600;">Đơn giá</th>
            <th scope="col" style="font-weight: 600;">Giảm giá</th>
            <th scope="col" style="font-weight: 600;">Mô tả</th>
            <th scope="col" style="font-weight: 600;">Hình ảnh</th>
            <th scope="col" style="font-weight: 600;"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../dao/pdo.php';
        require_once '../../dao/hang_hoa.php';

        if (isset($_GET['select']) && $_GET['select'] !== 'all') {
            $list = hang_selectByLoaiHang($_GET['select']);
        } else {
            $list = hang_selectAll();
        }

        if (empty($list)) { ?>

            <tr>
                <td colspan="6">Hiện chưa có bản ghi nào</td>
            </tr>

            <?php  } else {
            foreach ($list as $item) { ?>
                <tr>
                    <td style="width: 50px;"><input style="cursor: pointer" type="checkbox" name="" id="" class="checkbox" value="<?php echo $item['ma_hang_hoa'] ?>"></td>
                    <td style="max-width: 263px;">
                        <p style=" word-wrap: break-word; overflow-wrap: break-word; overflow: hidden; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box; margin-bottom: 0"><?php echo $item['ten_hang_hoa'] ?></p>
                    </td>
                    <td><?php
                        echo loai_selectById($item['ma_loai_hang'])['ten_loai_hang'] ?>
                    </td>
                    <td><?php
                        $money = number_format($item['don_gia'], 0, '', '.');
                        echo $money;
                        ?></td>
                    <td style="width: 100px;"><?php if (isset($item['muc_giam_gia'])) {
                                                    echo $item['muc_giam_gia'] . '%';
                                                } ?></td>
                    <td style="max-width: 450px;">
                        <p style="word-wrap: break-word; overflow-wrap: break-word; overflow: hidden; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box; margin-bottom: 0"> <?php echo $item['mo_ta_hang_hoa'] ?></p>
                    </td>
                    <td><img style="margin: 0 18px;" width="50" src="<?php echo $item['hinh_anh'] ?>" alt=""></td>
                    <td>
                        <div style="display: flex; gap: 6px; justify-content: center;">
                            <a class="btn btn-warning btn-sm" style="color: #000" href="?edit&id=<?php echo $item['ma_hang_hoa'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-danger btn-sm" style="color: #fff" href="?delete&id=<?php echo $item['ma_hang_hoa'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </td>
                </tr>
        <?php    }
        }

        ?>
    </tbody>
</table>

<button id="btn-select" class="btn btn-outline-primary btn-sm">Chọn tất cả</button>
<button id="btn-unselect" class="btn btn-outline-primary btn-sm">Bỏ chọn tất cả</button>
<button id="deleteBtn" class="btn btn-outline-danger btn-sm">Xoá các mục đã chọn</button>
<a href="./" class="btn btn-primary btn-sm">Nhập thêm</a>

<script>
    const allBtnCheck = document.querySelectorAll('.checkbox');
    const btnSelectAll = document.getElementById('btn-select');
    const btnUnSelectAll = document.getElementById('btn-unselect');
    const deleteBtn = document.getElementById('deleteBtn');
    const selectBtn = document.getElementById('selectBtn');
    let ids = [];

    allBtnCheck.forEach(item => {
        item.addEventListener('click', function() {
            if (item.checked) {
                ids.push(item.value);
            } else {
                let index = ids.indexOf(item.value);
                ids.splice(index, 1);
            }
        })
    })

    btnSelectAll.addEventListener('click', function() {
        allBtnCheck.forEach(item => {
            item.checked = true;
            ids.push(item.value);
        });

        ids = [...new Set(ids)];
    })

    btnUnSelectAll.addEventListener('click', function() {
        allBtnCheck.forEach(item => {
            item.checked = false;
        });

        while (ids.length > 0) {
            ids.pop();
        }
    })

    deleteBtn.addEventListener('click', function() {
        if (ids.length == 0) {
            Swal.fire({
                title: 'Error!',
                text: 'Không có loại hàng nào được chọn',
                icon: 'error',
                confirmButtonText: 'Xác nhận',
            })
        } else {
            let selectedIds = ids.join(',');
            window.location.href = `./multiDelete.php?ids=${selectedIds}`;
        }
    })

    selectBtn.addEventListener('change', function() {
        window.location.href = `?btn_list&select=${this.value}`;
    })
</script>