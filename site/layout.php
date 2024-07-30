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
    <div id="form_900px">
        <form action="" class="search-form" id="search-form" method="GET">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
            <input autocomplete="off" type="text" placeholder="TÌM KIẾM SẢN PHẨM" name="search" id="input-search_900px" />

            <div class="quick-search_900px">
                <h4>Tìm kiếm nhiều nhất</h4>

                <div>
                    <a href="?search=Đầm" class="item-name_900px">Đầm</a>

                    <a href="?search=Quần" class="item-name_900px">Quần</a>

                    <a href="?search=Họa+tiết" class="item-name_900px">Họa tiết</a>

                    <a href="?search=Your+Dream" class="item-name_900px">Your Dream</a>

                    <a href="?search=Awesome" class="item-name_900px">Awesome</a>

                    <a href="?search=Camellia" class="item-name_900px">Camellia</a>
                </div>
            </div>
        </form>
    </div>

    <header id="header">
        <div class="container">
            <div class="bar" onClick="openMenu()">
                <i class="fa-solid fa-bars"></i>

                <div id="sub-menu" class="sub-menu">
                    <div class="close-menu" onClick="closeMenu()">
                        <i class="fa-solid fa-xmark"></i>
                    </div>

                    <ul class="sub-nav">
                        <li>
                            <a href="#">NỮ</a>
                        </li>

                        <li>
                            <a href="#">NAM</a>
                        </li>

                        <li>
                            <a href="#">TRẺ EM</a>
                        </li>

                        <li>
                            <a href="#" id="special">BIG SALE THÁNG 3</a>
                        </li>

                        <li>
                            <a href="#">BỘ SƯU TẬP</a>
                        </li>

                        <li>
                            <a href="#">VỀ CHÚNG TÔI</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="nav">
                <li class="parent-btn">
                    <a href="#">NỮ</a>

                    <ul class="child-menu">
                        <div class="list-menu-item">
                            <h3>NEW ARRIVALS</h3>
                        </div>

                        <div class="list-menu-item">
                            <h3>Áo</h3>
                            <li>Áo thun</li>
                            <li>Áo polo</li>
                            <li>Áo sơ mi</li>
                            <li>Áo khoác/vest</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Quần</h3>
                            <li>Quần dài</li>
                            <li>Quần lửng/short</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Phụ kiện</h3>
                            <li>Phụ kiện</li>
                        </div>
                    </ul>
                </li>

                <li class="parent-btn">
                    <a href="#">NAM</a>

                    <ul class="child-menu">
                        <div class="list-menu-item">
                            <h3>NEW ARRIVALS</h3>
                        </div>

                        <div class="list-menu-item">
                            <h3>Áo</h3>
                            <li>Áo thun</li>
                            <li>Áo polo</li>
                            <li>Áo sơ mi</li>
                            <li>Áo khoác/vest</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Quần</h3>
                            <li>Quần dài</li>
                            <li>Quần lửng/short</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Phụ kiện</h3>
                            <li>Phụ kiện</li>
                        </div>
                    </ul>
                </li>

                <li class="parent-btn">
                    <a href="#">TRẺ EM</a>

                    <ul class="child-menu">
                        <div class="list-menu-item">
                            <h3>NEW ARRIVALS</h3>
                        </div>

                        <div class="list-menu-item">
                            <h3>Áo</h3>
                            <li>Áo thun</li>
                            <li>Áo polo</li>
                            <li>Áo sơ mi</li>
                            <li>Áo khoác/vest</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Quần</h3>
                            <li>Quần dài</li>
                            <li>Quần lửng/short</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Phụ kiện</h3>
                            <li>Phụ kiện</li>
                        </div>
                    </ul>
                </li>

                <li class="parent-btn">
                    <a href="#" id="special">BIG SALE THÁNG 3</a>

                    <ul class="child-menu">
                        <div class="list-menu-item">
                            <h3>NEW ARRIVALS</h3>
                        </div>

                        <div class="list-menu-item">
                            <h3>Áo</h3>
                            <li>Áo thun</li>
                            <li>Áo polo</li>
                            <li>Áo sơ mi</li>
                            <li>Áo khoác/vest</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Quần</h3>
                            <li>Quần dài</li>
                            <li>Quần lửng/short</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Phụ kiện</h3>
                            <li>Phụ kiện</li>
                        </div>
                    </ul>
                </li>

                <li class="parent-btn">
                    <a href="#">BỘ SƯU TẬP</a>

                    <ul class="child-menu">
                        <div class="list-menu-item">
                            <h3>NEW ARRIVALS</h3>
                        </div>

                        <div class="list-menu-item">
                            <h3>Áo</h3>
                            <li>Áo thun</li>
                            <li>Áo polo</li>
                            <li>Áo sơ mi</li>
                            <li>Áo khoác/vest</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Quần</h3>
                            <li>Quần dài</li>
                            <li>Quần lửng/short</li>
                        </div>

                        <div class="list-menu-item">
                            <h3>Phụ kiện</h3>
                            <li>Phụ kiện</li>
                        </div>
                    </ul>
                </li>

                <li class="parent-btn">
                    <a href="#">VỀ CHÚNG TÔI</a>
                </li>

            </ul>
            <div class="logo">
                <a href="./layout.php"><img src="../content/images/logo.png" alt="" /></a>
            </div>
            <div class="right-header">
                <form action="" class="search-form" method="GET">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input id="input-search" autocomplete="off" type="text" placeholder="TÌM KIẾM SẢN PHẨM" name="search" />

                    <div class="quick-search">
                        <h4>Tìm kiếm nhiều nhất</h4>

                        <div>
                            <a href="?search=Đầm" class="item-name">Đầm</a>

                            <a href="?search=Quần" class="item-name">Quần</a>

                            <a href="?search=Họa+tiết" class="item-name">Họa tiết</a>

                            <a href="?search=Your+Dream" class="item-name">Your Dream</a>

                            <a href="?search=Awesome" class="item-name">Awesome</a>

                            <a href="?search=Camellia" class="item-name">Camellia</a>
                        </div>
                    </div>
                </form>

                <div class="header-action">
                    <div class="item action_pc"><i class="fa-solid fa-headphones"></i></div>

                    <?php
                    if (isset($_SESSION['user-id'])) {
                        $id = $_SESSION['user-id'];

                        $usercurrent = user_selectById($id);
                    }

                    if (isset($usercurrent) && $usercurrent['vai_tro'] == 0 && $usercurrent['kich_hoat'] == 1) { ?>
                        <div class="item" onClick="openShop()" style="position: relative; margin-right: 30px">
                            <i class="fa-brands fa-shopify"></i><span class="number-cart">0</span>
                        </div>

                        <div class="user-account" style="display: flex; align-items: center; gap: 6px;">
                            <img src="<?php echo $usercurrent['hinh_anh'] ?>" alt="" style="width: 28px; height: 28px; border-radius: 50%;">
                            <a href="./logout.php" style="font-size: 14px; text-wrap: nowrap;" class="name">
                                Hi, <?php echo $usercurrent['ho_ten']; ?>
                            </a>
                        </div>
                    <?php    } else { ?>
                        <a href="?action=user" class="item action_pc"><i class="fa-regular fa-user"></i></a>
                        <div class="item" onClick="openShop()">
                            <i class="fa-brands fa-shopify"></i><span class="number-cart">0</span>
                        </div>
                    <?php   } ?>
                </div>
            </div>
        </div>

        <div class="action_tablet">
            <div id="action_search" class="action_search" href="#">
                <i class="fa-solid fa-magnifying-glass"></i>
                <p>Tìm kiếm</p>
            </div>

            <div class="action_user">
                <?php if (isset($usercurrent) && $usercurrent['vai_tro'] == 0 && $usercurrent['kich_hoat'] == 1) { ?>
                    <div class="user-account_900px" style="display: flex; align-items: center; gap: 6px;">
                        <a href="./logout.php" style="font-size: 14px; text-wrap: nowrap;" class="action_name">
                            Hi, <?php echo $usercurrent['ho_ten']; ?>
                        </a>
                    </div>
                <?php    } else { ?>
                    <a href="?action=user" class="item">
                        <i class="fa-regular fa-user"></i>
                        <p>Đăng nhập</p>
                    </a>
                <?php   } ?>
            </div>

            <a class="action_contact" href="#">
                <i class="fa-solid fa-headphones"></i>
                <p>Trợ giúp</p>
            </a>
        </div>
    </header>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'user') {
        include './user.php';
    } else if (isset($_GET['action']) && $_GET['action'] == 'register') {
        include './register.php';
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
                    <form action="" class="form-subscribe">
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

            <div class="brp-890">
                <div class="left-center">
                    <div class="list-title">
                        <p class="title">Giới thiệu</p>
                        <i class="fa-solid fa-angle-right caret-load-more return"></i>
                    </div>

                    <ul class="info-show">
                        <li><a href="#">Về IVY moda</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Hệ thống cửa hàng</a></li>
                    </ul>
                </div>
                <div class="mid-center">
                    <div class="list-title">
                        <p class="title">Dịch vụ khách hàng</p>
                        <i class="fa-solid fa-angle-right caret-load-more return"></i>
                    </div>

                    <ul class="info-show">
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
                    <div class="list-title">
                        <p class="title">Liên hệ</p>
                        <i class="fa-solid fa-angle-right caret-load-more return"></i>
                    </div>

                    <ul class="info-show">
                        <li><a href="#">Hotline</a></li>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Live Chat</a></li>
                        <li><a href="#">Messenger</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="bottom" class="bottom-tablet">
        <div class="container">
            <div class="right-bottom" id="bottom-tablet__right">
                <div class="register-form">
                    <div class="register-title">Nhận thông tin các chương trình của IVY moda</div>
                    <form action="" class="form-subscribe">
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

    <footer id="footer" class="lineup">
        <div class="copy-right">©IVYmoda All rights reserved</div>
    </footer>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'user') {
        echo " <script src='../content/js/shop.js'></script>";
    } else if (isset($_GET['action']) && $_GET['action'] == 'register') {
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

<script>
    const subMenu = document.getElementById('sub-menu');
    const listShowMore = document.querySelectorAll('.list-title');
    const form = document.getElementById('form_900px');
    const searchBtn = document.getElementById('action_search');
    const nameSearch = document.querySelectorAll('.item-name');
    const inputSearch = document.getElementById('input-search');
    const inputSearch_900 = document.getElementById('input-search_900px');
    const nameSearch_900 = document.querySelectorAll('.item-name_900px');

    const openMenu = () => {
        subMenu.classList.add("open");

        document.documentElement.classList.add('disabled-scroll');
    }

    const closeMenu = () => {
        event.stopPropagation();

        subMenu.classList.remove("open");

        document.documentElement.classList.remove('disabled-scroll');
    }

    listShowMore.forEach(list => {
        list.addEventListener('click', function() {
            list.lastElementChild.classList.toggle('rotate');
            list.lastElementChild.classList.toggle('return');

            list.parentNode.lastElementChild.style.display = 'block';
            list.parentNode.style.height = 'auto';

            let height = list.parentNode.offsetHeight;

            if (list.lastElementChild.classList.contains('rotate')) {
                list.parentNode.style.height = '38px';

                setTimeout(() => {
                    list.parentNode.style.height = height + 'px';
                }, 0)
            } else {
                list.parentNode.style.height = height + 'px';

                setTimeout(() => {
                    list.parentNode.style.height = '38px';
                }, 0)
            }
        })
    })

    searchBtn.addEventListener('click', function() {
        form.classList.toggle('open');

        document.documentElement.classList.toggle('disabled-scroll');
    })

    nameSearch.forEach((item) => {
        item.addEventListener('click', function() {
            inputSearch.value = item.textContent.trim();
        })
    })

    nameSearch_900.forEach((item) => {
        item.addEventListener('click', function() {
            inputSearch_900.value = item.textContent.trim();
        })
    })
</script>