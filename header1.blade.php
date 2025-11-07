<style>
:root {
  /* Color Palette */
  --primary-color: #14213D; /* Deep Navy */
  --secondary-color: #006BA6; /* Sky Blue */
  --accent-color: #CE1126; /* Red */
  --neutral-color: #FFFFFF; /* White */
  --light-gray: #F6F6F6; /* Very Light Gray for alternating sections */
  --text-dark: #14213D;
  --text-light: #FFFFFF;
  --overlay-dark: rgba(20, 33, 61, 0.5);
  --transition-speed: 0.3s;
  
  /* New transparent header variables */
  --header-bg-transparent: linear-gradient(to bottom, rgba(20, 33, 61, 0.85) 70%, rgba(20, 33, 61, 0));
  --header-bg-solid: var(--neutral-color);
  --header-shadow-transparent: none;
  --header-shadow-solid: 0 2px 4px rgba(20, 33, 61, 0.1);
}

/* Import Fonts */
@import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Lora:wght@400;500;600&family=Noto+Serif:wght@400;700&family=Bree+Serif&display=swap');


  
  /* Main header styles */
  .main-header {
    background-color: transparent; /* Make header transparent */
    background-image: linear-gradient(to bottom, rgba(20, 33, 61, 0.9) 70%, rgba(20, 33, 61, 0)); /* Gradient fade at bottom */
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 40;
    transition: all 0.4s ease;
    backdrop-filter: blur(5px); /* Add slight blur effect for better text contrast */
    font-family: 'Merriweather', 'Lora', 'Noto Serif', 'Bree Serif', serif;
  }
  
  /* Add solid background when scrolled */
  .main-header.scrolled {
    background-color: var(--neutral-color);
    background-image: none;
    box-shadow: 0 2px 4px rgba(20, 33, 61, 0.1);
  }
  
  .navbar-brand {
    padding: 0.5rem 0;
  }
  
  .navbar-brand img {
    height: 105px;
    transition: all var(--transition-speed) ease;
    filter: brightness(1.2); /* Make logo slightly brighter on dark transparent background */
  }
  
  .navbar-brand img:hover {
    transform: scale(1.05);
  }
  
  /* Reset logo brightness when scrolled to solid background */
  .main-header.scrolled .navbar-brand img {
    filter: none;
  }
  
  .navbar-nav .nav-link {
    color: var(--text-light); /* Light text for better visibility on transparent background */
    font-weight: 700;
    padding: 1rem 1.2rem;
    margin: 0 0.1rem;
    transition: all var(--transition-speed) ease;
    position: relative;
    letter-spacing: 0.5px;
    text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3); /* Add text shadow for better readability */
    font-family: 'Bree Serif', 'Merriweather', serif;
  }
  
  /* Change text color when scrolled */
  .main-header.scrolled .navbar-nav .nav-link {
    color: var(--primary-color);
    text-shadow: none;
  }
  
  .navbar-nav .nav-link:after {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    background-color: var(--accent-color);
    bottom: 0.5rem;
    left: 50%;
    transform: translateX(-50%);
    transition: width var(--transition-speed) ease;
    box-shadow: 0 2px 4px rgba(206, 17, 38, 0.4); /* Glow effect for the underline */
  }
  
  .navbar-nav .nav-link:hover:after,
  .navbar-nav .nav-link.active:after {
    width: 70%;
  }
  
  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link.active {
    color: var(--neutral-color); /* White color for better visibility on transparent background */
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5); /* Text glow effect */
  }
  
  /* Adjust hover and active colors when scrolled */
  .main-header.scrolled .navbar-nav .nav-link:hover,
  .main-header.scrolled .navbar-nav .nav-link.active {
    color: var(--secondary-color);
    text-shadow: none; /* Remove text shadow when scrolled */
  }
  
  .main-header.scrolled .navbar-nav .nav-link:after {
    box-shadow: none; /* Remove box shadow when scrolled */
  }
  
  .dropdown-menu {
    border: none;
    border-radius: 8px;
    background-color: rgba(20, 33, 61, 0.8); /* Semi-transparent background */
    backdrop-filter: blur(10px); /* Blur effect for dropdown */
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    padding: 0.8rem 0;
    margin-top: 0.5rem;
    border-top: 3px solid var(--accent-color);
  }
  
  /* Change dropdown background when scrolled */
  .main-header.scrolled .dropdown-menu {
    background-color: white;
    backdrop-filter: none;
  }
  
  .dropdown-item {
    color: var(--text-light); /* Light text on dark background */
    font-weight: 600;
    padding: 0.7rem 1.5rem;
    transition: all var(--transition-speed) ease;
  }
  
  /* Change dropdown text color when scrolled */
  .main-header.scrolled .dropdown-item {
    color: var(--primary-color);
  }
  
  .dropdown-item:hover {
    background-color: rgba(255, 255, 255, 0.1); /* Light hover on dark background */
    color: var(--neutral-color);
    padding-left: 1.8rem;
  }
  
  /* Change dropdown hover when scrolled */
  .main-header.scrolled .dropdown-item:hover {
    background-color: rgba(0, 107, 166, 0.1);
    color: var(--secondary-color);
  }
  
  .btn-availability {
    background-color: var(--secondary-color);
    color: var(--neutral-color);
    font-weight: 700;
    font-family: 'Merriweather', serif;
    border-radius: 50px;
    padding: 10px 25px;
    display: inline-block;
    text-decoration: none;
  }
  
  .btn-availability:hover {
    background-color: var(--primary-color);
    color: var(--neutral-color);
    text-decoration: none;
  }
  
  .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.5); /* Light border for transparent background */
    padding: 0.4rem 0.7rem;
    background-color: rgba(255, 255, 255, 0.1); /* Slightly visible background */
    backdrop-filter: blur(5px);
    transition: all var(--transition-speed) ease;
  }
  
  /* Change toggler color when scrolled */
  .main-header.scrolled .navbar-toggler {
    border-color: var(--primary-color);
    background-color: transparent;
    backdrop-filter: none;
  }
  
  .navbar-toggler:focus {
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.25);
  }
  
  .main-header.scrolled .navbar-toggler:focus {
    box-shadow: 0 0 0 3px rgba(20, 33, 61, 0.25);
  }
  
  /* Style the toggler icon */
  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
    transition: background-image var(--transition-speed) ease;
  }
  
  /* Change toggler icon color when scrolled */
  .main-header.scrolled .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(20, 33, 61, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
  }
  
  @media (max-width: 991px) {
    .navbar-nav .nav-link {
      padding: 0.8rem 1rem;
    }
    
    .navbar-nav .nav-link:after {
      bottom: 0.3rem;
       background-color: #e5e3dc;
    }
    
    .nav-item.ms-lg-3 {
      margin-top: 1rem !important;
      margin-bottom: 1rem;
    }
    
    .btn-availability {
      display: block;
      text-align: center;
    }
  }
  
  /* Mobile menu styles */
  .mobile-menu {
    display: none;
    animation: fadeIn 0.3s ease-in-out;
    position: fixed;
    top: 78px;
    left: 0;
    width: 100%;
    background: rgba(20, 33, 61, 0.85); /* Semi-transparent dark background */
    backdrop-filter: blur(10px); /* Blur effect for mobile menu */
    z-index: 50;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    border-top: 2px solid var(--accent-color);
    font-family: 'Merriweather', 'Lora', serif;
  }
  
  /* Change mobile menu style when header is scrolled */
  .main-header.scrolled + .mobile-menu {
    background: var(--light-gray);
    backdrop-filter: none;
    box-shadow: 0 4px 8px rgba(20, 33, 61, 0.15);
  }
  
  .mobile-menu.show {
    display: block;
  }
  
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  .mobile-nav-link {
    color: var(--text-light); /* Light text color for dark background */
    font-weight: 500;
    padding: 0.75rem 1rem;
    display: block;
    transition: all var(--transition-speed) ease;
    border-left: 3px solid transparent;
  }
  
  .mobile-nav-link:hover {
    color: var(--neutral-color);
    background-color: rgba(255, 255, 255, 0.1); /* Light hover effect */
    padding-left: 1.25rem;
    border-left: 3px solid var(--accent-color); /* Accent border on hover */
  }
  
  .mobile-nav-link.active {
    color: var(--accent-color); /* Use accent color for active items */
    font-weight: 700;
    border-left: 3px solid var(--accent-color);
  }
  
  /* Adjust mobile nav links when header is scrolled */
  .main-header.scrolled + .mobile-menu .mobile-nav-link {
    color: var(--primary-color);
  }
  
  .main-header.scrolled + .mobile-menu .mobile-nav-link:hover {
    color: var(--secondary-color);
    background-color: rgba(0, 107, 166, 0.05);
  }
  
  .main-header.scrolled + .mobile-menu .mobile-nav-link.active {
    color: var(--secondary-color);
  }
  
  .mobile-nav-link.active i {
    color: var(--accent-color);
    font-weight: bold;
  }
  
  .mobile-social-icon {
    color: var(--neutral-color);
    font-size: 1.25rem;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent background */
    border: 1px solid rgba(255, 255, 255, 0.2); /* Light border */
    transition: all var(--transition-speed) ease;
  }
  
  .mobile-social-icon:hover {
    color: var(--neutral-color);
    background-color: var(--accent-color);
    border-color: var(--accent-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(206, 17, 38, 0.3); /* Glow effect */
  }
  
  /* Adjust social icons when scrolled */
  .main-header.scrolled + .mobile-menu .mobile-social-icon {
    color: var(--primary-color);
    background-color: rgba(20, 33, 61, 0.1);
    border: 1px solid transparent;
  }
  
  .main-header.scrolled + .mobile-menu .mobile-social-icon:hover {
    color: var(--neutral-color);
    background-color: var(--secondary-color);
    box-shadow: 0 5px 15px rgba(0, 107, 166, 0.3);
  }
  


  @media (max-width: 767px) {
    body {
      padding-top: 60px; /* Adjust space for fixed navbar on mobile */
    }
    
    /* Theme color additions for mobile */
    :root {
      --mobile-theme-color: var(--primary-color);
      --mobile-theme-light: rgba(20, 33, 61, 0.1);
      --mobile-theme-medium: rgba(20, 33, 61, 0.3);
    }
    
    .navbar-brand img {
      height: 50px;
    }
    
    /* Style for transparent header on mobile */
    .main-header {
      background-image: linear-gradient(to bottom, rgba(20, 33, 61, 0.95) 80%, rgba(20, 33, 61, 0)); /* More solid at top, fade at bottom */
    }
    
    /* Ensure all text and icons in mobile view are light colored for better visibility */
    .mobile-menu i,
    .mobile-menu p,
    .mobile-menu span {
      color: var(--neutral-color);
    }
    
    /* Adjust colors when scrolled */
    .main-header.scrolled + .mobile-menu i,
    .main-header.scrolled + .mobile-menu p,
    .main-header.scrolled + .mobile-menu span {
      color: var(--primary-color);
    }
    
    /* Enhance active items with accent color */
    .navbar-nav .nav-item.active a {
      color: var(--accent-color) !important;
    }
    
    /* Add subtle ripple effect to mobile menu items */
    .mobile-nav-link {
      position: relative;
      overflow: hidden;
    }
    
    .mobile-nav-link i {
      color: var(--secondary-color);
    }
    
    .mobile-nav-link::after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 107, 166, 0.1);
      opacity: 0;
      transform: translate(-50%, -50%) scale(0);
      border-radius: 50%;
      transition: transform 0.5s, opacity 0.3s;
    }
    
    .mobile-nav-link:active::after {
      transform: translate(-50%, -50%) scale(2);
      opacity: 1;
      transition: transform 0s;
    }
    
    .btn-availability {
      width: 90%;
      font-size: 0.9rem;
      box-shadow: 0 2px 4px rgba(0, 107, 166, 0.3);
      font-weight: 600;
      letter-spacing: 0.5px;
    }
    
    .btn-availability:hover {
      box-shadow: 0 4px 8px rgba(0, 107, 166, 0.4);
      transform: translateY(-2px);
    }
  }
  
  @media (min-width: 768px) and (max-width: 991px) {
    body {
      padding-top: 70px; /* Adjust space for fixed navbar on tablet */
    }
    
    .navbar-brand img {
      height: 60px;
    }
    
    .navbar-nav .nav-link {
      padding: 0.8rem 0.8rem;
      font-size: 0.9rem;
    }
  }
  
  @media (min-width: 992px) {
    body {
      padding-top: 95px; /* Adjust space for fixed navbar on desktop */
    }
    
    /* Enhance transparent header effect on larger screens */
    .main-header {
      background-image: linear-gradient(to bottom, rgba(20, 33, 61, 0.85) 70%, rgba(20, 33, 61, 0));
      padding-bottom: 10px; /* Extra padding at bottom to extend fade effect */
    }
    
    /* Add subtle animation to nav links on desktop */
    .navbar-nav .nav-link:hover {
      transform: translateY(-2px);
    }
    
    /* Enhance glow effect on desktop */
    .navbar-nav .nav-link.active {
      text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
    }
    
    .main-header.scrolled {
      padding-bottom: 0; /* Reset padding when scrolled */
    }
    
    .main-header.scrolled .navbar-nav .nav-link:hover {
      transform: none;
    }
    
    .main-header.scrolled .navbar-nav .nav-link.active {
      text-shadow: none;
    }
  }
