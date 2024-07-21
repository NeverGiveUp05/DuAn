<?php
if (isset($_SESSION['user_delete']) && $_SESSION['user_delete'] == 'success') { ?>
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
    $_SESSION['user_delete'] = null;
}; ?>

<?php
if (isset($_SESSION['update_user']) && $_SESSION['update_user'] == 'success') { ?>

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
    $_SESSION['update_user'] = null;
} ?>

<?php
if (isset($_SESSION['user_multiDelete']) && $_SESSION['user_multiDelete'] == 'success') { ?>

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
    $_SESSION['user_multiDelete'] = null;
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
            <th scope="col" style="font-weight: 600;"></th>
            <th scope="col" style="font-weight: 600;">Email</th>
            <th scope="col" style="font-weight: 600;">Tên khách hàng</th>
            <th scope="col" style="font-weight: 600;">Hình ảnh</th>
            <th scope="col" style="font-weight: 600;">Số điện thoại</th>
            <th scope="col" style="font-weight: 600;">Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../dao/pdo.php';
        require_once '../../dao/khach_hang.php';

        $list = client_selectAll();

        if (empty($list)) { ?>

            <tr>
                <td colspan="6">Hiện chưa có bản ghi nào</td>
            </tr>

            <?php  } else {
            foreach ($list as $item) { ?>
                <tr>
                    <td><input style="cursor: pointer;" type="checkbox" name="" id="" class="checkbox" value="<?php echo $item['ma_khach_hang'] ?>"></td>
                    <td style="width: 310px;"><?php echo $item['email'] ?></td>
                    <td><?php echo $item['ho_ten'] ?></td>
                    <td><img width="35" height="35" src="<?php echo $item['hinh_anh'] ?>" alt=""></td>
                    <td><?php echo $item['so_dien_thoai'] ?></td>
                    <?php if ($item['kich_hoat'] == 1) { ?>
                        <td>Kích hoạt</td>
                    <?php  } else { ?>
                        <td>Vô hiệu hóa</td>
                    <?php } ?>
                    <td>
                        <a class="btn btn-warning btn-sm" style="color: #000" href="?edit&id=<?php echo $item['ma_khach_hang'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger btn-sm" style="color: #fff" href="?delete&id=<?php echo $item['ma_khach_hang'] ?>"><i class="fa-solid fa-trash-can"></i></a>
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