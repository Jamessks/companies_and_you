import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const notificationMessages = document.querySelectorAll(".notification-msg");
    notificationMessages.forEach((message) => {
        message.addEventListener("click", function () {
            this.classList.add("hidden");
        });
    });

    const dropdownButton = document.getElementById("dropdownDefaultButton");
    const dropdownMenu = document.getElementById("dropdown");

    dropdownButton.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden"); // Toggle the 'hidden' class
    });
});
