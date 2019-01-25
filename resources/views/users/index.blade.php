@extends('layout')

@section('title', 'Usuarios')
@section('content')
    <h1>{{$title}}</h1>
    @if ($users->isNotEmpty())
    <div class="table-responsive">
    <table class="table table-bordered table-hover ">
            <thead class="thead-dark">
              <tr>
                <th scope="col ">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col ">Email</th>
                <th scope="col" class="text-center" colspan="3">Opciones</th>
                {{-- <th scope="col" class="text-center">Editar</th>
                <th scope="col" class="text-center">Borrar</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
              <tr>
              <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('user.show', ['id' => $user->id])}}" >
                            <span class="oi oi-eye"></span>
                    </a>
                </td>

                <td>
                        <a class="btn btn-warning btn-sm  btn-block" href="{{url("/usuarios/{$user->id}/editar")}}">
                            <span class="oi oi-pencil"></span>
                        </a>
                </td>
                <td>
                    {{-- <a class="btn btn-danger btn-sm  btn-block" href="{{route('user.del', $user)}}">Borrar</a> --}}
                <form action="{{route('user.del', $user)}}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger btn-sm btn-block" type="submit">
                            <span class="oi oi-trash"></span>
                    </button>
                    </form>
                </td>
            </tr>

            @endforeach

            </tbody>
          </table>
        </div>
        @else
            <p>  No hay usuarios registrados</p>
        @endif


@endsection

