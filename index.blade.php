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
<style>
  :root {
    /* Primary Theme Colors */
    --dark-bg: #222222;
    --dark-bg-alt: #1a1a1a;
    --dark-bg-light: #2c2c2c;
    --sunset-gold: #ab8a62;

    /* Text Colors */
    --text-white: #ffffff;
    --text-light-bg: rgba(255, 255, 255, 0.5);
    --text-dark: #333333;

    /* Fonts */
    --heading-font: "Gilda Display", serif;
    --body-font: "Barlow", sans-serif;

    /* Component Colors */
    --icon-color: var(--sunset-gold);
    --heading-color: var(--text-white);
    --paragraph-color: var(--text-light-bg);
    --background-color: var(--dark-bg);

    /* Legacy variables */
    --accent-color: #ab8a62;
    --btn-color: #ab8a62;
    --btn-hover-color: #8a6d4c;
    --white-color: #ffffff;
  }
  </style>
@php $payment_currency=ModelHelper::getDataFromSetting('payment_currency');@endphp
<style>
	.readMore a {
		color: white;
	}
</style>
<!-- Banner slider -->

<section class="banner-wrapper p-0">
	<div class="video-sec">
		<video src="{!! asset($setting_data['home_video']) !!}" loop="" muted="" autoplay="" playsinline="" class="js-hero-slide__inner" id="mob"></video>
		<button onclick="playVideo()" id="play"><i class="fa-solid fa-play"></i></button>
		<button onclick="pauseVideo()" id="pause"><i class="fa-solid fa-pause"></i></button>
		<div class="overlay">
			<div class="hero-content aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500">
				<div class="container">
					{!! $setting_data['home-video-text'] !!}
				</div>
			</div>
		</div>
	</div>
	<div class="search-sec" >
		<div class="container">
			<div class="search-bar">
			     
				<form method="get" action="{{ url('properties') }}">
					<div class="row">
						<div class="col-4 md-12 sm-12 select d-none">
							{!! Form::select("location_id",ModelHelper::getLocationSelectList(),null,["class"=>"","placeholder"=>"Location","title"=>"Location","id"=>"loc"]) !!}
						</div>
						<div class="col-6 col-lg md-6 icns mb-lg-0 position-relative  datepicker-section datepicker-common-2 main-check">
							<div class="row">
								<div class="check left icns mb-lg-0 position-relative datepicker-common-2">
									<label for="check-in">Check In</label>
									{!! Form::text("start_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"start_date","placeholder"=>"check in","class"=>"form-control d-none"]) !!}
									<div class="form-dates">
										<span class="dates" id="chooesen_start_date">-</span>
										<span class="months" id="chooesen_start_month"></span>
									
									</div>
								</div>
								<div class="check right icns mb-lg-0 position-relative datepicker-common-2 check-out">
									<label for="check-out">Check Out</label>
									{!! Form::text("end_date",null,["required","autocomplete"=>"off","inputmode"=>"none","id"=>"end_date","placeholder"=>"check out","class"=>" form-control lst d-none" ]) !!}
									<div class="form-dates">
										<span class="dates" id="chooesen_end_date">-</span>
										<span class="months" id="chooesen_end_month"></span>
									</div>
								</div>
								<div class="col-12 md-12 sm-12 datepicker-common-2 datepicker-main">
									<input type="text" id="demo17" value="" aria-label="Check-in and check-out dates" aria-describedby="demo17-input-description" readonly />
								</div>
							</div>
						</div>
						<div class="col-3 md-12 sm-12 guest d-none">
							<label for="guests">Adult</label>
							<!--<input type="text" name="Guests" readonly="" value="1 Guests" class="form-control gst" id="show-target-data" placeholder="Adult" title="Select Guests">-->
							<img src="{{ asset('/') }}/front/images/user.png" alt="">
							<input type="hidden" value="1" name="adults" id="adults-data" />
							<input type="hidden" value="0" name="child" id="child-data" />
							<div class="adult-popup" id="guestsss">
								<i class="fa fa-times close1"></i>
								<div class="adult-box">
									<div class="adult-value">
										<p id="adults-data-show">0 Adult</p>
										<!-- <p class="adult-name">Adult</p> -->
									</div>

									<div class="adult-btn">
										<button class="button1" type="button" onclick="functiondec('#adults-data','#show-target-data','#child-data')" value="Decrement Value">-</button>
										<button class="button11 button1" type="button" onclick="functioninc('#adults-data','#show-target-data','#child-data')" value="Increment Value">+</button>
									</div>
								</div>
								<div class="adult-box d-none">
									<div class="adult-value">
										<p id="child-data-show">0 Children</p>
										<!-- <p class="adult-name">Children</p> -->
									</div>
									<div class="adult-btn">
										<button class="button1" type="button" onclick="functiondec('#child-data','#show-target-data','#adults-data')" value="Decrement Value">-</button>
										<button class="button11 button1" type="button" onclick="functioninc('#child-data','#show-target-data','#adults-data')" value="Increment Value">+</button>
									</div>
								</div>
								<div class="pets-box d-none">
									<p class="pets-label">Pets</p>
									<div class="pets-calculator">
										<div class="pets-value">
											<label for="pets-yes">Yes</label>
											<input type="radio" id="pets-yes" name="pets" value="Yes">
										</div>
										<div class="pets-value">
											<label for="pets-no">No</label>
											<input type="radio" id="pets-no" name="pets" value="No">
										</div>
									</div>
								</div>
								<button class="main-btn  close111" type="button" onclick=""><span>Apply</span></button>
							</div>
						</div>
					   <div class="col-3 md-12 sm-12 guest-info">
							<label for="guest-field">Guests</label>
							<select name="Guests" id="Guests" class="fs-5">
							   @for($i=1; $i<= 8; $i++)
							   <option value="{{$i}} Guests" @if(Request::get('Guests') == "$i Guests") selected @endif>{{$i}} @if($i<2) Guest @else Guests @endif</option>
							   @endfor
							</select>
						</div>
						<div class="col-3 md-12 sm-12 srch-btn">
							<button type="submit" class="main-btn "><span>Check Availability</span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</section>



<!-- about section -->


<section class="about_section section-b-space">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="about_img">
					<div class="side-effect"><span></span></div>
					<img src="{{ asset($data->about_image1)}}" title="" alt="">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about_content">
					<div>
					    <h5>{!! $data->shortDescription !!}</h5>
						{!! $data->mediumDescription!!}
						    <div class="about_bottom">
							<a href="{{ url('about-us')}}" class="main-btn">View more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Properties Section -->
@php
$list=App\Models\HostAway\HostAwayProperty::query();
$list=$list->where("is_home","true")->where("status","true")->orderBy("ordering","asc")->limit(6)->get();
@endphp
@if(count($list)>0)

<section class="properties-list">
   <div class="container">
      <div class="head-sec">
         <h2>Checkout our Condos</h2>
      </div>
      <div class="owl-carousel1 property-list-slider1 row" id="list-slider1">
      	@foreach($list as $c)
			@php
			$images=[];
			foreach(json_decode($c->listingImages,true) as $c1){
			$images[$c1['sortOrder']]=$c1;
			}

			@endphp
			@php $i=1; @endphp
			@if($c->feature_image)
			@php $image=$c->feature_image;@endphp
			@else
			@if($c->listingImages)
			@php $io=0; @endphp
			@foreach($images as $c1)
			@if($i==1)
			@php $image=$c1['url']; break;@endphp
			@else
			@endif
			@php $i++;@endphp
			@endforeach
			@endif
			@endif
         <div class="item col-md-3 col-12">
            <div class="property-list">
               <div class="list-image">
                  <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}" title="{{$c->title}}"><img src="{{ asset($image)}}" alt="{{$c->title}}" title="{{$c->title}}"></a>
               </div>
               <div class="list-content">
                  <h3><a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}">{{$c->name}}</a>
                  </h3>
                  <p>{{$c->city}}, {{ $c->state }}</p>
                  <ul class="list-amenity">
                     <li><i class="fa-solid fa-user-group"></i> <span>{{ $c->personCapacity }}</span> Guests </li>
                     <li><i class="fa-solid fa-bed"></i> <span>{{ $c->bedroomsNumber }}</span> Bedrooms</li>
                     <li><i class="fa-solid fa-shower"></i> <span>{{ $c->bathroomsNumber }}</span> Baths</li>
                  </ul>
                  <div class="list-btn">
                  	@php
				$price=$c->price;
				$ar1=App\Models\HostAway\HostAwayDate::where("single_date",date('Y-m-d'))->where("hostaway_id",$c->host_away_id)->first();
				if($ar1){
				$price=$ar1->price;
				}

				@endphp
                     <div class="price d-none">
                        <p>From $ {{ $price }} / Night </p>
                     </div>
                     <div class="pro-btn">
                        <a href="{{ url($c->seo_url).'?'.http_build_query(request()->all()) }}" class="main-btn">BOOK NOW</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @php $i++; @endphp
			@endforeach
      
      </div>
	  <div class="text-center mt-5">
		<a href="{{url('properties')}}" class="main-btn">View More</a>
	  </div>
   </div>
</section>
@endif


    <!-- Experience Section -->
    <section class="experience">
      <div class="container">
        <h2 class="section-title">The Elite Cribs experience</h2>

        <div class="experience-grid">
          <div class="experience-card">
            <div class="experience-icon">
              <img src="65b89c7ecd147.webp" alt="" class="text-black" />
            </div>
            <h3>Curated collection</h3>
            <p>
              Enjoy a haven of luxury living with our thoughtfully curated villa
              selection.
            </p>
          </div>

          <div class="experience-card">
            <div class="experience-icon">
              <img src="65d39d8dcbccb.webp" alt="" class="text-black" />
            </div>
            <h3>Remarkable locations</h3>
            <p>
              Explore the hidden gems of the Caribbean in our stunning
              locations.
            </p>
          </div>

          <div class="experience-card">
            <div class="experience-icon">
              <img src="65d39d677dd69.webp" alt="" class="text-black" />
            </div>
            <h3>Confidentiality</h3>
            <p>Ensure your privacy with the discreet service from our staff.</p>
          </div>

          <div class="experience-card">
            <div class="experience-icon">
              <img src="65d39daab692a.webp" alt="" class="text-black" />
            </div>
            <h3>Luxury amenities</h3>
            <p>
              Savor the lavish comforts of world-class amenities at your
              fingertips.
            </p>
          </div>

          <div class="experience-card">
            <div class="experience-icon">
              <img src="65d39dd57a01e.webp" alt="" class="text-black" />
            </div>
            <h3>Trip designers</h3>
            <p>
              Immerse yourself in your dream holidays with our expert touch.
            </p>
          </div>

          <div class="experience-card">
            <div class="experience-icon">
              <img src="65d39d343d38e.webp" alt="" class="text-black" />
            </div>
            <h3>Local expertise</h3>
            <p>
              Embark on a journey of discovery with our seasoned local
              specialists.
            </p>
          </div>
        </div>
      </div>
    </section>

<!-- cta section-->
<section class="business d-none" style="background-image:url({{ asset($data->strip_image) }})">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="box">
         
               <h2>{!! $data->strip_title !!}</h2>
               <p>{!! $data->strip_desction !!}</p>
               <a href="{{ url('contact-us') }}" class="main-btn ">Let's Connect <i class="fa-solid fa-arrow-right"></i></a>
            </div>
         </div>
      </div>
   </div>
</section>

@if(App\Models\Testimonial::where("status","true")->count()>0)
<!--Testimonial section-->
<section class="testimonial">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<div class="head-sec">
					<h2>What our guests have to say</h2>
					<div class="sec-line">
						<span class="sec-line1"></span>
						<span class="sec-line2"></span>
					</div>
				</div>

				<div class="testy">
					<div class="row owl-carousel" id="test-slider1">
						@foreach(App\Models\Testimonial::where("status","true")->orderBy("id","desc")->take(6)->get() as $c)
						<div class="item active">
							<div class="test-card">
								<div class="top-text">
									<div class="user-icon d-none">
										@if($c->image)
										<img src="{{ asset($c->image)}}" class="img-fluid" alt="User">
										@else
										<img src="{{ asset('front')}}/no-image.avif" class="img-fluid" alt="User">
										@endif
									</div>
									<div class="people">
										<h3>{{explode(' ', $c->name)[0]}}</h3>
										<p class="indentity d-none">Stayed: {{ date('F Y',strtotime($c->stay_date))}}</p>
									</div>
									<div class="icon">
										<img src="{{ asset('front')}}/images/left.png" class="img-fluid" alt="User">
									</div>
								</div>
								<div class="cont-sec">
									<div class="para">
										<p>{{$c->message}}</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>

			</div>
		</div>
</section>
@endif


<!-- about owner section-->

<!--<section class="about-owner">-->
<!--	<div class="container px-0 lg-px-2">-->
<!--		<div class="row">-->
<!--			<div class="col-lg-6 col-md-12 col-sm-12 cont">-->
<!--				<div class="owner-para">-->
			
