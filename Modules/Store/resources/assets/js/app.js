/**
 * Store Module JavaScript
 */

// Initialize store module
document.addEventListener("DOMContentLoaded", function () {
    console.log("Store module loaded successfully");

    // Add store-specific functionality here
    initializeStoreModuleFunctionality();
});

function initializeStoreModuleFunctionality() {
    // Store-specific initializations
    const productCards = document.querySelectorAll(".product-card");
    productCards.forEach((card) => {
        // Add any store-specific behavior here
        console.log("Product card found:", card);

        // Example: Add click handler to product cards
        card.addEventListener("click", function () {
            console.log("Product card clicked");
        });
    });
}

// Export module for use in other parts
export { initializeStoreModuleFunctionality };
