@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    @if($image->user->image)
                    @include('includes.avatar')
                    <!-- <img src="{{ route('getImage', ['filename'=>$image->user->image]) }}" class="rounded-10" style="width: 35px;" alt="Avatar" /> -->
                    @endif
                    {{$image->user->username}}
                </div>
                <div class="card-body" style="padding: 0px; border: 0px;">
                    <div class="card" style="width: 100%;">
                        <img src="{{ route('image.file', ['filename'=>$image->image_path]) }}" alt="" class="card-img-top">
                    </div>

                    <div class="likes" style="margin: 2%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                    </div>

                    <div class="description" style="padding: 1%;">
                        <strong>{{'@'.$image->user->username}} || {{\FormatTime::LongTimeFilter($image->created_at)}}</strong>
                        <p>
                            {{$image->description}}
                        </p>
                    </div>
                    <div style="margin: 1%;">
                        <a href="#" class="btn btn-warning">Comentarios {{count($image->comments)}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection