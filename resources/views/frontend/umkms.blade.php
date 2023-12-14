<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edublankon - UNY</title>
<meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,SEBIAN Multi Purpose Care,eCommerce,SEBIAN - Multi Purpose eCommerce HTML5 Template">
<meta name="description" content="SEBIAN - Multi Purpose eCommerce HTML5 Template">
<meta name="author" content="M_Adnan">

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="{{asset ('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset ('frontend/css/main.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset ('frontend/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset ('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset ('frontend/css/animate.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset ('frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- ADD YOUR OWN STYLING HERE. AVOID TO USE STYLE.CSS AND MAIN.CSS. IT WILL BE HELPFUL FOR YOU IN FUTURE UPDATES -->
<link href="{{asset ('frontend/css/custom.css') }}" rel="stylesheet" type="text/css">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{asset ('frontend/rs-plugin/css/settings.css') }}" media="screen" />

<!-- JavaScripts -->
<script src="{{asset ('frontend/js/modernizr.js') }}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- LOADER ===========================================-->
<div id="loader">
  <div class="loader">
    <div class="position-center-center"> <img src="{{asset ('frontend/images/logo-dark.png') }}" alt="">
      
      <p class="font-playfair text-center">Tunggu Sebentar...</p>
      <div class="loading">
      	<div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
      </div>
    </div>
  </div>
</div>

<!-- Page Wrap -->
<div id="wrap">
  
  <!-- Header -->
  <header class="header-style-2"> 
    
    <!-- Logo -->
    <div class="container">
      <div class="logo"> <a href="#."><img src="{{asset ('frontend/images/logo-dark.png') }}" alt=""></a> </div>
      </div>
      
      
         <div class="sticky">
      <div class="container">

      <!-- Nav -->
      <!-- Nav -->
        <nav class="webimenu"> 
          <!-- MENU BUTTON RESPONSIVE -->
          <div class="menu-toggle"> <i class="fa fa-bars"> </i> </div>
          <ul class="ownmenu">
          <li class="active"><a href="/">Beranda</a>
          </li>
          <li class="meganav"><a href="/umkms">UMKM</a> 
            </li>
          <li><a href="https://wa.me/6282250871431">Kontak</a>
          </li>
      </nav>
    </div>
    </div>
  </header>
  <!-- Header End --> 
  
  <!-- CONTENT START -->
  <div class="content"> 
    <!--======= SUB BANNER =========-->
    <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s">
        <div class="container">
          <h4>UMKM EDUBLANKON UNY</h4>
          <!-- Breadcrumb -->
          <ol class="breadcrumb">
            <li><a href="/">Beranda</a></li>
            <li class="active">Semua UMKM</li>
          </ol>
        </div>
      </section>
    
    <!--======= New Arrival =========-->
    <section class="section-p-30px new-arrival">
      <div class="container"> 
{{--         
        <!--  Tittle -->
        <div class="tittle animate fadeInUp" data-wow-delay="0.4s">
          <h5>UMKM EDUBLANKON UNY</h5>
          <p>Kategori UMKM</p>
        </div> --}}
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist animate fadeInUp" data-wow-delay="0.4s">
          <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">Semua</a></li>
          @foreach($kategori as $data)
          <li role="presentation"><a href="#{{$data->kategori_umkm}}" aria-controls="{{$data->kategori_umkm}}" role="tab" data-toggle="tab">{{$data->kategori_umkm}}</a></li>
          @endforeach
          {{-- <li role="presentation"><a href="#access" aria-controls="access" role="tab" data-toggle="tab">Souvenir</a></li>
          <li role="presentation"><a href="#shoes" aria-controls="shoes" role="tab" data-toggle="tab">Makanan</a></li>
          <li role="presentation"><a href="#bags" aria-controls="bags" role="tab" data-toggle="tab">Minuman</a></li> --}}
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content animate fadeInUp" data-wow-delay="0.4s"> 
          <!-- ALL  -->
          <div role="tabpanel" class="tab-pane fade in active" id="all"> 
            
            <!--  New Arrival Tabs Products  -->
            <div class="popurlar_product">
              <ul class="row">
                @foreach($umkms as $umkm)
                <!--  New Arrival  -->
                <li class="col-sm-3">
                  <div class="items-in"> 
                    <!-- Image --> 
                    <img src="{{ asset('storage/umkm/'.$umkm->logo) }}" alt=""> 
                    <!-- Hover Details -->
                    <div class="over-item">
                      <ul class="animated fadeIn">
                        <li> <a href="{{ asset('storage/umkm/'.$umkm->logo) }}" data-lighter><i class="ion-search"></i></a></li>
                        {{-- <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                        <li> <a href="#."><i class="fa fa-heart-o"></i></a></li> --}}
                        <li class="full-w"> <a href="{{ route('umkm-detail', ['id' => $umkm->id]) }}" class="btn">Selengkapnya..</a></li>
                        <!-- Rating Stars -->
                        {{-- <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li> --}}
                      </ul>
                    </div>
                    <!-- Item Name -->
                    <div class="details-sec"> <a href="{{ route('umkm-detail', ['id' => $umkm->id]) }}">{{$umkm->nama_umkm}}</a> <span class="font-montserrat">{{$umkm->kategori['kategori_umkm'] }}</span> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          
          @foreach($kategori as $data)
          <!-- Kategori  -->
          <div role="tabpanel" class="tab-pane fade" id="{{$data->kategori_umkm}}"> 
            <!--  New Arrival Tabs Products  -->
            <div class="popurlar_product">
              <ul class="row">
                
                @foreach($umkms as $umkm)
                @if(!empty($umkm->kategori) && $umkm->kategori['kategori_umkm'] == $data->kategori_umkm)
                <!--  New Arrival  -->
                <li class="col-sm-3">
                  <div class="items-in"> 
                    <!-- Image --> 
                    <img src="{{ asset('storage/umkm/'.$umkm->logo) }}" alt=""> 
                    <!-- Hover Details -->
                    <div class="over-item">
                      <ul class="animated fadeIn">
                        <li> <a href="{{ asset('storage/umkm/'.$umkm->logo) }}" data-lighter><i class="ion-search"></i></a></li>
                        {{-- <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                        <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                        <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li> --}}
                        <!-- Rating Stars -->
                        {{-- <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li> --}}
                      </ul>
                    </div>
                    <!-- Item Name -->
                    <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">{{$umkm->kategori['kategori_umkm'] }}</span> </div>
                  </div>
                </li>
                @endif
                @endforeach
              </ul>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>
    </section>
  </div>
  
  <!--======= Footer =========-->
  <footer>
    <div class="container">
      <div class="text-center"> <a href="#."><img src="images/logo.png" alt=""></a><br>
        <img class="margin-t-40" src="images/hammer.png" alt="">
        <p class="intro-small margin-t-40">Multipurpose E-Commerce Theme is suitable for furniture store, fashion shop, accessories, electric shop. We have included multiple layouts for home page to give you best selections in customization.</p>
      </div>
      
      <!--  Footer Links -->
      <div class="footer-link row">
        <div class="col-md-6">
          <ul>
            
            <!--  INFOMATION -->
            <li class="col-sm-6">
              <h5>INFOMATION</h5>
              <ul class="f-links">
                <li><a href="#.">ABOUT US</a></li>
                <li><a href="#."> DELIVERY INFOMATION</a></li>
                <li><a href="#."> PRIVACY & POLICY</a></li>
                <li><a href="#."> TEMRS & CONDITIONS</a></li>
                <li><a href="#."> MANUFACTURES</a></li>
              </ul>
            </li>
            
            <!-- MY ACCOUNT -->
            <li class="col-sm-6">
              <h5>MY ACCOUNT</h5>
              <ul class="f-links">
                <li><a href="#.">MY ACCOUNT</a></li>
                <li><a href="#."> LOGIN</a></li>
                <li><a href="#."> MY CART</a></li>
                <li><a href="#."> WISHLIST</a></li>
                <li><a href="#."> CHECKOUT</a></li>
              </ul>
            </li>
          </ul>
        </div>
        
        <!-- Second Row -->
        <div class="col-md-6">
          <ul class="row">
            
            <!-- TWITTER -->
            <li class="col-sm-6">
              <h5>TWITTER</h5>
              <p>Check out new work on my @Behance portfolio: "BCreative_Multipurpose Theme" http://on.be.net/1zOOfBQ </p>
            </li>
            
            <!-- FLICKR PHOTO -->
            <li class="col-sm-6">
              <h5>FLICKR PHOTO</h5>
              <ul class="flicker">
                <li><a href="#."><img src="images/flicker-1.jpg" alt=""></a></li>
                <li><a href="#."><img src="images/flicker-2.jpg" alt=""></a></li>
                <li><a href="#."><img src="images/flicker-3.jpg" alt=""></a></li>
                <li><a href="#."><img src="images/flicker-4.jpg" alt=""></a></li>
                <li><a href="#."><img src="images/flicker-5.jpg" alt=""></a></li>
                <li><a href="#."><img src="images/flicker-6.jpg" alt=""></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Rights -->
      <div class="rights">
        <p>© 2015 HTML5 TEMPLATE SEBIAN. All Rights Reserved. Powered By WPELITE</p>
      </div>
    </div>
  </footer>  
  <!-- GO TO TOP --> 
  	<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End -->
