// img
const img = document.getElementById("slide-img");
const listDot = document.querySelectorAll(".dot");

const listImg = ["../content/images/banner2.jpg", "../content/images/banner3.png", "../content/images/banner4.jpg"];

let lengthImg = listImg.length - 1;
let activeImg = 0;

listDot[activeImg].classList.add("active");

const prev = () => {
    listDot[activeImg].classList.remove("active");
    activeImg = activeImg - 1;
    if (activeImg < 0) {
        activeImg = lengthImg;
    }
    img.setAttribute("src", listImg[activeImg]);
    listDot[activeImg].classList.add("active");
};

const next = () => {
    listDot[activeImg].classList.remove("active");
    activeImg = activeImg + 1;
    if (activeImg > lengthImg) {
        activeImg = 0;
    }
    img.setAttribute("src", listImg[activeImg]);
    listDot[activeImg].classList.add("active");
};

// shop
const shopping = document.getElementById("shopping");
const listNumberCart = document.getElementsByClassName("number-cart");
const main = document.getElementById("main-shop");
const total = document.getElementById("total");

let arrPro = [];

if (arrPro.length == 0) {
    main.innerText = "Bạn chưa có sản phẩm nào";
}

const openShop = () => {
    shopping.classList.add("open");
};

const closeShop = () => {
    shopping.classList.remove("open");
};

const addPro = (item) => {
    let quantity = 1;
    let check = false;

    if (item.name === "Lantana Dress - Đầm Xòe Phối Đai") {
        arrPro.forEach((obj) => {
            if (obj.name == "Lantana Dress - Đầm Xòe Phối Đai") {
                check = true;
            }
        });

        if (check) {
            arrPro.forEach((obj) => {
                if (obj.name == "Lantana Dress - Đầm Xòe Phối Đai") {
                    obj.quantity += 1;
                }
            });
        } else {
            item = { ...item, quantity };
            arrPro.push(item);
        }
    }

    if (item.name === "Áo Sơ Mi PEPLUM Cổ Đức") {
        arrPro.forEach((obj) => {
            if (obj.name == "Áo Sơ Mi PEPLUM Cổ Đức") {
                check = true;
            }
        });

        if (check) {
            arrPro.forEach((obj) => {
                if (obj.name == "Áo Sơ Mi PEPLUM Cổ Đức") {
                    obj.quantity += 1;
                }
            });
        } else {
            item = { ...item, quantity };
            arrPro.push(item);
        }
    }

    if (item.name === "Áo Blazer Dahlia Set") {
        arrPro.forEach((obj) => {
            if (obj.name == "Áo Blazer Dahlia Set") {
                check = true;
            }
        });

        if (check) {
            arrPro.forEach((obj) => {
                if (obj.name == "Áo Blazer Dahlia Set") {
                    obj.quantity += 1;
                }
            });
        } else {
            item = { ...item, quantity };
            arrPro.push(item);
        }
    }

    if (item.name === "Áo Kiểu Youthful Set") {
        arrPro.forEach((obj) => {
            if (obj.name == "Áo Kiểu Youthful Set") {
                check = true;
            }
        });

        if (check) {
            arrPro.forEach((obj) => {
                if (obj.name == "Áo Kiểu Youthful Set") {
                    obj.quantity += 1;
                }
            });
        } else {
            item = { ...item, quantity };
            arrPro.push(item);
        }
    }

    if (item.name === "Cosmos Set - Áo Công Sở Peplum Và Chân Váy Xòe") {
        arrPro.forEach((obj) => {
            if (obj.name == "Cosmos Set - Áo Công Sở Peplum Và Chân Váy Xòe") {
                check = true;
            }
        });

        if (check) {
            arrPro.forEach((obj) => {
                if (obj.name == "Cosmos Set - Áo Công Sở Peplum Và Chân Váy Xòe") {
                    obj.quantity += 1;
                }
            });
        } else {
            item = { ...item, quantity };
            arrPro.push(item);
        }
    }

    makeShop();
    makeTotal();
    makeCountPro();
};

