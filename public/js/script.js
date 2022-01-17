// Certificates Lightbox

const
    certificateItem = document.querySelectorAll(".certificate-item"),
    totalCertificateItem = certificateItem.length,
    lightbox = document.querySelector(".lightbox");
let itemIndex = 0;

for (let i = 0; i < totalCertificateItem; i++) {
    certificateItem[i].addEventListener("click", function () {
        itemIndex = i;
        toggleLightbox();
        changeItem();
    })
}

document.addEventListener("keydown", function (event) {
    if (lightbox != null) {
        if (lightbox.classList.contains("open") && event.which == 27) {
            lightbox.classList.remove("open");
        } else if (lightbox.classList.contains("open") && event.which == 37) {
            if (itemIndex === 0) {
                itemIndex = totalCertificateItem - 1;
            } else {
                itemIndex--;
            }
            changeItem();
        } else if (lightbox.classList.contains("open") && event.which == 39) {
            if (itemIndex === totalCertificateItem - 1) {
                itemIndex = 0;
            } else {
                itemIndex++;
            }
            changeItem();
        }
    }
})

if (lightbox != null) {
    const lightboxClose = lightbox.querySelector(".lightbox-close");
    lightbox.addEventListener("click", function (event) {
        if (event.target === lightboxClose || event.target === lightbox) {
            toggleLightbox();
        }
    })
}

function prevItem() {
    if (itemIndex === 0) {
        itemIndex = totalCertificateItem - 1;
    } else {
        itemIndex--;
    }
    changeItem();
}

function nextItem() {
    if (itemIndex === totalCertificateItem - 1) {
        itemIndex = 0;
    } else {
        itemIndex++;
    }
    changeItem();
}

function toggleLightbox() {
    const
        a = window.matchMedia("(max-height: 500px)"),
        isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

    if (a.matches || isMobile) {
        if (lightbox.classList.contains("open")) {
            lightbox.classList.remove("open");
        } else {
            console.log("Your screen is too small for Lightbox!");
        }
    } else {
        lightbox.classList.toggle("open");
    }
}

function changeItem() {
    const
        lightboxImage = lightbox.querySelector(".lightbox-image"),
        lightboxText = lightbox.querySelector(".caption-text"),
        lightboxCounter = lightbox.querySelector(".caption-counter");

    imageSource = certificateItem[itemIndex].querySelector(".certificate-image img").getAttribute("src");
    lightboxImage.src = imageSource;
    lightboxText.innerHTML = certificateItem[itemIndex].querySelector(".certificate-image img").getAttribute("name");
    lightboxCounter.innerHTML = (itemIndex + 1) + " of " + totalCertificateItem;

    imageAlt = certificateItem[itemIndex].querySelector(".certificate-image img").getAttribute("alt");
    imageStyle = document.querySelector(".lightbox .lightbox-content img");
    if (imageAlt == "mos1" || imageAlt == "mtcna" || imageAlt == "oracle") {
        imageStyle.style.height = "435px";
    } else {
        imageStyle.style.height = "650px";
    }
}


// Style Switcher

document.querySelector(".switcher-toggle").addEventListener("click", () => {
    document.querySelector(".style-switcher").classList.toggle("open");
})

document.addEventListener("keydown", function (event) {
    if (document.querySelector(".style-switcher").classList.contains("open") && event.which == 27) {
        document.querySelector(".style-switcher").classList.remove("open");
    }
})

