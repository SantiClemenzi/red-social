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
                <div class="card-body">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection