document.addEventListener("DOMContentLoaded", function () {
    const toggleMenu = document.getElementById("toggleMenu");
    const menu = document.getElementById("menu");

    if (toggleMenu && menu) {
        toggleMenu.addEventListener("click", function () {
            menu.classList.toggle("hidden");
        });
    }
});