</div>
<!-- Wrap End --> 
<script src="{{asset ('frontend/js/jquery-1.11.3.js') }}"></script> 
<script src="{{asset ('frontend/js/wow.min.js') }}"></script> 
<script src="{{asset ('frontend/js/bootstrap.min.js') }}"></script> 
<script src="{{asset ('frontend/js/own-menu.js') }}"></script> 
<script src="{{asset ('frontend/js/owl.carousel.min.js') }}"></script> 
<script src="{{asset ('frontend/js/jquery.magnific-popup.min.js') }}"></script> 
<script src="{{asset ('frontend/js/jquery.flexslider-min.js') }}"></script> 
<script src="{{asset ('frontend/js/jquery.isotope.min.js') }}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{asset ('frontend/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script> 
<script type="text/javascript" src="{{asset ('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
<script src="{{asset ('frontend/js/main.js') }}"></script> 
<!-- begin map script--> 
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script> 
<script type="text/javascript">
/*==========  Map  ==========*/
var map;
function initialize_map() {
if ($('#map').length) {
	var myLatLng = new google.maps.LatLng(-37.814199, 144.961560);
	var mapOptions = {
		zoom: 17,
		center: myLatLng,
		scrollwheel: false,
		panControl: false,
		zoomControl: true,
		scaleControl: false,
		mapTypeControl: false,
		streetViewControl: false
	};
	map = new google.maps.Map(document.getElementById('map'), mapOptions);
	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		tittle: 'Envato',
		icon: './images/map-locator.png'
	});
} else {
	return false;
}
}
google.maps.event.addDomListener(window, 'load', initialize_map);
</script>
</body>
</html>