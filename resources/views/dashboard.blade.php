@extends('layouts.app')
@section('section_title')

@endsection
@section('content')
@include('components.project')
{{--@php--}}
{{--$images = DB::table('images')->get();--}}
{{--$title = DB::table ('titles')->get();--}}
{{--@endphp--}}
<style media="screen">
    .btn-info {
        background: #07644f !important;
        color: #fff !important;
        background-color: #07644f;
        border-color: #07644f;
        box-shadow: 0 10px 20px -10px #07644f;
    }
</style>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (Session::has('danger'))
<div class="alert alert-danger">
    {{ session('danger') }}
</div>
@endif
<div class="row layout-top-spacing">
    @forelse ($images as $image)
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12"  style="margin-left: 50px">
        <div class="card component-card_9">
            <img src="{!! asset('uploads') !!}/{{ $image->image }}" class="card-img-top" alt="widget-card-2">
            <div class="card-body">
                <p class="meta-date">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</p>
{{--                <h5 class="card-title">{{ $image->titles->title }}</h5>--}}
                <div class="meta-info">

                    <a href="{{ route('view-details',[$image->id]) }}" title="Edit">
                        <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#viewDetails{{ $loop->index }}" name="button">View Details</button>
                     </a>
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 layout-spacing">
        <div class="card component-card_9">
            <div class="card-body">
                <h5 class="card-title">No Images Found</h5>
                <div class="meta-info">
                    <a href="#" type="button" class="btn btn-block btn-info" name="button" data-toggle="modal" data-target="#zoomupModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add New Images</a>
                </div>
            </div>
        </div>
    </div>
 @endforelse
</div>
@endsection
