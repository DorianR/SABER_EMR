<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
<div class="page-header">
    <h1 class="text-center">SABER</h1>
    <h5 class="text-center">Sistema Basico de Archivos Electrónicos, Simple, Accesible</h5>
</div>
<div class="col-md-6 col-md-offset-3"></div>
<div class="container well">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">

                <div class="panel-heading" align="center">Iniciar sesión</div>
                <div class="panel-body">
                    <form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-xs-2">Usuario: </label>
                            <div class="col-lg-10">
                                <input type="text" name = "usuario"  class="form-control"  placeholder="Usuario"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-2">Contraseña: </label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name = "contrasenia" placeholder="Contraseña"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" name ="iniciar" value="Iniciar Sesion" class="btn btn-primary btn-lg"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
require_once("../php/sesion.class.php");

$sesion = new sesion();

if( isset($_POST["iniciar"]) )
{

    $usuario = $_POST["usuario"];
    $password = $_POST["contrasenia"];
    $Admin = '1';
    $TipoUsr = '2';
    if(validarUsuarioUsr($usuario,$password,$TipoUsr)[0] == true )
    {

        $sesion->set("usuario",$usuario);

        // echo $NoId;
        $NoId = validarUsuarioUsr($usuario,$password,$TipoUsr)[1];
        header("location: dashboard.php?IdPer=". $NoId);
    }
    elseif(validarUsuarioAdm($usuario,$password,$Admin)[0] == true)
    {
        $sesion->set("usuario",$usuario);
        $NoIdAd = validarUsuarioAdm($usuario,$password,$Admin)[1];
        header("location: DashboardAdmin.php?IdPer=". $NoIdAd);
    }
    else
    {
        echo "<div align=\"center\">Por favor, Verifica tu nombre de usuario y contraseña.</div><br>";
    }
}

function validarUsuarioUsr($usuario, $password, $TipoUsr)
{
    $conexion = new mysqli("localhost","root","NtSistema$","saber2");
    $consulta = "select * from Login where User = '$usuario';";
    $result = $conexion->query($consulta);
    if($result->num_rows > 0)
    {
        $fila = $result->fetch_assoc();
        $dbHash = $fila["Pass"];
        if( crypt($password,$dbHash) == $dbHash  AND strcmp($TipoUsr,$fila["TipoUsuario_idTipoUsuario"]) == 0  ){
            $Verdadero = true;
            $dtDos = $fila["PersonalIngInfo_idPersonalIngInfo"];
            //DevolverId($idUsuario);
            return $Respon = array($Verdadero,$dtDos);
        }
        else
            return false;
    }
    else
        return false;
}

function validarUsuarioAdm($usuario, $password, $TipoUsr)
{
    $conexion = new mysqli("localhost","root","NtSistema$","saber2");
    $consulta = "select * from Login where User = '$usuario';";
    $result = $conexion->query($consulta);
    if($result->num_rows > 0)
    {
        $fila = $result->fetch_assoc();
        $dbHash = $fila["Pass"];
        if( crypt($password,$dbHash) == $dbHash  AND strcmp($TipoUsr,$fila["TipoUsuario_idTipoUsuario"]) == 0  ){
            $VerdaderoAd = true;
            $dtDosAd = $fila["PersonalIngInfo_idPersonalIngInfo"];
            return $ResponAd = array($VerdaderoAd,$dtDosAd);
        }
        else
            return false;
    }
    else
        return false;
}
?>