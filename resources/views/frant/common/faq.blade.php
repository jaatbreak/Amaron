@extends('frant.include.include')
@section('content')

<div class="page-header" style="height: 180px;">
    <div class="container">
        <h1 class="page-title mb-0">{{ $title }}</h1>
    </div>
</div>


<div class="container mt-10 mb-7">


    <div class="row">
        <div class="col-md-12 mb-12">
            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                @foreach (getpostcontent_only_field(20) as $key => $val)
                    <div class="card">
                        <div class="card-header">
                            <a href="#collapse1-2" class="expand">{{ $val->title }}</a>
                        </div>
                        <div id="collapse1-2" class=" card-body collapsed {{ $key++ }}">
                            <p class="mb-0"><?= $val->desc ?></p>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </div>

</div>

@endsection