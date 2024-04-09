<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/wolmart/demo12.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Jan 2023 15:46:36 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Online Shopping Site for Fashion, Electronics, Home &amp; More | amaron shop</title>
    <meta name="google-site-verification" content="rtszPihdhqEsUI8BpbqpjiXAoRcovxiQO68vogW9FeE" />
    <meta name="keywords" content="amaronshop,reseller,products,reselling" />
    <meta name="description" content="Online Shopping &amp; Reselling site in India - Buy &amp; Sell best quality Fashion, Electronics, Home &amp; Kitchen products at lowest prices. ✔ Free Delivery ✔ Easy Returns ✔ Earn Money Online">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('') }}frantend/assets/images/icons/favicon.png">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800', 'Jost:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset('') }}frantend/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ asset('') }}frantend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('') }}frantend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('') }}frantend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('') }}frantend/assets/fonts/wolmart87d5.ttf?png09e" as="font" type="font/ttf" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/vendor/fontawesome-free/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" href="https://shiprocket.co/post_order/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://shiprocket.co/post_order/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://shiprocket.co/post_order/css/style.css?v=5.11">
    <link rel="stylesheet" href="https://shiprocket.co/post_order/css/responsive.css?v=5.11">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}frantend/assets/css/demo12.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    
    <link rel="manifest" href="{{ asset('') }}frantend/assets/logopwa/manifest.json">
    <pwa-install id="pwa-install" manifest-url="{{ asset('') }}frantend/assets/logopwa/manifest.json"></pwa-install>

</head>

