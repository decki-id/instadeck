// Responsive Sidebar

const
    navTogglerButton = document.querySelector(".nav-toggler"),
    studentSidebar = document.querySelector(".students-sidebar");


navTogglerButton.addEventListener("click", () => {
    sidebarSectionTogglerButton();
})

function sidebarSectionTogglerButton() {
    navTogglerButton.classList.toggle("click");
    studentSidebar.classList.toggle("click");
}

document.addEventListener("keydown", function (event) {
    if (navTogglerButton.classList.contains("click") && event.which == 27) {
        navTogglerButton.classList.remove("click");
    }

    if (studentSidebar.classList.contains("click") && event.which == 27) {
        studentSidebar.classList.remove("click");
    }
})
