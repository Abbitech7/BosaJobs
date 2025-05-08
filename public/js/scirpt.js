// DOM Content Loaded Event
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functionality
    initHeaderScroll();
    initMobileMenu();
    initLanguageSelector();
    initSmoothScrolling();
    initPopup();
    initAnimations();
});

// Header Scroll Effect
function initHeaderScroll() {
    const header = document.getElementById('header');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
}

// Mobile Menu Functionality
function initMobileMenu() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.createElement('div');
    mobileMenu.className = 'mobile-menu';
    
    mobileMenu.innerHTML = `
        <div class="mobile-menu-header">
            <a href="#" class="logo">
                <i class="fas fa-briefcase"></i>
                Bossa Jobs
            </a>
            <button class="mobile-menu-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="mobile-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#jobs">Jobs</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><button class="mobile-login-btn"><i class="fas fa-user-plus"></i> Login</button></li>
                <li><button class="mobile-signup-btn"><i class="fas fa-user-plus"></i> Sign Up</button></li>
            </ul>
        </nav>
    `;

    mobileMenuBtn.addEventListener('click', function() {
        document.body.appendChild(mobileMenu);
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            mobileMenu.classList.add('active');
        }, 10);
        
        // Add event listeners to mobile menu buttons
        document.querySelector('.mobile-login-btn').addEventListener('click', showPopUp);
        document.querySelector('.mobile-signup-btn').addEventListener('click', showPopUp);
    });

    // Close mobile menu when clicking close button or a link
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('mobile-menu-close') || 
            (mobileMenu.contains(e.target) && e.target.tagName === 'A')) {
            mobileMenu.classList.remove('active');
            setTimeout(() => {
                if (document.body.contains(mobileMenu)) {
                    document.body.removeChild(mobileMenu);
                }
                document.body.style.overflow = '';
            }, 300);
        }
    });
}

// Language Selector Functionality
function initLanguageSelector() {
    const languageDropdown = document.querySelector('.language-dropdown');
    const languageBtn = document.querySelector('.language-btn');
    
    // Toggle dropdown on button click
    languageBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        languageDropdown.style.display = languageDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.language-selector')) {
            languageDropdown.style.display = 'none';
        }
    });

    // Language selection functionality
    const languageLinks = document.querySelectorAll('.language-dropdown a');
    languageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('data-lang');
            changeLanguage(lang);
            
            // Update the selected language in the button
            const languageName = this.textContent.trim();
            languageBtn.querySelector('span').textContent = languageName.split(' ')[0];
            
            // Update checkmark
            languageLinks.forEach(l => l.querySelector('i').className = 'fas fa-globe');
            this.querySelector('i').className = 'fas fa-check';
            
            languageDropdown.style.display = 'none';
        });
    });
}

// Language Change Function (placeholder - would be implemented with i18n in a real app)
function changeLanguage(lang) {
    console.log(`Changing language to ${lang}`);
    // In a real application, this would load translations
    // For now, we'll just show an alert
    const languageNames = {
        'en': 'English',
        'am': 'Amharic',
        'or': 'Afaan Oromoo',
        'so': 'Af Soomaali',
        'ti': 'Tigrinya',
        'ar': 'Arabic'
    };
    
    alert(`Language changed to ${languageNames[lang] || 'English'}. In a real application, this would load the appropriate translations.`);
}

// Smooth Scrolling for Anchor Links
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                // Close mobile menu if open
                const mobileMenu = document.querySelector('.mobile-menu');
                if (mobileMenu && mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    setTimeout(() => {
                        if (document.body.contains(mobileMenu)) {
                            document.body.removeChild(mobileMenu);
                        }
                        document.body.style.overflow = '';
                    }, 300);
                }
                
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Popup Functionality
function initPopup() {
    // This is initialized here but the actual showPopUp function is global
    // because it's called from HTML onclick attributes
}

// Global Popup Function (called from HTML)
function showPopUp() {
    const popup = document.createElement('div');
    popup.className = 'popup-container';
    popup.innerHTML = `
        <div class="pop-up">
            <img src="https://cdn.jsdelivr.net/npm/@material-icons/svg@1.0.0/svg/close/baseline.svg" alt="Close" width="24" height="24">
            <div class="pop-up-description">
                <p>Join our community of professionals and companies in Jimma. Select your role to get started:</p>
            </div>
            <div class="pop-up-links">
                <a href="authentication/candidate_sign_up.php">I'm a Candidate</a>
                <a href="authentication/company_sign_up.php">I'm an Employer</a>
            </div>
        </div>
    `;
    
    document.body.appendChild(popup);
    document.body.style.overflow = 'hidden';
    
    // Show the popup
    setTimeout(() => {
        popup.classList.add('active');
    }, 10);
    
    // Close popup when clicking close button
    popup.querySelector('img').addEventListener('click', function() {
        closePopup(popup);
    });
    
    // Close popup when clicking outside
    popup.addEventListener('click', function(e) {
        if (e.target === this) {
            closePopup(popup);
        }
    });
    
    // Close popup with Escape key
    document.addEventListener('keydown', function escClose(e) {
        if (e.key === 'Escape') {
            closePopup(popup);
            document.removeEventListener('keydown', escClose);
        }
    });
}

function closePopup(popup) {
    popup.classList.remove('active');
    setTimeout(() => {
        if (document.body.contains(popup)) {
            document.body.removeChild(popup);
        }
        document.body.style.overflow = '';
    }, 300);
}

// Animation on Scroll
function initAnimations() {
    // Set initial state for animated elements
    const animatedElements = document.querySelectorAll('.steps-box, .jobs, .company, .Industry');
    animatedElements.forEach(element => {
        element.classList.add('animate-on-scroll');
    });

    // Create intersection observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    // Observe all animated elements
    animatedElements.forEach(element => {
        observer.observe(element);
    });

    // Animate hero content on load
    const heroContent = document.querySelector('.section-1-content');
    if (heroContent) {
        setTimeout(() => {
            heroContent.style.opacity = '1';
            heroContent.style.transform = 'translateY(0)';
        }, 300);
    }
}

// Industry Filter Functionality (example - would be implemented with real filtering)
document.querySelectorAll('.Industry').forEach(industry => {
    industry.addEventListener('click', function() {
        const industryName = this.textContent.trim();
        console.log(`Filtering by industry: ${industryName}`);
        // In a real application, this would filter the jobs list
        alert(`Filtering by ${industryName}. In a real application, this would filter the jobs list.`);
    });
});

// Job Application Counter (example functionality)
document.querySelectorAll('.details-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        if (this.getAttribute('href') === '#') {
            e.preventDefault();
            console.log('Job application button clicked');
            // In a real application, this would track applications
        }
    });
});

// Pagination Functionality (example)
document.querySelectorAll('.counters li a').forEach(link => {
    link.addEventListener('click', function(e) {
        if (this.getAttribute('href') === '#') {
            e.preventDefault();
            const currentActive = document.querySelector('.counters li a.active');
            if (currentActive) {
                currentActive.classList.remove('active');
            }
            this.classList.add('active');
            console.log(`Changed to page ${this.textContent}`);
            // In a real application, this would load the appropriate page of results
        }
    });
});