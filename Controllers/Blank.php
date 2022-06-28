<?php 

class Blank extends Controller{
   public function __construct()
   {
      session_start();
      parent::__construct();
   }
  
    public function index()
    {
       $data['Datos'] = $this->model->getLista(); 
       $this->views->getView($this, "index", $data);
}

public function InsertarReport()
{
   date_default_timezone_set('America/Bogota');
   $FechaReporte = date("d/m/Y - g:i:s A ");
   $ReportadoPor =  $_SESSION['usuario'];
   $Report = $_POST['Reportetxt'];
   $data=$this->model->InsertReport($Report, $ReportadoPor, $FechaReporte);
   if ($data == "ok") {
      $msg ="si";
     }else{
        $msg ="err";
     }
     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
     die();
}
public function eliminar(int $ID)
{
   date_default_timezone_set('America/Bogota');
   $FechaReporte = date("d/m/Y - g:i:s A ");
$data = $this->model->eliminarReport($ID,$FechaReporte);
if ($data == 1){
   $msg ="si";
}else{
   $msg ="Error al eliminar el reporte";
}
echo json_encode($msg, JSON_UNESCAPED_UNICODE);
die();
}

public function editar(int $ID)
{
   
  $data = $this->model->editarReport($ID);
  echo json_encode($data, JSON_UNESCAPED_UNICODE);
  die();   
}

public function ActualizarReport()
{
   $ID = $_POST['IDPost'];
   date_default_timezone_set('America/Bogota');
   $FechaReporte = date("d/m/Y - g:i:s A ");
   $ReportadoPor =  $_SESSION['usuario'];
   $Report = $_POST['ReportetxtE'];
  $data=$this->model->ActualizarReport($ID,$FechaReporte,$ReportadoPor,$Report);
  if ($data == "ok") {
     $msg ="si";
    }else{
       $msg ="err";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
}

public function Responder()
{
   $ID = $_POST['IDPostR'];
   date_default_timezone_set('America/Bogota');
   $FechaRespuesta = date("d/m/Y - g:i:s A ");
   $RespondidoPor =  $_SESSION['usuario'];
   $Respuesta = $_POST['RespuestaR'];
  $data=$this->model->Res($ID,$FechaRespuesta,$RespondidoPor,$Respuesta);
  if ($data == "ok") {
     $msg ="si";
    }else{
       $msg ="err";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
}

public function ActualizarRespuesta()
{
   $ID = $_POST['IDPostRE'];
   date_default_timezone_set('America/Bogota');
   $FechaRespuesta = date("d/m/Y - g:i:s A ");
   $RespondidoPor =  $_SESSION['usuario'];
   $Res = $_POST['RespuestaEDIT'];
  $data=$this->model->ActualizarRespuesta($ID,$FechaRespuesta,$RespondidoPor,$Res);
  if ($data == "ok") {
     $msg ="si";
    }else{
       $msg ="err";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
}


public function eliminarRes(int $ID)
{
   date_default_timezone_set('America/Bogota');
   $FechaReporte = date("d/m/Y - g:i:s A ");
$data = $this->model->eliminarRespuesta($ID,$FechaReporte);
if ($data == 1){
   $msg ="si";
}else{
   $msg ="Error al eliminar el reporte";
}
echo json_encode($msg, JSON_UNESCAPED_UNICODE);
die();
}





public function excel(int $ID)
{
    date_default_timezone_set('America/Bogota'); 
    $Fecha_Reporte=date("d-m-Y - H:i:s"); 

    $data = $this->model->getExcel($ID);
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=ReportePQR'.$Fecha_Reporte.'.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo'<table border=1>';
echo'<tr>';
echo'<th colspan=7>Reporte de PQR</th>';
echo'</tr>';
echo utf8_decode('<tr><th>ID</th><th>Reporte</th><th>Reportado por</th><th>Fecha del reporte</th><th>Respuesta</th><th>Respondido por</th><th>Fecha de la respuesta</th>');
for( $i=0; $i < count($data); $i++) {
 echo '<tr>';
 echo '<td>'.$data[$i]['id'].'</td>';
 echo '<td>'.$data[$i]['reporte'].'</td>';
 echo '<td>'.$data[$i]['reporte_hecho_por'].'</td>';
 echo '<td>'.$data[$i]['Dia_reporte'].'</td>';
 echo '<td>'.$data[$i]['respuesta'].'</td>';
 echo '<td>'.$data[$i]['respuesta_hecha_por'].'</td>';
 echo '<td>'.$data[$i]['Dia_respuesta'].'</td>';
 echo '</tr>';
}
echo'</table>';

die();
}
public function excelGeneral()
{
    date_default_timezone_set('America/Bogota'); 
    $Fecha_Reporte=date("d-m-Y - H:i:s"); 

    $data = $this->model->getLista();
    
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=ReportePQR'.$Fecha_Reporte.'.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo'<table border=1>';
echo'<tr>';
echo'<th colspan=7>Reporte de PQR</th>';
echo'</tr>';
echo utf8_decode('<tr><th>ID</th><th>Reporte</th><th>Reportado por</th><th>Fecha del reporte</th><th>Respuesta</th><th>Respondido por</th><th>Fecha de la respuesta</th>');
for( $i=0; $i < count($data); $i++) {
 echo '<tr>';
 echo '<td>'.$data[$i]['id'].'</td>';
 echo '<td>'.$data[$i]['reporte'].'</td>';
 echo '<td>'.$data[$i]['reporte_hecho_por'].'</td>';
 echo '<td>'.$data[$i]['Dia_reporte'].'</td>';
 echo '<td>'.$data[$i]['respuesta'].'</td>';
 echo '<td>'.$data[$i]['respuesta_hecha_por'].'</td>';
 echo '<td>'.$data[$i]['Dia_respuesta'].'</td>';
 echo '</tr>';
}
echo'</table>';

die();
}



}

?>