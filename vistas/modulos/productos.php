<style>
  .input-group {
    width: 100%;
  }
</style>

<div class="content-wrapper">

  <section class="content-header">   
    <h1>
      Administrar productos
    </h1>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar producto
        </button>
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         
        <thead>
         
          <tr>
           
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Modelo</th>
           <th>Descripción</th>
           <th>Categoría</th>
           <th>Existencia</th>
           <th>Precio</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>

      <tbody>

        <?php

        $item = null;

        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        foreach ($productos as $key => $value) {
          
          echo '<tr>
                  <td>'.($key+1).'</td>
                  <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                  <td>'.$value["codigo"].'</td>
                  <td>'.$value["descripcion"].'</td>';

                  $item = "id";
                  $valor = $value["id_categoria"];

                  $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                 echo '
                  <td>'.$categoria["categoria"].'</td>
                  <td>'.$value["stock"].'</td>
                  <td>'.$value["precio_compra"].'</td>
                  
                  
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';

        }

        ?>
                 
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#2A1B0A; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar producto</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              <div class="input-group">
                <label>Categoría</label>
                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                  <option value="">Selecionar categoría</option>
                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">        
              <div class="input-group">
                <label>Modelo</label>
                <input 
                  type="text" 
                  class="form-control input-lg" 
                  id="nuevoCodigo" 
                  name="nuevoCodigo" 
                  placeholder="Modelo" 
                  readonly 
                  required
                >
              </div>
            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <div class="form-group">
              <div class="input-group">
                <label>Descripción</label>
                <input 
                  type="text" 
                  class="form-control input-lg" 
                  name="nuevaDescripcion" 
                  placeholder="Descripción" 
                  required
                >
              </div>
            </div>

             <!-- ENTRADA PARA STOCK -->
             <div class="form-group">   
              <div class="input-group">
                <label>Existencia</label>
                <input 
                  type="number" 
                  class="form-control input-lg" 
                  name="nuevoStock" 
                  min="0" 
                  placeholder="Existencia" 
                  required
                >
              </div>
            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->
             <div class="form-group row">

                <div class="col-xs-12 col-sm-6">
                  <div class="input-group">
                    <label>Precio</label>
                    <input 
                      type="number" 
                      class="form-control input-lg" 
                      id="nuevoPrecioCompra" 
                      name="nuevoPrecioCompra" 
                      min="0" 
                      step="any" 
                      placeholder="Precio" 
                      required
                      >
                  </div>
                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-12 col-sm-6" hidden>        
                  
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                    <input 
                      type="number" 
                      class="form-control input-lg" 
                      id="nuevoPrecioVenta" 
                      name="nuevoPrecioVenta" 
                      min="0" 
                      step="any" 
                      placeholder="Precio de venta" 
                      required
                    >
                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">         
                    <div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>
                    </div>
                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">         
                    <div class="input-group">
                      <input 
                        type="number" 
                        class="form-control input-lg nuevoPorcentaje" 
                        min="0" 
                        value="40" 
                        required
                      >
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">       
              <div class="panel">SUBIR IMAGEN</div>
              <input 
                type="file" 
                class="nuevaImagen" 
                name="nuevaImagen"
              >
              <p class="help-block">Peso máximo de la imagen 2MB</p>
              <img 
                src="vistas/img/productos/default/anonymous.png" 
                class="img-thumbnail previsualizar" 
                width="100px"
              >
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#2A1B0A; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar producto</h4>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">    
              <div class="input-group">
                <label>Categoría</label>
                <select 
                  class="form-control input-lg"  
                  name="editarCategoria" 
                  readonly 
                  required
                >
                  <option id="editarCategoria"></option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">   
              <div class="input-group">
                <label>Modelo</label>
                <input 
                  type="text" 
                  class="form-control input-lg" 
                  id="editarCodigo" 
                  name="editarCodigo" 
                  readonly 
                  required
                >
              </div>
            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
             <div class="form-group">
              <div class="input-group">
                <label>Descripción</label>
                <input 
                  type="text" 
                  class="form-control input-lg" 
                  id="editarDescripcion" 
                  name="editarDescripcion" 
                  required
                >
              </div>
            </div>

             <!-- ENTRADA PARA STOCK -->
             <div class="form-group">
              <div class="input-group">
                <label>Existencia</label>
                <input 
                  type="number" 
                  class="form-control input-lg" 
                  id="editarStock" 
                  name="editarStock" 
                  min="0" 
                  required
                >
              </div>
            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                  <div class="input-group">
                    <label>Precio</label>
                    <input 
                      type="number" 
                      class="form-control input-lg" 
                      id="editarPrecioCompra" 
                      name="editarPrecioCompra" 
                      step="any" 
                      min="0" 
                      required
                    >
                  </div>
                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6" hidden>     
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>
                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->
                  <div class="col-xs-6">     
                    <div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>
                    </div>
                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->
                  <div class="col-xs-6" style="padding:0">
                    <div class="input-group">
                      <input 
                        type="number" 
                        class="form-control input-lg nuevoPorcentaje" 
                        min="0" 
                        value="40" 
                        required
                      >
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->
             <div class="form-group">
              <div class="panel">SUBIR IMAGEN</div>
              <input 
                type="file" 
                class="nuevaImagen" 
                name="editarImagen"
              >
              <p class="help-block">Peso máximo de la imagen 2MB</p>
              <img 
                src="vistas/img/productos/default/anonymous.png" 
                class="img-thumbnail previsualizar" 
                width="100px"
              >
              <input type="hidden" name="imagenActual" id="imagenActual">
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>      

    </div>

  </div>

</div>

<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>      