</style>

<div class="loader-head" id="sygnius-loader">
  <div class="loader">
    <img
      src="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}"
      alt="Logo"
      class="img-fluid logo-loader"
    />
    <img src="{{ asset('front')}}/images/scroll-loader1.gif" alt="" />
    <p>Please wait..</p>
  </div>
</div>



<!-- Header/Navbar -->
<div class="main-header">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light px-0">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('front/images/logo-68dfff167d883.webp') }}" alt="Casa Pacifico Panama Logo" class="" >
      </a>
      <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-lg-center">
          <!--   <li class="nav-item ms-lg-3 mx-2">-->
          <!--  <a href="{{ url('properties') }}" class="btn btn-availability">Book Now</a>-->
          <!--</li>-->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}" data-path="{{ url('/') }}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}" data-path="{{ url('about-us') }}">ABOUT US</a>
              <!--<a class="nav-link" href="{{ url('about-us') }}" data-path="{{ url('about-us') }}">ABOUT US</a>-->
          </li>
          
          <li class="nav-item">
            <!--<a class="nav-link" href="{{ url('properties') }}" data-path="{{ url('properties') }}">-->
            <!--  PROPERTY-->
            <!--</a>-->
             <a class="nav-link" href="{{ url('/') }}" data-path="{{ url('properties') }}">
              PROPERTY
            </a>
          </li>
          <li class="nav-item">
                          <!--<a class="nav-link" href="{{ url('photos') }}" data-path="{{ url('photos') }}">PHOTOS</a>-->
            <a class="nav-link" href="{{ url('/') }}" data-path="{{ url('photos') }}">PHOTOS</a>
          </li>
        
          
          @php $location = App\Models\Location::first(); @endphp
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}" data-path="{{url('attractions/location',$location->seo_url)}}">ATTRACTIONS</a>
             <!--<a class="nav-link" href="{{url('attractions/location',$location->seo_url)}}" data-path="{{url('attractions/location',$location->seo_url)}}">ATTRACTIONS</a>-->
          </li>
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="{{ url('reviews') }}" data-path="{{ url('reviews') }}">REVIEWS</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="{{ url('faq') }}" data-path="{{ url('faq') }}">FAQ</a>-->
          <!--</li>-->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}" data-path="{{ url('contact-us') }}">CONTACT US</a>
             <!--<a class="nav-link" href="{{ url('contact-us') }}" data-path="{{ url('contact-us') }}">CONTACT US</a>-->
          </li>
         
        </ul>
      </div>
    </nav>
  </div>