const makeShop = () => {
    main.innerHTML = "";

    if (arrPro.length == 0) {
        main.innerText = "Bạn chưa có sản phẩm nào";
    }

    arrPro.forEach((item) => {
        main.innerHTML += `
        <div class="item-product">
        <div class="thumb"><img src=${item.img} alt="" /></div>
    
        <div class="container-flex">
            <div class="info-product">
                <h3 id="product-name">${item.name}</h3>
            </div>
            <div class="trash" onClick="removePro(this)"><i class="fa-solid fa-trash-can"></i></div>
            <div class="item-bottom">
                <div class="quantity" data-name="${item.name}">
                    <div class="quantity-left" onClick="reduce(this)"><i class="fa-solid fa-minus"></i></div>
                    <input type="number" value="${
                        item.quantity
                    }" id="quantity-number" onChange="typeValue(this, this.value)"/>
                    <div class="quantity-right" onClick="increase(this)"><i class="fa-solid fa-plus"></i></div>
                </div>
    
                <div class="item-price">${new Intl.NumberFormat().format(item.price * item.quantity)}₫</div>
            </div>
        </div>
    </div>
    `;
    });
};

const reduce = (item) => {
    let productName = item.parentElement.getAttribute("data-name");
    arrPro.forEach((obj, index) => {
        if (obj.name === productName) {
            if (arrPro[index].quantity != 1) {
                arrPro[index].quantity -= 1;
            }
        }
    });

    makeShop();
    makeTotal();
    makeCountPro();
};

const increase = (item) => {
    let productName = item.parentElement.getAttribute("data-name");
    arrPro.forEach((obj, index) => {
        if (obj.name === productName) {
            arrPro[index].quantity += 1;
        }
    });

    makeShop();
    makeTotal();
    makeCountPro();
};

const removePro = (item) => {
    let productName = item.parentElement.children[0].innerText;
    arrPro.forEach((obj, index) => {
        if (obj.name === productName) {
            arrPro.splice(index, 1);
        }
    });

    makeShop();
    makeTotal();
    makeCountPro();
};

const typeValue = (element, value) => {
    if (Number(value) > 0) {
        let productName = element.parentElement.getAttribute("data-name");
        arrPro.forEach((obj, index) => {
            if (obj.name === productName) {
                arrPro[index].quantity = Number(value);
            }
        });
    }

    makeShop();
    makeTotal();
    makeCountPro();
};

const makeTotal = () => {
    let result = 0;

    arrPro.forEach((item) => {
        result += item.price * item.quantity;
    });

    result = new Intl.NumberFormat().format(result);

    total.innerText = result + "đ";
};

const makeCountPro = () => {
    let result = arrPro.reduce((count, item) => count + item.quantity, 0);
    listNumberCart[0].innerText = listNumberCart[1].innerText = result;
};

// more product
const btn = document.getElementById("more-pro");
const container = document.getElementById("product-show");

