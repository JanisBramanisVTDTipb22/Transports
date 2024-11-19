document.addEventListener("DOMContentLoaded", () => {
    const burgerMenu = document.getElementById("burger-menu");
    const navLinks = document.getElementById("nav-links");

    burgerMenu.addEventListener("click", () => {
        // Toggle the 'show' class to display the menu
        navLinks.classList.toggle("show");

        // Toggle the 'open' class to change the burger menu to an 'X'
        burgerMenu.classList.toggle("open");
    });
});
