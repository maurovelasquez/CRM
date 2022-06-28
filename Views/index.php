<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CRMTools</title>

        <link rel="stylesheet" href="Assets/Estilos/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Assets/Estilos/estilos.css">
        <link rel="stylesheet" href="Assets/Estilos/plugins/sweetalert2/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>
    
    <body>
     
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin"  action="" method="post">
                <span class="login-form-title">LOGIN</span>
                
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn" onclick="insertar(event);">CONECTAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>     
        
        
     <script src="Assets/js/jquery-3.3.1.min.js"></script>    
     <script src="Assets/Estilos/bootstrap/js/bootstrap.min.js"></script>    
     <script src="Assets/Estilos/popper/popper.min.js"></script>    
        
     <script src="Assets/Estilos/plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <script src="Assets/js/codigo.js"></script>    
    </body>
</html>