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
            <h1 class="aos-init aos-animate">{{$name}}</h1>
            <div class="checklist">
                <p>
                    <a href="{{url('/')}}" class="text"><span>Home</span></a>
                    <a class="g-transparent-a">{{$name}}</a>
                </p>
            </div>
        </div>
    </section>
    <!-- end banner sec -->

<style>
/* Contact Page Styles with Theme Implementation */
.contact-page-section {
  padding: 4rem 0;
  background-color: var(--dark-bg);
  color: var(--paragraph-color);
}

.contact-info-box {
  margin-bottom: 30px;
}

.contact-info-box .box-inner {
  background: var(--dark-bg-light);
  border-radius: 10px;
  padding: 25px;
  text-align: center;
  transition: all 0.3s ease;
  height: 100%;
  border: 1px solid transparent;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.contact-info-box .box-inner:hover {
  transform: translateY(-10px);
  border-color: var(--sunset-gold);
  box-shadow: 0 15px 30px rgba(171, 138, 98, 0.15);
}

.contact-info-box h5 {
  font-family: var(--heading-font);
  color: var(--heading-color);
  font-size: 1.5rem;
  margin-bottom: 15px;
  font-weight: 400;
}

.contact-info-box p {
  font-family: var(--body-font);
  color: var(--paragraph-color);
  font-size: 1rem;
  margin-bottom: 0;
}

.contact-info-box i {
  color: var(--sunset-gold);
  margin-right: 8px;
  font-size: 1.2rem;
}

.contact-info-box a {
  color: var(--paragraph-color);
  text-decoration: none;
  transition: color 0.3s ease;
}

.contact-info-box a:hover {
  color: var(--sunset-gold);
}

.contact-map {
  height: 400px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  border: 1px solid var(--dark-bg-light);
  margin-bottom: 30px;
}

.inner-container {
  background: var(--dark-bg-light);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.sec-title h3 {
  font-family: var(--heading-font);
  color: var(--heading-color);
  font-size: 2rem;
  margin-bottom: 15px;
  font-weight: 400;
}

.sec-title .line {
  width: 60px;
  height: 3px;
  background-color: var(--sunset-gold);
  margin-bottom: 20px;
}

.contact-form label {
  font-family: var(--body-font);
  color: var(--heading-color);
  font-weight: 500;
  font-size: 0.95rem;
  margin-bottom: 8px;
}

.contact-form input,
.contact-form textarea {
  background-color: rgba(255, 255, 255, 0.05);
  border: 1px solid var(--dark-bg);
  border-radius: 5px;
  padding: 10px 15px;
  width: 100%;
  color: var(--text-white);
  margin-bottom: 20px;
  transition: all 0.3s ease;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-color: var(--sunset-gold);
  outline: none;
  box-shadow: 0 0 10px rgba(171, 138, 98, 0.2);
}

.contact-form textarea {
  height: 120px;
  resize: none;
}

.main-btn {
  background-color: var(--dark-bg);
  color: var(--sunset-gold);
  padding: 12px 25px;
  border: 1px solid var(--sunset-gold);
  border-radius: 7px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.5s ease-in-out;
  font-weight: 600;
  position: relative;
  overflow: hidden;
  z-index: 1;
  font-family: var(--body-font);
  text-transform: uppercase;
  letter-spacing: 1px;
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

/* Responsive Styles */
@media (max-width: 992px) {
  .contact-map {
    height: 350px;
  }
  
  .sec-title h3 {
    font-size: 1.8rem;
  }
}

@media (max-width: 768px) {
  .contact-map {
    height: 300px;
    margin-bottom: 30px;
  }
  
  .inner-container {
    padding: 20px;
  }
  
  .sec-title h3 {
    font-size: 1.5rem;
  }
}

@media (max-width: 480px) {
  .contact-info-box .box-inner {
    padding: 20px 15px;
  }
  
  .contact-map {
    height: 250px;
  }
  
  .main-btn {
    width: 100%;
  }
}
</style>

    <!-- start about section -->
    <section class="contact-page-section">
        <div class="container">
            <div class="row">
                <!-- Contact Info Box -->
                <div class="contact-info-box col-lg-4 col-md-6 col-sm-12" >
                    <div class="box-inner">
                        <h5>Address</h5>
                        <p><i class="fas fa-map-marker-alt"></i> {!! $setting_data['address'] ?? '#' !!}</p>
                    </div>
                </div>
                <div class="contact-info-box col-lg-4 col-md-6 col-sm-12" >
                    <div class="box-inner">
                        <h5>Call or Text</h5>
                        <p><i class="fa-solid fa-phone"></i><a href="tel:{!! $setting_data['mobile'] ?? '#' !!}"> {!! $setting_data['mobile'] ?? '#' !!}</a></p>
                    </div>
                </div>
                <div class="contact-info-box col-lg-4 col-md-6 col-sm-12" >
                    <div class="box-inner">
                        <h5>Email</h5>
                        <p><i class="fa-solid fa-envelope"></i><a href="mailto:{!! $setting_data['email'] ?? '#' !!}"> {!! $setting_data['email'] ?? '#' !!}</a></p>
                    </div>
                </div>
                
            </div>
            <!-- Sec Title -->
            <div class="row mt-md-5">
                  <div class="col-md-6">
                    <div class="contact-map" >
                        <iframe src="{!! $setting_data['map'] ?? '#' !!}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inner-container" >
                        <div class="sec-title">
                            <h3>Feel free to contact us</h3>
                            <div class="line"></div>
                        </div>
                        <div class="contact-form">
                            {!! Form::open(["route"=>"contactPost"])  !!}
                                <div class="row clearfix">
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <label>Full Name *</label>
                                        <input type="text" name="name" id="form_fname" placeholder="Full name" value="" required="">
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <label>Email *</label>
                                        <input type="email" name="email" id="form_email" placeholder="Email *" value="" required="">
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Phone *</label>
                                        <input type="number" name="mobile" id="form_phone" placeholder="Phone" value="" required="">
                                    </div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <label>Message *</label>
                                        <textarea class="" name="message" id="msg" placeholder="Message" required=""></textarea>
                                    </div> 
                               
                                     @if($setting_data['g_captcha_enabled'])
                                        @if($setting_data['g_captcha_enabled']=="yes")
                                            @if($setting_data['google_captcha_site_key']!="" && $setting_data['google_captcha_secret_key']!="")
                							<script src="https://www.google.com/recaptcha/api.js" async defer></script>
                							<div class="form-group col-lg-12 col-md-12 col-sm-12">
                							    <div class="g-recaptcha" data-sitekey="{{ $setting_data['google_captcha_site_key'] }}"></div>
                							 </div>  
                							 @endif
        							    @endif
        							 @endif
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" name="submit" class="main-btn"><span>Send Message</span></button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
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
<script>
$(document).ready(function() {
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: "reload-captcha",
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
    
    // Add hover effects to contact boxes
    $(".contact-info-box").hover(
        function() {
            $(this).find(".box-inner").css("border-color", "var(--sunset-gold)");
        },
        function() {
            $(this).find(".box-inner").css("border-color", "transparent");
        }
    );
    
    // Add focus effects to form inputs
    $(".contact-form input, .contact-form textarea").focus(function() {
        $(this).css("border-color", "var(--sunset-gold)");
    }).blur(function() {
        if (!$(this).val()) {
            $(this).css("border-color", "var(--dark-bg)");
        }
    });
});
</script>
@stop