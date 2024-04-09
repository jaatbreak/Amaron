<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('')}}assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('')}}assets/images/favicon.png" type="image/x-icon">
    <title>viho - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/animate.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/chartist.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/prism.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{asset('')}}assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  </head>
  <body>

<section>         
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <div class="login-card" style="flex-direction: column;">
                   <div>
                    @foreach (array_slice(getpostcontent_only_field(1),0, 1) as $val)
                      <img style="width: 200px; margin-bottom: 30px;" src="{{ asset('uploads') }}/{{ $val->admin_login_logo }}" >
                    @endforeach
                  </div> 
              <form class="theme-form login-form" method="POST" >
              @csrf
                <h4 class="mt-2 mb-3" >Login</h4>
                <!--<h6 class="mt-2" >Welcome back! Log in to your account.</h6>-->
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="email" name="email"  placeholder="Enter Your Email">
                    @error('email')
                      <div class="messsage_login w-100 text-right text-danger pt-2" style="text-align: right;">  <span> {{ $message }} </span></div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="password"  placeholder="Enter Your Password">
                    <div class="show-hide"><span class="show"></span></div>
                    @error('password')
                      <div class="messsage_login w-100 text-right text-danger pt-2" style="text-align: right;" > <span> {{ $message }} </span></div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <a  style="padding-bottom: 10px;" class="link" href="#">Forgot password?</a>
                </div>
                <div class="form-group">
                  <button style="width: 100%; padding: 10px 0px;" class="btn btn-primary btn-block" type="submit">Login</button>
                </div>
                <div class="login-social-title">
                    <div style=" display: flex; justify-content: center; ">
                        <p style="    background-color: #fff; margin-top: -3px; color: #5a5e66; font-weight: 500;" >New to Amaron Shop</p>  
                    </div>              
                </div>
               
               <div style="margin-top: 30px; text-align: center; border: solid 1px #24695c; padding: 11px 0px" >
                    <a style="font-weight: 500;" href="{{ route('supplier_register') }}"> Create your supplier account </a>
               </div> 
               
                <!-- <div class="form-group">
                  <ul class="login-social">
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram">                  </i></a></li>
                  </ul>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="{{asset('')}}assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="{{asset('')}}assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{asset('')}}assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('')}}assets/js/sidebar-menu.js"></script>
    <script src="{{asset('')}}assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('')}}assets/js/bootstrap/popper.min.js"></script>
    <script src="{{asset('')}}assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('')}}assets/js/chart/chartist/chartist.js"></script>
    <script src="{{asset('')}}assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="{{asset('')}}assets/js/chart/knob/knob.min.js"></script>
    <script src="{{asset('')}}assets/js/chart/knob/knob-chart.js"></script>
    <script src="{{asset('')}}assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="{{asset('')}}assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="{{asset('')}}assets/js/prism/prism.min.js"></script>
    <script src="{{asset('')}}assets/js/clipboard/clipboard.min.js"></script>
    <script src="{{asset('')}}assets/js/counter/jquery.waypoints.min.js"></script>
    <script src="{{asset('')}}assets/js/counter/jquery.counterup.min.js"></script>
    <script src="{{asset('')}}assets/js/counter/counter-custom.js"></script>
    <script src="{{asset('')}}assets/js/custom-card/custom-card.js"></script>
    <script src="{{asset('')}}assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="{{asset('')}}assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <script src="{{asset('')}}assets/js/dashboard/default.js"></script>
    <script src="{{asset('')}}assets/js/notify/index.js"></script>
    <script src="{{asset('')}}assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="{{asset('')}}assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="{{asset('')}}assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('')}}assets/js/script.js"></script>
    <script src="{{asset('')}}assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    
    <script>
      @if(Session::has('logout'))
      iziToast.success({
              title: 'success',
              message: '{{Session::get('logout')}}',
              position: 'topRight',
          });
      @endif
      </script>
      
          
    <script>
      @if(Session::has('status'))
      iziToast.success({
              title: 'success',
              message: '{{Session::get('status')}}',
              position: 'topRight',
          });
      @endif
    </script>
          
    <script>
      @if(Session::has('register'))
      iziToast.success({
              title: 'success',
              message: '{{Session::get('register')}}',
              position: 'topRight',
          });
      @endif
    </script>
      

    </body>
    </html>


   