@extends('layouts.app')
@section('title', 'show')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nota</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    Tu Nota
                    <ul>
                        <li>{{ $note->note }}</li>
                            <i>Creada: {{$note->created_at}} </i>
                            <br>
                            <i>Actualizada: {{$note->updated_at}}</i>
                    </ul>
                    <a href="/index/{{ $note->id }}/#" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection