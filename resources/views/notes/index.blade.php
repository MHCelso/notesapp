@extends('layouts.app')
@section('title', 'Ver')
@section('content')
@if (count($notes) > 0)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notas</div>
                <ins><a href="{{ url('/index/create') }}" class="nav-link">Crea una nueva nota</a></ins>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <b>Tus Notas</b>
                    @foreach($notes as $noutes)
                    <ul>
                        <li><a href="/index/{{ $noutes->id }}" class="nav-link">{{ $noutes->note }}</a></li>                        
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> 
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notas</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <b>No tienes Notas</b>
                    <br><br>
                    <a href="{{ url('/index/create') }}" class="nav-link">Crea una nueva</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection