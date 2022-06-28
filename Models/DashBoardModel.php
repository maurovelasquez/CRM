<?php 
 class DashBoardModel extends Query{
   private $ID,$Recibido, $Cierre, $Dias, $Estado, $Observaciones;
     public function __construct()
     {
        parent::__construct();
     }
     public function InsertarUs(string $Recibido, string $Cierre, int $Dias, string $Estado, string $Observaciones){

        $this->Recibido = $Recibido;
        $this->Cierre = $Cierre;
        $this->Dias = $Dias;
        $this->Estado = $Estado;
        $this->Observaciones = $Observaciones;

        $sql = "INSERT INTO persona (recibido, cierre, dias, estado, observaciones) VALUES (?,?,?,?,?)";
        $datos = array($this->Recibido, $this->Cierre,$this->Dias,$this->Estado,$this->Observaciones);
        $data = $this->save($sql,$datos);
        
      if($data == 1){
         $res ="ok";
      }else{
        $res ="error";
      }
      return $res;
 }
 public function getUsuarios()
 {
   $sql = "SELECT * from persona";
   $data = $this->selectAll($sql);
   return $data; 
 }
 
 public function eliminarP(int $id)
 {
    $this->id=$id;
    $sql = "DELETE FROM persona WHERE id = ?";
    $datos =array($this->id);
    $data = $this->save($sql,$datos);
    return $data;
 }

 public function modificarU(int $id, string $tipo, string $correo, string $nombre)
{

   $this->id = $id;
   $this->tipo = $tipo;
   $this->correo = $correo;
   $this->nombre = $nombre;

   $sql ="UPDATE cuenta SET Tipo_Usuario = ?, correo = ?, nombre = ? where id_usuario=?";
   $datos = array($this->tipo, $this->correo,$this->nombre, $this->id);
   $data = $this->save($sql,$datos);

   if($data == 1){
      $res ="modificado";
   }else{
     $res ="error";
  }  
   return $res;

}    

public function editarU(int $id)
{
   $sql = "SELECT * FROM persona where id = $id";  
   $data = $this->select($sql);
   return $data;
}

public function ActualizarUs(int $ID,string $Recibido, string $Cierre, int $Dias, string $Estado, string $Observaciones){

  $this->ID = $ID;
  $this->Recibido = $Recibido;
  $this->Cierre = $Cierre;
  $this->Dias = $Dias;
  $this->Estado = $Estado;
  $this->Observaciones = $Observaciones;

  $sql = "UPDATE persona SET recibido = ?,  cierre = ?, dias = ?, estado = ?, observaciones = ? where id = ?";
  $datos = array($this->Recibido, $this->Cierre,$this->Dias,$this->Estado,$this->Observaciones,$this->ID);
  $data = $this->save($sql,$datos);
  
if($data == 1){
   $res ="ok";
}else{
  $res ="error";
}
return $res;
}

}
 ?>