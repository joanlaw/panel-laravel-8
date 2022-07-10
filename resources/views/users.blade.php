@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Agregar usuario</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('adduser')}}">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input required type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input required type="text" name="email" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input required type="password" name="password" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Agregar </button>
          </div>
          
        </form>
      </div>
      
    </div>
  </div>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">
          Añadir por</th>
        <th scope="col">
          Añadir por</th>
        
      </tr>
    </thead>
    <tbody>
     @foreach($users as $user)
        <tr>
        <th scope="row">{{$user->name}}</th>
        <th scope="row">{{$user->email}}</th>
        <td>admin</td>
        <td>{{$user->created_at}}</td>
      
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
@endsection