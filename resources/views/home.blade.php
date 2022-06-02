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
            <div class="card">
                <div class="card-header">
                    @if($image->user->image)
                    <img src="{{ route('getImage', ['filename'=>$image->user->image]) }}" class="rounded-10" style="width: 35px;" alt="Avatar" />
                    @endif
                    {{$image->user->username}}
                </div>
                <div class="card-body" style="padding: 0px; border: 0px;">
                    <div class="card" style="width: 100%;">
                        <img src="{{ route('image.file', ['filename'=>$image->image_path]) }}" alt="" class="card-img-top">
                    </div>
                    <div class="description" style="padding: 1%;">
                        <strong>{{'@'.$image->user->username}}</strong>
                        <p>
                            {{$image->description}}
                        </p>
                    </div>
                    <div class="likes"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection