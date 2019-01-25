@extends('layout')

@section('title', 'Usuarios')
@section('content')
    <h1>{{$title}}</h1>
    <div class="table-responsive">

    <table class="table table-bordered table-hover ">
            <thead class="thead-dark">
              <tr>
                <th scope="col ">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col ">Email</th>
                <th scope="col" class="text-center">Detalle</th>
                <th scope="col" class="text-center">Editar</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
              <tr>
              <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('user.show', ['id' => $user->id])}}" >Detalle</a>
                </td>

                <td>
                        <a class="btn btn-warning btn-sm  btn-block" href="{{url("/usuarios/{$user->id}/editar")}}">Editar</a>
                </td>
            </tr>

            @empty
            <tr>
                <p>  No hay usuarios registrados</p>
            </tr>

            @endforelse

            </tbody>
          </table>

    </div>




@endsection

