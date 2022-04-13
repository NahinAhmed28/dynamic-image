@extends('layouts.app')
@section('section_title')

@endsection
@section('content')
    @include('components.project')

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


<div id="viewDetails{{ $loop->index }}" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                {{--                    <h5 class="modal-title">{{ $image->titles->title }}</h5>--}}
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
{{--                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQMKfbC00NRDjIJcWjA6Y3PcAwcvqXDT2qVg&usqp=CAU" width="400px" class="">--}}
                            </div>
                            <div class="">
                                {{--                                    <h4>{{ $image->title }}</h4>--}}
                                <p class="meta-time-date">{{ \Carbon\Carbon::parse($image->created_at)->diffForHumans() }}</p>


                                    <div class="card-body">

                                        <figure>
                                            <figcaption>Title </figcaption>
                                            <ul class="tree">

                                                <li>
                                                    <span> {{$image->titles->title}} </span>
                                                    <ul>
                                                        <li>
                                                            <span> sub title 1</span>
                                                            <ul>
                                                                <li> <span> child title 1 1</span></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span>sub title 2</span>
                                                            <ul>
                                                                <li> <span> child title 2 1</span></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </figure>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        <p>
                            Note: {!! $image->notes !!}
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


@endsection
