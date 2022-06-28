<?php 

class Home extends Controller{
   public function __construct()
   {
      session_start();
      parent::__construct();
   }
  
    public function index()
    {
       $this->views->getView($this, "index");
    }
    public function validar()
    {
     
      if (empty($_POST['usuario']) || empty($_POST['password'])){
          $msg ="Los campos estan vacíos";
       }else{ 
          $usuario = $_POST['usuario'];
          $clave = $_POST['password'];
          $ClaveEn = hash('Md5',$clave);
          $data = $this ->model->getUsuario($usuario, $ClaveEn);
          if ($data){
             $_SESSION['id'] = $data['id'];
             $_SESSION['Tipo_Usuario'] = $data['Tipo_Usuario'];
             $_SESSION['usuario'] = $data['usuario'];
             $msg="ok";
          }else{
            $msg="Err";       
          }     
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
}
}

?>