document.addEventListener("DOMContentLoaded", function () {
    const dropdowns = document.querySelectorAll(".sidebar .dropdown > a");

    dropdowns.forEach((dropdown) => {
        dropdown.addEventListener("click", function (e) {
            e.preventDefault();
            const parent = this.parentElement;
            const submenu = parent.querySelector(".dropdown-menu");

            // Close all other dropdowns
            document.querySelectorAll(".sidebar .dropdown").forEach((item) => {
                if (item !== parent) {
                    item.classList.remove("open");
                    item.querySelector(".dropdown-menu").style.maxHeight = null;
                }
            });

            parent.classList.toggle("open");

            if (parent.classList.contains("open")) {
                submenu.style.maxHeight = submenu.scrollHeight + "px";
            } else {
                submenu.style.maxHeight = null;
            }
        });
    });
});
