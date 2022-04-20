@extends('layouts.app')
@section('section_title')

@endsection
@section('content')
    @include('components.project')
    @php
        $images = \App\Models\Image::all();
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
            <div class=" col-sm-4 col-12 " >
                <div class="card component-card_9 " >
                    <img src="{!! asset('uploads') !!}/{{ $image->image }}" class="card-img-top" alt="widget-card-2">
                    <div class="card-body">
                        <p class="meta-date">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</p>
{{--                        <h5 class="card-title">{{ $image->services->titles->title }}</h5>--}}
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
{{--                            <h5 class="modal-title">{{ $image->title }}</h5>--}}
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
                                                {{--<h4>{{ $image->title }}</h4>--}}

                                            <div class="">



                                                <div class="timeline-simple">


                                                    <div class="timeline-list">
                                                        <p class="meta-time-date">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</p>

                                                        @foreach($image->services as $services)
                                                        <div class="timeline-post-content">
                                                            <div class="user-profile">
                                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQC4rqDPYVkaiMjB6NYIrLlppfONKyFfRovedv6fLICm_hLfQ43JFMcj56EDQuSW6FUze8&usqp=CAU" class="">
                                                            </div>
                                                            <div class="">
                                                                <h4>{{$services->title->title}}</h4>
                                                                <p class="meta-time-date">{{$services->serviceName}}</p>
                                                                @foreach($services->title->subtitles as $subtitles)
                                                                <div class="">
                                                                    <svg> ... </svg>
                                                                    <h6 class="">{{$subtitles->subtitle}}</h6>
                                                                    @foreach($subtitles->childtitles as $childtitle)
                                                                        <ul>
                                                                            <li>
                                                                    {{$childtitle->childTitle}}
{{--                                                                    <div class="post-contributers">--}}
{{--                                                                        <img src="#" class="">--}}
{{--                                                                        child class--}}
{{--                                                                    </div>--}}
                                                                            </li>
                                                                        </ul>
                                                                    @endforeach
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

{{--                                                    <figure>--}}
{{--                                                        <figcaption>Service:  </figcaption>--}}

{{--                                                        <ul class="tree">--}}

{{--                                                            <li>--}}
{{--                                                                <span> {{ $image->services->services }}  </span>--}}

{{--                                                                <ul>--}}
{{--                                                                    @isset($image->services->titles->subtitles)--}}
{{--                                                                    @foreach( $image->services->titles->subtitles as $sub)--}}

{{--                                                                    <li>--}}
{{--                                                                        <span>  {{$sub->subtitle }} </span>--}}

{{--                                                                        <ul>--}}
{{--                                                                            @isset($sub->childtitles)--}}
{{--                                                                            @foreach($sub->childtitles as $child)--}}
{{--                                                                            <li> <span> {{$child->childTitle}}</span></li>--}}
{{--                                                                            @endforeach--}}
{{--                                                                            @endisset--}}
{{--                                                                        </ul>--}}
{{--                                                                    </li>--}}

{{--                                                                    @endforeach--}}
{{--                                                                    @endisset--}}
{{--                                                                </ul>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </figure>--}}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container mt-5">
                                    <div class="row">
                                        <p>
                                            {{$image->services->title->notes}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <a href="{!! route('image.delete', $image->id) !!}" class="btn btn-danger">Delete</a>
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
@push('scripts')
    <script type="text/javascript" >


    </script>
@endpush

