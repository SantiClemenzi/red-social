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
            @foreach($images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach

            <div class="card text-center">
                <div class="text-center">
                    <div class="card-body"> {{$images->render()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection