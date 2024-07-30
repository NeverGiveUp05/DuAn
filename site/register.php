<?php
require '../global.php';
require_once '../dao/khach_hang.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $image = $_FILES['image'];
    $status = 1;

    $img_path = uploadFile($image, $folderUploaded);

    $result = user_add($email, $phone, $password, $name, $img_path, $status);

    if ($result !== false) {
        $_SESSION['add_user'] = 'success';

        $currentUser = user_selectByEmail($email);

        $_SESSION['user-id'] = $currentUser['ma_khach_hang'];

        header('location: ./layout.php');
    } else {
        unlink($_SERVER['DOCUMENT_ROOT'] . $img_path);

        $_SESSION['add_user'] = 'error';
    }
}
?>

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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<main id="main">
    <section class="container">
        <h3 class="text-uppercase pt-4 text-center">Đăng ký</h3>

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
                <input autocomplete="off" type="password" class="form-control p-2" id="inputPassword" required name="password">
                <div class="invalid-feedback">
                    Vui lòng cung cấp mật khẩu
                </div>
            </div>

            <div class="col-md-4">
                <label for="inputRePassword" class="form-label">Xác nhận mật khẩu:<span style="color: red;">*</span></label>
                <input autocomplete="off" type="password" class="form-control p-2" id="inputRePassword" required>
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

            <div class="col-md-3">
                <label style="position: relative;" for="validationCustom06" class="form-label">Hình ảnh:
                    <img style="display: inline-block; border-radius: 50%; position: absolute; top: 10px; left: 428%; width: 100px; height: 100px" id="image-preview" class="d-none" width="100" alt="">
                </label>
                <input type="file" class="form-control" id="validationCustom06" name="image" onchange="previewImage(this.files[0])">
            </div>

            <div class="col-12 mt-4 mb-5 screen-end">
                <button name="submit" style="width: 224px;" class="btn btn--large register-btn" fdprocessedid="icvugw">Đăng ký</button>
            </div>

        </form>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    const emailInput = document.getElementById('validationCustom01');
    const emailError = document.getElementById('emailError');
    let checkEmail = false;

    function previewImage(file) {
        const previewImage = document.getElementById('image-preview');
        previewImage.classList.remove('d-none');
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