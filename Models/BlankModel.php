<?php 
 class BlankModel extends Query{
     public function __construct()
     {
        parent::__construct();
     }
  public function InsertReport(string $Report, string $ReportadoPor, string $FechaReporte)
  {
    $this->Reporte = $Report;
    $this->ReportadoPor = $ReportadoPor;
    $this->FechaReporte = $FechaReporte;
      $sql ="INSERT INTO reportes (reporte, reporte_hecho_por, Dia_reporte ) VALUES (?,?,?)";
      $datos = array($this->Reporte, $this->ReportadoPor,$this->FechaReporte);
      $data = $this->save($sql,$datos); 
    if($data == 1){
       $res ="ok";
    }else{
      $res ="error";
    }
    return $res;
  }
  public function getLista()
  {
    $sql = "SELECT * from reportes";
    $data = $this->selectAll($sql);
    return $data; 

    
  }
  public function eliminarReport(int $ID, string $FechaReporte)
  {
     $this->id=$ID;
     $this->Fecha=$FechaReporte;
     $sql = "UPDATE reportes SET Dia_reporte= ?, reporte ='eliminado' where id = ?";
     $datos =array($this->Fecha ,$this->id);
     $data = $this->save($sql,$datos);
     return $data;
  }
  public function editarReport(int $ID)
{
   $sql = "SELECT * FROM reportes where id = $ID";  
   $data = $this->select($sql);
   return $data;
}

public function ActualizarReport(int $ID,string $FechaReporte, string $ReportadoPor, string $Report){

    $this->ID = $ID;
    $this->Fecha = $FechaReporte;
    $this->ReportadoPor = $ReportadoPor;
    $this->Report = $Report;

  
    $sql = "UPDATE reportes SET reporte = ?,  reporte_hecho_por = ?, Dia_reporte = ? where id = ?";
    $datos = array($this->Report, $this->ReportadoPor,$this->Fecha,$this->ID);
    $data = $this->save($sql,$datos);
    
  if($data == 1){
     $res ="ok";
  }else{
    $res ="error";
  }
  return $res;
  }
 
public function Res(int $ID,string $FechaRespuesta, string $RespondidoPor, string $Respuesta){

    $this->ID = $ID;
    $this->Fecha = $FechaRespuesta;
    $this->RespondidoPor = $RespondidoPor;
    $this->Res = $Respuesta;

  
    $sql = "UPDATE reportes SET respuesta = ?,  respuesta_hecha_por = ?, Dia_respuesta = ? where id = ?";
    $datos = array($this->Res, $this->RespondidoPor,$this->Fecha,$this->ID);
    $data = $this->save($sql,$datos);
    
  if($data == 1){
     $res ="ok";
  }else{
    $res ="error";
  }
  return $res;
  }
 
  public function ActualizarRespuesta(int $ID,string $FechaRespuesta, string $RespondidoPor, string $Res){

    $this->ID = $ID;
    $this->Fecha = $FechaRespuesta;
    $this->RespondidoPor = $RespondidoPor;
    $this->Res= $Res;

  
    $sql = "UPDATE reportes SET respuesta = ?,  respuesta_hecha_por = ?, Dia_respuesta = ? where id = ?";
    $datos = array($this->Res, $this->RespondidoPor,$this->Fecha,$this->ID);
    $data = $this->save($sql,$datos);
    
  if($data == 1){
     $res ="ok";
  }else{
    $res ="error";
  }
  return $res;
  }

  public function eliminarRespuesta(int $ID, string $FechaReporte)
  {
     $this->id=$ID;
     $this->Fecha=$FechaReporte;
     $sql = "UPDATE reportes SET Dia_reporte= ?, respuesta ='eliminado' where id = ?";
     $datos =array($this->Fecha ,$this->id);
     $data = $this->save($sql,$datos);
     return $data;
  }

  public function getExcel(int $ID)
  {
    $sql = "SELECT * from reportes where id = '$ID' ";
    $data = $this->selectAll($sql);
    return $data; 
  }

}
 ?>