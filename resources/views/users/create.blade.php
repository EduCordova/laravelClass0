@extends('layout')

@section('title', "Crear")

@section('content')


{{-- @if($errors->any())
<div class="alert alert-danger mt-1 mb-1" role="alert">
    Corregir los Siguientes Errores!
@foreach ($errors->all() as $err)
 <li> {{$err}} </li>
   @endforeach
</div>
@endif --}}

    <div class="row">
        <div class="col" ></div>
    <div class="col-lg-4 col-md-5 col-sm-8">

    <h1>Crear Usuario</h1>




    <form  action="{{route('user.form')}}" method="POST" >
        {{csrf_field()}}

        <div class="form-group">
            <input  class="form-control" value="{{old('name')}}" type="text" name="name" placeholder="Nombre" autocomplete="off" >
                @if ($errors->has('name'))
                <div class="alert alert-danger mt-1 mb-1" role="alert">
                {{$errors->first('name')}}
                </div>
                @endif
        </div>

        <div class="form-group">
        <input class="form-control"  value="{{old('email')}}" type="text" name="email" placeholder="Email" autocomplete="off" >
        @if ($errors->has('email'))


        <div class="alert alert-danger mt-1 mb-1" role="alert">
                    {{$errors->first('email')}}
        </div>


                @endif
    </div>

        <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off" >
        @if ($errors->has('password'))
        <div class="alert alert-danger mt-1 mb-1" role="alert">
            {{$errors->first('password')}}
        </div>
                @endif
    </div>

     <button class="btn-block btn btn-primary" type="submit">enviar</button>


    </form>


</div>
<div class="col" > </div>
</div>

@endsection
