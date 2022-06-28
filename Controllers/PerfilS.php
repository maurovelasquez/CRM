<?php 

class PerfilS extends Controller{
   public function __construct()
   {
      session_start();
      parent::__construct();
   }
  
    public function index()
    {

      if($_SESSION['Tipo_Usuario'] =='Admin'){
         $this->views->getView($this, "index");
      }
      
      if($_SESSION['Tipo_Usuario'] =='Colaborador'){
         $this->views->getView($this, "index");
      }
      
}

}

?>