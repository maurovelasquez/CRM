<?php 

class DashBoard extends Controller{
   public function __construct()
   {
      session_start();
      parent::__construct();
   }
  
    public function index()
    {
       $data['Datos'] = $this->model->getUsuarios(); 
       $this->views->getView($this, "index", $data);
       
    }
    public function InsertarU()
    {
      $Recibido = $_POST['txtRecibido'];
      $Cierre = $_POST['txtCierre'];
      $Dias = $_POST['txtDias'];
      $Estado = $_POST['txtEstado'];
      $Observaciones = $_POST['txtObservaciones'];
   
      $data=$this->model->InsertarUs($Recibido,$Cierre,$Dias,$Estado,$Observaciones);
      if ($data == "ok") {
       $msg ="si";
      }else{
         $msg ="err";
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }
    public function eliminar(int $id)
    {
    $data = $this->model->eliminarP($id);
    if ($data == 1){
       $msg ="si";
    }else{
       $msg ="Error al eliminar el usuario";
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
    }

    public function editar(int $id)
    {
      $data = $this->model->editarU($id);
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();   
    }


    public function ActualizarU()
    {
      $ID = $_POST['IDPost'];
      $Recibido = $_POST['txtRecibidoU'];
      $Cierre = $_POST['txtCierreU'];
      $Dias = $_POST['txtDiasU'];
      $Estado = $_POST['txtEstadoU'];
      $Observaciones = $_POST['txtObservacionesU'];
      $data=$this->model->ActualizarUs($ID,$Recibido,$Cierre,$Dias,$Estado,$Observaciones);
      if ($data == "ok") {
         $msg ="si";
        }else{
           $msg ="err";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    


    public function excel()
{
    date_default_timezone_set('America/Bogota'); 
    $Fecha_Reporte=date("d-m-Y - H:i:s"); 

    $data = $this->model->getUsuarios();
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Reporte_Personas'.$Fecha_Reporte.'.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo'<table border=1>';
echo'<tr>';
echo'<th colspan=6>Reporte de personas</th>';
echo'</tr>';
echo utf8_decode('<tr><th>ID</th><th>Fecha Recibido</th><th>Fecha Cierre</th><th>Días</th><th>Estado</th><th>Observaciones</th>');
for( $i=0; $i < count($data); $i++) {
 echo '<tr>';
 echo '<td>'.$data[$i]['id'].'</td>';
 echo '<td>'.$data[$i]['recibido'].'</td>';
 echo '<td>'.$data[$i]['cierre'].'</td>';
 echo '<td>'.$data[$i]['dias'].'</td>';
 echo '<td>'.$data[$i]['estado'].'</td>';
 echo '<td>'.$data[$i]['observaciones'].'</td>';
 echo '</tr>';
}
echo'</table>';

die();
}


}

?>