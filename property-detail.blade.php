@extends("front.layouts.master")
@section("title",$data->meta_title)
@section("keywords",$data->meta_keywords)
@section("description",$data->meta_description)
@section("header-section")
{!! $data->header_section !!}
@stop
@section("footer-section")
{!! $data->footer_section !!}
@stop
@section("container")
@php
 $currency=$setting_data['payment_currency'];
   $name=$data->name;
   $bannerImage=asset('front/images/internal-banner.webp');;
   if($data->banner_image){
      $bannerImage=asset($data->banner_image);
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
<a href="#book" class="sticky main-btn book1 book-now"><span class="button-text">BOOK NOW</span></a>
<section class="property-detail">
        <div class="container">
            <div class="upper-area">
                <h3>{{$data->title ?? $data->name}}</h3>
                <div class="adr-area">
                    @if($data->address)
                      <h6><i class="fa-solid fa-location-dot"></i> {{$data->city}}, {{$data->state}}</h6>
                    @endif
                    <div class="share-area">
                        <button class="main-btn share"><i class="fa-regular fa-share-from-square"></i> Share</button>
                        <div class="icon-area">
                            <a  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{ url($data->seo_url) }}" target="_BLANK"><i class="fab fa-facebook-f"></i></a>
                          <a  onclick="myFunctioncopy()" href="javascript:;" ><i class="fa-solid fa-copy"></i></a>
                          
                        </div>
                    </div>
                </div>
                <div class="row gallery">
                    <div class="col-6 left">
                        @php  $i=1; @endphp
                        @if($data->feature_image)
                            @php $image=$data->feature_image;@endphp
                         @else
                            @if($data->listingImages)
                                 @php $io=0; @endphp
                                    @foreach(json_decode($data->listingImages,true) as $c1)
                                        @if($i==1)
                                            @php $image=$c1['url'];break;@endphp
                                        @else
                                        @endif
                                    @endforeach 
                            @endif
                        @endif
                        @if($image)
                        	<a href="{{ asset($image) }}" data-fancybox="gallery"><img src="{{ asset($image) }}" class="img-fluid" alt=""></a>
                        @endif
                    </div>
                    <div class="col-6 right" >
                        <div class="row">
                            @php  $i=1; @endphp
                              @if($data->listingImages)
                                @php $io=0; @endphp
                                @foreach(json_decode($data->listingImages,true) as $c1)
                                @if($i==10 || $i==1)
                                @else

                                @if($i==6)
                                @break
                                @endif
                                <div class="col-6">
                                    <a href="{{asset($c1['url'])}}" data-fancybox="gallery"> 
                                       <img src="{{asset($c1['url'])}}" class="img-fluid"  alt="{{$c1['caption']}}"  title="{{$c1['caption']}}">
                                       @if($i==5)
                                        <button type="button" class="main-btn">Show All</button>
                                       @endif
                                   </a>
                               	</div>
                                 @endif
                               @php $i++; @endphp
                            @endforeach
                        @endif
                         </div>
                    </div>
                    <div class="hidden-gallery">
                        @php  $i=1; @endphp
                         @if($data->listingImages)
                            @php $io=0; @endphp
                            @foreach(json_decode($data->listingImages,true) as $c1)
                      			@if($i<6)
                                @else
                                  <div class="img-active">
                                      <a href="{{asset($c1['url'])}}" data-fancybox="gallery"> 
                                         <img src="{{asset($c1['url'])}}" class="img-fluid"  alt="{{$c1['caption']}}"  title="{{$c1['caption']}}">
                                     </a>
                                  </div>
                  				@endif
                              	@php $i++; @endphp
                             @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row bottom">
                <div class="col-8">
                 <div class="row hosted">
                     <div class="col-12">
                         <h4>{{$data->name}}</h4>
                         <div class="ammenity-home">
                           	@if($data->bedroomsNumber)
                                <span><i class="fa fa-bed" aria-hidden="true"></i>  {{$data->bedroomsNumber}} Bedrooms</span>
                           	@endif
                        
                            @if($data->bathroomsNumber)
                                <span><i class="fa fa-bathtub" aria-hidden="true"></i>  {{$data->bathroomsNumber}} Bathrooms</span>
                            @endif
                            @if($data->personCapacity)
                                <span><i class="fa fa-users" aria-hidden="true"></i>  {{$data->personCapacity}} Sleeps </span>
                            @endif
                         </div>
                     </div>
                 </div>   
                  <hr> 
                  <div class="overview">
                        <h4>Overview</h4>
                        <div class="overcontent">
                           <pre>{!! $data->description !!}</pre>
                        </div>
                        <a class="more" id="more">Show More <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; "><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg></a>
                        <a class="less" id="less">Show Less <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; "><path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path></svg></a>
                    </div>
                    <hr>
                    
                        <div class="amenities">
                          <h4>Amenities</h4>
                          <ul class="amenities-detail">
                            @php $i=0;@endphp
                            @foreach(json_decode($data->listingAmenities,true) as $c1)
                              @if($i==10)
                                  @break
                              @endif
                              	<li>{{ $c1['amenityName']}}</li>
                              @php $i++;@endphp
                            @endforeach
                        </ul>
                        <button class="main-btn amn-btn" data-bs-toggle="modal" data-bs-target="#amn">Show all amenities</button>
                        <div class="modal" id="amn">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                <h4>What this place offers</h4>
                                <div class="amn-area">
                                    <div class="single-amenity">
                                        <ul>
                                            @foreach(json_decode($data->listingAmenities,true) as $c1)
                                                <li>{{ $c1['amenityName']}}<hr></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <hr>
                    <div class="availability">
                         <h4>Availability</h4>   
                         <iframe src="{{ url('fullcalendar-demo/'.$data->id) }}"  width="100%" height="400" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    
                     @if($data->virtual_tour)
                    {!! $data->virtual_tour !!}
                  @endif
                    </div>
                    <div class="col-lg-4 " id="book">
                        <div class='side-area'>
                            <div class="upper-area">
                        	<div class="price" id="price-data-div">
                                @php
                                  $price=$data->price;
                                  $ar1=App\Models\HostAway\HostAwayDate::where("single_date",date('Y-m-d'))->where("hostaway_id",$data->host_away_id)->first();
                                if($ar1){
                                  $price=$ar1->price;
                                }
                                @endphp
                                @if($price)
                                        <p>{{ $currency }}  {{$price}}</p>
                                        <span>/ night</span>
                                  @endif
                            </div>
                        </div>
                        <div class="error-box d-none" id="gaurav-error-show-parent">
                            <p id="gaurav-error-show-p"></p>
                        </div>
                        <div class="get-quote">
                        <div class="contact-box">
                                <form class="form booking_form" id="booking_form" action="{{url('reserve')}}" method="get">
                                    <input type="hidden" name="property_id" value="{{ $data->id }}">
                                    
                                       <div class="main-cal">
                                              <div class="ovabrw_datetime_wrapper">
                                                 {!! Form::text("start_date",Request::get("start_date"),["required","autocomplete"=>"off","inputmode"=>"none","id"=>"start_date","placeholder"=>"Check in"]) !!}
                                                 <i class="fa-solid fa-calendar-days"></i>
                                              </div>
                                              <div class="ovabrw_datetime_wrapper">
                                                 {!! Form::text("end_date",Request::get("end_date"),["required","autocomplete"=>"off","inputmode"=>"none","id"=>"end_date","placeholder"=>"Check Out"]) !!}
                                                 <i class="fa-solid fa-calendar-days"></i>
                                              </div>
                                           	<input type="text" id="demo17" value="" aria-label="Check-in and check-out dates" aria-describedby="demo17-input-description" readonly/>
                                       </div>
                                    <div class="row pet" style="{{ ModelHelper::showPetFee($data->pet_fee) }}">
                                        <div class="col-md-12">
                                            {!! Form::selectRange("pet",0,$data->max_pet,null,["placeholder"=>"Choose Pet","class"=>"form-control","title"=>"Choose no. of pet","id"=>"pet_fee_data_guarav"]) !!}
                                            <i class="fa-solid fa-paw"></i>
                                        </div>
                                    </div>
                                    <div class="ovabrw_service_select rental_item">
                                        	<select name="adults" id="adults-data">
                							   @for($i=1; $i <= (int)($data->personCapacity); $i++)
                							   <option value="{{$i}} Guests" @if(Request::get('Guests') == "$i Guests") selected @endif>{{$i}} Guests</option>
                							   @endfor
                							</select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="ovabrw-book-now" id="submit-button-gaurav-data" style="display: none;">
                                                <button type="submit" class="main-btn">
                                                <span> Reserve</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="gaurav-new-data-area">
                                    </div>
                                </form>
                                 <div class="text-center about-owner-section">
                                <p>Or<br>Contact Owner</p>
                                <p><a href="mailto:{{$data->email ?? $setting_data['email'] }}"><i class="fa-solid fa-envelope"></i> {{$data->email ?? $setting_data['email'] }}</a></p>
                                <p><a href="tel:{{$data->mobile ?? $setting_data['mobile'] }}"><i class="fa-solid fa-phone"></i> {{$data->mobile ?? $setting_data['mobile'] }}</a></p>
                            </div>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
            @if(App\Models\HostAway\HostAwayReview::where(["listingMapId"=>$data->host_away_id,"type"=>"guest-to-host","status"=>"published"])->whereNotNull("publicReview")->limit(4)->count()>0)
            <hr>
            <div class="reviews">
                <div class="reviews-head">
                    <h4>Reviews</h4>
                    <p class="reviews-total">{{App\Models\HostAway\HostAwayReview::where(["listingMapId"=>$data->host_away_id,"type"=>"guest-to-host","status"=>"published"])->whereNotNull("publicReview")->count()}} <span>Reviews</span></p>
                    <p class="ratings">{{number_format((App\Models\HostAway\HostAwayReview::where(["listingMapId"=>$data->host_away_id,"type"=>"guest-to-host","status"=>"published"])->whereNotNull("publicReview")->avg("rating")/2),2)}} <i class="fa-solid fa-star"></i> <span>Ratings</span></p>
                </div>
                <div class="row rev">
                    @php
                        $reviews = App\Models\HostAway\HostAwayReview::where([
                            "listingMapId" => $data->host_away_id,
                            "type" => "guest-to-host",
                            "status" => "published"
                        ])->whereNotNull("publicReview")
                          ->orderBy("arrivalDate", "desc")
                          ->limit(8)
                          ->get();
                    @endphp
                    @foreach($reviews as $c)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="review-card">
                            <div class="guest-profile">
                                <div class="prof">
                                    <p>{{Helper::getReviewName($c->guestName) ?? 'Guest'}}</p>
                                    <span>{{date('F Y', strtotime($c->arrivalDate))}}</span>
                                    <span class="star-review">{{ number_format(($c->rating/2), 1) }} <i class="fa-solid fa-star"></i></span>
                                </div>
                            </div>
                            <div class="guest-content">
                                <p>{{$c->publicReview ?? 'Great experience!'}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                        <button class="main-btn rvws" id="rvws" data-bs-toggle="modal" data-bs-target="#rvw">Show all reviews</button>
                        <div class="modal" id="rvw">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                <h4>What people think about us</h4>
                                <div class="rvw-area">
                                  @foreach(App\Models\HostAway\HostAwayReview::where(["listingMapId"=>$data->host_away_id,"status"=>"published","type"=>"guest-to-host"])->whereNotNull("publicReview")->orderBy("arrivalDate","desc")->get() as $c)
                                      <div class="review-box">
                                          <div class="guest-profile">
                                              <div class="prof">
                                                  <p>{{Helper::getReviewName($c->guestName) ?? '' }}</p>
                                                  <span>{{date('F Y',strtotime($c->arrivalDate))}}</span>
                                                  <span class="star-review">{{ number_format(($c->rating/2),2) }} <i class="fa-solid fa-star"></i></span>
                                              </div>
                                          </div>
                                          <div class="guest-content">
                                                <p>{{$c->publicReview ?? '' }}</p>
                                          </div>
                                      </div>
                                      <hr>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            </div>
            @endif
            <hr>
            @if($data->map)
            <div class="map">
                <h4>Where you'll be</h4>
                <iframe src="{!! $data->map !!}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            	<hr>
            </div>
            @endif
            @if($data->booking_policy!="" || $data->short_description!="" || $data->cancellation_policy!="")
            <div class="policy">
                <h4>Things to know</h4>
                <div class="row">
                    @if($data->booking_policy)
                    <div class="col-lg-4 rule">
                        <div class="area">
                            <p class="main">House Rules</p>
                            {!! $data->booking_policy !!}
                        </div>
                        <a class="rul rull" id="rul" data-bs-toggle="modal" data-bs-target="#house"> Show More  <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; "> <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path> </svg> </a>
                        <div class="modal" id="house">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                <h4>House Rules</h4>
                                <div class="house-area">
                                {!! $data->booking_policy !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endif
                    @if($data->short_description)
                    <div class="col-lg-4 safety">
                        <div class="area">
                            <p class="main">Safety & Property</p>
                            {!! $data->short_description !!}
                        </div>
                        <a class="rul safee" id="safe" data-bs-toggle="modal" data-bs-target="#safety"> Show More  <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; "> <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path> </svg> </a>
                        <div class="modal" id="safety">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                <h4>Safety & Property</h4>
                                <div class="house-area">
                                {!! $data->short_description !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endif
                    @if($data->cancellation_policy)
                    <div class="col-lg-4 cancel">
                        <div class="area">
                            <p class="main">Cancellation policy</p>
                            {!! $data->cancellation_policy !!}
                            </div>
                            <a class="rul cancl" id="canc" data-bs-toggle="modal" data-bs-target="#cancel"> Show More  <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 12px; width: 12px; display: block; "> <path d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z" fill-rule="evenodd"></path> </svg> </a>
                            <div class="modal" id="cancel">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                <h4>Cancellation policy</h4>
                                <div class="house-area">
                                {!! $data->cancellation_policy !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        @endif
                </div>
            </div>
            @endif
              <div class="more-properties">
                     <h4>More properties from GISO Vacation Rentals</h4>   
                     <div class="swiper property-swiper">
                        <div class="swiper-wrapper">
                @php  $list=App\Models\HostAway\HostAwayProperty::where("status","true")->where("id","!=",$data->id)->orderBy("ordering","asc")->get(); @endphp
                @foreach($list as $c)
                        <div class="swiper-slide">
                            <div class="property-list">
   <div class="list-image">
    @php  $i=1; @endphp
                                    @if($c->feature_image)
                                        @php $image=$c->feature_image;@endphp
                                    @else
                                        @if($c->listingImages)
                                            @php $io=0; @endphp
                                            @foreach(json_decode($c->listingImages,true) as $c1)
                                                @if($i==1)
                                                    @php $image=$c1['url']; break;@endphp
                                                @else
                                                @endif
                                            @endforeach 
                                        @endif
                                    @endif
                                    @if($image)
      <a href="{{ url($c->seo_url) }}" title=""><img src="{{ asset($image)}}" alt="{{$c->homeawayPropertyName}}" title=""></a>
      @endif
   </div>
   <div class="list-content">
      <h3><a href="{{ url($c->seo_url) }}">{{$c->homeawayPropertyName}}</a>
      </h3>
      <p>{{$c->address}}</p>
      <ul class="list-amenity">
         <li><i class="fa-solid fa-user-group"></i> <span>{{$c->personCapacity}}</span> Guests </li>
         <li><i class="fa-solid fa-bed"></i> <span>{{$c->bedroomsNumber}}</span> Bedrooms</li>
         <li><i class="fa-solid fa-shower"></i> <span>{{$c->bathroomsNumber}}</span> Baths</li>
      </ul>
      <div class="list-btn">
        @php
                                        $price1=$c->price;
                                        $ar1=App\Models\HostAway\HostAwayDate::where("single_date",date('Y-m-d'))->where("hostaway_id",$c->host_away_id)->first();
                                        if($ar1){
                                          $price1=$ar1->price;
                                        }
                                    @endphp
                                    @if($price1)
         <div class="price d-none">
            <p>From {{ ModelHelper::getDataFromSetting('payment_currency') }}  {{$price1}} / Night </p>
         </div>
         @endif
         <div class="pro-btn">
            <a href="{{ url($c->seo_url) }}" class="main-btn">BOOK NOW</a>
         </div>
      </div>
   </div>
</div>
                        	
                        </div>
                      @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Navigation -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                     </div>
                 </div>
            </div>
        </div>
</section>
@stop
@section("css")
    @parent
    <link rel="stylesheet" href="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-detail.css" />
    <link rel="stylesheet" href="{{ asset('front')}}/css/property-detail-responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('datepicker') }}/dist/css/hotel-datepicker.css"/>
    <link rel="stylesheet" href="{{ asset('front')}}/css/datepicker.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
      .property-swiper {
        width: 100%;
        overflow: hidden;
        padding: 20px 0;
      }
      .property-swiper .swiper-slide {
        height: auto;
        width: auto;
      }
      .property-swiper .property-list {
        height: 100%;
        width: 100%;
        border: 1px solid rgba(171, 138, 98, 0.2);
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
      }
      .property-swiper .property-list:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transform: translateY(-5px);
      }
      .property-swiper .swiper-button-next,
      .property-swiper .swiper-button-prev {
        color: var(--sunset-gold);
        background: var(--dark-bg-light);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        transition: all 0.3s;
        z-index: 10;
      }
      .property-swiper .swiper-button-next:after,
      .property-swiper .swiper-button-prev:after {
        font-size: 18px;
        font-weight: bold;
      }
      .property-swiper .swiper-button-next:hover,
      .property-swiper .swiper-button-prev:hover {
        background: var(--sunset-gold);
        color: var(--dark-bg);
        transform: scale(1.1);
      }
      .property-swiper .swiper-pagination-bullet {
        background: var(--sunset-gold);
        opacity: 0.5;
      }
      .property-swiper .swiper-pagination-bullet-active {
        opacity: 1;
        background: var(--sunset-gold);
      }
      .more-properties {
        padding: 40px 0;
      }
    </style>
@stop 
@section("js")
    @parent
    <script src="{{ asset('front')}}/assets/fancybox/jquery.fancybox.min.js" ></script>
    <script src="{{ asset('front')}}/js/property-detail.js" ></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
      // Initialize Swiper for property carousel
      document.addEventListener('DOMContentLoaded', function() {
        const propertySwiper = new Swiper('.property-swiper', {
          slidesPerView: 3,
          spaceBetween: 30,
          loop: true,
          pagination: {
            el: '.property-swiper .swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.property-swiper .swiper-button-next',
            prevEl: '.property-swiper .swiper-button-prev',
          },
          breakpoints: {
            // when window width is <= 768px
            768: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            // when window width is <= 992px
            992: {
              slidesPerView: 2,
              spaceBetween: 20
            },
            // when window width is > 1200px
            1200: {
              slidesPerView: 3,
              spaceBetween: 30
            }
          },
          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
          },
        });
      });
    </script>
    <script>
    function functiondec($getter_setter,$show,$cal){
      	$("#submit-button-gaurav-data").hide();
        val=parseInt($($getter_setter).val());
        if($getter_setter=="#adults-data"){
            if(val>1){
                val=val-1;
            }
        }else{
              if(val>0){
                val=val-1;
            }  
        }
        $($getter_setter).val(val);
        person1=val;
        person2=parseInt($($cal).val());
        $show_data=person1+person2;
        $show_actual_data=$show_data+" Guests";
        if($getter_setter=="#adults-data"){
            $($getter_setter+'-show').html(val +" Adults");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Adult"); 
            }
        }else{
             $($getter_setter+'-show').html(val +" Children");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Child"); 
            }
        }
        $($show).val($show_actual_data);
        ajaxCallingData();
    }
    function functioninc($getter_setter,$show,$cal){
      $("#submit-button-gaurav-data").hide();
        val=parseInt($($getter_setter).val());
        person1=val;
        person2=parseInt($($cal).val());
        $show_data=person1+person2;
        val=val+1;
        person1=val;
        person2=parseInt($($cal).val());
        $show_data=person1+person2;
        $($getter_setter).val(val);
        $show_actual_data=$show_data+" Guests";
        $($show).val($show_actual_data);
        if($getter_setter=="#adults-data"){
            $($getter_setter+'-show').html(val +" Adults");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Adult"); 
            }
        }else{
             $($getter_setter+'-show').html(val +" Children");
            if(val<=1){
               $($getter_setter+'-show').html(val +" Child"); 
            }
        }
        ajaxCallingData();
    }
