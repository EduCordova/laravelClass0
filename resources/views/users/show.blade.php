@extends('layout')

@section('title', "Usuario")

@section('content')
    <h1>Usuario #{{$user->id}} </h1>

    El id pertenece al usuario: <b>{{$user->name}}</b>
    <p>
        <a href="{{route("users")}}" class="href">Regresar</a>
    </p>
@endsection
