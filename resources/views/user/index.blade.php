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
            <h1>Todos los usuarios</h1>
            <form action="{{route('user.all')}}" method="GET">
                <div class="row">
                    <div class="form-group col">
                        <input type="text" id="search" name="search" class="form-control">
                    </div>
                    <div class="form-group col">
                        <input type="submit" value="Buscar" class="btn btn-success">
                    </div>
                </div>
            </form>
            <hr>
            @foreach($users as $user)
            <div>
                <div class="col-md-4">
                    @if($user->image)
                    @include('includes.avatar')
                    @endif
                </div>
                <div class="col-md-8">
                    <h2 style="font-size: 100%; ">{{'@'.$user->username}}</h2>
                    <h3 style="font-size: 100%; ">{{$user->name}} {{$user->surname}}</h3>
                    <p style="font-size: 90%; ">Se unio hace {{\FormatTime::LongTimeFilter($user->created_at)}}</p>
                    <a href="{{route('profile', ['id'=> $user->id])}}" class="btn btn-success">Ver Perfil</a>
                </div>
            </div>
            <hr>
            @endforeach

            <div class="card text-center">
                <div class="text-center">
                    <div class="card-body"> {{$users->render()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection