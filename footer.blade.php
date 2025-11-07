<!-- Footer -->
<style>
.footer {
  background: var(--dark-bg-alt);
}

.footer-content {
  border-bottom: 1px solid var(--dark-bg-light);
}

.newsletter-section h3 {
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.newsletter-section p {
  color: var(--paragraph-color);
}

.newsletter-form1 input::placeholder {
  color: var(--text-light-bg);
}

.form-input {
  border: 2px solid var(--dark-bg-light);
  color: var(--text-white);
}

.form-input:focus {
  border-color: var(--sunset-gold);
}

.main-btn, .cta-btn {
  background-color: var(--dark-bg);
  color: var(--sunset-gold);
  border: 1px solid var(--sunset-gold);
}


.main-btn:hover, .cta-btn:hover {
  color: var(--dark-bg);
  box-shadow: 0 10px 20px rgba(171, 138, 98, 0.4);
}

.contact-section h3 {
  color: var(--heading-color);
  font-family: var(--heading-font);
}

.contact-section p {
  color: var(--paragraph-color);
}

.social-link {
  background: var(--dark-bg);
  border: 1px solid var(--sunset-gold);
}

.social-link:hover {
  background: var(--sunset-gold);
  transform: translateY(-3px);
  color: var(--dark-bg);
  box-shadow: 0 5px 15px rgba(171, 138, 98, 0.3);
}

.footer-description {
  color: var(--paragraph-color);
}

.footer-column h4 {
  color: var(--heading-color);
  font-family: var(--heading-font);
}


.footer-column ul li a {
  color: var(--paragraph-color);
}

.footer-column ul li a:hover {
  color: var(--sunset-gold);
}

.footer-column ul li a::before {
  content: "▶ ";
  color: var(--sunset-gold);
}

.contact-info p {
  color: var(--paragraph-color);
}

.contact-info i {
  color: var(--sunset-gold) !important;
}

.footer-copyright {
  background-color: var(--dark-bg);
  color: var(--text-white);
}


.copyright-content p {
  color: var(--paragraph-color);
  margin-bottom: 0;
}

.copyright-content a {
  color: var(--sunset-gold);
}

.copyright-content a:hover {
  color: var(--text-white);
}

</style>

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Newsletter Section -->
            <div class="newsletter-section">
                <h3>SUBSCRIBE TO OUR NEWSLETTER</h3>
                <p>AND RECEIVE A PROMO CODE ON YOUR NEXT STAY WHEN YOU BOOK DIRECT</p>

                <div class="newsletter-form1">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <input type="text" placeholder="First Name" class="form-control form-input" />
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <input type="text" placeholder="Last Name" class="form-control form-input" />
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <input type="email" placeholder="Email Address" class="form-control form-input" />
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <button type="submit" class="main-btn cta-btn w-100">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Get in Touch Section -->
            <div class="contact-section">
                <div class="contact-content">
                    <h3>Get in Touch</h3>
                    <p>FOLLOW US ON SOCIAL MEDIA.</p>

                    <div class="social-links">
                        <a href="tel:{!! $setting_data['mobile'] ?? '#' !!}" class="social-link"><i class="fas fa-phone"></i></a>
                        <a href="{!! $setting_data['facebook'] ?? '#' !!}" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="{!! $setting_data['instagram'] ?? '#' !!}" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-left">
                <div class="footer-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset($setting_data['footer_logo'] ?? 'front/images/logo.png') }}"
                            alt="Citrus & Serena Logo" width="auto" height="60px" />
                    </a>
                </div>
                <p class="footer-description">
                    {!! $setting_data['about'] !!}
                </p>

                <a href="{{ url('properties') }}" 
                   >
                    <button class="main-btn cta-btn">
                        
                    Book Now
                    </button>
                </a>
            </div>

            <div class="footer-links">
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('about-us') }}">About Us</a></li>
                        <li><a href="{{ url('properties') }}">Properties</a></li>
                        <li><a href="{{ url('enquiry-form') }}">Plan your Trip</a></li>
                        <li><a href="{{ url('local-guide') }}">Local Guide</a></li>
                        <li><a href="{{ url('contact-us') }}">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Contact Info</h4>
                    <div class="contact-info">
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            {!! $setting_data['address'] ?? '#' !!}
                        </p>
                        <p>
                            <i class="fas fa-phone"></i>
                            {!! $setting_data['mobile'] ?? '#' !!}
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            {!! $setting_data['email'] ?? '#' !!}
                        </p>
                    </div>

                    <div class="badges">
                         <img src="{!! $setting_data['premier_host_logo'] ?? '#' !!}" alt="VRBO Premier Host" width="120" />
                        <!--<img src="{!! $setting_data['airbnb_logo'] ?? '#' !!}" alt="Airbnb Superhost" height="60"/>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-content">
                <p> Copyright &copy;{!! $setting_data['copyright'] ?? '#' !!}. All rights reserved.</p>
                <p>
                    <a href="#">Privacy Policy</a> | <a href="#"> Terms of Use</a> | <a href="#"> Cookie Policy</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
        document.getElementById("overlay").classList.toggle("active");
    }
</script>
@include('front.layouts.js')