function setActiveColor(color) {
    const
        links = document.querySelectorAll(".alternative-color"),
        totalLinks = links.length;

    for (let i = 0; i < totalLinks; i++) {
        if (color === links[i].getAttribute("title")) {
            if (color == "Red") {
                localStorage.removeItem("Yellow");
                localStorage.removeItem("Green");
                localStorage.removeItem("Blue");
                if (localStorage.getItem("dark")) {
                    localStorage.setItem("Red", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "dark";
                } else if (localStorage.getItem("light")) {
                    localStorage.setItem("Red", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "";
                } else {
                    localStorage.clear();
                    localStorage.setItem("Red", this.checked);
                    links[i].removeAttribute("disabled");
                }
            } else if (color == "Yellow") {
                localStorage.removeItem("Red");
                localStorage.removeItem("Green");
                localStorage.removeItem("Blue");
                if (localStorage.getItem("dark")) {
                    localStorage.setItem("Yellow", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "dark";
                } else if (localStorage.getItem("light")) {
                    localStorage.setItem("Yellow", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "";
                } else {
                    localStorage.clear();
                    localStorage.setItem("Yellow", this.checked);
                    links[i].removeAttribute("disabled");
                }
            } else if (color == "Green") {
                localStorage.removeItem("Yellow");
                localStorage.removeItem("Red");
                localStorage.removeItem("Blue");
                if (localStorage.getItem("dark")) {
                    localStorage.setItem("Green", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "dark";
                } else if (localStorage.getItem("light")) {
                    localStorage.setItem("Green", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "";
                } else {
                    localStorage.clear();
                    localStorage.setItem("Green", this.checked);
                    links[i].removeAttribute("disabled");
                }
            } else {
                localStorage.removeItem("Yellow");
                localStorage.removeItem("Green");
                localStorage.removeItem("Red");
                if (localStorage.getItem("dark")) {
                    localStorage.setItem("Blue", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "dark";
                } else if (localStorage.getItem("light")) {
                    localStorage.setItem("Blue", this.checked);
                    links[i].removeAttribute("disabled");
                    document.body.className = "";
                } else {
                    localStorage.clear();
                    localStorage.setItem("Blue", this.checked);
                    links[i].removeAttribute("disabled");
                }
            }
        } else {
            if (localStorage.getItem("dark")) {
                links[i].setAttribute("disabled", true);
                document.body.className = "dark";
            } else {
                links[i].setAttribute("disabled", true);
                document.body.className = "";
            }
        }
    }
}

if (localStorage.getItem("Red")) {
    document.querySelector("#Red").removeAttribute("disabled");
} else if (localStorage.getItem("Yellow")) {
    document.querySelector("#Yellow").removeAttribute("disabled");
} else if (localStorage.getItem("Green")) {
    document.querySelector("#Green").removeAttribute("disabled");
} else if (localStorage.getItem("Blue")) {
    document.querySelector("#Blue").removeAttribute("disabled");
}

const
    bodySkin = document.querySelectorAll(".body-skin"),
    totalBodySkin = bodySkin.length;

for (let i = 0; i < totalBodySkin; i++) {
    bodySkin[i].addEventListener("change", function () {
        if (this.value === "dark") {
            localStorage.removeItem("light");
            if (localStorage.getItem("Red")) {
                localStorage.setItem("dark", this.checked);
                document.body.className = "dark";
                document.querySelector("#Red").removeAttribute("disabled");
            } else if (localStorage.getItem("Yellow")) {
                localStorage.setItem("dark", this.checked);
                document.body.className = "dark";
                document.querySelector("#Yellow").removeAttribute("disabled");
            } else if (localStorage.getItem("Green")) {
                localStorage.setItem("dark", this.checked);
                document.body.className = "dark";
                document.querySelector("#Green").removeAttribute("disabled");
            } else if (localStorage.getItem("Blue")) {
                localStorage.setItem("dark", this.checked);
                document.body.className = "dark";
                document.querySelector("#Blue").removeAttribute("disabled");
            } else {
                localStorage.clear();
                localStorage.setItem("dark", this.checked);
                document.body.className = "dark";
            }
        } else {
            localStorage.removeItem("dark");
            if (localStorage.getItem("Red")) {
                localStorage.setItem("light", this.checked);
                document.body.className = "";
                document.querySelector("#Red").removeAttribute("disabled");
            } else if (localStorage.getItem("Yellow")) {
                localStorage.setItem("light", this.checked);
                document.body.className = "";
                document.querySelector("#Yellow").removeAttribute("disabled");
            } else if (localStorage.getItem("Green")) {
                localStorage.setItem("light", this.checked);
                document.body.className = "";
                document.querySelector("#Green").removeAttribute("disabled");
            } else if (localStorage.getItem("Blue")) {
                localStorage.setItem("light", this.checked);
                document.body.className = "";
                document.querySelector("#Blue").removeAttribute("disabled");
            } else {
                localStorage.clear();
                localStorage.setItem("light", this.checked);
                document.body.className = "";
            }
        }
    })
}

if (localStorage.getItem("dark")) {
    document.body.className = "dark";
    document.querySelector("#dark").setAttribute("checked", true);
} else {
    document.body.className = "";
    document.querySelector("#light").setAttribute("checked", true);
}


// Responsive Sidebar

const
    navTogglerButton = document.querySelector(".nav-toggler"),
    sidebar = document.querySelector(".sidebar");

navTogglerButton.addEventListener("click", () => {
    sidebarSectionTogglerButton();
})

function sidebarSectionTogglerButton() {
    navTogglerButton.classList.toggle("open");
    sidebar.classList.toggle("open");
}

document.addEventListener("keydown", function (event) {
    if (navTogglerButton.classList.contains("open") && event.which == 27) {
        navTogglerButton.classList.remove("open");
    }

    if (sidebar.classList.contains("open") && event.which == 27) {
        sidebar.classList.remove("open");
    }
})