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

    switch (item.name) {
        case "Lantana Dress - Đầm Xòe Phối Đai": {
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

            break;
        }

        case "Áo Sơ Mi PEPLUM Cổ Đức": {
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

            break;
        }

        case "Áo Blazer Dahlia Set": {
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

            break;
        }

        case "Áo Kiểu Youthful Set": {
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

            break;
        }

        case "Cosmos Set - Áo Công Sở Peplum Và Chân Váy Xòe": {
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

            break;
        }

        default: {
            console.log("them san pham loi");
            break;
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
