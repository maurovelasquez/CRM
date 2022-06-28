<?php require_once "Views/Templates/parte_superior.php"?>


<!--INICIO del cont principal-->
<div class="container">
    <h1>REPORTES</h1>
    
 <!--INICIO del cont principal-->   
    



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                  <h6>  Lista de Reportes</h6>
                </div>
                <div id ="tabla">
                <div class="table-responsive">
                <div class="p-3" id="recarga">
                
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha recibido</th>
                                <th scope="col">Fecha cierre</th>
                                <th scope="col">Días</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Observaciones</th>
                     <h7>Panel <?php echo $_SESSION['Tipo_Usuario']; ?>     </h7>     
                      <?php  if($_SESSION['Tipo_Usuario'] != "Admin"){ ?>   <th scope="col" colspan="2">Opciones</th> <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <form class="p-4" method="POST" id="frmTabla" >
                          <?php 
                          foreach ($data['Datos'] as $Mostrar) {
                              $id = $Mostrar['id'];
                              $Recibido = $Mostrar['recibido'];
                              $Cierre = $Mostrar['cierre'];
                              $Dias = $Mostrar['dias'];
                              $Estado = $Mostrar['estado'];
                              $Observaciones = $Mostrar['observaciones'];
                          
                          ?>
                            <tr>
                               
                                <td> <?php echo $id ?> </td>
                                <td> <?php echo $Recibido ?> </td>
                                <td> <?php echo $Cierre ?> </td>
                                <td> <?php echo $Dias ?> </td>
                                <td> <?php echo $Estado ?> </td>
                                <td> <?php echo $Observaciones ?> </td>
                                <td><?php  if($_SESSION['Tipo_Usuario'] != "Admin"){ ?><a class="text-primary" onclick="EditarU(<?php echo $id ?>);"><i class="bi bi-pencil-square"></i><?php }?></a></td>
                                <td></td>
                            </tr>
                          <?php } ?>
                        </form>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="card" id="Insertar" >
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" id="frmRegistrarU" >
                    <div class="mb-3">
                        <label class="form-label">Fecha recibido: </label>
                        <input type="date" class="form-control" name="txtRecibido" id="txtRecibido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha cierre: </label>
                        <input type="date" class="form-control" name="txtCierre" id="txtCierre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Días: </label>
                        <input type="number" class="form-control" name="txtDias" id="txtDias" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado: </label>
                        <input type="text" class="form-control" name="txtEstado" id="txtEstado" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Observaciones: </label>
                        <input type="text" class="form-control" name="txtObservaciones" id="txtObservaciones" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <button type="submit" class="btn btn-primary" onclick="InsertarUsu(event);">Registrar</button>
                        <br>
                        <a class="btn btn-success" onclick="excelPersonas(event);"> Descargar excel</a>
                    </div>
                </form>
            </div>




            <div class="card" id="Actualizar" style="display: none;">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" id="frmActual" >
                <div class="mb-3">
                        <label class="form-label">ID: </label>
                        <input type="text" class="form-control" name="ID" id="ID" disabled>
                        <input type="text" class="form-control" name="IDPost" id="IDPost" hidden>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha recibido: </label>
                        <input type="date" class="form-control" name="txtRecibidoU" id="txtRecibidoU" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha cierre: </label>
                        <input type="date" class="form-control" name="txtCierreU" id="txtCierreU" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Días: </label>
                        <input type="number" class="form-control" name="txtDiasU" id="txtDiasU" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado: </label>
                        <input type="text" class="form-control" name="txtEstadoU" id="txtEstadoU" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Observaciones: </label>
                        <input type="text" class="form-control" name="txtObservacionesU" id="txtObservacionesU" autofocus required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" onclick="ActualizarU(event);">Editar</button>
                        <br>
                        <button type="submit" class="btn btn-danger" onclick="cancelar(event);">Cancelar</button>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br><br>




<?php require_once "Views/Templates/parte_inferior.php"?>
