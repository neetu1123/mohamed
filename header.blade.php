<!-- Header -->
<header class="header">
  <div class="container-fluid">
    <div class="header-content">
      <div class="logo my-3">
        <a href="{{url('/')}}">
            <img src="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" alt="" class="" style="height: 100%; width: auto"/>
        </a>
      </div>
      <div class="header-right">
        <a href="tel:{!! $setting_data['mobile'] ?? '#' !!}" class="phone">
            <i class="fas fa-phone me-1"></i> {!! $setting_data['mobile'] ?? '#' !!}</a>
        <button class="menu-btn" onclick="toggleSidebar()">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </div>
</header>

<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="logo mb-3">
       <a href="{{url('/')}}">
      <img src="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" alt=""  class="" style="height:100%;"/>
    </a>
    </div>
    <button class="close-btn" onclick="toggleSidebar()">×</button>
  </div>
  <ul class="sidebar-menu">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('about-us') }}">About Us</a></li>
    <li><a href="{{ url('properties') }}">Properties</a></li>

    <li><a href="{{url('/local-guide')}}">Attractions</a></li>
    <li><a href="{{ url('contact-us') }}">Contact</a></li>
  </ul>
</div>

<!-- Overlay -->
<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>
<style>
    @media (max-width: 796px) {
        .logo {
            height: 45px;
        }
    }
</style>