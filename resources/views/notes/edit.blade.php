@extends('layouts.app')
@section('title', 'edit-note')
@section('content')
<div class="container d-flex justify-content-center">
<form class="form-inline" method="POST" action="/index/{{ $note->id }}">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="note">Modifica tu Nota</label>
          <input type="number" value={{Auth::user()->id}} name="user_id" class="form-control d-none" required readonly/>
        <input type="text" id="_note" name="note" class="form-control mx-sm-3" required=true value="{{$note->note}}"/>
        </div>
        <button type="submit" class="btn btn-primary my-1">modificar</button>
    </form>
</div>
@endsection