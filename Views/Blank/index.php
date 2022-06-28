<?php require_once "Views/Templates/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>PQR</h1> 
</div>

<div class="container mt-5">
    <p>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- inicio alerta -->
            
   
            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de PQR'S 
                </div>
                <div id ="tabla">
                <div class="table-responsive" >
                <div class="p-4" id="recargaReport">
                
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Reporte</th>
                                <th scope="col">Reportado por</th>
                                <th scope="col">Fecha del reporte</th>
                                <th scope="col">Repuesta</th>
                                <th scope="col">Respondido por</th>
                                <th scope="col">Fecha de la respuesta</th>
                      <?php echo $_SESSION['Tipo_Usuario']; ?>          
                                <th scope="col" colspan="3">Opciones</th> <?php  ?>
                            </tr>
                        </thead>
                        <tbody>
                        <form class="p-4" method="POST" id="frmTabla" >
                          <?php foreach ( $data['Datos'] as $row) {
                            $ID = $row['id'];
                            $reporte = $row['reporte'];
                            $reporteHecho = $row['reporte_hecho_por'];
                            $diaRep = $row['Dia_reporte'];
                            $respuesta = $row['respuesta'];
                            $respuestaHecha = $row['respuesta_hecha_por'];
                            $DiaRes = $row['Dia_respuesta'];
                           ?>
                            <tr>
                               
                                <td> <?php echo $ID; ?> </td>
                                <td> <?php echo $reporte; ?> </td>
                                <td> <?php echo $reporteHecho; ?> </td>
                                <td> <?php echo $diaRep; ?> </td>
                                <td> <?php echo $respuesta; ?> </td>
                                <td> <?php echo $respuestaHecha; ?> </td>
                                <td> <?php echo $DiaRes; ?> </td>
                                <td><?php  if($_SESSION['Tipo_Usuario'] == "Colaborador"){ ?><a class="text-primary" onclick="EditarReport(<?php echo $ID ?>);"><i class="bi bi-pencil-square"></i></a><?php }else{ ?> 
                                <a class="text-primary" onclick="Responder(<?php echo $ID ?>);"><i class="bi bi-chat-dots"></i></a>
                                <a class="text-primary" onclick="EditarRespuesta(<?php echo $ID ?>);"><i class="bi bi-pencil-square"> </i></a>
                                </i></a>  <?php }?>
                            <?php if($ID != "" && $reporte != "" && $diaRep != "" && $respuesta != "" && $respuestaHecha != "" && $DiaRes != "") { ?>    <a class="text-success" onclick="excelReport(<?php echo $ID ?>);"><i class="bi bi-file-earmark-excel-fill"></i></a> <?php } ?> 
                            </td>
                              
                                <td><?php  if($_SESSION['usuario'] != $respuestaHecha &&  $respuestaHecha !="" && $_SESSION['Tipo_Usuario'] == 'Admin'){ ?> <a onclick="EliminarRes(<?php echo $ID ?>);" class="text-danger"><i class="bi bi-trash"></i></a>  <?php } ?></td>
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
        <a class="btn btn-success" onclick="excelGeneral(event);" style="width: 30%;"> Descargar reporte general</a>
       <p>
       <br> 
       <br> 
 <?php  if($_SESSION['Tipo_Usuario'] == "Colaborador"){ ?>
        <div  style="width: 100%;">
            <div class="card" id="Reporte" >
                <div class="card-header">
                    Generar reporte:
                </div>
                <form class="p-4" method="POST" id="frmReport" >
                    <div class="mb-3">
                        <label class="form-label">Reporte: </label>
                        <textarea class="form-control" name="Reportetxt" id="Reportetxt" autofocus required style="resize: none;"> </textarea>
                    </div>
                    <div class="d-grid">
                        <center>
                        <button type="submit" class="btn btn-primary" onclick="InsertarReport(event);" style="width: 50%;">Registrar</button>
                        </center>
                        <br>
                        <center>
                        </center>
                    </div>
                </form>
            </div>
<?php }?>


            <div  style="width: 100%;" >
            <div class="card" id="ReporteEdit" style="display: none;" >
                <div class="card-header">
                   Editar reporte:
                </div>
                <form class="p-4" method="POST" id="frmReportEdit" >
                <div class="mb-3">
                        <label class="form-label">ID: </label>
                        <input type="text" class="form-control" name="ID" id="ID" disabled>
                        <input type="text" class="form-control" name="IDPost" id="IDPost" hidden>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Reporte: </label>
                        <input type="text" class="form-control" name="fechaEdit" id="fechaEdit" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reporte: </label>
                        <textarea class="form-control" name="ReportetxtE" id="ReportetxtE" autofocus required style="resize: none;"> </textarea>
                    </div>
                    <div class="d-grid">
                        <center>
                        <button type="submit" class="btn btn-primary" onclick="ActualizarReport(event);" style="width: 50%;">Editar</button>
                        </center>
                        <br>
                        <center>
                        <button type="submit" class="btn btn-danger" onclick="cancelarReport(event); " style="width: 50%;">Cancelar</button>
                        </center>
                    </div>
                </form>
            </div>

      
            <?php  if($_SESSION['Tipo_Usuario'] == "Admin"){ ?>
            <div class="card" id="Respuesta" style="display: none;" >
                <div class="card-header">
                    Responder al reporte:
                </div>
                <form class="p-4" method="POST" id="frmResponder" >
                <div class="mb-3">
                        <label class="form-label">ID: </label>
                        <input type="text" class="form-control" name="IDR" id="IDR" disabled>
                        <input type="text" class="form-control" name="IDPostR" id="IDPostR" hidden>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reporte: </label>
                        <textarea class="form-control" name="ReportetxtR" id="ReportetxtR" autofocus required style="resize: none;" disabled> </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reportado por: </label>
                        <input type="text" class="form-control" name="Reportado" id="Reportado" autofocus required style="resize: none;" disabled> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Reporte: </label>
                        <input type="text" class="form-control" name="fechaEditR" id="fechaEditR" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Respuesta: </label>
                        <textarea class="form-control" name="RespuestaR" id="RespuestaRe" style="resize: none;"></textarea>
                    </div>
                   
                    <div class="d-grid" >
                        <button type="submit" class="btn btn-primary" onclick="ResponderR(event);">Responder</button>
                        <br>
                        <button type="submit" class="btn btn-danger" onclick="cancelarR(event);" >Cancelar</button>
                        <br>
                    </div>
                </form>
            </div>
            <?php }?>

            <?php  if($_SESSION['Tipo_Usuario'] == "Admin"){ ?>
            <div class="card" id="RespuestaE"  style="display: none;">
                <div class="card-header">
                    Editar respuesta:
                </div>
                <form class="p-4" method="POST" id="frmResponderE" >
                <div class="mb-3">
                        <label class="form-label">ID: </label>
                        <input type="text" class="form-control" name="IDRE" id="IDRE" disabled>
                        <input type="text" class="form-control" name="IDPostRE" id="IDPostRE" hidden>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reporte: </label>
                        <textarea class="form-control" name="ReportetxtRE" id="ReportetxtRE" autofocus required style="resize: none;" disabled> </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reportado por: </label>
                        <input type="text" class="form-control" name="ReportadoRE" id="ReportadoRE" autofocus required style="resize: none;" disabled> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Reporte: </label>
                        <input type="text" class="form-control" name="fechaEditRE" id="fechaEditRE" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Respondido por: </label>
                        <input type="text" class="form-control" name="RespondidoRE" id="RespondidoRE" autofocus required style="resize: none;" disabled> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de la respuesta: </label>
                        <input type="text" class="form-control" name="ResFecha" id="ResFecha" autofocus required style="resize: none;" disabled> 
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editar respuesta: </label>
                        <textarea class="form-control" name="RespuestaEDIT" id="RespuestaEDIT" style="resize: none;"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" onclick="ResponderEdit(event);" >Editar</button>
                        <br>
                        <button type="submit" class="btn btn-danger" onclick="cancelarRE(event);" >Cancelar</button>
                        <br>
                    </div>
                </form>
            </div>
            <?php }?>

        </div>
    </div>
</div>


<!--FIN del cont principal-->



<?php require_once "Views/Templates/parte_inferior.php"?>