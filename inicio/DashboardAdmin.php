<?php
include('dbconnect.php');
require_once("../php/sesion.class.php");
$sesion = new sesion();
$usuario = $sesion->get("usuario");
//$dt ='23';
$idPersonaIng = $_GET['IdPer'];
if( $usuario == false )
{
    header("Location: login.php");
}
else
{
    $consulta = "SELECT * FROM cargoenhospital";
    $query = mysql_query($consulta);
    ?>

    <html>
    <head>
        <title>
        </title>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet"/>
        <script  src="../js/jquery-1.12.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/scriptSABER-v3.js"></script>
    </head>
    <body>
    <div class="container" style="background-color:#5dc2f1; width:100%; height:100%; " >
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron" style="background-color:#2b669a; height: 25% ">
                    <h3 style="color: #FFFFFF;" align="center" >SABER</h3>
                    <h3 style="color: #FFFFFF;" align="center" >Ingrese a la opcion necesaria</h3>
                    <span class="icon-facebook"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3" align="center">
                <div class="jumbotron" style="color: #2e6da4; height: 30%" >
                    <h4>Emergencia</h4>
                    <a href="emergencia.php?Num=<?php echo $idPersonaIng?>">
                        <button type="button" class="btn btn-primary btn-group-lg" >
                            <span class="fa fa-ambulance fa-5x " aria-hidden="true"   href="infBasicP.php"></span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="jumbotron" align="center" style="color: #2e6da4; height:30%;">
                    <h4>Ingreso a servicio</h4>
                    <a href="infBasicP.php" >
                        <button type="button" class="btn btn-primary btn-group-lg">
                            <span class="fa fa-file-text-o fa-5x" aria-hidden="false"></span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <div class="jumbotron" align="center" style="color: #2e6da4; height: 30%">
                    <h4>Graficos</h4>
                    <button type="button" class="btn btn-primary btn-group-lg">
                        <span class="fa  fa-area-chart fa-5x" ></span>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="jumbotron" align="center" style="color: #2e6da4; height: 30%">
                    <h4>Agregar Usuarios</h4>
                    <button type="button" data-toggle="modal"  class="btn btn-primary btn-group-lg" data-target="#AgregarUser">
                        <span class="fa fa-user-plus fa-5x"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
        </div>

        <!--inicio modal Agregar Usuario-->

        <div class="modal fade" id="AgregarUser" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3>Ingrese la información que a continuación se solicita</h3>
                    </div>
                    <div class="modal-body">
                        <label class="text-danger">No. Usuario</label>
                        <input type="text" id="NoNewUsr" name="NoNewUsr" align="right" disabled></br>
                        <label class="text-primary">Primer Nombre</label>
                        <input type="text" id="PNombreU" name="PNombreU"  class="form-control"></br>
                        <label class="text-primary">Segundo Nombre</label>
                        <input type="text" id="SnombreU" name="SnombreU" class="form-control"></br>
                        <label class="text-primary">Apellidos</label>
                        <input type="text" id="ApellidosU" name="ApellidosU"  class="form-control"></br>
                        <label class="text-primary">Edad</label>
                        <input type="text" id="EdadU" name="EdadU"  class="form-control"></br>
                        <label class="text-primary">Correo Electrónico</label>
                        <input type="text" id="EmailU" name="EmailU"  class="form-control"></br>
                        <label class="text-primary">Teléfono</label>
                        <input type="text" id="CelularU" name="CelularU"  class="form-control"></br>
                        <label class="text-primary">Cargo en Hospital</label>

                        <select class="form-control" id="CargoUsuarioU" name="CargoUsuarioU">
                            <?php
                            while($arreglo = mysql_fetch_array($query)) {

                                ?>

                                <option value="<?php echo $arreglo['idCargoEnHospital']?>" ><?php echo $arreglo['NombreDeCargo'] ?> </option>

                            <?php } ?>
                        </select></br>
                        <button type="button" class="btn btn-success btn-lg" onclick="javascript:InsPersonaInfo();">Registrar Informacion Basica</button><br><br>
                        <label class="text-primary">Cargo en Hospital</label>
                        <label class="text-primary">Tipo de Usuario</label>
                        <select class="form-control" id="TipoUsuario" name="TipoUsuario">
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                            <option value="3">Enfermeria</option>
                        </select></br>
                        <label class="text-primary">Nombre de Usuario</label>
                        <input type="text" id="Usuario" name="Usuario"  class="form-control"></br>
                        <label class="text-primary">Contraseña de Usuario</label>
                        <input type="password" id="PassUsuario" name="PassUsuario" class="form-control" ></br>
                        <button type="button" class="btn btn-primary btn-lg" onclick="javascript:InsUsrPass();">Registrar Nuevo Usuario</button>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- fin modal Agregar Usuario-->
    </div>




    </body>
    </html>


    <?php
}
?>