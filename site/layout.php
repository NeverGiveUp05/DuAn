<?php session_start();
require "../dao/pdo.php";
require "../dao/khach_hang.php";
require '../dao/loai_hang.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IVY moda</title>
    <link rel="shortcut icon" href="../content/images/favicon.ico" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/18ea624bf8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../content/css/style.css" />
</head>

<body>
    <header id="header">
        <div class="container">
            <ul class="nav">
                <li><a href="#">NỮ</a></li>
                <li><a href="#">NAM</a></li>
                <li><a href="#">TRẺ EM</a></li>
                <li><a href="#" id="special">BIG SALE THÁNG 3</a></li>
                <li><a href="#">BỘ SƯU TẬP</a></li>
                <li><a href="#">VỀ CHÚNG TÔI</a></li>
            </ul>
            <div class="logo">
                <a href="./layout.php"><img src="../content/images/logo.png" alt="" /></a>
            </div>
            <div class="right-header">
                <form action="" class="search-form" method="GET">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="TÌM KIẾM SẢN PHẨM" name="search" />
                </form>

                <div class="header-action">
                    <div class="item"><i class="fa-solid fa-headphones"></i></div>

                    <?php
                    if (isset($_SESSION['user-id'])) {
                        $id = $_SESSION['user-id'];

                        $usercurrent = user_selectById($id);
                    }

                    if (isset($usercurrent) && $usercurrent['vai_tro'] == 0 && $usercurrent['kich_hoat'] == 1) { ?>
                        <div class="item" onClick="openShop()" style="position: relative; margin-right: 30px">
                            <i class="fa-brands fa-shopify"></i><span class="number-cart">0</span>
                        </div>

                        <div class="header-action" style="display: flex; align-items: center; gap: 6px;">
                            <img src="<?php echo $usercurrent['hinh_anh'] ?>" alt="" style="width: 28px; height: 28px; border-radius: 50%;">
                            <a href="./logout.php" style="font-size: 14px;">
                                Hi, <?php echo $usercurrent['ho_ten']; ?>
                            </a>
                        </div>
                    <?php    } else { ?>
                        <a href="?action=user" class="item"><i class="fa-regular fa-user"></i></a>
                        <div class="item" onClick="openShop()">
                            <i class="fa-brands fa-shopify"></i><span class="number-cart">0</span>
                        </div>
                    <?php   } ?>
                </div>
            </div>
        </div>
    </header>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'user') {
        include './user.php';
    } else if (isset($_GET['detail'])) {
        include './detail.php';
    } else if (isset($_GET['search']) && $_GET['search'] != '') {
        include './search.php';
    } else {
        include './home.php';
    };
    ?>

    <div class="shopping" id="shopping">
        <div class="top-shop">
            <h3>Giỏ hàng<span class="number-cart">0</span></h3>
        </div>
        <div class="main-shop" id="main-shop"></div>
        <div class="bottom-shop">
            <div class="total-price">Tổng cộng: <strong id="total">0đ</strong></div>
            <div class="box-action">
                <div class="box-title">Thanh toán</div>
            </div>
        </div>
        <div class="close-shop" id="close" onClick="closeShop()"><i class="fa-solid fa-xmark"></i></div>
    </div>

    <div id="bottom">
        <div class="container">
            <div class="left-bottom">
                <div class="top-left">
                    <div>
                        <img src="../content/images/logo-footer.png" alt="" />
                    </div>
                    <div>
                        <img src="../content/images/protected.png" alt="" />
                    </div>
                    <div>
                        <img src="../content/images/img-congthuong.png" alt="" />
                    </div>
                </div>
                <div class="left-info">
                    <p>Công ty Cổ phần Dự Kim với số đăng ký kinh doanh: 0105777650</p>
                    <p>
                        <strong>Địa chỉ đăng ký: </strong>Tổ dân phố Tháp, P.Đại Mỗ, Q.Nam Từ Liêm, TP.Hà Nội, Việt
                        Nam
                    </p>
                    <p><strong>Số điện thoại: </strong>0243 205 2222</p>
                    <p><strong>Email: </strong> cskh@ivy.com.vn</p>
                </div>
                <ul class="list-social">
                    <li><img src="../content/images/fb.svg" alt="" /></li>
                    <li><img src="../content/images/gg.svg" alt="" /></li>
                    <li>
                        <img src="../content/images/instagram.svg" alt="" style="height: 30px" />
                    </li>
                    <li>
                        <img src="../content/images/pinterest.svg" alt="" style="height: 27px" />
                    </li>
                    <li><img src="../content/images/ytb.svg" alt="" /></li>
                </ul>
                <div class="hotline">Hotline: 0246 662 3434</div>
            </div>
            <div class="center-bottom">
                <div class="left-center">
                    <p class="title">Giới thiệu</p>
                    <ul>
                        <li><a href="#">Về IVY moda</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Hệ thống cửa hàng</a></li>
                    </ul>
                </div>
                <div class="mid-center">
                    <p class="title">Dịch vụ khách hàng</p>
                    <ul>
                        <li><a href="#">Chính sách điều khoản</a></li>
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Chính sách thanh toán</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Chính sách giao nhận vận chuyển</a></li>
                        <li><a href="#">Chính sách thẻ thành viên</a></li>
                        <li><a href="#">Hệ thống cửa hàng</a></li>
                        <li><a href="#">Q&A</a></li>
                    </ul>
                </div>
                <div class="right-center">
                    <p class="title">Liên hệ</p>
                    <ul>
                        <li><a href="#">Hotline</a></li>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Live Chat</a></li>
                        <li><a href="#">Messenger</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="right-bottom">
                <div class="register-form">
                    <div class="register-title">Nhận thông tin các chương trình của IVY moda</div>
                    <form action="" id="form-subscribe">
                        <input type="text" placeholder="Nhập địa chỉ email" class="email-subscribe" />
                        <button class="btn-submit">Đăng ký</button>
                    </form>
                </div>
                <div class="app">
                    <div class="app-title">Download App</div>
                    <img src="../content/images/appstore.png" alt="" />
                    <img src="../content/images/googleplay.png" alt="" />
                </div>
            </div>
        </div>
    </div>

    <footer id="footer">
        <div class="copy-right">©IVYmoda All rights reserved</div>
    </footer>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'user') {
        echo " <script src='../content/js/shop.js'></script>";
    } else if (isset($_GET['detail'])) {
        echo " <script src='../content/js/shop.js'></script>";
    } else if (isset($_GET['search']) && $_GET['search'] != '') {
        echo " <script src='../content/js/shop.js'></script>";
    } else {
        echo " <script src='../content/js/banner.js'></script>";
        echo " <script src='../content/js/shop.js'></script>";
    };
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>