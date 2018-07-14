@extends('layouts.app')
@section('title', 'create-note')
@section('content')
<div class="container d-flex justify-content-center">
<form class="form-inline" method="POST" action="/index">
    @csrf
        <div class="form-group">
          <label for="note">Nueva Nota</label>
          <input type="number" value={{Auth::user()->id}} name="user_id" class="form-control d-none" required readonly/>
          <input type="text" id="_note" name="note" class="form-control mx-sm-3" required=true placeholder="Tu nota aqui"/>
        </div>
        <button type="submit" class="btn btn-primary my-1">Crear nota</button>
    </form>
</div>
@endsection