<?php
if (isset($_SESSION['delete_loai_hang']) && $_SESSION['delete_loai_hang'] == 'success') { ?>
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
    $_SESSION['delete_loai_hang'] = null;
}; ?>

<?php
if (isset($_SESSION['update_loai_hang']) && $_SESSION['update_loai_hang'] == 'success') { ?>

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
    $_SESSION['update_loai_hang'] = null;
} ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Mã loại hàng</th>
            <th scope="col">Tên loại hàng</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../dao/pdo.php';
        require_once '../../dao/loai_hang.php';

        $list = loai_selectAll();

        foreach ($list as $item) { ?>
            <tr>
                <th><input style="cursor: pointer;" type="checkbox" name="" id="" class="checkbox" value="<?php echo $item['ma_loai_hang'] ?>"></th>
                <td><?php echo $item['ma_loai_hang'] ?></td>
                <td><?php echo $item['ten_loai_hang'] ?></td>
                <td>
                    <button class="btn btn-warning btn-sm"><a style="color: #000" href="?edit&id=<?php echo $item['ma_loai_hang'] ?>">Sửa</a></button>
                    <button class="btn btn-danger btn-sm"><a style="color: #fff" href="?delete&id=<?php echo $item['ma_loai_hang'] ?>">Xóa</a></button>
                </td>
            </tr>
        <?php    }
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