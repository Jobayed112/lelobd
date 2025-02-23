    // Utility function to hide menus when clicking outside
    function hideMenuOnClick(menu, trigger) {
        document.addEventListener("click", (event) => {
            if (!menu.contains(event.target) && !trigger.contains(event.target)) {
                menu.classList.add("hidden");
            }
        });
    }

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

        hideMenuOnClick(profileMenu, profileBtn);
    }

    // Close Sidebar
    function mobile_nav_close() {
        const nav = document.getElementById('mobile-nav');
        nav.classList.add('hidden');
    }

    // Toggle Mobile Navigation Menu
    if (mobileMenuBtn && sidebar) {
        mobileMenuBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            sidebar.classList.toggle("hidden");

            // Hide cart menu and profile menu when sidebar is opened
            if (!sidebar.classList.contains("hidden")) {
                cartMenu.classList.add("hidden");
                profileMenu.classList.add("hidden");
            }
        });

        hideMenuOnClick(sidebar, mobileMenuBtn);
    }

    // Toggle Cart Dropdown
    if (cartBtn && cartMenu) {
        cartBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            cartMenu.classList.toggle("hidden");

            // If cart menu is opened, hide the profile menu and sidebar if they are open
            if (!cartMenu.classList.contains("hidden")) {
                if (!profileMenu.classList.contains("hidden")) {
                    profileMenu.classList.add("hidden");
                }
                if (!sidebar.classList.contains("hidden")) {
                    sidebar.classList.add("hidden");
                }
            }
        });

        hideMenuOnClick(cartMenu, cartBtn);
    }

    // Toggle Search Form Visibility
    const searchFormBtn = document.getElementById("search-form-btn");
    const searchForm = document.getElementById("search-form");

    if (searchFormBtn && searchForm) {
        searchFormBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            searchForm.classList.toggle("hidden");
        });

        hideMenuOnClick(searchForm, searchFormBtn);
    }

    // Toggle Mobile Search Form Visibility
    const mobileSearchBtn = document.getElementById("mobile-search-btn");
    const mobileSearchForm = document.getElementById("mobile-search-form");

    if (mobileSearchBtn && mobileSearchForm) {
        mobileSearchBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            mobileSearchForm.classList.toggle("hidden");
        });

        hideMenuOnClick(mobileSearchForm, mobileSearchBtn);
    }



    // header category


    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".group").forEach((category) => {
            let dropdown = category.querySelector("ul");

            category.addEventListener("mouseenter", () => {
                dropdown.classList.remove("hidden");
            });

            category.addEventListener("mouseleave", () => {
                setTimeout(() => {
                    dropdown.classList.add("hidden");
                }, 200); // Delay hiding to allow smoother hover
            });
        });
    });
