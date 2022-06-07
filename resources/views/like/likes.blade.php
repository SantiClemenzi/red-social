@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Tus likes</h1>
            @foreach($likes as $like)
            @include('includes.image', ['image'=>$like->image])
            @endforeach

        </div>
    </div>
</div>
@endsection