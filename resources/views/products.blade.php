@extends('layouts.master')
@section('content')
<div class="container-fluid">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
  Agregar producto</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Agregar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('addproduct')}}">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input required type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">
              Precio:</label>
            <input required type="text" name="price" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Descripción:</label>
            <input required type="text" name="description" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Categoría
              :</label>
            <select type="text" name="categorie_id" class="form-control" id="recipient-name">
                @foreach($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
          
        </form>
      </div>
      
    </div>
  </div>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Producto</th>
        <th scope="col">Categoría</th>
        
        <th scope="col">
          Creado en</th>
        
      </tr>
    </thead>
    <tbody>
     @foreach($products as $pr)
        <tr>
        <th scope="row">{{$pr->name}}</th>
        <th scope="row">{{$pr->categorie->name}}</th>
        
        <td>{{$pr->created_at}}</td>
       <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#e{{$pr->id}}">
          
detalles
        </button>
        <div class="modal fade" id="e{{$pr->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Username</th>
                      <th scope="col">ip</th>
                      <th scope="col">details</th>
                      <th scope="col">when</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pr->statistics as $st)
                    <tr>
                      <th scope="row">{{$st->user->name}}</th>
                      <td>{{$st->ip}}</td>
                      <td>{{$st->details}}</td>
                      <td>{{$st->created_at}}</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              
              </div>
            </div>
          </div>
        </div>
       </td>
        
        <!-- Modal -->
       
      
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
@endsection