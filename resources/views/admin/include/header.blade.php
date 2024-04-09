<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('') }}assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/animate.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/chartist.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/prism.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/vector-map.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/select2.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">


    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/new_css.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">



    <style>
        table.dataTable thead>tr>th:before {
            opacity: .6;
            margin-bottom: 10px;
        }

        input.form-check-input.switch_width {
            width: 40px;
            margin: auto;
            margin-left: 18px;
            height: 17px;
        }

        div.dataTables_wrapper div.dataTables_length select {
            padding: 0px 20px;
        }

        .image_upload img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
            background-color: #eff7ff;
            border: solid 1px #b0b0b0;
        }

        #cke_editor1 {
            border: solid 1px #e6edef;
        }


        .product_veriant_box_header {
            background: #d3e1de;
            padding: 5px 15px;
        }

        .list_form {
            padding: 15px 15px;
            background-color: #fff;
        }

        .list_header {
            display: flex;
            justify-content: space-between;
        }

        .mix_use_varint_po {
            padding: 5px 10px;
        }

        span.delete_list {
            padding: 6px 11px;
            background: #2c323f;
            border-radius: 57px;
            cursor: pointer;
            display: inline-block;
            margin-right: 5px;
        }

        span.delete_list i {
            color: #fff;
        }

        span.toggle_expend {
            padding: 6px 11px;
            background: #2c323f;
            border-radius: 57px;
            cursor: pointer;
            display: inline-block;
        }

        .toggle_expend i {
            color: #fff;
        }

        .action_att_list {
            padding-top: 10px;
        }
        .form_rerpeater {
            background-color: aliceblue;
            padding: 20px 20px;
            border: solid 1px #000;
            margin-top: 20px;
        }
        .add_to_do_list {
            background: #24695c;
            width: 30px;
            height: 30px;
            margin: 6px auto;
            border-radius: 100%;
            text-align: center;
            fill: #fff;
            padding-top: 3px;
        }
        .remove {
            background: #ff5722;
            width: 30px;
            height: 30px;
            margin: 0px auto !important;
            border-radius: 100%;
            text-align: center;
            color: #fff;
            font-size: 34px;
            line-height: 26px;
            font-weight: 400;
            margin-top: 19px !important;
        }
        .dt-buttons {
            display: inline-block;
        }
        .approve_action_n:hover {
            color: #fff;
        }
        .approve_action_n {
            background: #24695c;
            width: 57px;
            display: block;
            color: #fff;
            text-align: center;
            border-radius: 15px;
            padding: 3px;
            font-weight: bold;
            margin: auto;
        }
        a.approve_action {
            background: #ff1c04;
            width: 57px;
            display: block;
            color: #fff;
            text-align: center;
            border-radius: 15px;
            padding: 3px;
            margin: auto;
        }
        .dataTables_wrapper .dataTables_filter input[type="search"] {
            border: 1px solid #797979 !important;
        }
    </style>
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/js/image-cropper/ijaboCropTool.min.css">
</head>

<body>
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper">
                        <a href="#">
                            <h2 class="fw-bold">
                                @foreach (array_slice(getpostcontent_only_field(1),0, 1) as $val)
                                    <img class="" style="width: 140px;" src="{{ asset('uploads') }}/{{ $val->header_logo }}" alt="">
                                @endforeach
                            </h2>
                        </a>
                    </div>
                    <div class="dark-logo-wrapper">
                        <a href="#">
                            {{-- <img class="img-fluid" src="{{ asset('') }}assets/images/logo/dark-logo.png"
                                alt=""> --}}
                                <h2>Ait</h2>         
                        </a>
                    </div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                            id="sidebar-toggle"></i></div>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li class="onhover-dropdown p-0">
                            <form method="POST" action="{{ route('admin/logout') }}">
                                @csrf
                                <button class="btn btn-primary-light" type="submit"><a><i
                                            data-feather="log-out"></i>Log out</a></button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">