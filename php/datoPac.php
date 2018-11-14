<?php
       require '../conexion/conectar.php';
       //Configuracion de la conexion a base de datos
       $con = @mysql_connect($host, $user, $pass);
       mysql_select_db($bd, $con);
       
       //consulta todos los pacientes
       $sql=mysql_query("SELECT idPaciente,CodigoPaciente,PrimerNombreP,PrimerApeP,AniosP,Sexo FROM infpaciente ORDER BY idPaciente DESC LIMIT 1",$con);
?>
       <table  class="table">
       <tr>
           <th> Codigo paciente &nbsp&nbsp</th>
           <th> Nombre &nbsp&nbsp</th>
           <th> Apellido &nbsp&nbsp</th>
           <th> Años &nbsp&nbsp</th> 
           <th> Genero &nbsp&nbsp</th>                               
       </tr>
       <?php
       while($row = mysql_fetch_array($sql)){
       echo "<tr>";
       echo "<td>".$row['CodigoPaciente']."</td>";
       echo "<td>".$row['PrimerNombreP']."</td>";
       echo "<td>".$row['PrimerApeP']."</td>";
       echo "<td>".$row['AniosP']."</td>";  
       echo "<td>".$row['Sexo']."</td>";                             
       }
       ?>
       </table>