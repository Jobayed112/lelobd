// Toggle Profile Dropdown
const profileBtn = document.getElementById("profile-btn");
const profileMenu = document.getElementById("profile-menu");
const mobileMenuBtn = document.getElementById("mobile-menu-btn");
const sidebar = document.getElementById("mobile-nav");
const cartBtn = document.getElementById("cart-btn");
const cartMenu = document.getElementById("cart-menu");

if (profileBtn && profileMenu) {
    profileBtn.addEventListener("click", (event) => {
        event.stopPropagation(); 
        profileMenu.classList.toggle("hidden");

        // If profile menu is opened, hide the cart menu if it's open
        if (!profileMenu.classList.contains("hidden") && !cartMenu.classList.contains("hidden")) {
            cartMenu.classList.add("hidden");
        }

        // If profile menu is opened, hide the sidebar if it's open
        if (!profileMenu.classList.contains("hidden") && !sidebar.classList.contains("hidden")) {
            sidebar.classList.add("hidden");
        }
    });

    document.addEventListener("click", (event) => {
        if (
            !profileMenu.contains(event.target) &&
            !profileBtn.contains(event.target)
        ) {
            profileMenu.classList.add("hidden");
        }
    });
}
// seide bar close
function mobile_nav_close() {
    const nav = document.getElementById('mobile-nav');
    nav.classList.add('hidden');
}
// Toggle Mobile Navigation Menu
if (mobileMenuBtn && sidebar) {
    mobileMenuBtn.addEventListener("click", (event) => {
        event.stopPropagation(); 
        sidebar.classList.toggle("hidden");

        // Hide cart menu if sidebar is opened
        if (!sidebar.classList.contains("hidden") && !cartMenu.classList.contains("hidden")) {
            cartMenu.classList.add("hidden");
        }

        // Hide profile menu if sidebar is opened
        if (!sidebar.classList.contains("hidden") && !profileMenu.classList.contains("hidden")) {
            profileMenu.classList.add("hidden");
        }
    });

    // Hide profile menu and cart menu when clicking outside the sidebar
    document.addEventListener("click", (event) => {
        if (
            !sidebar.contains(event.target) &&
            !mobileMenuBtn.contains(event.target)
        ) {
            sidebar.classList.add("hidden");

            // Hide profile and cart menus when sidebar is hidden
            profileMenu.classList.add("hidden");
            cartMenu.classList.add("hidden");
        }
    });
}

// Toggle Cart Dropdown
if (cartBtn && cartMenu) {
    cartBtn.addEventListener("click", (event) => {
        event.stopPropagation(); 
        cartMenu.classList.toggle("hidden");

        // If cart menu is opened, hide the profile menu if it's open
        if (!cartMenu.classList.contains("hidden") && !profileMenu.classList.contains("hidden")) {
            profileMenu.classList.add("hidden");
        }

        // If cart menu is opened, hide the sidebar if it's open
        if (!cartMenu.classList.contains("hidden") && !sidebar.classList.contains("hidden")) {
            sidebar.classList.add("hidden");
        }
    });

    // Hide cart menu when clicking outside
    document.addEventListener("click", (event) => {
        if (
            !cartMenu.contains(event.target) &&
            !cartBtn.contains(event.target)
        ) {
            cartMenu.classList.add("hidden");
        }
    });
}

// Toggle Search Form Visibility
const searchFormBtn = document.getElementById("search-form-btn");
const searchForm = document.getElementById("search-form");

if (searchFormBtn && searchForm) {
    searchFormBtn.addEventListener("click", (event) => {
        event.stopPropagation(); // Prevent propagation to avoid document click hiding it
        searchForm.classList.toggle("hidden");
    });

    // Hide the search form when clicking outside
    document.addEventListener("click", (event) => {
        if (
            !searchForm.contains(event.target) &&
            !searchFormBtn.contains(event.target)
        ) {
            searchForm.classList.add("hidden");
        }
    });
}



// Toggle Mobile Search Form Visibility
const mobileSearchBtn = document.getElementById("mobile-search-btn");
const mobileSearchForm = document.getElementById("mobile-search-form");

if (mobileSearchBtn && mobileSearchForm) {
    mobileSearchBtn.addEventListener("click", (event) => {
        event.stopPropagation(); // Prevent propagation to avoid document click hiding it
        mobileSearchForm.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
        if (!mobileSearchForm.contains(event.target) && !mobileSearchBtn.contains(event.target)) {
            mobileSearchForm.classList.add("hidden");
        }
    });
}
