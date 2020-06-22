@extends('layouts.app')

@section('content')
<div>
  <button class="btn btn-success" onclick="location.href='/producto/registrar'" >Añadir producto</button>
  <button class="btn btn-success" onclick="location.href='/producto/editar'" >Editar producto</button>
  <button class="btn btn-success" onclick="location.href='/diseniador/crear'" >Añadir diseñador</button>
</div>
<div class="">
  <?php
  $productos=DB::table('productos')->orderBy('created_at','desc')->get();
          // dd($productos);
          ?>

          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Creador</th>
                <th scope="col">Contenido</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
              </tr>
            </thead>

       <?php
          foreach($productos as $prod){
       ?>
            <tr>
              <td>
                <img src="/storage/{{$prod->imagen}}" style="width:100px; height: 100px;float: left;border-radius: 80%; margin-right: 20px ">
              </td>
              <th scope="row">{{$prod->nombre}}</th>
              <td>{{$prod->descripcion}}</td>
              <td>{{$prod->creador}}</td>
            
            </tr>
      <?php
      }
      ?>
      <!-- <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody> -->
    </table>
</div>
@endsection
