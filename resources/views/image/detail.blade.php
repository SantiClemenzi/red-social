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
                    <?php $user_like = false; ?>
                    <div class="like" style="margin: 2%; display: inline-block; text-align: justify;">
                        @foreach($image->like as $like)
                        @if($like->user->id == Auth::user()->id)
                        <?php $user_like = true; ?>
                        @endif
                        @endforeach
                        @if($user_like)
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="btn-like" data-id="{{$image->id}}" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray" class="btn-like" data-id="{{$image->id}}" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                        @endif
                        <p style="color: gray; float: rigth;"> {{count($image->like)}} </p>
                    </div>

                    <div class="description" style="padding: 1%;">
                        <strong>{{'@'.$image->user->username}} || {{\FormatTime::LongTimeFilter($image->created_at)}}</strong>
                        <p>
                            {{$image->description}}
                        </p>
                    </div>
                    @if(Auth::user()->id == $image->user->id)
                    <div class="actions" style="margin-left: 2%;">
                        <a href="#" class="btn btn-warning">Actualizar</a>
                        <a href="{{route('image.delete', ['id'=>$image->id])}}" class="btn btn-danger">Eliminar</a>
                    </div>
                    @endif
                    <div class="clearfix"></div>
                    <div style="margin: 1%;">
                        <h2 class="">Comentarios {{count($image->comments)}}</h2>
                        <form action="{{url('/comment/')}}" method="POST">
                            @csrf
                            <input type="hidden" name="image_id" value="{{$image->id}}">
                            <p>
                                <textarea name="comment" rows="2.5" class="form-control" require></textarea>
                            </p>

                            <input type="submit" value="Enviar" class="btn btn-success">
                        </form>
                        <div class="description" style="padding: 1%; margin-top: 2%;">
                            @foreach($image->comments as $comment)
                            <div style="background-color: #cccccc; margin: 1%; padding: 1px; border-radius: 8px;">
                                <strong>{{'@'.$comment->user->username}} {{\FormatTime::LongTimeFilter($comment->created_at)}}</strong>
                                <p>
                                    {{$comment->content}}
                                    @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                    <a href="{{url('/comment/delete')}}/{{$comment->id}}" class="btn btn-sm btn-danger" style="float: right; margin-right: 2%;">Eliminar</a>
                                    @endif
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection