<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    include './process/securityPanel.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Admin</title>
    <?php include './inc/link.php'; ?>
    <script type="text/javascript" src="js/admin.js"></script>
</head>
<body id="container-page-configAdmin">
    <?php include './inc/navbar.php'; ?>
    <section id="prove-product-cat-config">
        <div class="container">
            <div class="page-header">
              <h1>Panel de administración <small class="tittles-pages-logo">Casa Army</small></h1>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#Productos" role="tab" data-toggle="tab">Productos</a></li>
              <li role="presentation"><a href="#Proveedores" role="tab" data-toggle="tab">Proveedores</a></li>
              <li role="presentation"><a href="#Categorias" role="tab" data-toggle="tab">Categorías</a></li>
              <li role="presentation"><a href="#Admins" role="tab" data-toggle="tab">Admin</a></li>
              <li role="presentation"><a href="#Pedidos" role="tab" data-toggle="tab">Pedidos</a></li>
            </ul>
            <div class="tab-content">
                <!--==============================Panel productos===============================-->
                <div role="tabpanel" class="tab-pane fade in active" id="Productos">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="add-product">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar un producto nuevo</h2>
                            <form role="form" action="process/regproduct.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Código de producto</label>
                                <input type="text" class="form-control"  placeholder="Código" required maxlength="30" name="prod-codigo">
                              </div>
                              <div class="form-group">
                                <label>Nombre de producto</label>
                                <input type="text" class="form-control"  placeholder="Nombre" required maxlength="30" name="prod-name">
                              </div>
                              <div class="form-group">
                                <label>Categoría</label>
                                <select class="form-control" name="prod-categoria">
                                    
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Precio</label>
                                <input type="text" class="form-control"  placeholder="Precio" required maxlength="20" pattern="[0-9]{1,20}" name="prod-price">
                              </div>
                              <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" class="form-control"  placeholder="Modelo" required maxlength="30" name="prod-model">
                              </div>
                              <div class="form-group">
                                <label>Marca</label>
                                <input type="text" class="form-control"  placeholder="Marca" required maxlength="30" name="prod-marca">
                              </div>
                              <div class="form-group">
                                <label>Unidades disponibles</label>
                                <input type="text" class="form-control"  placeholder="Unidades" required maxlength="20" pattern="[0-9]{1,20}" name="prod-stock">
                              </div>
                              <div class="form-group">
                                <label>Proveedor</label>
                                <select class="form-control" name="prod-codigoP">
                                   
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Imagen de producto</label>
                                <input type="file" name="img">
                                <p class="help-block">Formato de imagenes admitido png, jpg, gif, jpeg</p>
                              </div>
                                <input type="hidden"  name="admin-name">
                              <p class="text-center"><button type="submit" class="btn btn-primary">Agregar a la tienda</button></p>
                              <div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="del-prod-form">
                            <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar un producto</h2>
                             <form action="process/delprod.php" method="post" role="form">
                                 <div class="form-group">
                                     <label>Productos</label>
                                     <select class="form-control" name="prod-code">
                                         
                                     </select>
                                 </div>
                                 <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar</button></p>
                                 <br>
                                 <div id="res-form-del-prod" style="width: 100%; text-align: center; margin: 0;"></div>
                             </form>
                         </div>
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de producto</h3></div>
                          <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">Código</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">Categoría</th>
                                          <th class="text-center">Precio</th>
                                          <th class="text-center">Modelo</th>
                                          <th class="text-center">Marca</th>
                                          <th class="text-center">Unidades</th>
                                          <th class="text-center">Proveedor</th>
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
                <!--==============================Panel Proveedores===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Proveedores">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="add-provee">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar un proveedor</h2>
                            <form action="process/regprove.php" method="post" role="form">
                                <div class="form-group">
                                    <label>NIT</label>
                                    <input class="form-control" type="text" name="prove-nit" placeholder="NIT proveedor" maxlength="30" required="">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="prove-name" placeholder="Nombre proveedor" maxlength="30" required="">
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input class="form-control" type="text" name="prove-dir" placeholder="Dirección proveedor" required="">
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input class="form-control" type="tel" name="prove-tel" placeholder="Número telefónico" pattern="[0-9]{1,20}" maxlength="20" required="">
                                </div>
                                <div class="form-group">
                                    <label>Página web</label>
                                    <input class="form-control" type="text" name="prove-web" placeholder="Página web proveedor" required="">
                                </div>
                                <p class="text-center"><button type="submit" class="btn btn-primary">Añadir proveedor</button></p>
                                <br>
                                <div id="res-form-add-prove" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="del-prove">
                            <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar un proveedor</h2>
                            <form action="process/delprove.php" method="post" role="form">
                                <div class="form-group">
                                    <label>Proveedores</label>
                              
                                </div>
                                <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar proveedor</button></p>
                                <br>
                                <div id="res-form-del-prove" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>    
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de proveedor</h3></div>
                          <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">NIT</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">Dirección</th>
                                          <th class="text-center">Telefono</th>
                                          <th class="text-center">Página web</th>
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
                <!--==============================Panel Categorias===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Categorias">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="add-categori">
                                <h2 class="text-info text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar categoría</h2>
                                <form action="process/regcategori.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Código</label>
                                        <input class="form-control" type="text" name="categ-code" placeholder="Código de categoria" maxlength="9" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="categ-name" placeholder="Nombre de categoria" maxlength="30" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input class="form-control" type="text" name="categ-descrip" placeholder="Descripcióne de categoria" required="">
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Agregar categoría</button></p>
                                    <br>
                                    <div id="res-form-add-categori" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="del-categori">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar una categoría</h2>
                                <form action="process/delcategori.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Categorías</label>
                                        
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar categoría</button></p>
                                    <br>
                                    <div id="res-form-del-cat" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <br><br>
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar categoría</h3></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Descripción</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <!--==============================Panel Admins===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Admins">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="add-admin">
                                <h2 class="text-info text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar administrador</h2>
                                <form action="process/regAdmin.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="admin-name" placeholder="Nombre" maxlength="9" pattern="[a-zA-Z]{4,9}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input class="form-control" type="password" name="admin-pass" placeholder="Contraseña" required="">
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Agregar administrador</button></p>
                                    <br>
                                    <div id="res-form-add-admin" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="del-admin">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar administrador</h2>
                                <form action="process/deladmin.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Administradores</label>
                                        
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar administrador</button></p>
                                    <br>
                                    <div id="res-form-del-admin" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12"></div>
                    </div>
                </div>
                <!--==============================Panel pedidos===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Pedidos">
                    <div class="row">
                        <div class="col-xs-12">
                            <br><br>
                            <div id="del-pedido">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar pedido</h2>
                                <form action="process/delPedido.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Pedidos</label>
                                       
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar pedido</button></p>
                                    <br>
                                    <div id="res-form-del-pedido" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                            <br><br>
                             <div class="panel panel-info">
                               <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar estado de pedido</h3></div>
                              <div class="table-responsive">
                                  <table class="table table-bordered">
                                      <thead class="">
                                          <tr>
                                              <th class="text-center">#</th>
                                              <th class="text-center">Fecha</th>
                                              <th class="text-center">Cliente</th>
                                              <th class="text-center">Descuento</th>
                                              <th class="text-center">Total</th>
                                              <th class="text-center">Estado</th>
                                              <th class="text-center">Opciones</th>
                                          </tr>
                                      </thead>
                                      
                                  </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>