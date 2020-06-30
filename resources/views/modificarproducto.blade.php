@extends('layouts.app')

@section('content')

<?php
   $stock=DB::table('stock')->orderBy('created_at','desc')->where('producto_id','=',$producto->id)->get();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MODIFICAR PRODUCTO</div>

                <div class="card-body">

                      <div class="row">
                          <div class="col-12">
                              <form enctype= "multipart/form-data" action="/producto/modificar/?id_prod={{$producto->id}}" method="POST">

                                <div class="control-group form-group">
                                    <div class="controls">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input type="hidden" name="usuario" value="{{ Auth::user() }}">
                                      <div class="form-group">
                                          <label class="label">Nombre</label>
                                          <input required autocomplete="off" name="nombre" class="form-control"
                                                 type="text" value="{{$producto->nombre}}"></input>
                                      </div>
                                      <div class="form-group">
                                          <label class="label">Descripción</label>
                                          <input required autocomplete="off" name="descripcion" class="form-control"
                                                 type="text" value="{{$producto->descripcion}}"></input>
                                      </div>
                                      <div class="form-group">
                                          <label class="label">Creador</label>
                                          <input required autocomplete="off" name="creador" class="form-control"
                                                 type="text" value="{{$producto->creador}}"></input>
                                      </div>

                                      <div class="form-group">
                                        <label class="label">Imagen actual del producto: "{{$producto->imagen}}"</label>
                                        <input type="file" name="imagen" class="form-control" placeholder="imagen" value="{{$producto->imagen}}"></input>
                                      </div>

                                      <div class="form-group">
                                        <label class="label">Stock</label>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-striped" id="user_table">
                                               <thead>
                                                <tr>
                                                    <th width="35%">Contenido</th>
                                                    <th width="35%">Precio</th>
                                                    <th width="30%">Stock</th>
                                                </tr>
                                               </thead>
                                               <tbody>

                                               </tbody>
                                               <tfoot>
                                                <tr>
                                                                <td colspan="3" align="right">&nbsp;</td>
                                                </tr>
                                               </tfoot>
                                             </table>
                                        </div>

                                     </div>
                                     <button class="btn btn-success" >Registrar</button>
                                   </div>
                              </form>
                                    &nbsp;
                          </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">

$(document).ready(function(){
 var count = 0;
 var precio = 0;
 var contenido = 0;
 var disponibles = 0;
 var id_stock = -1;
 <?php
 // dd($stock);
     foreach($stock as $item){
 ?>
       count++;
       id_stock = {{$item->id}};
       precio = {{$item->precio}};
       contenido = {{$item->contenido}};
       disponibles = {{$item->disponibles}};
       dynamic_field(count);

 <?php
     }
 ?>
 function dynamic_field(number)
 {

  html = '<tr>';
        html += '<td><input required type="number" min="0" name="contenido['+count+']" class="form-control" value="'+contenido+'"/></td>';
        html += '<td><input required type="number" min="0" name="precio['+count+']" class="form-control" value="'+precio+'"/></td>';
        html += '<td><input required type="number" min="0" name="disponibles['+count+']" class="form-control" value="'+disponibles+'"/></td>';
        html += '<td hidden><input type="text" name="id_stock['+count+']" class="form-control" value="'+id_stock+'" hidden/></td>';
        if(number > 1)
        {
            $('tbody').append(html);
        }
        else
        {
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }

 }

 $(document).on('click', '#add', function(){
  count++;
  id_stock = -1;
  precio = 0;
  contenido = 0;
  disponibles = 0;
  dynamic_field(count);
 });
});

</script>


@endsection
