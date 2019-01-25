@extends('layout')

@section('title', 'Editar')
@section('content')
<center>

            <h1>Datos a editar del usuario #{{$user->id}}</h1>

</center>

<div class="row">
        <div class="col" ></div>
    <div class="col-lg-4 col-md-5 col-sm-8">






    <form  action="" method="POST" >
        {{csrf_field()}}

        <div class="form-group">
            <input  class="form-control" value="{{old('name', $user->name)}}" type="text" name="name" placeholder="Nombre" autocomplete="off" >
                @if ($errors->has('name'))
                <div class="alert alert-danger mt-1 mb-1" role="alert">
                {{$errors->first('name')}}
                </div>
                @endif
        </div>

        <div class="form-group">
        <input class="form-control"  value="{{old('email',$user->email)}}" type="text" name="email" placeholder="Email" autocomplete="off" >
        @if ($errors->has('email'))


        <div class="alert alert-danger mt-1 mb-1" role="alert">
                    {{$errors->first('email')}}
        </div>


                @endif
    </div>


     <button class="btn-block btn btn-primary" type="submit">Actualizar</button>


    </form>


</div>
<div class="col" > </div>
</div>
@endsection
