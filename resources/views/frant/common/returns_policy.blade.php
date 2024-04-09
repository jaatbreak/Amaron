@extends('frant.include.include')
@section('content')

<div class="page-header" style="height: 180px;">
    <div class="container">
        <h1 class="page-title mb-0">{{ $title }}</h1>
    </div>
</div>

<div class="container mt-10 mb-7">
    @foreach (array_slice(getpostcontent_only_field(18),0, 1) as $val)
        <?= $val->text ?>
    @endforeach 
</div>

@endsection