const showMore = () => {
    container.innerHTML += `
    <div class="content">
    <div class="box">
        <div class="cart">NEW</div>
        <img class="cart-img" src="./images/image1.1.jfif" alt="" />
        <img class="pseudo-img" src="./images/image1.2.jfif" alt="" />

        <div class="detail">
            <div class="detail-head">
                <div class="list-color">
                    <div class="color color-c5a782"></div>
                    <div class="color color-a3784e"></div>
                    <div class="color color-ec6795 checked"></div>
                </div>
                <div class="heart">
                    <i class="fa-regular fa-heart" onClick="changeHeart(this)"></i>
                </div>
            </div>

            <div class="detail-desp">Lantana Dress - Đầm xòe phối đai</div>

            <div class="detail-foot">
                <div class="price"><span>2.000.000đ</span> <del>3.000.000đ</del></div>
                <div
                    class="add-to-cart"
                    onClick="addPro({name: 'Lantana Dress - Đầm Xòe Phối Đai', price: 2000000, img: './images/image1.1.jfif'})"
                >
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="cart">NEW</div>
        <img class="cart-img" src="./images/image2.1.jfif" alt="" />
        <img class="pseudo-img" src="./images/image2.2.jfif" alt="" />

        <div class="detail">
            <div class="detail-head">
                <div class="list-color">
                    <div class="color color-c5a782"></div>
                    <div class="color color-a3784e"></div>
                    <div class="color color-ec6795 checked"></div>
                </div>
                <div class="heart">
                    <i class="fa-regular fa-heart" onClick="changeHeart(this)"></i>
                </div>
            </div>

            <div class="detail-desp">Áo sơ mi PEPLUM cổ đức</div>

            <div class="detail-foot">
                <div class="price"><span>850.000đ</span> <del>3.000.000đ</del></div>
                <div
                    class="add-to-cart"
                    onClick="addPro({name: 'Áo Sơ Mi PEPLUM Cổ Đức', price: 850000, img: './images/image2.1.jfif'})"
                >
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="cart">NEW</div>
        <img class="cart-img" src="./images/image3.1.jfif" alt="" />
        <img class="pseudo-img" src="./images/image3.2.jfif" alt="" />

        <div class="detail">
            <div class="detail-head">
                <div class="list-color">
                    <div class="color color-c5a782"></div>
                    <div class="color color-a3784e"></div>
                    <div class="color color-ec6795 checked"></div>
                </div>
                <div class="heart">
                    <i class="fa-regular fa-heart" onClick="changeHeart(this)"></i>
                </div>
            </div>

            <div class="detail-desp">Áo Blazer Dahlia Set</div>

            <div class="detail-foot">
                <div class="price"><span>1.500.000đ</span> <del>3.000.000đ</del></div>
                <div
                    class="add-to-cart"
                    onClick="addPro({name: 'Áo Blazer Dahlia Set', price: 1500000, img: './images/image3.1.jfif'})"
                >
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="cart">NEW</div>
        <img class="cart-img" src="./images/image4.1.jfif" alt="" />
        <img class="pseudo-img" src="./images/image4.2.jfif" alt="" />

        <div class="detail">
            <div class="detail-head">
                <div class="list-color">
                    <div class="color color-c5a782"></div>
                    <div class="color color-a3784e"></div>
                    <div class="color color-ec6795 checked"></div>
                </div>
                <div class="heart">
                    <i class="fa-regular fa-heart" onClick="changeHeart(this)"></i>
                </div>
            </div>

            <div class="detail-desp">Áo kiểu Youthful Set</div>

            <div class="detail-foot">
                <div class="price">
                    <span>500.000đ</span>
                    <del>3.000.000đ</del>
                </div>

                <div
                    class="add-to-cart"
                    onClick="addPro({name: 'Áo Kiểu Youthful Set', price: 500000, img: './images/image4.1.jfif'})"
                >
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="cart">NEW</div>

        <img class="cart-img" src="./images/image5.1.jfif" alt="" />
        <img class="pseudo-img" src="./images/image5.2.jfif" alt="" />

        <div class="detail">
            <div class="detail-head">
                <div class="list-color">
                    <div class="color color-c5a782"></div>
                    <div class="color color-a3784e"></div>
                    <div class="color color-ec6795 checked"></div>
                </div>
                <div class="heart">
                    <i class="fa-regular fa-heart" onClick="changeHeart(this)"></i>
                </div>
            </div>

            <div class="detail-desp">Cosmos Set - Áo công sở peplum và chân váy xòe</div>

            <div class="detail-foot">
                <div class="price"><span>600.000đ</span> <del>3.000.000đ</del></div>
                <div
                    class="add-to-cart"
                    onClick="addPro({name: 'Cosmos Set - Áo Công Sở Peplum Và Chân Váy Xòe', price: 600000, img: './images/image5.1.jfif'})"
                >
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    `;
};

btn.addEventListener("click", showMore);

// heart
function changeHeart(item) {
    item.classList.toggle("fa-regular");
    item.classList.toggle("fa-solid");
}

// done
