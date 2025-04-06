<header class="py-3" style="background-color: #0F172B; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
    <div class="container">
        <!-- Top bar with logo and sign in -->
        <div class="row mb-2">
            <div class="col-md-6 d-flex align-items-center">
                <i class="fas fa-utensils me-2" style="color: #FEA116; font-size: 28px;"></i>
                <h2 class="m-0" style="color: #FEA116; font-weight: 700; letter-spacing: 1px;">Restoran</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="cart.php" class="btn me-3 position-relative" style="background-color: #FEA116; color: white;">
                    <i class="fas fa-shopping-cart"></i> Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                    </span>
                </a>
                <a href="booking.php" class="btn" style="background-color: #FEA116; color: white; border: none;">
                    BOOK A TABLE
                </a>
            </div>
        </div>
        
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-dark rounded-pill py-1" style="background-color: rgba(0,0,0,0.2);">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="service.php">SERVICE</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="menu.php">MENU</a>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PAGES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color: #0F172B; border: none;">
                            <li><a class="dropdown-item text-white" href="team.php" style="transition: all 0.3s;">Our Team</a></li>
                            <li><a class="dropdown-item text-white" href="testimonial.php" style="transition: all 0.3s;">Testimonials</a></li>
                            <li><a class="dropdown-item text-white" href="gallery.php" style="transition: all 0.3s;">Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="contact.php">CONTACT</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- CSS Styles -->
<style>
    /* Header styles */
    header {
        transition: all 0.3s ease;
    }
    
    /* Make header sticky on scroll */
    header.sticky {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background-color: rgba(15, 23, 43, 0.9) !important;
        padding: 5px 0 !important;
    }
    
    /* Navigation styles */
    .navbar .nav-link {
        position: relative;
        transition: transform 0.3s, color 0.3s;
    }
    
    .navbar .nav-link:hover {
        transform: translateY(-2px);
        color: #FEA116 !important;
    }
    
    .navbar .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 50%;
        background-color: #FEA116;
        transition: all 0.3s ease;
    }
    
    .navbar .nav-link:hover::after {
        width: 100%;
        left: 0;
    }

    /* Dropdown menu styles */
    .dropdown-menu {
        margin-top: 10px;
        border-radius: 5px;
    }
    
    .dropdown-item:hover {
        background-color: #FEA116 !important;
        color: white !important;
    }
    
    /* Button styles */
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
        }
    }
</style>

<!-- JavaScript for Sticky Header -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sticky header
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });
    
    // Set active nav item based on current page
    const currentPath = window.location.pathname;
    const filename = currentPath.substring(currentPath.lastIndexOf('/') + 1);
    
    document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href === filename || (filename === '' && href === 'index.php')) {
            link.classList.add('active');
            link.style.color = '#FEA116';
        }
    });
});
</script>