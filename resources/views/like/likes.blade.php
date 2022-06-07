@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Tus likes</h1>
            <hr>
            @foreach($likes as $like)
            @include('includes.image', ['image'=>$like->image])
            @endforeach
            <!-- paginacion -->
            <div class="card text-center">
                <div class="text-center">
                    <div class="card-body"> {{$likes->render()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection