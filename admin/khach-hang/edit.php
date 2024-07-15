<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $image = $_FILES['image'];
    $id = $_REQUEST['id'];

    if ($image['size'] == 0) {
        $img_path = $info['hinh_anh'];
    } else {
        $old_image_path = $info['hinh_anh'];

        if (isset($old_image_path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $old_image_path);
        }

        $img_path = uploadFile($image, $folderUploaded);
    }

    user_update($id, $email, $phone, $password, $name, $img_path, $status);

    $_SESSION['update_user'] = 'success';

    echo "<script>window.location.href = '../khach-hang/?btn_list'</script>";
}
?>

<form class="row g-3 needs-validation mt-1" novalidate method="POST" enctype="multipart/form-data">
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" class="form-control p-2" id="validationCustom01" required name="email" value="<?php echo $info['email'] ?>">
        <div id="emailError" class="invalid-feedback">
            Vui lòng cung cấp địa chỉ email
        </div>
    </div>

    <div class="col-md-4">
        <label for="inputPassword" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control p-2" id="inputPassword" required name="password" value="<?php echo $info['mat_khau'] ?>">
        <div class="invalid-feedback">
            Vui lòng cung cấp mật khẩu
        </div>
    </div>

    <div class="col-md-4">
        <label for="inputRePassword" class="form-label">Xác nhận mật khẩu</label>
        <input type="password" class="form-control p-2" id="inputRePassword" required value="<?php echo $info['mat_khau'] ?>">
        <div class="invalid-feedback" id="rePassword">
            Vui lòng xác nhận mật khẩu
        </div>
        <div class="invalid-feedback d-none" id="rePasswordError">
            Xác nhận mật khẩu không khớp
        </div>
    </div>

    <div class="col-md-4">
        <label for="validationCustom04" class="form-label">Họ tên</label>
        <input type="text" class="form-control p-2" id="validationCustom04" required name="name" value="<?php echo $info['ho_ten'] ?>">
        <div class="invalid-feedback">
            Vui lòng cung cấp họ tên
        </div>
    </div>

    <div class="col-md-4">
        <label for="validationCustom05" class="form-label">Số điện thoại</label>
        <input type="number" class="form-control p-2" id="validationCustom05" required name="phone" value="<?php echo $info['so_dien_thoai'] ?>">
        <div class="invalid-feedback">
            Vui lòng cung cấp số điện thoại
        </div>
    </div>

    <div class="col-md-4">
        <label style="position: relative;" for="validationCustom06" class="form-label">Hình ảnh ( Optional ) <img style="position: absolute; top: 380%; left: 0;" id="image-preview" width="100" src="<?php echo $info['hinh_anh'] ?>" alt=""></label>
        <input type="file" class="form-control" id="validationCustom06" name="image" onchange="previewImage(this.files[0])">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Trạng thái</label>
        <div class="p-2 border rounded" style="display: flex;
    gap: 5px;">
            <input class="ms-4" style="cursor: pointer;" type="radio" id="activated" name="status" value="1" <?php if ($info['kich_hoat'] == 1) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
            <label style="cursor: pointer;" for="activated">Kích hoạt</label>
            <input class="ms-4" style="cursor: pointer;" type="radio" id="unactivated" name="status" value="0" <?php if ($info['kich_hoat'] == 0) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
            <label style="cursor: pointer;" for="unactivated">Vô hiệu hóa</label>
        </div>
    </div>

    <div class="col-12">
        <button name="submit" type="submit" class="btn btn-outline-primary btn-sm">Cập nhật</button>
        <a href="?btn_list" id="list" class="btn btn-warning btn-sm">Danh sách</a>
    </div>
</form>

<script>
    const emailInput = document.getElementById('validationCustom01');
    const emailError = document.getElementById('emailError');
    let checkEmail = true;

    function previewImage(file) {
        const previewImage = document.getElementById('image-preview');
        previewImage.src = URL.createObjectURL(file);
    }

    emailInput.addEventListener('input', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            emailInput.classList.add('invalid');
            emailError.style.display = 'block';
            checkEmail = false;
        } else {
            emailInput.classList.remove('invalid');
            emailError.style.display = 'none';
            checkEmail = true;
        }
    });

    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
        const inputPassword = document.getElementById('inputPassword')
        const inputRePassword = document.getElementById('inputRePassword')
        const rePassword = document.getElementById('rePassword')
        const rePasswordError = document.getElementById('rePasswordError')

        inputPassword.addEventListener('input', function() {
            if (inputPassword.value !== inputRePassword.value) {
                inputRePassword.classList.add('invalid');
                rePassword.classList.add('d-none');
                rePasswordError.classList.remove('d-none');
                rePasswordError.style.display = 'block';
            } else {
                inputRePassword.classList.remove('invalid');
                rePassword.classList.remove('d-none');
                rePasswordError.classList.add('d-none');
                rePasswordError.style.display = 'none';
            }
        })

        inputRePassword.addEventListener('input', function() {
            if (inputPassword.value !== inputRePassword.value) {
                inputRePassword.classList.add('invalid');
                rePassword.classList.add('d-none');
                rePasswordError.classList.remove('d-none');
                rePasswordError.style.display = 'block';
            } else {
                inputRePassword.classList.remove('invalid');
                rePassword.classList.remove('d-none');
                rePasswordError.classList.add('d-none');
                rePasswordError.style.display = 'none';
            }
        })

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                if (inputPassword.value !== inputRePassword.value) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                if (checkEmail == false) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

    })()
</script>