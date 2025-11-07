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
        $bannerImage=asset('front/images/internal-banner.webp');
        if($data->bannerImage){
            $bannerImage=asset($data->bannerImage);
        }
    @endphp
	<!-- start banner sec -->
  <div class="banner">
        <div class="c-hero__background">
            <img class="img-fluid" src="{{ $bannerImage }}" title="{{ $name }}" alt="{{ $name }}">    
            <div class="banner-overlay"></div>
        </div>
        <div class="guides">
            <h1 class="c-hero__title">{{$name}}</h1>
            <div class="banner-subtitle">Discover Amazing Places</div>
        </div>
    </div>
   <div class="breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb single-breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fa-solid fa-house"></i>Home</a>
                <a href="{{ url('/attractions') }}" rel="nofollow"><span><i class="fa-solid fa-chevron-right"></i></span> Attractions</a>
                <span><i class="fa-solid fa-chevron-right"></i></span> {{$name}}
            </div>
        </div>
    </div>


  @php
  $list=App\Models\Attraction::where("category_id",$data->id)->orderBy("ordering","asc")->paginate(15);
  @endphp
 <section class="memory-section">
   <div class="container">
      <div class="row">
      @foreach($list as $c)
         <div class="col-4">
            <div class="row rev attraction-card">
               <div class="content">
                  <div class="memory-item">
                     <div class="memory-content">
                        <h2><a @if($c->type=="internal") href="{{ url('attractions/detail/'.$c->seo_url) }}"  @else href="{{ $c->seo_url }}" target="_BLANK"    @endif>{{$c->name}}</a></h2>
                        @if($c->address)
                        <p><i class="fa-solid fa-location-dot"></i> {{ $c->address }}</p>
                        @endif
                        @if($c->mobile)
                        <p><i class="fa-solid fa-phone"></i> {{$c->mobile }}</p>
                        @endif
                     </div>
                     <a @if($c->type=="internal") href="{{ url('attractions/detail/'.$c->seo_url) }}"  @else href="{{ $c->seo_url }}" target="_BLANK"    @endif class="main-btn" id="atr">View More</a>
                  </div>
                  <div class="dot">
                     <img src="{{ asset('front') }}/images/dot-shape.png" alt="{{$c->name}}">
                  </div>
               </div>
               <div class="img">
                  <div class="memory-image">
                     <a @if($c->type=="internal") href="{{ url('attractions/detail/'.$c->seo_url) }}"  @else href="{{ $c->seo_url }}" target="_BLANK"    @endif><img src="{{asset($c->image)}}" alt="{{$c->name}}" class="img-fluid"></a>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
      </div>

      <div class="row pagination-row">
         <div class="pagination-container">
            {{ $list->links()}}
         </div>
      </div>
   </div>
</section>
{!! $data->seo_section !!}
@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/css/attraction.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/attraction-responsive.css" />
<style>
/* Enhanced styles for attraction page */
.banner {
  position: relative;
  height: 400px;
  overflow: hidden;
}

.banner-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.6));
  z-index: 1;
}

.c-hero__background img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.guides {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  text-align: center;
  width: 90%;
}

.c-hero__title {
  color: #fff;
  font-size: 42px;
  margin-bottom: 15px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.banner-subtitle {
  color: var(--sunset-gold, #ab8a62);
  font-size: 18px;
  letter-spacing: 2px;
  text-transform: uppercase;
}

.breadcrumb-wrap {
  background-color: #222;
  padding: 15px 0;
}

.breadcrumb {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.breadcrumb a, .breadcrumb span {
  color: #fff;
  font-size: 14px;
  text-decoration: none;
  display: flex;
  align-items: center;
}

.breadcrumb i {
  margin-right: 5px;
}

.breadcrumb a:hover {
  color: var(--sunset-gold, #ab8a62);
}

/* Card improvements */
.attraction-card {
  margin-bottom: 50px;
  transition: all 0.3s ease;
}

.attraction-card:hover {
  transform: translateY(-5px);
}

.memory-item {
  background-color: #fff;
  padding: 25px;
  border-radius: 5px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}

.memory-item:hover {
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.memory-content h2 a {
  color: #333;
  transition: color 0.3s ease;
}

.memory-content h2 a:hover {
  color: var(--sunset-gold, #ab8a62);
}

.memory-content p i {
  color: var(--sunset-gold, #ab8a62);
  width: 20px;
}

.main-btn {
  background-color: #333;
  color: #fff;
  padding: 12px 25px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  display: inline-block;
  border: none;
}

.main-btn:hover {
  background-color: var(--sunset-gold, #ab8a62);
}

.memory-image {
  border-radius: 5px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.memory-image img {
  transition: transform 0.5s ease;
}

.memory-image:hover img {
  transform: scale(1.05);
}

/* Pagination styles */
.pagination-container {
  width: 100%;
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination {
  display: flex;
  justify-content: center;
  list-style: none;
  padding: 0;
}

.pagination li {
  margin: 0 5px;
}

.pagination li a, .pagination li span {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 5px;
  text-decoration: none;
  background-color: #f8f8f8;
  color: #333;
  transition: all 0.3s ease;
}

.pagination li.active span {
  background-color: var(--sunset-gold, #ab8a62);
  color: #fff;
}

.pagination li a:hover {
  background-color: #e0e0e0;
}

/* Responsive fixes for attraction page */
@media (max-width: 1200px) {
  .memory-section .memory-image {
    height: 550px;
  }
  .memory-section .memory-image img {
    height: 550px;
  }
  .memory-section .memory-item {
    min-height: 385px;
  }
  .c-hero__title {
    font-size: 36px;
  }
}

@media (max-width: 992px) {
  .memory-section .row, .row .rev {
    margin-bottom: 3rem;
  }
  .memory-section .memory-image {
    height: 450px;
  }
  .memory-section .memory-image img {
    height: 450px;
  }
  .memory-section .memory-item {
    min-height: 335px;
  }
  .memory-section h2 {
    font-size: 24px;
  }
  .c-hero__title {
    font-size: 32px;
  }
  .banner {
    height: 350px;
  }
}

@media (max-width: 768px) {
  .row.rev {
    flex-direction: column;
  }
  .memory-section .img, .memory-section .content {
    width: 100%;
  }
  .memory-section .memory-image {
    height: 350px;
    margin-top: 20px;
  }
  .memory-section .memory-image img {
    height: 350px;
    position: relative;
    max-width: 100%;
    width: 100%;
  }
  .memory-section .memory-item {
    min-height: auto;
    right: 0;
    padding: 15px;
  }
  .memory-section .dot {
    display: none;
  }
  .memory-section .row, .row .rev {
    margin-bottom: 2rem;
  }
  .memory-content {
    max-height: none;
  }
  .c-hero__title {
    font-size: 28px;
  }
  .col-4 {
    width: 100%;
  }
  .banner {
    height: 300px;
  }
  .banner-subtitle {
    font-size: 16px;
  }
}

@media (max-width: 576px) {
  .memory-section .memory-image {
    height: 250px;
  }
  .memory-section .memory-image img {
    height: 250px;
  }
  section.memory-section a.main-btn {
    width: 100%;
    text-align: center;
  }
  .banner {
    height: 200px;
  }
  .c-hero__title {
    font-size: 24px;
  }
  .banner-subtitle {
    font-size: 14px;
  }
  .breadcrumb a, .breadcrumb span {
    font-size: 12px;
  }
  .memory-section {
    padding: 30px 0;
  }
}
</style>
@stop 
@section("js")
@parent
<script src="{{ asset('front')}}/js/attraction.js" ></script>
@stop