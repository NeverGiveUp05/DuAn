<?php
if (isset($_POST['submit'])) {
    $ten_loai_hang = $_POST['tenloaihang'];

    loai_add($ten_loai_hang);

    $_SESSION['add_loai_hang'] = 'success';
}

if (isset($_SESSION['add_loai_hang']) && $_SESSION['add_loai_hang'] == 'success') { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Success!',
            text: 'Thêm thành công',
            icon: 'success',
            confirmButtonText: 'Xác nhận',
        })
    </script>
<?php
    $_SESSION['add_loai_hang'] = null;
}; ?>

<form method="POST">
    <div class="mb-3">
        <label class="form-label">Mã loại</label>
        <input style="padding: 10px 15px; cursor: not-allowed;" type="number" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" placeholder="auto number">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tên loại</label>
        <input required name="tenloaihang" style="padding: 10px 15px;" type="text" class="form-control" id="inputName">
    </div>

    <button name="submit" type="submit" class="btn btn-outline-success btn-sm">Thêm mới</button>
    <div id="reset" class="btn btn-outline-primary btn-sm">Nhập lại</div>
    <a href="?btn_list" id="list" class="btn btn-warning btn-sm">Danh sách</a>
</form>

<script>
    const resetBtn = document.getElementById('reset');
    const inputArea = document.getElementById('inputName');

    resetBtn.addEventListener('click', function() {
        inputArea.value = '';
        inputArea.focus();
    });
</script>