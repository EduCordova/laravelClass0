@extends('layout')

@section('title', "Crear")

@section('content')



    <div class="row">
        <div class="col" ></div>
    <div class="col-lg-4 col-md-5 col-sm-8">

    <h1>Crear Usuario</h1>


    <form action="{{route('user.form')}}" method="POST">
        {{csrf_field()}}

        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Nombre" autocomplete="off" required>
        </div>

        <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off" required>
        </div>

        <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off" required>
        </div>

     <button class="btn-block btn btn-dark" type="submit">enviar</button>


    </form>
</div>
<div class="col" > </div>
</div>

@endsection
