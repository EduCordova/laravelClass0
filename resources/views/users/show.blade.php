@extends('layout')

@section('title', "Usuario")

@section('content')
    <h1>Usuario #{{$user->id}} </h1>

    El id pertenece al usuario: <b>{{$user->name}}</b>
    <p>
        <a class="btn btn-primary" href="{{route("users")}}">Regresar</a>
    </p>


@endsection
