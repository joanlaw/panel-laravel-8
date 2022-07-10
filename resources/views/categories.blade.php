@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
      
Añadir categorías</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Añadir categorías</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('addcategorie')}}">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input required type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
          
        </form>
      </div>
      
    </div>
  </div>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">
           categorías</th>
        <th scope="col">
          Añadir </th>
        <th scope="col">created at</th>
        
      </tr>
    </thead>
    <tbody>
     @foreach($categories as $cat)
        <tr>
        <th scope="row">{{$cat->name}}</th>
        <td>{{$cat->user->name}}</td>
        <td>{{$cat->created_at}}</td>
      
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
@endsection