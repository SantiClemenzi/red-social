@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div >
                <div class="col-md-4">
                    @if($user->image)
                    @include('includes.avatar')
                    @endif
                </div>
                <div class="col-md-8">
                    <h1 style="font-size: 100%; ">{{'@'.$user->username}}</h1>
                    <h2 style="font-size: 100%; ">{{$user->name}} {{$user->surname}}</h2>
                    <p  style="font-size: 90%; ">Se unio hace {{\FormatTime::LongTimeFilter($user->created_at)}}</p>
                </div>
            </div>
            <hr>
            @foreach($user->images as $image)
            @include('includes.image', ['image'=>$image])
            @endforeach

            <div class="card text-center">
                <div class="text-center">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection