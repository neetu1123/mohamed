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


@php
$list=App\Models\Attraction::orderBy("id","desc")->get();
@endphp
@if(count($list)>0)
<!-- Attractions Section -->
<!--<section class="attractions">-->
<!--  <div class="container">-->
<!--    <h2 class="section-title">Explore Attractions</h2>-->
<!--    <p class="attractions-subtitle">-->
<!--      HAND-PICKED SELECTION OF QUALITY PLACES-->
<!--    </p>-->

<!--    <div class="attractions-grid">-->
<!--      @foreach($list as $c)-->
<!--      <div class="attraction-card">-->
<!--        <a-->
<!--          href="{{ url('attractions/category/'.$c->seo_url) }}"-->
<!--          style="-->
<!--            display: block;-->
<!--            height: 100%;-->
<!--            width: 100%;-->
<!--            text-decoration: none;-->
<!--          "-->
<!--        >-->
<!--          <img-->
<!--            src="{{asset($c->image)}}" alt="{{$c->name}}"-->
<!--            style="-->
<!--              width: 100%;-->
<!--              height: 100%;-->
<!--              object-fit: cover;-->
<!--              position: absolute;-->
<!--              top: 0;-->
<!--              left: 0;-->
<!--              z-index: 0;-->
<!--            "-->
<!--          />-->
<!--          <div class="attraction-overlay">-->
<!--            <h3>{{$c->name}}</h3>-->
<!--          </div>-->
<!--        </a>-->
<!--      </div>-->
<!--      @endforeach-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->
<section class="attractions_wrapper">
	<div class="container">
		<div class="row ">
			<div class="section-title">
				<div class="line"></div>
				<h2>Attractions</h2>
			</div>
		</div>
		<div class="row attractions-item-wrap">
			@foreach($list as $c)
			<div class="col-lg-4 col-md-6 col-12">
				<div class="attractions_left">
					<div class="attr_img mdl">
						 <a  href="{{ url('attractions/detail/'.$c->seo_url) }}" > 
							<img src="{{asset($c->image)}}" alt="{{$c->name}}" class="img-fluid" />
							<div class="attr-over">
								<h4>{{$c->name}}</h4>
								<p>{{$c->description}}</p>
							</div>
						 </a> 
					</div>
				</div>
			</div>
			@endforeach
			<!--<div class="text-center">-->
			<!--	<a href="{{url('attractions')}}" class="main-btn mt-4">View More</a>-->
			<!--</div>-->
		</div>
	</div>

</section>
@endif





@stop
@section("css")
@parent
<link rel="stylesheet" href="{{ asset('front')}}/css/attractions.css" />
<link rel="stylesheet" href="{{ asset('front')}}/css/attractions-responsive.css" />
<style>
   
    .section-title {
        
        color: var(--heading-color);
       
    }

    .section-title .line {
       
        background-color: var(--sunset-gold);
       
    }

   
    .attractions_wrapper {
        background-color: var(--dark-bg);
    }

   

    .attr-over {
       
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
        color: var(--text-white);
    }

    .attr-over h4 {
        font-family: var(--heading-font);
        
        color: var(--text-white);
    }

    .attr-over p {
        color: var(--text-light-bg);
        font-family: var(--body-font);
       
    }

  

    .attractions_left:hover .attr-over {
        background: linear-gradient(to top, rgba(171, 138, 98, 0.8), transparent);
    }

    .main-btn {
        background-color: var(--dark-bg);
        color: var(--sunset-gold);
        border: 1px solid var(--sunset-gold);
       
    }

  
    .main-btn:hover {
        color: var(--dark-bg);
    }

   
    /* Page Title Styling */
    .page-title {
        
        background-color: var(--dark-bg);
    }

    .page-title h1 {
        color: var(--text-white);
       
        font-family: var(--heading-font);
    }


    .checklist p {
     
        color: var(--text-white);
    }

    .checklist a {
        color: var(--sunset-gold);
     
    }

    .checklist a.text span {
        color: var(--text-white);
    }

    .checklist a:hover {
        color: var(--text-white);
    }
</style>
@stop
@section("js")
@parent
<script>

  $(document).ready(function(){
        $(".target-class").each(function(){
            var a=$(this).height();
             if(a < 280){
                $(this).parents(".parent-class").find(".mr").css("display", "none");
            }
            else{
                $(this).parents(".parent-class").find(".mr").css("display", "block");
                $(this).css("height", "280px");
            }
        })
        
     var a = $(".target-class").height();
   
  });

    $(document).on("click",".readmore",function(){
        that=$(this);
        that.removeClass("readmore").addClass("readless").html("Read Less");
        that.parents(".parent-class").find(".target-class").css({"height": "auto"});
    });
    $(document).on("click",".readless",function(){
        that=$(this);
        that.removeClass("readless").addClass("readmore").html("Read More");
        that.parents(".parent-class").find(".target-class").css({"height": "280px"});
    });
    
   


</script>
@stop