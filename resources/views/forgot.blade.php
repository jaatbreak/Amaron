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
    <title>Vendor Panel: dashboard</title>
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
      <div class="container-fluid"> 
        <div class="row m-0 justify-content-center">
         
          <div class="col-xl-5 p-0"> 
            <div class="login-card">
              <form class="theme-form login-form"  method="POST" enctype="multipart/form-data" >
                @csrf
                <h4>Forgot Your Password</h4>
                <h6>Enter Your Email Id We Are Send A Change Password Link</h6>
                <div class="form-group">
                  <label>Your Email</label>
                  <div class="small-group">
                    <div class="input-group">
                      <span class="input-group-text">
                      <i class="icon-email"></i>
                    </span>
                      <input class="form-control"  name="email" type="email" autocomplete="off" placeholder=" Email">
                      @error('email')
                        <span style=" display: block !important; width:100%" class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              
              

                <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" style="color: #000 !important;"  for="checkbox1">Agree with <span> <a href="{{url('')}}/privacy-policy" >Privacy Policy </a></span></label>
                  </div>
                </div>
                <div class="form-group">
                  <button style="width: 100%; padding: 10px 0px;" class="btn btn-primary btn-block" type="submit" >Submit</button>
                </div>
                
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
      @if(Session::has('success'))
      iziToast.success({
              title: 'success',
              message: '{{Session::get('success')}}',
              position: 'topRight',
          });
      @endif
      @if(Session::has('danger'))
      iziToast.error({
              title: 'Failed',
              message: '{{Session::get('danger')}}',
              position: 'topRight',
          });
      @endif
      </script>

    </body>
    </html>


   