</div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
  <div class="container py-2">
    <ul class="list-unstyled mb-0">
      <li><a class="mobile-nav-link" href="{{url('/')}}" data-path="/"><i class="fas fa-home me-2"></i> HOME</a></li>
      <li><a class="mobile-nav-link" href="{{url('about-us')}}" data-path="/about-us"><i class="fas fa-info-circle me-2"></i> ABOUT US</a></li>
      <li><a class="mobile-nav-link" href="{{url('properties')}}" data-path="/properties"><i class="fas fa-building me-2"></i> PROPERTY</a></li>
      <li><a class="mobile-nav-link" href="{{url('photos')}}" data-path="{{url('photos')}}"><i class="fas fa-building me-2"></i> PHOTOS</a></li>
     <!--<li><a class="mobile-nav-link" href="/special-offer" data-path="/special-offer"><i class="fas fa-envelope me-2"></i> SPECIAL OFFER</a></li>-->
    
      <li><a class="mobile-nav-link" href="{{url('attractions/location',$location->seo_url)}}" data-path="{{url('attractions/location',$location->seo_url)}}"><i class="fas fa-map-marker-alt me-2"></i> ATTRACTIONS</a></li>
      <li><a class="mobile-nav-link" href="/contact-us" data-path="/contact-us"><i class="fas fa-envelope me-2"></i> CONTACT US</a></li>
    </ul>
  </div>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Mobile menu functionality
    const navbarToggler = document.querySelector(".navbar-toggler");
    const mobileMenu = document.getElementById("mobileMenu");
    const mainHeader = document.querySelector(".main-header");
    let mobileMenuOpen = false;
    
    // Check scroll position on page load
    if (window.scrollY > 50) {
      mainHeader.classList.add("scrolled");
    }
    
    // Add scroll event listener to change header style on scroll
    window.addEventListener("scroll", function() {
      if (window.scrollY > 50) {
        mainHeader.classList.add("scrolled");
      } else {
        mainHeader.classList.remove("scrolled");
      }
    });

    function toggleMobileMenu() {
      if (!mobileMenu) return; // Safety check
      
      mobileMenuOpen = !mobileMenuOpen;
      if (mobileMenuOpen) {
        mobileMenu.classList.add("show");
        // Optional: Add body class to prevent scrolling when menu is open
        document.body.style.overflow = "hidden";
      } else {
        mobileMenu.classList.remove("show");
        // Restore scrolling
        document.body.style.overflow = "";
      }
    }

    if (navbarToggler) {
      navbarToggler.addEventListener("click", toggleMobileMenu);
    }

    // Close mobile menu when screen size increases to desktop
    window.addEventListener("resize", function () {
      if (window.innerWidth >= 992 && mobileMenuOpen && mobileMenu) {
        mobileMenuOpen = false;
        mobileMenu.classList.remove("show");
      }
    });

    // Highlight current page in navigation
    const currentPath = window.location.pathname;

    // Desktop navigation
    document.querySelectorAll(".navbar-nav .nav-link").forEach((link) => {
      const linkPath = link.getAttribute("data-path");
      if (linkPath && (linkPath === currentPath || currentPath.startsWith(linkPath + '/'))) {
        link.classList.add("active");
      }
    });

    // Mobile navigation
    document.querySelectorAll(".mobile-nav-link").forEach((link) => {
      const linkPath = link.getAttribute("data-path");
      if (linkPath && (linkPath === currentPath || currentPath.startsWith(linkPath + '/'))) {
        link.classList.add("active");
      }
    });
    
    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return; // Skip empty anchors
        
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth'
          });
          
          // Close mobile menu if open
          if (mobileMenuOpen && mobileMenu) {
            mobileMenuOpen = false;
            mobileMenu.classList.remove("show");
          }
        }
      });
    });
    
    // Add click event listener to mobile nav links to close menu when clicked
    document.querySelectorAll(".mobile-nav-link").forEach((link) => {
      link.addEventListener("click", function() {
        if (mobileMenu && mobileMenuOpen) {
          mobileMenuOpen = false;
          mobileMenu.classList.remove("show");
        }
      });
    });
  });
</script>
