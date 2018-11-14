<?php
include('dbconnect.php');
require_once("../php/sesion.class.php");
$sesion = new sesion();
$usuario = $sesion->get("usuario");
$idPersonaIng = $_GET['IdPer'];
if( $usuario == false )
{
    header("Location: login.php");
}
else
{
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
                    <h4>Reportes</h4>
                    <button type="button" class="btn btn-primary btn-group-lg">
                        <span class="fa fa-file fa-5x"></span>
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
    </div>
    </body>
    </html>

    <?php
}
?>