<style>

    .header-middle.sticky-content.fix-top.sticky-header.border-no {
        background-color: #ffffff;
        margin-bottom: 25px;
    }
    
    .tab-content > .active {
        padding-left: 10px;
        padding-right: 10px;
    }
    
    body {
        background: #eeeeee36;
    }

    figure.product-media img {
    object-fit: contain;
    }
    
    figure.product-media {
        height: 300px;
        object-fit: cover;
    }

    .account span {
        display: flex;
        margin-left: 15px;
    }
    .account span {
        color: #9a2948;
    }
    .account .w-icon-account {
        color: #9a2948;
        border: 1px solid #9a2948;
        width: 4.3rem;
        height: 4.3rem;
        font-size: 2rem;
    }
    .account b {
        color: #9a2948;
    }

    .cart-dropdown .products {
        max-height: 100% !important;
    }
    .product-simple:hover .product-price {
        visibility: unset !important;
        opacity: 1 !important;
    }
    .price_off{
        float: right;
        font-size: 12px !important;
        padding-top: 6px;
        color: #9a2948;
    }
    .header-middle {
        padding-top: 1.2rem !important;
    }
    .product-media {
        height: auto;
        object-fit: contain;
    }
    .product-media img {
        height: 100%;
        object-fit: contain;
    }
    @media only screen and (max-width: 991px) {
        .header-top {
            display: none;
        }
        .product-media {
            height: auto;
            object-fit: contain;
        }
        .header-search{
            display: none !important;
        }
    }
    
    .mobai_serch{
        display: none;
    }
    
    .download_app{
        display:none;
    }
    
    @media only screen and (max-width: 767px) {
        .mobai_serch {
            border: solid 1px #264b63;
            width: 95%;
            margin: auto;
            display: flex;
            margin-bottom: 30px;
            height: 43px;
            display: flex;
            align-items: center;
        }
        .mobai_serch btn{
            border: none;
            outline: 0px;
            display: block;
        }
        .product-image-gap .product-details {
            padding: 1rem 0rem 0rem !important;
        }
            
        .header-middle {
            padding-bottom: 10px !important;
        }
        .product-image-gap {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .product-price .old-price {
            font-size: 11px;
        }
        .download_app{
            display:flex ;
        }
       
    }
    .become_seller {
            position: fixed;
    top: 66px;
    right: 0;
    z-index: 11;
    background: #264b63;
    border-radius: 10px 0px 0px 10px;
    }
    .become_seller a{
        color:#fff;
         padding: 10px 18px;
             display: inline-block;
    }
   
    
</style>
<style>
      @font-face {
        font-family: 'SFProRegular';
        src: url('https://shiprocket.co/post_order/fonts/SF-Pro-Display-Regular.otf') format('truetype');
        font-weight: normal;
        font-style: normal;
      }

      /* ../../../../post_order/fonts/SF-Pro-Display-Regular.otf */
      @font-face {
        font-family: 'SFProSemibold';
        src: url('https://shiprocket.co/post_order/fonts/SF-Pro-Display-Semibold.otf') format('truetype');
        font-weight: bold;
        font-style: normal;
      }

      @font-face {
        font-family: 'SFProMedium';
        src: url('https://shiprocket.com/post_order/fonts/SF-Pro-Display-Medium.otf') format('truetype');
        font-weight: medium;
        font-style: normal;
      }

      @font-face {
        font-family: 'SFProBold';
        src: url('https://shiprocket.co/post_order/fonts/SF-Pro-Display-Bold.otf') format('truetype');
        font-weight: medium;
        font-style: normal;
      }

      @media (max-width: 480px) {
        .mb-ph {
          margin-bottom: 6px;
        }

        .cta_btn_wrap button {
          text-wrap: nowrap;
          width: 30%;
        }
      }

      @media (max-width: 390px) {
        .recommend_info .pagination li a {
          width: 20px;
          height: 20px;
          font-size: 11px !important;
          padding: 2px;
        }

        .dsk_pd_right {
          padding-right: 3px;
        }
      }

      .inner_page .hp_cards_info h5 {
        border-bottom: 1px solid #e3e6e8;
      }

      .delievery_status {
        border-bottom: 1px solid #e3e6e8 !important;
      }

      @media (min-width: 968px) {
        .nps_rating li {
          margin-right: 10px !important;
        }

        .nps_rating li:last-child {
          margin-right: 0 !important;
        }
      }

      .otp-btn {
        background-color: #2960db !important;
        font-size: 15px !important;
        font-family: 'SFProRegular' !important;
      }

      .dsk_pd_right {
        padding-right: 6px;
      }

      @media screen and (max-width:820px) {
        .otp-btn {
          font-size: 12px !important;
          margin-bottom: 0 !important;
        }
      }

      .courier_logo {
        background-position: center center;
        border-radius: 0;
      }

      .recommend_info {
        padding: 18px 16px 18px;
      }

      .tracking-hint {
        display: flex;
        margin-inline: 36px;
        gap: 10px;
        padding: 6px 0px 0px 10px;
        margin-top: 12px;
        background: #F0B74A0D 0% 0% no-repeat padding-box;
        border: 1px solid #F0B74A33;
      }

      .sfproBold {
        font-family: 'SFProBold' !important;
      }

      .SFProMedium {
        font-family: 'SFProMedium' !important;
      }

      .tracking-hint p {
        /* font: normal normal normal 12px/21px SF Pro;
        letter-spacing: -0.24px; */
        color: #292929;
        max-width: 589px;
      }

      .mytooltip {
        position: relative;
        display: inline-block;
      }

      #map {
        height: 200px;
      }

      #map-canvas {
        height: 400px;
      }

      .pt-0 {
        padding-top: 0px;
      }

      ul.pagination.nps_courier_rating {
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-between;
        align-items: center;
        align-content: center;
        display: inline-flex;
        margin-bottom: 25px;
        width: 100% !important;
        /* padding: 0px 18px; */
        padding-bottom: 20px
      }

      .recommend_info .pagination li .courier {
        display: block !important;
        text-align: center !important;
        -webkit-transition: width 0.3s !important;
        transition: width 0.3s !important;
        border: 0px !important;
        height: 65px !important;
        width: 100%;
        padding: 0px !important;
      }

      /*}*/
      .pagination.nps_courier_rating li {
        width: 100%;
      }

      .pagination.nps_courier_rating img {
        height: 55px;
        display: block;
        margin: 0 auto;
      }

      #nps_courier_form {
        margin-left: 0px;
        padding-left: 0px;
        padding-right: 0px;
      }

      .mytooltip .tooltiptext {
        visibility: hidden;
        width: 140px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 150%;
        left: 50%;
        margin-left: -75px;
        opacity: 0;
        transition: opacity 0.3s;
        font-size: 14px;
      }

      .mytooltip .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
      }

      .mytooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
      }

      a.terms-condition:hover {
        color: inherit;
      }

      .bar {
        /* height: 53px; */
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        padding-inline: 4%;
        padding-block: 1em
      }

      .bar p {
        font-size: 16px;
        text-align: center;
        margin: 0px;
        font-family: 'SFProMedium';
        letter-spacing: 0.54px;
        color: #FFFFFF;
      }

      .bar p a {
        text-decoration: underline;
        font: normal normal medium 18px/43px SF Pro Display;
        letter-spacing: 0.54px;
        color: #FFFFFF;
      }

      .header_bar {
        background: #2960DB 0% 0% no-repeat padding-box;
      }

      .footer_bar {
        background: #D4DFF8 0% 0% no-repeat padding-box;
      }

      .footer_bar p {
        color: #000000;
      }

      .footer_bar p a {
        color: #6E51EC;
      }

      .otp_wrap {
        margin-top: 15px;
      }

      .modal-header .close:hover,
      .modal-header .close:focus {
        border: none;
        outline: none;
      }

      .otp_btn_block button {
        margin-right: 10px;
        margin-left: 10px;
      }

      input#otp_info::-webkit-inner-spin-button,
      input#otp_info::-webkit-outer-spin-button {
        -webkit-appearance: none;
      }

      #otp_info:hover,
      #otp_info:focus {
        -webkit-appearance: none !important;
      }

      @media (max-width: 968px) {
        .recommend_info .pagination li .courier {
          height: 50px !important;
          width: 100% !important;
          font-size: 9px;
        }
      }

      @media (max-width:991px) {
        .pagination.nps_courier_rating img {
          height: 40px;
        }
      }

      .courier_info span:first-child {
        margin-top: 20px;
      }

      @media (max-width: 767px) {
        .mytooltip .tooltiptext {
          width: 70px;
          margin-left: -35px;
          font-size: 12px;
        }

        ul.pagination.nps_courier_rating {
          padding: 0 5px 0 0;
        }

        .banner_section {
          display: flex;
          justify-content: space-between;
        }
      }

      @media (max-width: 968px) {
        .nps_pagination .arrow_wrap_pagination {
          width: 100% !important;
        }
      }

      .recommend_info .nps_disabled {
        min-width: auto;
        padding: 0px 10px;
        width: 100%;
        margin-top: 45px;
      }

      .edd_info_rush {
        width: auto;
      }

      .edd_rush_date {
        color: #0D4BAD;
        font-size: 30px !important
      }

      .edd_text_rush {
        font-size: 15px !important;
      }

      .edd_rush_etd {
        font-size: 20px !important
      }

      .buyer-opt-in {
        height: 474px;
      }

      .buyer-modal {
        background: rgba(0, 0, 0, .5);
        display: flex;
        align-items: center;
      }

      .popup-head {
        padding-bottom: 8px;
        border-bottom: 1px solid lightgrey;
        background-image: url("/post_order/img/buyer_popup/popup_bg.svg");
        background-repeat: no-repeat;
        background-position: left;
        background-size: contain;
      }

      .head-text {
        /* font-family: 'SFProBold'; */
        font-size: 28px;
        line-height: 34px;
        letter-spacing: 0px;
        margin-bottom: 4px !important;
        margin-top: 0px !important;
      }

      .head-sub-text {
        /* font-family: 'SFProRegular'; */
        font-size: 14px;
        line-height: 19px;
        letter-spacing: 0px;
        color: #747272;
      }

      .text-purple {
        color: #6E51EC;
      }

      .SFProMedium {
        font-family: 'SFProMedium';
      }

      .SFProSemibold {
        font-family: 'SFProSemibold' !important;
      }

      .SFProRegular {
        font-family: 'SFProRegular';
      }

      .fs-107px {
        font-size: 107px !important;
      }

      .fs-20px {
        font-size: 20px !important;
      }

      .fs-35px {
        font-size: 35px !important;
      }

      .fs-12px {
        font-size: 12px !important;
      }

      .fs-14px {
        font-size: 14px !important;
      }

      .fs-17px {
        font-size: 17px !important;
      }

      .fs-10px {
        font-size: 10px !important;
      }

      .popup-body {
        display: flex;
        align-items: center;
      }

      .content-item {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 12px;
      }

      .content-item h4 {
        /* font-family: 'SFProBold'; */
        font-size: 16px;
        line-height: 18px;
        letter-spacing: -0.27px;
        color: #1F1F1F;
        margin-bottom: 2px;
      }

      .content-item p {
        /* font-family: 'SFProRegular'; */
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0px;
        color: #ffffff;
        margin-top: 12px;
      }

      .btn-buyer {
        margin-top: 8px;
      }

      .btn-buyer p {
        margin-top: 4px !important;
      }

      .btn-buyer .bg-dark-blue {
        padding: 8px 42px;
      }

      .status-css {
        color: #555;
        /* font-family: 'SFProBold' !important; */
        font-size: 14px !important;
      }

      .text-grey {
        color: #707070 !important;
      }

      .fs-12px {
        font-size: 12px !important;
      }

      .mb-10px {
        margin-bottom: 10px;
      }

      .mt-1rem {
        margin-top: 12px;
      }

      .success-popup {
        padding: 24px;
      }

      .success-popup h2 {
        /* font-family: 'SFProBold'; */
        /* font-size: 20px; */
        /* line-height: 20px; */
        letter-spacing: 0.4px;
        color: #ffffff;
      }

      .success-popup p {
        /* font-family: 'SFProRegular'; */
        font-size: 13px;
        line-height: 20px;
        letter-spacing: 0.26px;
        color: #ffffff;
      }

      .btn-later {
        color: #6E51EC;
        font-size: 16px;
        text-decoration: underline;
        cursor: pointer;
      }

      .ulli_border .delievery_list_wrap ul li:not(:last-child) {
        border-bottom: 1px solid #cdc5c5;
      }

      .delievery_list_wrap ul li:last-child {
        padding: 24px 0px 0;
      }

      .add-remarks {
        color: #333 !important;
      }

      .add-remarks:focus-visible {
        outline: 0 !important;
      }

      .add-remarks::placeholder {
        color: #b8b8b8 !important;
        font-family: 'SFProMedium';
        font-size: 12px;
      }

      .otp_input::placeholder {
        color: #b8b8b8 !important;
        font-family: 'SFProMedium';
        font-size: 12px;
      }

      .otp_input {
        background: #f2f2f2 !important;
        border-radius: 10px !important;
        border: none !important;
        box-shadow: none !important;
      }

      .status_green {
        color: #4ebb5b;
        font-size: 38px !important;
        display: inline-block !important;
      }

      .status_red {
        color: #dc403c;
        font-size: 38px !important;
        display: inline-block !important;
      }

      .status_orange {
        font-size: 38px !important;
        display: inline-block !important;
        color: #FDA222;
      }

      .banner_width {
        width: 99% !important;
      }

      @media screen and (max-width:365px) {
        #gmap_canvas {
          width: 87% !important;
        }
      }

      @media screen and (max-width:768px) {
        .banner_width {
          width: 96% !important;
        }

        .status_orange {
          font-size: 20px !important;
        }

        .status_red {
          font-size: 20px !important;
        }

        .status_icon {
          width: 1.75rem !important;
          margin-top: 0 !important;
        }

        .status_green {
          font-size: 20px !important;
        }

        #gmap_canvas {
          width: 87% !important;
        }
      }

      @media (max-width:479px) {
        .circle_icon {
          left: -27px !important;
        }

        .delievery_info li::after {
          left: -20px !important;
        }

        .whatsapp_icon_mobile {
          position: absolute;
          top: 3rem;
          right: 2.5rem;
        }
      }

      @media only screen and (max-width:486px) {
        .trackingid_mobile {
          padding-left: 1.25rem !important;
          width: 100%;
          text-align: left;
        }
      }

      @media (max-width: 820px) {
        .popup-head {
          padding-top: 4px;
          padding-bottom: 4px;
          text-align: center;
        }

        .head-text {
          /* font-family: 'SFProBold'; */
          font-size: 24px;
          line-height: 30px;
        }

        .head-sub-text {
          /* font-family: 'SFProRegular'; */
          font-size: 12px;
          line-height: 18px;
        }

        .content-item h4 {
          font-size: 14px;
          line-height: 16px;
        }

        .content-item {
          margin-bottom: 20px;
          width: 200px;
        }

        .banner_img_mobile {
          display: block !important;
        }

        .banner_img {
          display: none;
        }

        .get-started {
          margin-top: 0px !important;
        }

        .privacy-policy {
          position: absolute !important;
          top: 296px !important;
          left: 42px !important;
        }

        .banner_img_2 {
          margin-left: -20px;
        }

        .content-item p {
          font-size: 14px;
          line-height: 16px;
        }

        /* .banner-img{
        display: none;
    } */
        .buyer-content {
          max-width: 370px !important;
          background: black;
          padding: 24px;
        }

        .success-popup {
          max-width: 324px !important;
        }

        .btn-buyer p,
        a,
        .bg-dark-blue {
          margin-bottom: 4px !important;
          font-size: 12px !important;
          margin-top: 0px !important;
        }
      }

      #gmap_canvas {
        width: 92%;
        height: 260px;
        border-radius: 10px;
        margin: 23px 23px 0px 23px;
      }

      .map-container {
        float: left;
        padding: 0;
        border-radius: 10px;
        margin-bottom: 25px;
      }

      .status_icon {
        width: 3rem;
        margin-top: -8px;
      }
