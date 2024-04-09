  
@extends('frant.include.include')
@section('content')

<style>
    .shop-default-banner {
        padding: 9.4em 8.7em 9.6em !important;
    }
   .checkbox_filter {
        height: 18px;
        width: 18px;
        margin-right: 8px;
    }
    li.checkbox_filter_li {
        display: flex;
        align-content: center;
        margin-bottom: 10px;
    }
    li.checkbox_filter_li label {
        text-transform: capitalize;
    }
    .checkbox_filter {
        cursor: pointer;
    }
    .checkbox_filter_li label {
        cursor: pointer;
    }
    
    .checkmark:after {
      left: 7px;
      top: 2px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
    .checkmark_box input:checked ~ .checkmark:after {
      display: block;
    }
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }
    .checkmark_box input:checked ~ .checkmark {
      background-color: #9a2948;
    }
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 18px;
      width: 18px;
      background-color: #fff;
      border: 1px solid #999;
      border-radius: 2px;
    }
    
    .checkmark_box input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 18px;
        width: 18px;
        left: 0px;
        z-index: 99999;
    }
    .checkmark_box {
      display: block;
      position: relative;
      padding-left: 25px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .checkbox_filter_li label {
        line-height: 20px;
    }
    
</style> 

  
  
                                 
  
        <!-- Start of Main -->
        <main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li style="text-transform: capitalize;">{{ $data->title}}</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb-nav -->

            <div class="page-content mb-10">
                <div class="container">
                    <!-- Start of Shop Content -->
                    <div class="shop-content row gutter-lg">
                        <!-- Start of Sidebar, Shop Sidebar -->
                        <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                            <!-- Start of Sidebar Overlay -->
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                            <!-- Start of Sidebar Content -->
                            <div class="sidebar-content scrollable">
                                <!-- Start of Sticky Sidebar -->
                                <div class="sticky-sidebar">
                                    <div class="filter-actions">
                                        <label>Filter :</label>
                                        <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                    </div>
                                    <!-- Start of Collapsible widget -->
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><span>All Categories</span></h3>
                                        <ul class="widget-body filter-items search-ul">
                                            
                                            @foreach ($category as $val)
                                                    <li>
                                                        <a style=" text-transform: capitalize; " href="{{ url('category') }}/{{ $val->slug }}"> {{ $val->title }} </a>
                                                    </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                    <!-- End of Collapsible Widget -->
                                    
                                    <!-- Start of Collapsible Widget -->
                                @foreach (App\Models\Attributes::get() as $val)
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title"><span>{{ $val->name }}</span></h3>
                                        <ul class="widget-body filter-items item-check mt-1">
                                            @foreach (App\Models\AttributesValue::get()->where('attributes_id' , $val->id ) as $dataa)
                                                <li class="checkbox_filter_li" >
                                                    <div class="checkmark_box" >
                                                        <input class="checkbox_filter" type="checkbox" id="aa_{{ $dataa->name }}" name="aa_{{ $dataa->name }}" value="aa_{{ $dataa->name }}" >
                                                        <span class="checkmark"></span>
                                                    </div>
                                                    <label  for="aa_{{ $dataa->name }}"> {{ $dataa->name }} </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                               
                                    <!-- End of Collapsible Widget -->
                                </div>
                                <!-- End of Sidebar Content -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </aside>
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Main Content -->
                        <div class="main-content">
                            <!-- Start of Shop Banner -->
                            <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs" style="background-image: url( {{ asset('uploads')}}/{{ $data->banner_image }}); background-color: #FFC74E;">
                                <div class="banner-content">
                                    <h4 class="banner-subtitle font-weight-bold" style="text-transform: capitalize;" >{{ $data->title }}</h4>
                                </div>
                            </div>
                            <!-- End of Shop Banner -->

                            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                <div class="toolbox-left">
                                    <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                        btn-icon-left d-block d-lg-none"><i
                                            class="w-icon-category"></i><span>Filters</span></a>
                                    <div class="toolbox-item toolbox-sort select-box text-dark">
                                        <label>Sort By :</label>
                                        <select name="orderby" class="form-control">
                                            <option value="default" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by latest</option>
                                            <option value="price-low">Sort by pric: low to high</option>
                                            <option value="price-high">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show select-box">
                                        <select name="count" class="form-control">
                                            <option value="9">Show 9</option>
                                            <option value="12" selected="selected">Show 12</option>
                                            <option value="24">Show 24</option>
                                            <option value="36">Show 36</option>
                                        </select>
                                    </div>
                                </div>
                            </nav>
                            <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                                @if(!empty($selected_products) && $selected_products->count())
                                    <?php foreach($selected_products as $key => $val){ ?>
                                        <div class="product-wrap" >
                                            <?= single_item($val['id']); ?>
                                        </div>
                                    <?php } ?>
                                @else
                                    <h3> Product Not Found </h3>
                                @endif
                            </div>
                            
                            {!! $selected_products->links() !!}

                            <!--<div class="toolbox toolbox-pagination justify-content-between">-->
                            <!--    <p class="showing-info mb-2 mb-sm-0">-->
                            <!--        Showing<span>1-12 of 60</span> Products-->
                            <!--    </p>-->
                            <!--    <ul class="pagination">-->
                            <!--        <li class="prev disabled">-->
                            <!--            <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">-->
                            <!--                <i class="w-icon-long-arrow-left"></i>Prev-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--        <li class="page-item active">-->
                            <!--            <a class="page-link" href="#">1</a>-->
                            <!--        </li>-->
                            <!--        <li class="page-item">-->
                            <!--            <a class="page-link" href="#">2</a>-->
                            <!--        </li>-->
                            <!--        <li class="next">-->
                            <!--            <a href="#" aria-label="Next">-->
                            <!--                Next<i class="w-icon-long-arrow-right"></i>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                        </div>
                        <!-- End of Main Content -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
        </main>
        <!-- End of Main -->
        
@endsection