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

<style>
    td,
    th {
        align-content: center;
        text-align: center;
    }
</style>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Tên hàng hóa</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Giảm giá</th>
            <th scope="col">Mã loại</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../dao/pdo.php';
        require_once '../../dao/hang_hoa.php';

        $list = hang_selectAll();

        if (empty($list)) { ?>

            <tr>
                <td colspan="6">Hiện chưa có bản ghi nào</td>
            </tr>

            <?php  } else {
            foreach ($list as $item) { ?>
                <tr>
                    <td><input style="cursor: pointer; margin-left: 8px" type="checkbox" name="" id="" class="checkbox" value="<?php echo $item['ma_hang_hoa'] ?>"></td>
                    <td style="max-width: 263px;">
                        <p style=" word-wrap: break-word; overflow-wrap: break-word; overflow: hidden; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box; margin-bottom: 0"><?php echo $item['ten_hang_hoa'] ?></p>
                    </td>
                    <td><?php echo $item['don_gia'] ?></td>
                    <td style="width: 100px;"><?php if (isset($item['muc_giam_gia'])) {
                                                    echo $item['muc_giam_gia'] . '%';
                                                } ?></td>
                    <td><?php echo $item['ma_loai_hang'] ?></td>
                    <td style="max-width: 450px;">
                        <p style="word-wrap: break-word; overflow-wrap: break-word; overflow: hidden; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box; margin-bottom: 0"> <?php echo $item['mo_ta_hang_hoa'] ?></p>
                    </td>
                    <td><img style="margin: 0 18px;" width="50" src="<?php echo $item['hinh_anh'] ?>" alt=""></td>
                    <td>
                        <div style="display: flex; gap: 6px">
                            <button class="btn btn-warning btn-sm"><a style="color: #000" href="?edit&id=<?php echo $item['ma_hang_hoa'] ?>">Sửa</a></button>
                            <button class="btn btn-danger btn-sm"><a style="color: #fff" href="?delete&id=<?php echo $item['ma_hang_hoa'] ?>">Xóa</a></button>
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
</script>