</style>
<body class="home">
    <div class="become_seller"> <a href="{{url('')}}/supplier-register">Become A Seller</a> </div>
    <div class="page-wrapper">
        <!--<h1 class="d-none"> Wolmart - Responsive Marketplace HTML Template</h1>-->
        <!-- Start of Header -->
        <header class="header">
            <!-- End of Header Top -->
            <div class="header-middle sticky-content fix-top sticky-header border-no">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger"></a>
                        <a href="/" class="logo">
                            @foreach (array_slice(getpostcontent_only_field(1),0, 1) as $val)
                                <img src="{{ asset('uploads') }}/{{ $val->header_logo }}" alt="logo" width="200" >
                            @endforeach
                        </a>
                        <form method="get" action="#"
                            class="input-wrapper header-search hs-expanded hs-round d-none d-md-flex">
                            <div class="select-box bg-white">
                                <select id="category" class="text-capitalize" name="category">
                                    <option value="">All Categories</option>
                                    @foreach (getcategory()->slice(0, 11) as $val)
                                    <option class="text-capitalize" value="{{ $val->title }}" >{{ $val->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control bg-white pt-0 pb-0" name="search" id="search"
                                placeholder="Search in..." required />
                            <button class="btn btn-search" type="submit">
                                <i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right">
                        <div class="account align-items-center d-md-show">
                            <a class="login inline-type d-flex ls-normal" href="{{ url('/my-account') }}">
                                <i class="w-icon-account d-flex align-items-center justify-content-center br-50"></i>
                                <span class="flex-column justify-content-center d-xl-show">Hello, @if (!Auth::user()) Sign In @endif @if (Auth::user()) {{Auth::user()->name}} @endif 
                                    <b class="d-block font-weight-bolder ls-50">My Account</b>
                                </span>
                            </a>
                        </div>
                        <!--<a class="wishlist label-down link d-xs-show" href="wishlist.html">-->
                        <!--    <i class="w-icon-heart"></i>-->
                        <!--    <span class="wishlist-label d-lg-show">Wishlist</span>-->
                        <!--</a>-->
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="#" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count text-white">    {{ Cart::getTotalQuantity() }}  </span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div> <?php 
                                            $collection = Cart::getContent();
                                            $sorted = $collection->sort();
                                        ?>
                                <div class="products">
                                    
                                    @foreach ($sorted as $val)
                                        @foreach (\App\Models\Product::where('id',$val->id)->get() as $item)
                                        @inject('commonController', 'App\Http\Controllers\CommonController')

                                        @php
                                        // {{-- PHP code here --}}
                                        $item = $commonController->price_calculate($item);
                                        // print_r($item);
                                        @endphp
                                                <div class="product product-cart">
                                                    <div class="product-detail">
                                                        <a href="#" class="product-name">{{ $item->product_name; }}</a>
                                                        <div class="price-box">
                                                            <span class="product-quantity">{{ $val->quantity }}</span>
                                                            <span class="product-price"> ₹ {{ $item->product_calculate_price }} </span>
                                                                {{-- @if(300 >= $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((8.5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @elseif (500 >=  $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((6 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @elseif (1000 >=  $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @elseif (2000 >=  $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((4.75 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @elseif (3000 >=  $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((4.5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @elseif (4000 >=  $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((4.25 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @elseif (5000 >=  $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((4 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @elseif (10000 >=  $item->product_sale_price)
                                                                <span class="product-price"> ₹ {{ ceil(((3.5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @else
                                                                <span class="product-price"> ₹ {{ ceil(((3 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                                @endif --}}
                                                        </div>
                                                    </div>
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('uploads') }}/{{ $item->product_image }} " alt="product" height="84" width="94">
                                                        </a>
                                                    </figure>
                                                    {{-- <a style=" display: flex; justify-content: center; align-items: flex-end;" href="{{ url('/removecart').'/'.$val->id; }}"  class="btn btn-link btn-close">
                                                        <i class="fas fa-times"></i>
                                                    </a> --}}
                                                </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">₹ <?= Cart::getSubTotal(); ?></span>
                                </div>
                                <div class="cart-action">
                                    <a href="{{ url('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="{{ url('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->
            <form method="get" action="#" class="mobai_serch">
                <input type="text" class="form-control" style="border: none;"  name="search" id="search" placeholder="Search in..." required="">
                <button class="btn btn-search" type="submit" style="border: none;" ><i class="w-icon-search"></i></button>
            </form>
        </header>
        <!-- End of Header -->
