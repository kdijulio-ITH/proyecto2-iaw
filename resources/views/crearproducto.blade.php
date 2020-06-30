@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PRODUCTOS</div>

                <div class="card-body">

                      <div class="row">
                          <div class="col-12">
                              <form enctype= "multipart/form-data" action="/producto/registrar" method="POST">

                                <div class="control-group form-group">
                                    <div class="controls">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="usuario" value="{{ Auth::user() }}">
                                        <div class="form-group">
                                            <label class="label">Nombre</label>
                                            <input required autocomplete="off" name="nombre" class="form-control"
                                                   type="text" placeholder="Nombre" maxlength="255" data-validation-required-message="Por favor introduzca nombre del producto.">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Descripción</label>
                                            <input required autocomplete="off" name="descripcion" class="form-control"
                                                   type="text" placeholder="Descripción">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Creador</label>
                                            <input required autocomplete="off" name="creador" class="form-control"
                                                   type="text" placeholder="Creador">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Imagen del producto</label>
                                            <input type="file" required name="imagen" class="form-control" placeholder="imagen" >
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
 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
        html += '<td><input required type="number" min="0" name="contenido['+count+']" class="form-control" placeholder="Contenido"/></td>';
        html += '<td><input required type="number" min="0" name="precio['+count+']" class="form-control" placeholder="Precio"/></td>';
        html += '<td><input required type="number" min="0" name="disponibles['+count+']" class="form-control" placeholder="Disponibles"/></td>';
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
  dynamic_field(count);
 });
});

</script>

@endsection
