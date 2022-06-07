@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actualizar imagen</div>

                <div class="card-body">

                    <form action="{{url('/image/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_id" value="{{$image->id}}">
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" id="image_path" name="image_path">
                                @if($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('image_path')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">Descripcion</label>
                            <div class="col-md-7">
                                <textarea class="form-control" id="description" name="description">{{$image->description}}</textarea>
                                @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection