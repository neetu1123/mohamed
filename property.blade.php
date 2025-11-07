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
/* Applying the theme from style.css */
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
}

/* Base styles */
.properties-list {
  padding: 4rem 0;
  background-color: var(--dark-bg);
}

.property-list {
  background-color: var(--dark-bg-light);
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin-bottom: 2rem;
}

.property-list:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
}

.list-image {
  position: relative;
  height: 220px;
  overflow: hidden;
}

.list-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.list-image:hover img {
  transform: scale(1.05);
}

.list-content {
  padding: 1.5rem;
}

.list-content h3 {
  font-family: var(--heading-font);
  margin-bottom: 0.5rem;
}

.list-content h3 a {
  color: var(--heading-color);
  text-decoration: none;
  transition: color 0.3s;
}

.list-content h3 a:hover {
  color: var(--sunset-gold);
}

.list-content p {
  color: var(--paragraph-color);
  margin-bottom: 1rem;
  font-size: 0.9rem;
}

.list-amenity {
  list-style: none;
  display: flex;
  gap: 1rem;
  margin-bottom: 1.5rem;
  padding: 0;
}

.list-amenity li {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--text-light-bg);
  font-size: 0.9rem;
}

.list-amenity li i {
  color: var(--sunset-gold);
}

.list-btn {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.price p {
  font-weight: 600;
  color: var(--sunset-gold);
  margin: 0;
}

.main-btn {
  background-color: var(--dark-bg);
  color: var(--sunset-gold);
  padding: 8px 15px;
  border: 1px solid var(--sunset-gold);
  border-radius: 7px;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.5s ease-in-out;
  font-weight: 600;
  position: relative;
  overflow: hidden;
  z-index: 1;
  text-decoration: none;
  display: inline-block;
}

.main-btn::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 0;
  background-color: var(--sunset-gold);
  transition: all 0.5s ease-in-out;
  z-index: -1;
}

.main-btn:hover {
  color: var(--dark-bg);
  box-shadow: 0 10px 20px rgba(171, 138, 98, 0.4);
}

.main-btn:hover::before {
  height: 100%;
}

.page-title {
  position: relative;
  background-size: cover;
  background-position: center;
  padding: 150px 0 80px;
  text-align: center;
  z-index: 1;
}

.page-title::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  z-index: -1;
}

.page-title h1 {
  color: var(--heading-color);
  font-size: 3rem;
  margin-bottom: 1rem;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.checklist {
  display: flex;
  justify-content: center;
}

.checklist p {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--text-light-bg);
}

.checklist a {
  color: var(--sunset-gold);
  text-decoration: none;
}

.checklist a.text {
  color: var(--text-light-bg);
}

/* Search section styles */
.search-sec {
  background-color: var(--dark-bg-light);
  padding: 2rem 0;
  margin-top: -50px;
  position: relative;
  z-index: 2;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  max-width: 90%;
  margin-left: auto;
  margin-right: auto;
}

.search-bar {
  border-radius: 10px;
  padding: 1rem;
}

.search-bar label {
  color: var(--text-white);
  font-weight: 500;
  margin-bottom: 0.5rem;
  display: block;
}

.form-dates {
  background-color: rgba(255, 255, 255, 0.1);
  padding: 0.8rem 1rem;
  border-radius: 5px;
  border: 1px solid var(--dark-bg-light);
  color: var(--text-white);
  cursor: pointer;
}

.form-dates .dates {
  font-size: 1.2rem;
  font-weight: 600;
  margin-right: 0.3rem;
}

.form-dates .months {
  font-size: 0.9rem;
}

.guest-info {
  margin-bottom: 1rem;
}

#Guests {
  background-color: rgba(255, 255, 255, 0.1);
  padding: 0.8rem 1rem;
  border-radius: 5px;
  border: 1px solid var(--dark-bg-light);
  color: var(--text-white);
  width: 100%;
  cursor: pointer;
  font-size: 1rem;
}

.srch-btn {
  display: flex;
  align-items: flex-end;
}

/* Sticky book button */
.sticky.main-btn {
  position: fixed;
  right: 20px;
  bottom: 20px;
  z-index: 100;
  padding: 12px 20px;
  font-size: 16px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

/* Responsive Styles for Property List */
@media (max-width: 992px) {
  .properties-list {
    padding: 2rem 0;
  }
  
  .list-image {
    height: 180px;
  }
  
  .list-content {
    padding: 1rem;
  }
  
  .list-amenity {
    flex-wrap: wrap;
    gap: 0.5rem;
  }
  
  .page-title {
    padding: 120px 0 60px;
  }
  
  .page-title h1 {
    font-size: 2.5rem;
  }
}

@media (max-width: 768px) {
  .search-sec {
    margin-top: -30px;
    padding: 1.5rem 0;
  }
  
  .search-bar form .row {
    flex-direction: column;
  }
  
  .search-bar .col-3, 
  .search-bar .col-6 {
    width: 100%;
    margin-bottom: 1rem;
  }
  
  .page-title {
    padding: 100px 0 50px;
  }
  
  .page-title h1 {
    font-size: 2rem;
  }
  
  .property-list-slider1 {
    display: flex;
    flex-direction: column;
  }
  
  .property-list-slider1 .col-md-4 {
    width: 100%;
  }
  
  .list-btn {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }
  
  .sticky.main-btn {
    padding: 10px 16px;
    font-size: 14px;
    right: 10px;
    bottom: 10px;
  }
}

@media (max-width: 480px) {
  .page-title h1 {
    font-size: 1.8rem;
  }
  
  .list-amenity {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .search-sec {
    max-width: 95%;
  }
}
</style>

@php
$payment_currency=$setting_data['payment_currency'];
$name=$data->name;
$bannerImage=asset('front/images/internal-banner.webp');
if($data->bannerImage){
$bannerImage=asset($data->bannerImage);
}
@endphp
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
<a href="#p-list" class="sticky main-btn book1 check">
	<span class="button-text">CHECK AVAILABILITY</span>
</a>
@php
$total_sleep=0;
$ids=[];
if(Request::get("Guests")){

    $number = explode(' ', Request::get("Guests"))[0];
    $total_sleep+= (int)($number);
}

$list=App\Models\HostAway\HostAwayProperty::query();

if(Request::get("start_date")){
    if(Request::get("end_date")){
        $new_data=(HostAwayAPI::getSearchPropertiesList(Request::get("start_date"),Request::get("end_date"),$total_sleep));
        if($new_data['status']=="200"){
            $ids=$new_data['data'];
            $list->whereIn("host_away_id",$ids);
        }
    }
}

if(Request::get("location_id")){
    $list->where("location_id",Request::get("location_id"));
}
if(Request::get("pet")){
    $list->where("is_pet",Request::get("pet"));
}

$yes_is_pet='';
$no_is_pet='';
$list=$list->where("status","true")->orderBy("ordering","asc")->paginate(100);
@endphp
<div class="search-sec" data-aos="fade-up">
		<div class="container">
			<div class="search-bar">
				<form method="get" action="{{ url('properties') }}">
					<div class="row">
						<div class="col-4 md-12 sm-12 d-none">
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
							<img src="https://webdesignvr.in/under-construction/ardyn/front/images/user.png" alt="">
							<input type="hidden" value="1" name="adults" id="adults-data" />
							<input type="hidden" value="0" name="child" id="child-data" />
							<div class="adult-popup" id="guestsss">
								<i class="fa fa-times close1"></i>
								<div class="adult-box">
									<div class="adult-value">
										<p id="adults-data-show">@if(Request::get('adults'))
                                                                    @if(Request::get('adults')>1)
                                                                        {{ Request::get('adults') }} Adults
                                                                    @else
                                                                        {{ Request::get('adults') }} Adult
                                                                    @endif
                                                                 @else
                                                                 Adult
                                                                 @endif</p>
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
							   @for($i=1; $i<=8; $i++)
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




@if(count($list)>0)

<section class="properties-list">
   <div class="container">
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
         <div class="item col-md-4 col-12">
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
   </div>
</section>
@else
<div class="d-flex justify-content-center mt-4">
    <p>Unfortunately, the selected dates are unavailable. Please adjust your search and try again</p>
</div>    
@endif

@stop
@section("css")
@parent
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/porperty-list.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/porperty-list-responsive.css" />
{{-- <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet"> --}}

<style>
/* Additional custom styles for the properties page */
body {
  font-family: var(--body-font);
  line-height: 1.6;
  color: var(--paragraph-color);
  background-color: var(--dark-bg);
}

.d-flex.justify-content-center.mt-4 p {
  color: var(--sunset-gold);
  font-size: 1.2rem;
  padding: 2rem;
  text-align: center;
  background-color: var(--dark-bg-light);
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  margin: 2rem auto;
  max-width: 80%;
}

/* Calendar styling */
.datepicker__inner {
  background-color: var(--dark-bg-light);
  border: 1px solid var(--sunset-gold);
  border-radius: 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.datepicker__month-name {
  color: var(--sunset-gold);
  font-family: var(--heading-font);
  font-size: 1.2rem;
}

.datepicker__month-day {
  color: var(--text-white);
  transition: all 0.2s;
}

.datepicker__month-day--invalid {
  color: rgba(255, 255, 255, 0.2);
}

.datepicker__month-day--valid:hover {
  background-color: var(--sunset-gold);
  color: var(--dark-bg);
}

.datepicker__month-day--selected,
.datepicker__month-day--first-day-selected,
.datepicker__month-day--last-day-selected {
  background-color: var(--sunset-gold);
  color: var(--dark-bg);
}

.datepicker__month-button {
  color: var(--sunset-gold);
}

.datepicker__month-button:hover {
  background-color: var(--sunset-gold);
  color: var(--dark-bg);
}

/* Additional selector customization */
select {
  background-color: rgba(255, 255, 255, 0.1);
  border: 1px solid var(--dark-bg-light);
  color: var(--text-white);
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23ab8a62' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: calc(100% - 10px) center;
  padding-right: 30px;
}

select:focus {
  outline: none;
  border-color: var(--sunset-gold);
}

/* Improve button styling */
.cta-btn, .main-btn {
  letter-spacing: 1px;
  text-transform: uppercase;
  font-weight: 600;
}

/* Fix hover state for main-btn in property list */
.properties-list .main-btn:hover span {
  color: var(--dark-bg);
}
</style>
@stop
@section("js")
@parent
<script src="{{ asset('front')}}/js/properties-list.js"></script>
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
	$new_data_blocked = LiveCart::iCalDataCheckInCheckOutCheckinCheckout(0);
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
					console.log(demo17.end)
					if (Number.isNaN(demo17.end)) {
						document.getElementById("end_date").value = '';
					} else {
						d.setTime(demo17.end);
						document.getElementById("end_date").value = getDateData(d);
						// ajaxCallingData();
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
					return true;
				}
			}
		);

		@if(Request::get("start_date"))
		@if(Request::get("end_date"))
		setTimeout(function() {
			$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}")
			document.getElementById("start_date").value = "{{ request()->start_date }}";
			document.getElementById("end_date").value = "{{ request()->end_date }}";
			@php
			 $start_date = strtotime(request()->start_date);
			 $end_date = strtotime(request()->end_date);
			 
			 $start_day = date('d', $start_date); // Day: 24
             $start_month = date('M', $start_date);

             $end_day = date('d', $end_date); // Day: 24
             $end_month = date('M', $end_date);
			@endphp
			 $('#chooesen_start_date').text("{{$start_day}}");
			 $('#chooesen_start_month').text("{{$start_month}}");
			 $('#chooesen_end_date').text("{{$end_day}}");
			 $('#chooesen_end_month').text("{{$end_month}}");
		}, 1000);

		@endif
		@endif

	})();

	$(document).on("click", "#clear", function() {
		$("#clear-demo17").click();
	})
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
		//console.log(day); // 23

		let month = objectDate.getMonth() + 1;
		//console.log(month + 1); // 8

		let year = objectDate.getFullYear();
		// console.log(year); // 2022


		if (day < 10) {
			day = '0' + day;
		}

		if (month < 10) {
			month = `0${month}`;
		}
		format1 = `${year}-${month}-${day}`;
		return format1;
		console.log(format1); // 07/23/2022
	}
</script>

@stop