<!--				{!! $data->longDescription!!}-->
<!--				</div>-->
<!--				<div class="owner-info">-->
<!--					<p>{{ $data->description }}</p>-->
<!--				</div>-->

<!--			</div>-->
<!--			<div class="col-lg-6 col-md-12 col-sm-12 img">-->
<!--				<div class="abt-owner">-->
<!--					<div class="abt-img mb-2">-->
<!--						<img src="{{ asset($data->owner_image)}}" class="img-fluid" alt="">-->
<!--					</div>-->
<!--					<div class="svg-img">-->
<!--						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 540 540">-->
<!--							<style type="text/css">-->
<!--								.st0 {-->
<!--									fill-rule: evenodd;-->
<!--									clip-rule: evenodd;-->
<!--								}-->
<!--							</style>-->
<!--							<path class="rhea_mask" d="M0 0v540h540V0H0zM268.5 538C121.3 538 2 418 2 270S121.3 2 268.5 2c72.6 0 38 76.3 56.5 141.3 20.3 71.1 193.5 112.6 199 183.3C535.4 474.2 415.7 538 268.5 538zM522.4 192.1c-42.3 17.4-113.7 5.9-147.8-45.4 -15.8-23.8-16.7-60.2-15.6-81.1 1.3-23.2 13.3-42.4 35.5-51.4C416.3 5.4 434.6 1.8 462 10c27 8.1 38.4 43.6 41.6 80.9C508.8 151.2 564.4 174.9 522.4 192.1z"></path>-->
<!--						</svg>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->
 <!-- CTA Section -->
    <section class="container mt-5">
      <div class="cta">
        <h2>
          Reach out to our trip designers and let us tailor your dream getaway
        </h2>
        <a href="/enquiry-form.html"
          ><button class="main-btn cta-btn">Plan your trip</button></a
        >
      </div>
    </section>
  <!-- About Section -->
    <section class="about-section">
      <div class="container">
        <div class="about-content">
          <div class="about-text">
            <div
              style="
                font-weight: bold;
                font-size: 1.5rem;
                color: var(--sunset-gold);
              "
            >
              About Us
            </div>
            <h2 class="dynalight-regular">where nature meets luxury</h2>

            <p>
             	{!! $data->longDescription!!}
            </p>
            	<p>{{ $data->description }}</p>
            <a href="/our-team.html" class="learn-more">
              more about our amazing team <i class="fas fa-arrow-right"></i>
            </a>
          </div>
          <div class="about-illustration">
            <img
              src="{{ asset($data->owner_image)}}"
              alt=""
              class="img-fluid"
              style="height: 450px; border-radius: 15px"
            />
          </div>
        </div>
      </div>
    </section>
<!--@php-->
<!--$list=App\Models\Attraction::orderBy("id","desc")->paginate(6);-->
<!--@endphp-->
<!--@if(count($list)>0)-->
<!-- start attractions -->
<!--<section class="attractions_wrapper">-->
<!--	<div class="container">-->
<!--		<div class="row ">-->
<!--			<div class="section-title">-->
<!--				<div class="line"></div>-->
<!--				<h2>Attractions</h2>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="row attractions-item-wrap">-->
<!--			@foreach($list as $c)-->
<!--			<div class="col-lg-4 col-md-6 col-12">-->
<!--				<div class="attractions_left">-->
<!--					<div class="attr_img mdl">-->
						<!-- <a  href="{{ url('attractions/detail/'.$c->seo_url) }}" > -->
<!--							<img src="{{asset($c->image)}}" alt="{{$c->name}}" class="img-fluid" />-->
<!--							<div class="attr-over">-->
<!--								<h4>{{$c->name}}</h4>-->
<!--								<p>{{$c->description}}</p>-->
<!--							</div>-->
						<!-- </a> -->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			@endforeach-->
<!--			<div class="text-center">-->
<!--				<a href="{{url('attractions')}}" class="main-btn mt-4">View More</a>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->

