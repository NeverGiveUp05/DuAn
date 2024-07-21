<main id="main">
    <div class="container">
        <p style="margin: 30px 0 5px; font-size: 20px; font-weight: 500">Kết quả tìm kiếm cho: <?php echo $_GET['search'] ?></p>
        <section id="product">
            <div class="wrap">
                <div id="product-show">
                    <div class="content">

                        <?php
                        require_once '../dao/pdo.php';
                        require '../dao/hang_hoa.php';

                        $products = hang_selectAll();

                        $name = str_replace(" ", "", mb_strtolower($_GET['search']));

                        $find = false;

                        foreach ($products as $product) {
                            $namedata = str_replace(" ", "", mb_strtolower($product['ten_hang_hoa']));
                            if (str_contains($namedata, $name)) { ?>
                                <div class="box" style="min-height: 493px; margin-top: 20px">
                                    <div class="cart">NEW</div>
                                    <a href="?detail=<?php echo $product['ma_hang_hoa'] ?>" style="display: block; margin-bottom: 17px; max-height: 369px">
                                        <img class="cart-img" src="<?php echo $product['hinh_anh'] ?>" alt="" />
                                        <img class="pseudo-img" src="<?php echo $product['hinh_anh_nen'] ?>" alt="" />
                                    </a>

                                    <div class="detail">
                                        <div class="detail-head">
                                            <div class="list-color">
                                                <div class="color color-c5a782"></div>
                                                <div class="color color-a3784e"></div>
                                                <div class="color color-ec6795 checked"></div>
                                            </div>
                                            <div class="heart">
                                                <span style="font-size: 13px; margin-right: 4px; color: #57585a;"><?php echo $product['so_luot_xem'] ?></span>
                                                <i class="fa-solid fa-eye" style="font-size: 12px; color: #57585a; margin-right: 12px"></i>
                                            </div>
                                        </div>

                                        <div class="detail-desp"><?php echo $product['ten_hang_hoa'] ?></div>

                                        <div class="detail-foot">
                                            <div class="price">
                                                <span><?php if (isset($product['muc_giam_gia'])) {
                                                            $cost = $product['don_gia'] * (100 - $product['muc_giam_gia']) / 100;
                                                        } else {
                                                            $cost = $product['don_gia'];
                                                        }
                                                        echo number_format($cost, 0, '', '.'); ?>đ</span>
                                                <?php if (isset($product['muc_giam_gia'])) { ?>
                                                    <del><?php echo number_format($product['don_gia'], 0, '', '.'); ?>đ</del>
                                                <?php   } ?>
                                            </div>
                                            <div class="add-to-cart" onClick="addPro({name: '<?php echo $product['ten_hang_hoa'] ?>', price: <?php echo $cost ?>, img:'<?php echo $product['hinh_anh'] ?>'})">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php $find = true;
                            }
                        } ?>

                        <?php if (!$find) { ?>
                            <p style="width: 500px; margin-top: 15px; font-size: 18px">Không tìm thấy sản phẩm nào</p>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="product" style="padding-top: 25px;">
            <div class="title-section">Có thể bạn quan tâm</div>
            <div class="wrap">
                <div class="head">
                    <ul>
                        <?php
                        $ds = loai_selectAll();
                        foreach ($ds as $key => $value) { ?>
                            <?php if (isset($_GET['list'])) { ?>
                                <?php if ($_GET['list'] == $value['ma_loai_hang']) { ?>
                                    <li class='tab active' onClick='change(<?php echo $value["ma_loai_hang"] ?>)'>
                                        <?php echo $value['ten_loai_hang'] ?>
                                    </li>
                                <?php   } else { ?>
                                    <li class='tab' onClick='change(<?php echo $value["ma_loai_hang"] ?>)'>
                                        <?php echo $value['ten_loai_hang'] ?>
                                    </li>
                                <?php } ?>
                            <?php   } else { ?>
                                <?php if ($key == 0) { ?>
                                    <li class='tab active' onClick='change(<?php echo $value["ma_loai_hang"] ?>)'>
                                        <?php echo $value['ten_loai_hang'] ?>
                                    </li>
                                <?php   } else { ?>
                                    <li class='tab' onClick='change(<?php echo $value["ma_loai_hang"] ?>)'>
                                        <?php echo $value['ten_loai_hang'] ?>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php    }
                        ?>
                    </ul>
                </div>
                <div id="product-show">
                    <div class="content">

                        <?php
                        if (isset($_GET['list'])) {
                            $products = hang_selectByLoaiHang($_GET['list']);
                        } else {
                            $products = hang_selectByLoaiHang(1);
                        }

                        foreach ($products as $product) { ?>
                            <div class="box" style="min-height: 493px;">
                                <div class="cart">NEW</div>
                                <a href="?detail=<?php echo $product['ma_hang_hoa'] ?>" style="display: block; margin-bottom: 17px; max-height: 369px">
                                    <img class="cart-img" src="<?php echo $product['hinh_anh'] ?>" alt="" />
                                    <img class="pseudo-img" src="<?php echo $product['hinh_anh_nen'] ?>" alt="" />
                                </a>

                                <div class="detail">
                                    <div class="detail-head">
                                        <div class="list-color">
                                            <div class="color color-c5a782"></div>
                                            <div class="color color-a3784e"></div>
                                            <div class="color color-ec6795 checked"></div>
                                        </div>
                                        <div class="heart">
                                            <span style="font-size: 13px; margin-right: 4px; color: #57585a;"><?php echo $product['so_luot_xem'] ?></span>
                                            <i class="fa-solid fa-eye" style="font-size: 12px; color: #57585a; margin-right: 12px"></i>
                                        </div>
                                    </div>

                                    <div class="detail-desp"><?php echo $product['ten_hang_hoa'] ?></div>

                                    <div class="detail-foot">
                                        <div class="price">
                                            <span><?php if (isset($product['muc_giam_gia'])) {
                                                        $cost = $product['don_gia'] * (100 - $product['muc_giam_gia']) / 100;
                                                    } else {
                                                        $cost = $product['don_gia'];
                                                    }
                                                    echo number_format($cost, 0, '', '.'); ?>đ</span>
                                            <?php if (isset($product['muc_giam_gia'])) { ?>
                                                <del><?php echo number_format($product['don_gia'], 0, '', '.'); ?>đ</del>
                                            <?php   } ?>
                                        </div>
                                        <div class="add-to-cart" onClick="addPro({name: '<?php echo $product['ten_hang_hoa'] ?>', price: <?php echo $cost ?>, img:'<?php echo $product['hinh_anh'] ?>'})">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php    }
                        ?>
                    </div>
                </div>
                <div class="show-all">
                    <div id="more-pro" class="show-text">Xem thêm</div>
                </div>
            </div>
        </section>
    </div>
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
</main>


<script>
    let scroll = localStorage.getItem('scroll');

    if (scroll) {
        window.scrollTo(0, scroll);

        localStorage.removeItem('scroll');
    }

    function change(maLoaiHang) {

        let currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;

        localStorage.setItem('scroll', currentScrollPosition);

        window.location.href = '?search=<?php echo $_GET['search'] ?>&list=' + maLoaiHang;
    }
</script>