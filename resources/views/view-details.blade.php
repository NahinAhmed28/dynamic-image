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




@endsection
