<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $image = $_FILES['image'];

    $img_path = uploadFile($image, $folderUploaded);

    $result = user_add($email, $phone, $password, $name, $img_path, $status);

    if ($result !== false) {
        $_SESSION['add_user'] = 'success';
    } else {
        $_SESSION['add_user'] = 'error';
    }
}

if (isset($_SESSION['add_user']) && $_SESSION['add_user'] == 'success') { ?>
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
    $_SESSION['add_user'] = null;
}; ?>

<?php if (isset($_SESSION['add_user']) && $_SESSION['add_user'] == 'error') { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Error!',
            text: 'Email đã tồn tại',
            icon: 'error',
            confirmButtonText: 'Xác nhận',
        })
    </script>
<?php
    $_SESSION['add_user'] = null;
}; ?>

<form class="row g-3 needs-validation mt-1" novalidate method="POST" enctype="multipart/form-data">
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Email:<span style="color: red;">*</span></label>
        <input type="email" class="form-control p-2" id="validationCustom01" required name="email">
        <div id="emailError" class="invalid-feedback">
            Vui lòng cung cấp địa chỉ email
        </div>
    </div>

    <div class="col-md-4">
        <label for="inputPassword" class="form-label">Mật khẩu:<span style="color: red;">*</span></label>
        <input type="password" class="form-control p-2" id="inputPassword" required name="password">
        <div class="invalid-feedback">
            Vui lòng cung cấp mật khẩu
        </div>
    </div>

    <div class="col-md-4">
        <label for="inputRePassword" class="form-label">Xác nhận mật khẩu:<span style="color: red;">*</span></label>
        <input type="password" class="form-control p-2" id="inputRePassword" required>
        <div class="invalid-feedback" id="rePassword">
            Vui lòng xác nhận mật khẩu
        </div>
        <div class="invalid-feedback d-none" id="rePasswordError">
            Xác nhận mật khẩu không khớp
        </div>
    </div>

    <div class="col-md-4">
        <label for="validationCustom04" class="form-label">Họ tên:<span style="color: red;">*</span></label>
        <input type="text" class="form-control p-2" id="validationCustom04" required name="name">
        <div class="invalid-feedback">
            Vui lòng cung cấp họ tên
        </div>
    </div>

    <div class="col-md-4">
        <label for="validationCustom05" class="form-label">Số điện thoại:<span style="color: red;">*</span></label>
        <input type="number" class="form-control p-2" id="validationCustom05" required name="phone">
        <div class="invalid-feedback">
            Vui lòng cung cấp số điện thoại
        </div>
    </div>

    <div class="col-md-4">
        <label style="position: relative;" for="validationCustom06" class="form-label">Hình ảnh: ( Optional )
            <img style="position: absolute; top: 380%; left: 0;" class="image-preview1 currentImg" width="100" alt="">
        </label>
        <input type="file" class="form-control" id="validationCustom06" name="image" onchange="previewImage(this.files[0])">
        <img style="margin-top: 20px" class="image-preview1 hiddenImg" width="100" alt="">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Trạng thái</label>
        <div class="p-2 border rounded status" style="display: flex; gap: 5px;">
            <div>
                <input style="cursor: pointer;" class="ms-4 res-margin" type="radio" id="activated" name="status" value="1" checked>
                <label style="cursor: pointer;" for="activated">Kích hoạt</label>
            </div>
            <div>
                <input style="cursor: pointer;" class="ms-4 res-margin" type="radio" id="unactivated" name="status" value="0">
                <label style="cursor: pointer;" for="unactivated">Vô hiệu hóa</label>
            </div>
        </div>
    </div>

    <div class="col-12">
        <button name="submit" type="submit" class="btn btn-outline-primary btn-sm">Thêm mới</button>
        <a href="?btn_list" id="list" class="btn btn-warning btn-sm">Danh sách</a>
    </div>

</form>

<script>
    const emailInput = document.getElementById('validationCustom01');
    const emailError = document.getElementById('emailError');
    let checkEmail = false;

    function previewImage(file) {
        const previewImages = document.querySelectorAll('.image-preview1');

        previewImages.forEach(previewImage => {
            previewImage.src = URL.createObjectURL(file);
        })
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