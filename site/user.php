<?php
if (isset($_POST['login'])) {
    require '../dao/pdo.php';
    require '../dao/khach_hang.php';

    $users = user_selectAll();

    $account = $_POST['account'];
    $password = $_POST['password'];

    $found = false;
    $kich_hoat = false;

    foreach ($users as $user) {
        if ($user['email'] == $account && $user['mat_khau'] == $password) {

            if ($user['vai_tro'] == 1 && $user['kich_hoat'] == 1) {
                $_SESSION['user-id'] = $user['ma_khach_hang'];

                header('location: ../admin');
            } else if ($user['vai_tro'] == 0 && $user['kich_hoat'] == 1) {
                $_SESSION['user-id'] = $user['ma_khach_hang'];

                header('location: ./layout.php');
            }

            $found = true;
            break;
        }
    }

    if (!$kich_hoat) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>" . "<script>      
    Swal.fire({
        title: 'Error!',
        text: 'Tài khoản của bạn đang bị vô hiệu hóa',
        icon: 'error',
        confirmButtonText: 'Xác nhận',
    })
    </script>";
    }

    if (!$found) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>" . "<script>      
    Swal.fire({
        title: 'Error!',
        text: 'Email hoặc mật khẩu không đúng',
        icon: 'error',
        confirmButtonText: 'Xác nhận',
    })
    </script>";
    }
}
?>

<style>
    html ::-webkit-scrollbar {
        width: 0px;
    }
</style>

<main id="main">
    <section class="container">
        <div class="auth">
            <div class="auth-container">
                <div class="auth-row">
                    <div class="auth__login auth__block">
                        <h3 class="auth__title">Bạn đã có tài khoản IVY</h3>
                        <div class="auth__login__content">
                            <p class="auth__description">
                                Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận được
                                những ưu đãi tốt hơn!
                            </p>
                            <form id="login-form" class="auth__form login-form" role="login" name="frm_customer_account_email" enctype="application/x-www-form-urlencoded" method="post" action="" autocomplete="off">
                                <div class="form-group">
                                    <input class="form-control" name="account" type="email" placeholder="Email" required />
                                </div>
                                <div class="form-group" style="position: relative;">
                                    <input id="passwordIp" class="form-control" name="password" type="password" placeholder="Mật khẩu" style="padding-right: 40px;" required />

                                    <i class="fa-regular fa-eye-slash eye"></i>
                                </div>
                                <div class="auth__form__options">
                                    <div class="form-checkbox">
                                        <label>
                                            <input class="checkboxs" value="1" name="customer_remember" type="checkbox" />
                                            <span style="margin-left: 5px"> Ghi nhớ đăng nhập</span>
                                        </label>
                                    </div>
                                    <a class="auth__form__link" href="#">Quên mật khẩu?
                                    </a>
                                </div>
                                <div class="auth__form__options">
                                    <a class="auth__form__link login-with-qr" href="#">Đăng nhập bằng mã QR</a>
                                    <a class="auth__form__link" href="#">Đăng nhập bằng OTP</a>
                                </div>
                                <div class="auth__form__buttons">
                                    <button id="but_login_email" name="login" class="btn btn--large g-recaptcha" data-sitekey="6Lcy5uEmAAAAADhosFdXQK6Em8axmw6Um7m4mnU5" data-callback="onSubmitLogin">
                                        Đăng nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="auth__register auth__block">
                        <h3 class="auth__title">Khách hàng mới của IVY moda</h3>
                        <div class="auth__login__content">
                            <p class="auth__description">
                                Nếu bạn chưa có tài khoản trên ivymoda.com, hãy sử dụng tùy chọn này để truy cập
                                biểu mẫu đăng ký.
                            </p>
                            <p class="auth__description">
                                Bằng cách cung cấp cho IVY moda thông tin chi tiết của bạn, quá trình mua hàng
                                trên ivymoda.com sẽ là một trải nghiệm thú vị và nhanh chóng hơn!
                            </p>

                            <div class="auth__form__buttons">
                                <a href="?action=">
                                    <button class="btn btn--large">Đăng ký</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    const eye = document.querySelector('.eye');
    const passwordIp = document.getElementById('passwordIp');

    eye.addEventListener('click', function() {
        eye.classList.toggle('fa-eye');
        eye.classList.toggle('fa-eye-slash');

        if (eye.classList.contains('fa-eye')) {
            passwordIp.type = 'text';
        } else {
            passwordIp.type = 'password';
        }
    })
</script>