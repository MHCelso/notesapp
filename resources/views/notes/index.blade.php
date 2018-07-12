@extends('layouts.app')
@section('title', 'Ver')
@section('content')
@if (count($notes) > 0)
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
                    Tus Notas
                    @foreach($notes as $noutes)
                    <ul>
                        <li>{{ $noutes->note }}</li>
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
                    No tienes Notas
                    <br><br>
                    <a href="#" class="btn btn-primary">Crea una nueva</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection