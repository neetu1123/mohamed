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
        $bannerImage=asset('front/images/b1.jpg');
        if($data->bannerImage){
            $bannerImage=asset($data->bannerImage);
        }
    @endphp
  
<style>
/* Attractions Section */
.attractions {
  padding-top: 1rem;
  padding-left: 1rem;
  padding-right: 1rem;
  margin-bottom: 4rem;
  background-color: var(--dark-bg);
}

.attractions-subtitle {
  text-align: center;
  font-size: 0.9rem;
  letter-spacing: 2px;
  margin-bottom: 1rem;
  font-weight: 600;
  color: var(--sunset-gold);
  text-transform: uppercase;
}

.attractions-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
  margin-top: 4rem;
}

.attraction-card {
  height: 450px;
  border-radius: 20px;
  overflow: hidden;
  position: relative;
  cursor: pointer;
  transition: all 0.3s;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  width: 100%;
  border: 1px solid var(--dark-bg-light);
}

.attraction-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(171, 138, 98, 0.2);
  border-color: var(--sunset-gold);
}

.attraction-card img {
  transition: all 0.5s ease;
}

/* Apply filter to all images by default when attractions-grid is in hover state */
.attractions-grid:hover .attraction-card img,
.attractions-grid.hover-active .attraction-card img {
  filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
}

/* Remove filter from the hovered image */
.attraction-card:hover img {
  filter: none !important;
  transform: scale(1.05);
}

/* Active touch state for mobile */
.attraction-card.active-touch img {
  filter: none !important;
  transform: scale(1.05);
}

.attraction-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background: linear-gradient(rgba(0, 0, 0, 0.7), transparent);
  padding: 2rem 2rem 3rem;
  color: var(--text-white);
  z-index: 2;
}



.about-hero h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
  font-family: var(--heading-font);
  color: var(--heading-color);
}

.section-title {
  text-align: center;
  margin-bottom: 0.5rem;
  font-family: var(--heading-font);
  color: var(--heading-color);
  letter-spacing: 1px;
}

.attraction-card h3 {
  font-family: var(--heading-font);
  color: var(--text-white);
  font-size: 1.8rem;
  letter-spacing: 1px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
}

.attraction-card a {
  text-decoration: none;
  display: block;
  width: 100%;
  height: 100%;
}

@media (max-width: 1024px) {
  .attractions-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .attractions-grid {
    grid-template-columns: repeat(1, 1fr);
    gap: 2rem;
    margin-top: 2rem;
  }

  .attraction-card {
    height: 350px;
  }

  .section-title {
    font-size: 1.8rem;
  }

  .attractions-subtitle {
    font-size: 0.8rem;
  }
  
  .about-hero {
    height: 40vh;
    margin-bottom: 2.5rem;
  }

  .about-hero h1 {
    font-size: 2.5rem;
  }
  
  .container {
    padding-left: 15px;
    padding-right: 15px;
  }
}

@media (max-width: 480px) {
  .attractions {
    padding-top: 0;
    margin-bottom: 2rem;
  }

  .attraction-card {
    height: 280px;
  }

  .attraction-overlay {
    padding: 1.5rem 1.5rem 2rem;
  }

  .attraction-card h3 {
    font-size: 1.5rem;
    top: 20px;
    left: 20px;
  }
  
  .about-hero {
    height: 30vh;
    margin-bottom: 2rem;
  }

  .about-hero h1 {
    font-size: 2rem;
  }
}
</style>


	<!-- start banner sec -->
   
    <section class="page-title" style="background-image: url({{$bannerImage}});">
        <div class="auto-container">
            <h1 data-aos="zoom-in" data-aos-duration="1500" class="aos-init aos-animate">{{$name}}</h1>
            <div class="checklist">
                <p>
                    <a href="{{url('/')}}" class="text"><span>Home</span></a>
                    <a class="g-transparent-a">{{$name}}</a>
                </p>
            </div>
        </div>
    </section>



<!-- Attractions Section -->
    <section class="attractions">
      <div class="container">
        <p class="attractions-subtitle">
          HAND-PICKED SELECTION OF QUALITY PLACES
        </p>
        <h2 class="section-title">Explore Attractions</h2>

        <div class="attractions-grid">
          <div class="attraction-card">
            <a href="/attractions">
              <img
                src="WhatsApp Image 2025-09-16 at 10.49.15 PM.jpeg"
                alt="Dining"
                style="
                  width: 100%;
                  height: 100%;
                  object-fit: cover;
                  position: absolute;
                  top: 0;
                  left: 0;
                  z-index: 0;
                "
              />
              <div class="attraction-overlay">
                <h3>Dining</h3>
              </div>
            </a>
          </div>

          <div class="attraction-card">
            <a href="/attractions">
              <img
                src="WhatsApp Image 2025-09-16 at 10.46.07 PM.jpeg"
                alt="Places To Visit"
                style="
                  width: 100%;
                  height: 100%;
                  object-fit: cover;
                  position: absolute;
                  top: 0;
                  left: 0;
                  z-index: 0;
                "
              />
              <div class="attraction-overlay">
                <h3>Places To Visit</h3>
              </div>
            </a>
          </div>

          <div class="attraction-card">
            <a href="/attractions">
              <img
                src="WhatsApp Image 2025-09-16 at 10.43.36 PM.jpeg"
                alt="Activities"
                style="
                  width: 100%;
                  height: 100%;
                  object-fit: cover;
                  position: absolute;
                  top: 0;
                  left: 0;
                  z-index: 0;
                "
              />
              <div class="attraction-overlay">
                <h3>Activities</h3>
              </div>
            </a>
          </div>

          <div class="attraction-card">
            <a href="/attractions">
              <img
                src="WhatsApp Image 2025-09-16 at 10.43.20 PM.jpeg"
                alt="Shopping"
                style="
                  width: 100%;
                  height: 100%;
                  object-fit: cover;
                  position: absolute;
                  top: 0;
                  left: 0;
                  z-index: 0;
                "
              />
              <div class="attraction-overlay">
                <h3>Shopping</h3>
              </div>
            </a>
          </div>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
          <a href="/attractions" class="cta-btn">View All Attractions</a>
        </div>
      </div>
    </section>






@stop
@section("css")
@parent
<!-- We're using inline styles now, so these external CSS files are not needed -->
@stop
@section("js")
@parent
<script>
  $(document).ready(function(){
    // Handle the existing read more/less functionality
    $(".target-class").each(function(){
      var a=$(this).height();
      if(a < 280){
        $(this).parents(".parent-class").find(".mr").css("display", "none");
      } else {
        $(this).parents(".parent-class").find(".mr").css("display", "block");
        $(this).css("height", "280px");
      }
    });
    
    var a = $(".target-class").height();
    
    // Add hover effect for attractions grid on non-touch devices
    if(!('ontouchstart' in window)) {
      $(".attractions-grid").hover(
        function() {
          $(this).addClass("hover-active");
        },
        function() {
          $(this).removeClass("hover-active");
        }
      );
    }
    
    // For touch devices, add active state
    $(".attraction-card").on("touchstart", function() {
      $(".attraction-card").removeClass("active-touch");
      $(this).addClass("active-touch");
    });
  });

  $(document).on("click", ".readmore", function(){
    that=$(this);
    that.removeClass("readmore").addClass("readless").html("Read Less");
    that.parents(".parent-class").find(".target-class").css({"height": "auto"});
  });
  
  $(document).on("click", ".readless", function(){
    that=$(this);
    that.removeClass("readless").addClass("readmore").html("Read More");
    that.parents(".parent-class").find(".target-class").css({"height": "280px"});
  });
</script>
@stop