<!--</section>-->
<!--@endif-->
  <!-- Benefits Section -->
    <section class="benefits">
      <div class="benefits-overlay">
        <div class="container">
          <h2 class="benefits-title">Benefits Of Booking Direct</h2>

          <div class="benefits-grid">
            <div class="benefit-item">
              <div class="benefit-icon">
                <svg
                  width="40"
                  height="40"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                  <path d="M14 2v6l3-3m0 6l-3-3"></path>
                </svg>
              </div>
              <h3>Best Rates</h3>
            </div>

            <div class="benefit-item">
              <div class="benefit-icon">
                <svg
                  width="40"
                  height="40"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"
                  ></path>
                </svg>
              </div>
              <h3>Relationship Building</h3>
            </div>

            <div class="benefit-item">
              <div class="benefit-icon">
                <svg
                  width="40"
                  height="40"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
              </div>
              <h3>Client Care</h3>
            </div>
          </div>

          <button class="main-btn book-now-btn cta-btn">Book Now</button>
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
          </div>

          <div class="attraction-card">
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
          </div>

          <div class="attraction-card">
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
          </div>

          <div class="attraction-card">
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
          </div>
        </div>
      </div>
    </section>
@stop
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/home.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/home-responsive.css" />
<style>
  /* Custom styles for modern UI */
  .section-title {
    font-family: var(--heading-font, 'Gilda Display', serif);
    color: var(--heading-color, #ffffff);
    font-size: 2.2rem;
    font-weight: 400;
    margin-bottom: 1.5rem;
  }
  
  /* Destination card hover effects */
  .destination-card:hover img {
    transform: scale(1.05);
  }
  .destination-card:hover .explore-link {
    opacity: 1 !important;
    transform: translateY(0) !important;
  }
  
  /* Experience cards hover effect */
  .experience-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
  }
  
  /* Property card hover effect */
  .property-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }
  
  /* Swiper customization */
  .swiper-button-next, .swiper-button-prev {
    color: var(--sunset-gold) !important;
    width: 40px;
    height: 40px;
  }
  .swiper-pagination-bullet {
    background: var(--sunset-gold);
    opacity: 0.5;
  }
  .swiper-pagination-bullet-active {
    opacity: 1;
    background: var(--sunset-gold);
  }
  
  /* Button hover effects */
  .btn {
    transition: all 0.3s ease;
  }
  a.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(171, 138, 98, 0.3);
  }
    /* Attractions Section */
      .attractions {
        padding: 6rem 0;
        background: var(--dark-bg-light);
      }

      .attractions-subtitle {
        text-align: center;
        font-size: 0.9rem;
        color: var(--sunset-gold);
        letter-spacing: 2px;
        margin-bottom: 1rem;
        font-weight: 600;
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
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      }

      .attraction-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      }

      .attraction-card img {
        transition: all 0.5s ease;
      }

      /* Apply filter to all images by default when attractions-grid is in hover state */
      .attractions-grid:hover .attraction-card img,
      .attractions-grid.hover-active .attraction-card img {
        filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
        /* transform: scale(0.95); */
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

      .attraction-card.dining {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
          url("Side-view-aerial-look-at-dock-scaled.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      .attraction-card.places {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
          url("Side-view-aerial-look-at-dock-scaled.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      .attraction-card.activities {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
          url("Side-view-aerial-look-at-dock-scaled.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      .attraction-card.shopping {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)),
          url("Side-view-aerial-look-at-dock-scaled.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      .attraction-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background: linear-gradient(
          rgba(0, 0, 0, 0.8),
          rgba(0, 0, 0, 0.4),
          transparent
        );
        padding: 2rem 2rem 3rem;
        color: var(--heading-color);
        z-index: 2;
      }

      .attraction-card h3 {
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0;
        position: absolute;
        top: 25px;
        left: 30px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        color: var(--heading-color);
      }
/* Benefits Section */
      .benefits {
        position: relative;
        min-height: 400px;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
          url("WhatsApp Image 2025-09-16 at 10.43.20 PM.jpeg");
        background-size: cover;
        background-position: center;
        background-attachment: scroll; /* Removed parallax effect */
        display: flex;
        align-items: center;
      }

      .benefits-overlay {
        width: 100%;
        padding: 4rem 0;
      }

      .benefits-title {
        text-align: center;
        font-size: 2.5rem;
        color: white;
        margin-bottom: 3rem;
        font-weight: 400;
      }

      .benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, 4fr);
        gap: 3rem;
        /* max-width: 100px; */
        margin: 0 auto 3rem;
        justify-content: center;
      }

      .benefit-item {
        text-align: center;
        color: white;
      }

      .benefit-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        transition: all 0.3s;
        color: var(--sunset-gold);
      }

      .benefit-item h3 {
        font-size: 1.3rem;
        font-weight: 500;
      }

      /* Add fade-in animation for benefits content */
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .benefits .container {
        animation: fadeInUp 1s ease-out forwards;
      }

      /* Parallax effect removed */

      .book-now-btn {
        display: block;
        margin: 0 auto;
      }

 /* About Section */
      .about-section {
        padding: 100px 0;
        background-color: var(--dark-bg);
      }

      .about-content {
        display: flex;
        align-items: center;
        gap: 60px;
      }

      .about-illustration {
        flex: 1;
        text-align: center;
      }

      .about-text {
        flex: 1;
      }

      .about-text h2 {
        font-size: 2.5rem;
        color: var(--heading-color);
        margin-bottom: 25px;
        font-weight: 400;
      }

      .about-text h3 {
        font-size: 1.5rem;
        color: var(--heading-color);
        margin-bottom: 20px;
        font-weight: 400;
      }

      .about-text p {
        color: var(--paragraph-color);
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 1.05rem;
      }

      .learn-more {
        color: var(--sunset-gold);
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        border-bottom: 1px solid transparent;
        padding-bottom: 5px;
      }

      .learn-more:hover {
        color: var(--heading-color);
        border-bottom: 1px solid var(--heading-color);
        transform: translateX(5px);
      }
 /* CTA Section */
      .cta {
        padding: 6rem 0;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
          url("WhatsApp Image 2025-09-16 at 10.49.15 PM.jpeg");
        background-size: cover;
        background-position: center;
        text-align: center;
        color: white;
        border-radius: 15px;
      }

      .cta h2 {
        font-size: 2.5rem;
        margin-bottom: 2rem;
        font-weight: 400;
        max-width: 850px;
        margin-left: auto;
        margin-right: auto;
      }

      .cta-btn1 {
        background-color: var(--btn-color);
        color: var(--white-color);
        padding: 12px 15px;
        /* border: 1px solid #004369; */
        border-radius: 7px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.5s ease-in-out;
        font-weight: 600;
        margin-top: var(--m40);
        width: 150px;
        position: relative;
        overflow: hidden;
        z-index: 1;
      }

      .cta-btn1::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 0;
        background-color: var(--white-color);
        transition: all 0.5s ease-in-out;
        z-index: -1;
      }

      .cta-btn1:hover {
        color: var(--btn-color);
        /* box-shadow: 0 10px 30px rgba(83, 0, 140, 0.4); */
      }

      .cta-btn1:hover::before {
        height: 100%;
      }
 /* Experience Section */
      .experience {
        padding: 6rem 0;
        background: var(--dark-bg-alt);
      }

      .experience-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(466px, 1fr));
        gap: 1rem;
        margin-top: 4rem;
      }

      .experience-card {
        /* background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); */
        padding: 1rem;
        /* border-radius: 20px; */
        text-align: start;
        transition: all 0.3s;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
      }

      .experience-card:hover {
        transform: translateY(-5px);
        /* border-color: var(--btn-color); */
        /* box-shadow: 0 15px 40px rgba(83, 0, 140, 0.2); */
      }

      .experience-icon {
        /* width: 60px; */
        /* height: 60px; */
        /* background-color: var(--btn-color); */
        /* border-radius: 50%; */
        display: flex;
        /* align-items: start; */
        justify-content: start;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 1.5rem;
        transition: all 0.3s;
      }

      .experience-icon img.text-black {
        filter: brightness(0) sepia(1) hue-rotate(5deg) saturate(3);
        transition: filter 0.3s ease;
        color: var(--icon-color);
      }

      /* .experience-card:hover .experience-icon {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(83, 0, 140, 0.3);
      } */

      .experience-card h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
        color: var(--heading-color);
        font-weight: 800;
      }

      .experience-card p {
        color: var(--paragraph-color);
        line-height: 1.8;
      }

