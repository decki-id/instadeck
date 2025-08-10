// Search Bar

document.addEventListener("keyup", function (event) {
    if (event.which == 191) {
        document.querySelector("#desktop-search").focus();
    }
    
    if (event.which == 191 && document.querySelector(".dhs_search-bar-responsive").classList.contains("show")) {
        document.querySelector("#mobile-search").focus();
    }
})

function searchToggle() {
    document.querySelector(".dhs_search-bar-responsive").classList.toggle("show");
}


// Autofocus

document.addEventListener("DOMContentLoaded", () => {
    const title = document.querySelector("#title");
    const image = document.querySelector("#image");
    const email = document.querySelector("#email");
    const username = document.querySelector("#username");
    if (title) { title.focus(); }
    if (image) { image.focus(); }
    if (email) { email.focus(); }
    if (username) { username.focus(); }
});