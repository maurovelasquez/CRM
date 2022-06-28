<?php 
 class PrincipalModel extends Query{
     public function __construct()
     {
        parent::__construct();
     }
     public function getUsuario(string $usuario, string $ClaveEn){
        $sql = "SELECT * from usuarios where usuario='$usuario' and pass ='$ClaveEn'";
        $data = $this->select($sql);
        return $data; 
 }
}
 ?>