</style>
@stop
@section("js")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
	$(document).ready(function() {
		$(".gst1").click(function() {
			$("#guestsss1").css("display", "block");
		});
		$(".close12").click(function() {
			$("#guestsss1").css("display", "none");
		});
		$(".close1112").click(function() {
			$("#guestsss1").css("display", "none");
		});
	});

	function functiondec($getter_setter, $show, $cal) {
		val = parseInt($($getter_setter).val());
		if (val > 0) {
			val = val - 1;
		}
		$($getter_setter).val(val);
		person1 = val;
		person2 = parseInt($($cal).val());
		$show_data = person1 + person2;
		$show_actual_data = $show_data + " Guests";
		if ($getter_setter == "#adults-data") {
			$($getter_setter + '-show').html(val + " Adults");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Adult");
			}
		} else {
			$($getter_setter + '-show').html(val + " Children");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Child");
			}
		}
		$($show).val($show_actual_data);
	}

	function functioninc($getter_setter, $show, $cal) {
		val = parseInt($($getter_setter).val());

		val = val + 1;

		$($getter_setter).val(val);
		person1 = val;
		person2 = parseInt($($cal).val());
		$show_data = person1 + person2;
		$show_actual_data = $show_data + " Guests";
		$($show).val($show_actual_data);
		if ($getter_setter == "#adults-data") {
			$($getter_setter + '-show').html(val + " Adults");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Adult");
			}
		} else {
			$($getter_setter + '-show').html(val + " Children");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Child");
			}
		}
	}


	function functiondec1($getter_setter, $show, $cal) {
		val = parseInt($($getter_setter).val());
		if ($getter_setter == "#adults-data") {
			if (val > 1) {
				val = val - 1;
			}
		} else {
			if (val > 0) {
				val = val - 1;
			}
		}
		$($getter_setter).val(val);
		person1 = val;
		person2 = parseInt($($cal).val());
		$show_data = person1 + person2;
		$show_actual_data = $show_data + " Guests";
		if ($getter_setter == "#adults-data1") {
			$($getter_setter + '-show').html(val + " Adults");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Adult");
			}
		} else {
			$($getter_setter + '-show').html(val + " Children");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Child");
			}
		}
		$($show).val($show_actual_data);
	}

	function functioninc1($getter_setter, $show, $cal) {
		val = parseInt($($getter_setter).val());
		val = val + 1;
		$($getter_setter).val(val);
		person1 = val;
		person2 = parseInt($($cal).val());
		$show_data = person1 + person2;
		$show_actual_data = $show_data + " Guests";
		$($show).val($show_actual_data);
		if ($getter_setter == "#adults-data1") {
			$($getter_setter + '-show').html(val + " Adults");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Adult");
			}
		} else {
			$($getter_setter + '-show').html(val + " Children");
			if (val <= 1) {
				$($getter_setter + '-show').html(val + " Child");
			}
		}
	}
