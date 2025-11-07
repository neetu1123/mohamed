@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("logo",$data->image)
@section("header-section")
{!! $data->header_section !!}
@stop
@section("footer-section")
{!! $data->footer_section !!}
@stop
@section("container")
@php
$name=$data->name;
$bannerImage=asset('front/images/breadcrumb.webp');
if($data->bannerImage){
$bannerImage=asset($data->bannerImage);
}
@endphp
@include("front.layouts.banner")
<!-- Guests section start -->



<style>
  /* About Us Page Styles */

  .about-section {
    padding: 4rem 10rem;
    background-color: var(--dark-bg);
    color: var(--paragraph-color);
  }

  .about-us-container {
    display: flex;
    align-items: center;
    margin: 0 auto;
    padding: 20px;
    gap: 40px;
  }

  .about-us-image {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    position: relative;
    border: 1px solid var(--dark-bg-light);
    transition: all 0.3s ease;
  }

  .about-us-image::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background-color: var(--sunset-gold);
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.5s ease-out;
  }

  .about-us-image:hover::after {
    transform: scaleX(1);
    transform-origin: left;
  }

  .about-us-image img {
    transition: transform 0.5s ease;
  }

  .about-us-image img:hover {
    transform: scale(1.02);
  }

  .about-us-content {
    flex: 1;
  }

  /* Responsive styles for about container */
  @media (max-width: 992px) {
    .about-us-container {
      padding: 30px;
      gap: 30px;
    }
    .about-section {
      padding: 3rem 2rem;
    }
  }

  @media (max-width: 768px) {
    .about-us-container {
      flex-direction: column;
      padding: 20px;
    }

    .about-us-image {
      margin-bottom: 30px;
    }

    .about-us-content {
      width: 100%;
    }

    .about-section {
      padding: 2rem 1rem;
    }
  }

  .about-us-image img {
    max-height: 500px;
    object-fit: cover;
    object-position: center;
  }

  .about-us-content h2 {
    font-family: var(--heading-font);
    font-size: 2.5rem;
    color: var(--heading-color);
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 15px;
  }
  
  .about-us-content h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 3px;
    background-color: var(--sunset-gold);
  }

  .about-us-content p {
    font-family: var(--body-font);
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--paragraph-color);
    margin-bottom: 20px;
  }
  
  .abt-txt {
    margin-bottom: 30px;
  }

  .about-section .contact-info {
    margin-top: 30px;
    display: flex;
    flex-direction: row;
    gap: 3rem;
    flex-wrap: wrap;
  }

  .contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    transition: transform 0.3s ease;
  }
  
  .contact-item:hover {
    transform: translateY(-5px);
  }

  .contact-icon {
    width: 50px;
    height: 50px;
    background-color: var(--dark-bg);
    border: 1px solid var(--sunset-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--sunset-gold);
    font-size: 1.2rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
  }
  
  .contact-icon:hover {
    transform: scale(1.1);
    background-color: var(--sunset-gold);
    color: var(--dark-bg);
    box-shadow: 0 8px 20px rgba(171, 138, 98, 0.3);
  }
  
  @media (max-width: 1327px) {
    .about-section .contact-info {
      gap: 2rem;
    }
  }
  
  /* Responsive styles for contact info */
  @media (max-width: 992px) {
    .about-section .contact-info {
      gap: 2rem;
    }
    
    .about-us-content h2 {
      font-size: 2rem;
    }
  }

  @media (max-width: 768px) {
    .about-section .contact-info {
      gap: 1.5rem;
    }
    .about-us-image img {
      max-height: 300px; 
    }
    .about-us-content h2 {
      font-size: 1.8rem;
    }
  }

  .contact-details {
    flex: 1;
  }

  .contact-details h3 {
    font-family: var(--heading-font);
    font-size: 1.2rem;
    margin: 0 0 5px;
    color: var(--heading-color);
    font-weight: 600;
  }

  .contact-details p {
    margin: 0;
    font-size: 1rem;
    color: var(--paragraph-color);
  }
  
  .contact-details p a {
    color: var(--paragraph-color);
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  .contact-details p a:hover {
    color: var(--sunset-gold);
  }
</style>


<!-- About Section -->
<section class="about-section">
  <div class="container">
    <div class="about-us-container">
      <div class="about-us-image">
        <img
          src="{{ asset($data->about_image1)}}"
          alt="{{ $name }}"
          loading="lazy"
        />
      </div>
      <div class="about-us-content">
        <h2>{{ $name }}</h2>
        <div class="abt-txt">
          {!!  $data->mediumDescription !!}
        </div>

        <div class="contact-info">
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-phone"></i>
            </div>
            <div class="contact-details">
              <h3>Phone:</h3>
              <p><a href="tel:{!! $setting_data['mobile'] ?? '#' !!}">{!! $setting_data['mobile'] ?? '#' !!}</a></p>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-details">
              <h3>Email:</h3>
              <p><a href="mailto:{!! $setting_data['email'] ?? '#' !!}">{!! $setting_data['email'] ?? '#' !!}</a></p>
            </div>
          </div>
        </div>
        
        <div style="margin-top: 2rem;">
          <a href="/contact" class="cta-btn">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</section>


@stop
@section("css")
@parent
<!-- We're using inline styles now, so external CSS files are not needed -->
@stop 
@section("js")
@parent
<!-- Add any custom JS below if needed -->
<script>
  $(document).ready(function() {
    // Add animation to contact items on scroll
    $(window).scroll(function() {
      var windowBottom = $(this).scrollTop() + $(this).innerHeight();
      
      $(".contact-item").each(function() {
        var objectBottom = $(this).offset().top + $(this).outerHeight();
        
        if (objectBottom < windowBottom) {
          if (!$(this).hasClass("animated")) {
            $(this).addClass("animated");
            $(this).css({
              "animation": "fadeInUp 0.5s ease forwards",
              "opacity": "0"
            }).delay($(this).index() * 100).animate({
              "opacity": "1"
            }, 300);
          }
        }
      });
    });
  });
</script>
@stop