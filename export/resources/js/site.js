// This is all you.
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import collapse from "@alpinejs/collapse";
import intersect from "@alpinejs/intersect";
import fitty from "fitty";

// Initialize Alpine.js with plugins
Alpine.plugin(focus);
Alpine.plugin(collapse);
Alpine.plugin(intersect);
Alpine.start();

// Initialize Fitty for hero elements
document.addEventListener("DOMContentLoaded", function () {
    // Initialize Fitty on hero titles
    fitty("#hero-title", {
        minSize: 24,
        multiLine: true,
    });
});
