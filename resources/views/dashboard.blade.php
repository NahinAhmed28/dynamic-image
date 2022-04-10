@extends('layouts.app')
@section('section_title')

@endsection
@section('content')
@include('components.project')
@php
$images = DB::table('images')->get();
@endphp
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
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card component-card_9">
            <img src="{!! asset('uploads') !!}/{{ $image->image }}" class="card-img-top" alt="widget-card-2">
            <div class="card-body">
                <p class="meta-date">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</p>
                <h5 class="card-title">{{ $image->title }}</h5>
                <div class="meta-info">
                    <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#viewDetails{{ $loop->index }}" name="button">View Details</button>
                </div>
            </div>
        </div>
    </div>


    <div id="viewDetails{{ $loop->index }}" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $image->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="timeline-simple">
                        <img src="{!! asset('uploads') !!}/{{ $image->image }}" width="750px" alt="{{ $image->image }}">

                        <div class="timeline-list mt-5">
                            <div class="timeline-post-content">
                                <div class="user-profile">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQMKfbC00NRDjIJcWjA6Y3PcAwcvqXDT2qVg&usqp=CAU" width="400px" class="">
                                </div>
                                <div class="">
                                    <h4>{{ $image->title }}</h4>
                                    <p class="meta-time-date">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</p>
                                    <div class="">
                                      @php
                                      $a_title_x_json = json_decode($image->a_title_x);
                                      $a_title_z_json = json_decode($image->a_title_z);
                                      @endphp

                                      <div class="card-body">
{{--                                        {!! $image->desc !!}--}}
                                        <h3>A Title X: </h3>
                                        <hr>
                                        <h4>{{ $a_title_x_json[0] }}</h4>
                                        <ul>
                                          @foreach ($a_title_x_json as $arry)
                                            @if ($loop->index != 0)
                                              <li>
                                                {{  $arry }}
                                              </li>
                                            @endif
                                          @endforeach
                                        </ul>
                                        <hr>
                                        <h3>A Title Z: </h3>
                                        <hr>
                                        <h4>{{ $a_title_z_json[0] }}</h4>
                                        <ul>
                                          @foreach ($a_title_z_json as $arry)
                                            @if ($loop->index != 0)
                                              <li>
                                                {{  $arry }}
                                              </li>
                                            @endif
                                          @endforeach
                                        </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-post-content">
                                <div class="user-profile">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQMKfbC00NRDjIJcWjA6Y3PcAwcvqXDT2qVg&usqp=CAU" width="400px" class="">
                                </div>
                                <div class="">
                                    <h4>{{ $image->sub_title_b }}</h4>
                                    <p class="meta-time-date">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</p>
                                    @php
                                    $b_title_x_json = json_decode($image->b_title_x);
                                    $b_title_z_json = json_decode($image->b_title_z);
                                    @endphp
                                    <div class="">

                                      <div class="card-body">
                                        <h3>B Title X: </h3>
                                        <hr>
                                        <h4>{{ $b_title_x_json[0] }}</h4>
                                        <ul>
                                          @foreach ($b_title_x_json as $arry)
                                            @if ($loop->index != 0)
                                              <li>
                                                {{  $arry }}
                                              </li>
                                            @endif
                                          @endforeach
                                        </ul>
                                        <hr>
                                        <h3>B Title Z: </h3>
                                        <hr>
                                        <h4>{{ $b_title_z_json[0] }}</h4>
                                        <ul>
                                          @foreach ($b_title_z_json as $arry)
                                            @if ($loop->index != 0)
                                              <li>
                                                {{  $arry }}
                                              </li>
                                            @endif
                                          @endforeach
                                        </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5">
                          <div class="row">
                            <p>
                              {!! $image->notes !!}
                            </p>

                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <a href="{!! route('image.delete', $image->id) !!}" class="btn btn-danger">Delete</a>
                </div>
                </form>
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
