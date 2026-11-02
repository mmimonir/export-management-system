import "./bootstrap";
import Swal from "sweetalert2";

// Import Popper.js
import "@popperjs/core";

// Import Bootstrap JS
import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;

// Import AdminLTE
import "admin-lte";

// Import OverlayScrollbars
import "overlayscrollbars";

// Shared DataTables setup (Bootstrap 5 integration + Buttons + Responsive)
import "datatables.net-bs5";
import "datatables.net-buttons-bs5";
import "datatables.net-responsive-bs5";
import "datatables.net-buttons/js/buttons.html5.js";
import "datatables.net-buttons/js/buttons.print.js";
import "./shared/data-tables.js";

window.Swal = Swal;
window.showNotification = ({ icon = "info", text, title } = {}) => Swal.fire({
    toast: true,
    position: "top-end",
    icon,
    title,
    text,
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
});

document.addEventListener("DOMContentLoaded", () => {
    const flashNotification = document.querySelector("[data-flash-notification]");
    if (flashNotification) {
        window.showNotification({
            icon: flashNotification.dataset.notificationIcon,
            text: flashNotification.dataset.notificationText,
        });
    }
});

// Export helpers
import JSZip from "jszip";
window.JSZip = JSZip;
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.addVirtualFileSystem(pdfFonts);
window.pdfMake = pdfMake;

// Initialize AdminLTE
$(document).ready(function () {
    console.log("AdminLTE initialized successfully");
});
