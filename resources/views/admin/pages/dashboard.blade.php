@extends('admin.include.include')
@section('content')
    

<div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Amaronshop /</span> Admin Dashboard
</h4>

<!-- Card Border Shadow -->
<div class="row">
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-primary">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-truck ti-md"></i></span>
          </div>
          <h4 class="ms-1 mb-0">
                <?= App\Models\Product::count(); ?>
              </h4>
        </div>
        <p class="mb-1"><a href="<?= url('admin/product') ?>">Total Products</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-warning">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-alert-triangle ti-md"></i></span>
          </div>
          <h4 class="ms-1 mb-0"><?= App\Models\Category::count(); ?></h4>
        </div>
        <p class="mb-1"><a href="<?= url('admin/product/category') ?>">Total Category</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-danger">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-git-fork ti-md"></i></span>
          </div>
          <h4 class="ms-1 mb-0"> <?= App\Models\Checkout::count(); ?></h4>
        </div>
        <p class="mb-1"><a href="<?= url('admin/order') ?>">Total Orders</a></p>
      </div>
    </div>
  </div>
  
</div>
<!--/ Card Border Shadow -->




          </div>
          <!-- / Content -->

          
          

          
          
          <div class="content-backdrop fade"></div>
        </div>



    <script>
        @if (Session::has('status'))
            iziToast.success({
                title: 'success',
                message: '{{ Session::get('status') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