</script>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Days</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="gaurav-new-modal-days-area">
        Modal body..
      </div>
    </div>
  </div>
</div>
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Additional Fee</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="gaurav-new-modal-service-area">
        Modal body..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  	function clearDataForm(){
        $("#start_date").val('');
        $("#end_date").val('');
        $("#submit-button-gaurav-data").hide();
        $("#gaurav-new-modal-days-area").html('');
        $("#gaurav-new-modal-service-area").html('');
        $("#gaurav-new-data-area").html('');
  	}
    $(document).on("change","#pet_fee_data_guarav",function(){
        ajaxCallingData();
    });
    $(document).on("change","#heating_pool_fee_data_guarav",function(){
        ajaxCallingData();
    });
     $(document).on("change","#heating_pool_fee_data_guarav",function(){
        ajaxCallingData();
    });
     $(document).on("change","#adults-data",function(){
        ajaxCallingData();
    });
    
    function filterString($string){
        var number = $string.split(' ')[0];
        var numberRegex = $string.match(/\d+/)[0];
        
        if(number){
            if(numberRegex){
                return numberRegex;
            }
        }
      return null;
    }
    
    function ajaxCallingData(){
        pet_fee_data_guarav=$("#pet_fee_data_guarav").val();
        heating_pool_fee_data_guarav=$("#heating_pool_fee_data_guarav").val();
        adults= filterString($("#adults-data").val());
        childs=$("#child-data").val();
        total_guests=parseInt(adults)+parseInt(childs);
        //console.log(total_guests);
        if(adults>0){
             if($("#start_date").val()!=""){
                 if($("#end_date").val()!=""){
                     $("#sygnius-loader").removeClass("d-none");
                      $.post("{{route('checkajax-get-quote')}}",{start_date:$("#start_date").val(),end_date:$("#end_date").val(),heating_pool_fee_data_guarav:heating_pool_fee_data_guarav,pet_fee_data_guarav:pet_fee_data_guarav,adults:adults,childs:childs,book_sub:true,property_id:{{ $data->id }}},function(data){
                         if(data.status==400){
                             $("#gaurav-new-modal-days-area").html(null);
                             $("#gaurav-new-modal-service-area").html(null);
                             $("#gaurav-new-data-area").html(null);
                             $("#submit-button-gaurav-data").hide();
                             toastr.error(data.message);
                             $("#sygnius-loader").addClass("d-none");
                         }else{
                            $("#submit-button-gaurav-data").show();
                             $("#gaurav-new-modal-days-area").html(data.modal_day_view);
                             $("#gaurav-new-modal-service-area").html(data.modal_service_view);
                             $("#gaurav-new-data-area").html(data.data_view);
                             $("#sygnius-loader").addClass("d-none");
                             $("#price-data-div").html(data.price);
                         }
                     });
                 }
             }
        }else{
              $("#gaurav-new-modal-days-area").html(null);
              $("#sygnius-loader").addClass("d-none");
              $("#gaurav-new-modal-service-area").html(null);
              $("#gaurav-new-data-area").html(null);
              $("#submit-button-gaurav-data").hide();
        }
    }
    </script>
    <script src="{{ asset('datepicker') }}/node_modules/fecha/dist/fecha.min.js"></script>
    <script src="{{ asset('datepicker') }}/dist/js/hotel-datepicker.js"></script>
    <script>
    @php
        $new_data_blocked=LiveCart::iCalDataCheckInCheckOutCheckinCheckout($data->id);
        $checkin=json_encode($new_data_blocked['checkin']);
        $checkout=json_encode($new_data_blocked['checkout']);
        $blocked=json_encode($new_data_blocked['blocked']);
    @endphp
    var checkin = <?php echo $checkin;  ?>;
    var checkout = <?php echo ($checkout);  ?>;
    var blocked= <?php echo ($blocked);  ?>;
    (function () {
      @if(Request::get("start_date"))
        @if(Request::get("end_date"))
          $("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");
        @endif
      @endif
      abc=document.getElementById("demo17");
      var demo17 = new HotelDatepicker(abc,
             {
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
                  console.log(demo17.end)
                  if(Number.isNaN(demo17.end)){
                    document.getElementById("end_date").value = '';
                  }else{
                    d.setTime(demo17.end);
                    document.getElementById("end_date").value = getDateData(d);
                    ajaxCallingData();
                  }
                },clearButton:function(){return true;}
    		 }
          );
          @if(Request::get("start_date"))
            @if(Request::get("end_date"))
              setTimeout(function(){$("#demo17").val("{{ request()->start_date }} - {{ request()->end_date }}");document.getElementById("start_date").value ="{{ request()->start_date }}";document.getElementById("end_date").value ="{{ request()->end_date }}";ajaxCallingData();},1000);
            @endif
          @endif
      })();
      $(document).on("click","#clear",function(){$("#clear-demo17").click();});
      x=document.getElementById("month-2-demo17");
      x.querySelector(".datepicker__month-button--next").addEventListener("click", function(){y=document.getElementById("month-1-demo17");y.querySelector(".datepicker__month-button--next").click();})  ;
      x=document.getElementById("month-1-demo17");
      x.querySelector(".datepicker__month-button--prev").addEventListener("click", function(){y=document.getElementById("month-2-demo17");y.querySelector(".datepicker__month-button--prev").click();})  ;
      function getDateData(objectDate){let day = objectDate.getDate();let month = objectDate.getMonth()+1;let year = objectDate.getFullYear();if (day < 10) {day = '0' + day;}if (month < 10) {month = `0${month}`;}format1 = `${year}-${month}-${day}`;return  format1 ;}  
      function myFunctioncopy(){
         navigator.clipboard.writeText("{{ url($data->seo_url) }}");
      }
</script>
@stop 