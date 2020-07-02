@extends('layouts.app')

@section('content')
<div>
  {{Auth::user()->name}}
  {{Auth::user()->roles}}
  <?php
    $admin= $user->roles ;
    if ($admin=="Administrador"){
    ?>
      <div>
      <td>
      <button class="btn btn-success" onclick="location.href='/producto/registrar'" >Añadir producto</button>
      <td>
      </div>
    <?php
    }
    ?>
</div>
<div class="">
  <?php
  $productos=DB::table('productos')->orderBy('updated_at','desc')->get();


          // dd($productos);
          ?>

          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Creador</th>
                <th scope="col"></th>
                <?php
                  if ($admin){
                ?>

                    <th scope="col"></th>
                <?php
                 }
                ?>

              </tr>
            </thead>

       <?php
          foreach($productos as $prod){
          $stock=DB::table('stock')->orderBy('contenido','desc')->where('producto_id','=',$prod->id)->get();
          // $stock=DB::table('stock')->orderBy('created_at','desc')->get();
          // dd($stock);
       ?>
            <tr>
              <td>
                <img src="/storage/{{$prod->imagen}}" style="width:100px; height: 100px;float: left;border-radius: 80%; margin-right: 20px ">
              </td>
              <th scope="row">{{$prod->nombre}}</th>
              <td>{{$prod->descripcion}}</td>
              <td>{{$prod->creador}}</td>
              <td>

                <table class="table">

                    <tr>
                        <th scope="col" class="table-primary">Contenido</th>
                        <th scope="col" class="table-primary">Precio</th>
                        <th scope="col" class="table-primary">Disponibles</th>
                    </tr>
                <?php
                    foreach($stock as $item){
                ?>

                    <tr>
                        <th scope="col">{{$item->contenido}}</th>
                        <th scope="col">{{$item->precio}}</th>
                        <th scope="col">{{$item->disponibles}}</th>
                        <?php
                            if ($item->disponibles >= 1){
                        ?>
                        <th> <button class="btn btn-success" onclick="location.href='/producto/vender/?id_item={{$item->id}}'" >Vender producto</button></th>
                        <?php
                        }
                        ?>
                    </tr>

                <?php
                  }
                ?>
                </table>

              </td>
              <?php

                if ($admin=="Administrador"){
                ?>

              <td>
                  <button class="btn btn-success" onclick="location.href='/producto/modificar/?id_prod={{$prod->id}}'" >Editar producto</button>
              </td>
              <?php
               }
              ?>

            </tr>
      <?php
      }
      ?>

    </table>
</div>

<script type="application/javascript">

$(document).ready(function(){
  if(!window.location.href.includes('/home')){
    window.location.assign('/home');}
});
</script>

@endsection
