<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IVY moda</title>
    <link rel="shortcut icon" href="../../content/images/favicon.ico" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/18ea624bf8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../content/css/style.css" />
</head>

<body style="min-height: 100vh; display: flex; flex-direction:column;">
    <?php
    if (isset($_SESSION['user-id'])) { ?>
        <header id="header" style="position: unset;">
            <div class="container" style="background-color: rgba(255, 228, 196, 0.5);  justify-content: flex-end;">
                <style>
                    #header .container::after {
                        content: none;
                    }
                </style>
                <div class="logo">
                    <p style="padding: 24px; text-align: center; font-size: 26px; font-weight: 500; 
                color: #ff000096; margin: 0;">QUẢN TRỊ WEBSITE</p>
                </div>
            </div>
        </header>

        <main id="main" style="padding-top: 0; border: none;">
            <section class="container" style="padding: 0;">
                <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 8px 12px;">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav" style="font-size: 15px">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="../">TRANG CHỦ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?php if ($active == 'loai_hang') {
                                                            echo 'active';
                                                        } ?>" href="../loai-hang">LOẠI HÀNG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($active == 'hang_hoa') {
                                                            echo 'active';
                                                        } ?>" href="../hang-hoa">HÀNG HÓA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($active == 'khach_hang') {
                                                            echo 'active';
                                                        } ?>" href="../khach-hang">KHÁCH HÀNG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($active == 'binh_luan') {
                                                            echo 'active';
                                                        } ?>" href="../binh-luan">BÌNH LUẬN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($active == 'thong_ke') {
                                                            echo 'active';
                                                        } ?>" href="../thong-ke">THỐNG KÊ</a>
                                </li>
                            </ul>
                        </div>

                        <div class="right-header">
                            <div class="header-action" style="display: flex; align-items: center; gap: 8px;">
                                <img src="../../content/images/cat.jpg" alt="" style="width: 30px; height: 30px; border-radius: 50%;">
                                <a href="#" style="margin-right: 10px;">
                                    <?php
                                    require_once "../../dao/pdo.php";
                                    require_once "../../dao/khach_hang.php";

                                    $id = $_SESSION['user-id'];

                                    $user = user_selectById($id);

                                    echo $user['ho_ten'];
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </section>
        </main>

        <main id="main" style="padding-top: 20px; border: none; padding-bottom: 50px">
            <section class="container" style="padding: 0;">
                <?php include $VIEW_NAME; ?>
            </section>
        </main>

        <footer id="footer" style="border-top: 1px solid #d1d2d4; margin-top: auto;">
            <div class="copy-right">©IVYmoda All rights reserved</div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php    } else { ?>
        <h1>Cần có quyền admin để truy cập trang này</h1>
    <?php }
    ?>

</body>

</html>