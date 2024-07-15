<?php

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['tenloaihang'];

    loai_update($id, $name);

    $_SESSION['update_loai_hang'] = 'success';

    echo "<script>window.location.href = '../loai-hang/?btn_list'</script>";
} ?>

<form method="POST">
    <div class="mb-3">
        <label class="form-label">Mã loại</label>
        <input style="padding: 10px 15px; cursor: not-allowed;" type="number" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" placeholder="<?php echo $info['ma_loai_hang'] ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tên loại</label>
        <input spellcheck="false" required name="tenloaihang" style="padding: 10px 15px; user-select: all;" type="text" class="form-control" id="inputName" value="<?php echo $info['ten_loai_hang'] ?>">
    </div>

    <button name="submit" type="submit" class="btn btn-outline-success btn-sm">Cập nhật</button>
    <div id="reset" class="btn btn-outline-primary btn-sm">Nhập lại</div>
    <a href="?btn_list" id="list" class="btn btn-warning btn-sm">Danh sách</a>
</form>

<script>
    const resetBtn = document.getElementById('reset');
    const inputArea = document.getElementById('inputName');

    inputArea.addEventListener('focus', () => inputArea.select());
    inputArea.focus();

    resetBtn.addEventListener('click', function() {
        inputArea.value = '';
        inputArea.focus();
    });
</script>