</script>
<script src="{{ asset('datepicker') }}/node_modules/fecha/dist/fecha.min.js"></script>
<script src="{{ asset('datepicker') }}/dist/js/hotel-datepicker.js"></script>
<script>
  @php 
    	$new_data_blocked = LiveCart::iCalDataCheckInCheckOutCheckinCheckout(10000000);
    	$checkin = json_encode($new_data_blocked['checkin']);
    	$checkout = json_encode($new_data_blocked['checkout']);
    	$blocked = json_encode($new_data_blocked['blocked']);
	@endphp
	var checkin = <?php echo $checkin;  ?>;
	var checkout = <?php echo ($checkout);  ?>;
	var blocked = <?php echo ($blocked);  ?>;
	function clearDataForm() {
		$("#start_date").val('');
		$("#end_date").val('');
	}
	(function() {
		@if(Request::get("start_date"))
    		@if(Request::get("end_date"))
    		    $("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");
    		@endif
		@endif
		abc = document.getElementById("demo17");
		var demo17 = new HotelDatepicker(
			abc, {
			    endDate: '{{ date('Y-m-d', strtotime('+33 months')) }}',
				@if($checkin)
				    noCheckInDates: checkin,
				@endif
				@if($checkout)
				    noCheckOutDates: checkout,
				@endif
				@if($blocked)
				    disabledDates: blocked,
				@endif
				onDayClick: function() {
				    
					d = new Date();
					d.setTime(demo17.start);
					document.getElementById("start_date").value = getDateData(d);
					d = new Date();
					//console.log(demo17.end)
					if (Number.isNaN(demo17.end)) {
						document.getElementById("end_date").value = '';
					} else {
						d.setTime(demo17.end);
						document.getElementById("end_date").value = getDateData(d);
					}
				    var startDate = new Date(demo17.start);
                    var endDate = new Date(demo17.end);
                    
                    var startDay = startDate.getDate();
                    if(startDay){
                        $('#chooesen_start_date').text(startDay);
                    }
                    var startMonth = startDate.toLocaleString('default', { month: 'short' });
                    if(startMonth){
                        $('#chooesen_start_month').text(startMonth);
                    }
                    var endDay = endDate.getDate();
                    if(endDay){
                        $('#chooesen_end_date').text(endDay);
                    }
                    var endMonth = endDate.toLocaleString('default', { month: 'short' });
                    if(endMonth){
                        $('#chooesen_end_month').text(endMonth);
                    }
				},
				clearButton: function() {
				   return false;
				}
			}
		);

		@if(Request::get("start_date"))
    		@if(Request::get("end_date"))
    		    setTimeout(function() {$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");document.getElementById("start_date").value = "{{ request()->start_date }}";document.getElementById("end_date").value = "{{ request()->end_date }}";}, 1000);
    		@endif
		@endif

	})();

	$(document).on("click", "#clear", function() {
		$("#clear-demo17").click();
		$('#chooesen_start_date').text("");
		$('#chooesen_start_month').text("");
		$('#chooesen_end_date').text("");
		$('#chooesen_end_month').text("");
	});
	x = document.getElementById("month-2-demo17");
	x.querySelector(".datepicker__month-button--next").addEventListener("click", function() {
		y = document.getElementById("month-1-demo17");
		y.querySelector(".datepicker__month-button--next").click();
	});
	x = document.getElementById("month-1-demo17");
	x.querySelector(".datepicker__month-button--prev").addEventListener("click", function() {
		y = document.getElementById("month-2-demo17");
		y.querySelector(".datepicker__month-button--prev").click();
	});
	function getDateData(objectDate) {
		let day = objectDate.getDate();
		let month = objectDate.getMonth() + 1;
		let year = objectDate.getFullYear();
		if (day < 10) {
			day = '0' + day;
		}
		if (month < 10) {
			month = `0${month}`;
		}
		format1 = `${year}-${month}-${day}`;
		return format1;
	}

	$(document).on("click", ".view-more", function() {
		that = $(this);
		that.parents(".parent-class").find(".view-more").css({
			"display": "none"
		});
		that.parents(".parent-class").find(".view-less").css({
			"display": "block"
		});
		that.parents(".parent-class").find(".readMore_review").css({
			"height": "auto"
		});
	});
	$(document).on("click", ".view-less", function() {
		that = $(this);
		that.parents(".parent-class").find(".view-more").css({
			"display": "block"
		});
		that.parents(".parent-class").find(".view-less").css({
			"display": "none"
		});
		that.parents(".parent-class").find(".readMore_review").css({
			"height": "78px"
		});
	});

	$(document).ready(function() {
		$(".readMore_review").each(function() {
			var a = $(this).height();
			if (a < 78) {
				$(this).parents(".parent-class").find(".view-more").css("display", "none");
			} else {
				$(this).parents(".parent-class").find(".view-more").css("display", "block");
				$(this).css("height", "78px");
			}
		})
		var a = $(".readMore_review").height();
	});

	$('#test-slider1').owlCarousel({
		loop: true,
		items: 3,
		margin: 30,
		dots: false,
		nav: false,
		autoplay: true,
		autoplayTimeout: 4000,
		smartSpeed: 550,
		responsive: {
			0: {
				items: 1,
				margin: 0,
			},
			768: {
				items: 2
			},
			1170: {
				items: 3
			}
		}
	});
	
	// Initialize Swiper for testimonials
	if (typeof Swiper !== 'undefined') {
		const swiper = new Swiper("#reviewsSwiper", {
			slidesPerView: 1,
			spaceBetween: 30,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			breakpoints: {
				640: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
				},
				1024: {
					slidesPerView: 3,
				},
			},
		});
	}
	
	// Hover effects for destination cards
	document.addEventListener('DOMContentLoaded', function() {
		const destinationCards = document.querySelectorAll('.destination-card');
		
		destinationCards.forEach(card => {
			card.addEventListener('mouseenter', function() {
				const img = this.querySelector('img');
				const exploreLink = this.querySelector('.explore-link');
				
				if (img) {
					img.style.transform = 'scale(1.05)';
				}
				
				if (exploreLink) {
					exploreLink.style.opacity = '1';
					exploreLink.style.transform = 'translateY(0)';
				}
			});
			
			card.addEventListener('mouseleave', function() {
				const img = this.querySelector('img');
				const exploreLink = this.querySelector('.explore-link');
				
				if (img) {
					img.style.transform = 'scale(1)';
				}
				
				if (exploreLink) {
					exploreLink.style.opacity = '0';
					exploreLink.style.transform = 'translateY(10px)';
				}
			});
		});
	});
</script>
@stop