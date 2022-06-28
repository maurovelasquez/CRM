<?php require_once "Views/Templates/parte_superior.php"?>
<!--INICIO del cont principal-->
<div class="container">
    <h1>PERFIL</h1>

    <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="" target="#"><?php echo $_SESSION['Tipo_Usuario']; ?></a>
      <!--  <a class="nav-link" href="PerfilS" target="#">Security</a>-->
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Foto de perfil</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                   <!--  <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                     Profile picture upload button-->
                  <!--  <button class="btn btn-primary" type="button">Upload new image</button>-->
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Detalles de la cuenta</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                        <label class="small mb-1" for="inputOrgName">Tipo de usuario</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $_SESSION['Tipo_Usuario']; ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                           <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="">
                            </div>-->
                            <!-- Form Group (last name)-->
                         <!--   <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="">
                            </div>-->
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Organización</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="CRMTools">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Ubicación</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="Bogotá">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Correo Electronico</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="Admin@crmtools.com">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Numero de telefono</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="3002403200">
                            </div>-->
                            <!-- Form Group (birthday)-->
                           <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="">
                            </div>-->
                        </div>
                        <!-- Save changes button
                        <a class="btn btn-primary" href="principal" type="button">Guardar</a>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!--FIN del cont principal-->

<?php require_once "Views/Templates/parte_inferior.php"?>