@extends('layouts.master')

@section('title')
Hola mundo xd
@stop

@section('header')
    @parent()
    Este es el nuevo header
@stop

@section('content')
    <h1>Contenido Generico</h1>
    <a  href="{{ url('/detalle') }}">Ir a detalle</a>
@stop