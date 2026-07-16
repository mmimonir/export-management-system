import "./bootstrap";

// Import Popper.js
import "@popperjs/core";

// Import Bootstrap JS
import "bootstrap";

// Import AdminLTE
import "admin-lte";

// Import OverlayScrollbars
import "overlayscrollbars";

// DataTables (Bootstrap 5 integration + Buttons + Responsive)
import "datatables.net-bs5";
import "datatables.net-buttons-bs5";
import "datatables.net-responsive-bs5";
import "datatables.net-buttons/js/buttons.html5.js";
import "datatables.net-buttons/js/buttons.print.js";

// Export helpers
import JSZip from "jszip";
window.JSZip = JSZip;
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.pdfMake = pdfMake;

// Initialize AdminLTE
$(document).ready(function () {
    console.log("AdminLTE initialized successfully");
});
