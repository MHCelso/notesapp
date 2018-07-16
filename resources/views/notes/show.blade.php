@extends('layouts.app')
@section('title', 'show')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Nota</b></div>
                <ins><a href="{{ url('/index') }}" class="nav-link">ver mis notas</a></ins>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <ul>
                        <li><mark>{{ $note->note }}</mark></li>
                            <i><b>Creada:</b> {{$note->created_at}} </i>
                            <br>
                            <i><b>Actualizada:</b> {{$note->updated_at}}</i>
                    </ul>
                    <form action="/index/{{$note->id}}" method="POST">
                        <a href="/index/{{ $note->id }}/edit" class="btn btn-primary">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection