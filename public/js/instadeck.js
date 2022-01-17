/* Search Bar */

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