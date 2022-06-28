<?php 

class PerfilR extends Controller{
   public function __construct()
   {
      session_start();
      parent::__construct();
   }
  
    public function index()
    {

    if($_SESSION['Tipo_Usuario'] =='Admin'){
       $this->views->getView($this, "index");
    }else{
      header("Location: Principal");
    }
}

}

?>