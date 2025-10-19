/**
 * Main JavaScript file for the frontend
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuLinks = mobileMenu ? mobileMenu.querySelectorAll('a') : [];

    // Toggle mobile menu
    function toggleMobileMenu() {
        if (mobileMenu && mobileMenuButton) {
            mobileMenu.classList.toggle('hidden');
            mobileMenuButton.setAttribute(
                'aria-expanded', 
                mobileMenuButton.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'
            );
        }
    }

    // Close mobile menu when clicking outside
    function handleClickOutside(e) {
        if (mobileMenu && mobileMenuButton && 
            !mobileMenuButton.contains(e.target) && 
            !mobileMenu.contains(e.target)) {
            mobileMenu.classList.add('hidden');
            mobileMenuButton.setAttribute('aria-expanded', 'false');
        }
    }

    // Initialize mobile menu
    if (mobileMenuButton && mobileMenu) {
        // Set initial ARIA attributes
        mobileMenuButton.setAttribute('aria-expanded', 'false');
        mobileMenuButton.setAttribute('aria-controls', 'mobile-menu');
        mobileMenu.setAttribute('aria-labelledby', 'mobile-menu-button');

        // Toggle menu on button click
        mobileMenuButton.addEventListener('click', (e) => {
            e.preventDefault();
            toggleMobileMenu();
        });

        // Close menu when clicking on a link
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', handleClickOutside);

        // Close menu on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                toggleMobileMenu();
            }
        });
    }

    // Back to top button
    const backToTopButton = document.getElementById('back-to-top');
    
    if (backToTopButton) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.remove('opacity-100', 'visible');
                backToTopButton.classList.add('opacity-0', 'invisible');
            }
        });

        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Dropdown menus
    const dropdownButtons = document.querySelectorAll('[data-dropdown-toggle]');
    
    dropdownButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = button.getAttribute('data-dropdown-toggle');
            const target = document.getElementById(targetId);
            
            if (target) {
                target.classList.toggle('hidden');
                target.classList.toggle('block');
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        dropdownButtons.forEach(button => {
            const targetId = button.getAttribute('data-dropdown-toggle');
            const target = document.getElementById(targetId);
            
            if (target && !button.contains(e.target) && !target.contains(e.target)) {
                target.classList.add('hidden');
                target.classList.remove('block');
            }
        });
    });

    // Form validation
    const forms = document.querySelectorAll('form[data-validate]');
    
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });

    // Sticky Header functionality (Desktop only)
    const stickyHeader = document.getElementById('stickyHeader');
    const body = document.body;
    let headerHeight = 0;
    
    if (stickyHeader) {
        // Calculate header height
        headerHeight = stickyHeader.offsetHeight;
        
        // Function to check if device is desktop (screen width >= 992px)
        function isDesktop() {
            return window.innerWidth >= 992;
        }
        
        // Function to handle sticky header
        function handleStickyHeader() {
            // Only apply sticky header on desktop
            if (!isDesktop()) {
                // Remove sticky classes if on mobile/tablet
                stickyHeader.classList.remove('sticky-header');
                body.classList.remove('sticky-header-active');
                return;
            }
            
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 100) { // Start sticky after 100px scroll
                stickyHeader.classList.add('sticky-header');
                body.classList.add('sticky-header-active');
            } else {
                stickyHeader.classList.remove('sticky-header');
                body.classList.remove('sticky-header-active');
            }
        }
        
        // Listen for scroll events
        window.addEventListener('scroll', handleStickyHeader);
        
        // Handle window resize to recalculate header height and check screen size
        window.addEventListener('resize', () => {
            if (!stickyHeader.classList.contains('sticky-header')) {
                headerHeight = stickyHeader.offsetHeight;
            }
            // Re-check sticky header on resize
            handleStickyHeader();
        });
        
        // Initial check in case page is already scrolled
        handleStickyHeader();
    }
});

// Utility function to toggle classes
function toggleClass(element, ...classNames) {
    classNames.forEach(className => {
        element.classList.toggle(className);
    });
}

// Export for use in other modules if needed
window.app = {
    toggleClass
};
