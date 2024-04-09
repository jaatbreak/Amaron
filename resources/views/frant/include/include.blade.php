
            @include('frant.include.header')
            <style>
                @media only screen and (max-width: 600px) {

figure.product-media {
    height: 155px;
    object-fit: cover;
}
}
            </style>
            @yield('content')
            @include('frant.include.footer')
 