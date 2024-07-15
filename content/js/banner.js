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
