<?php
include('dbconnect.php');

// fetch all tags
$sql = "SELECT * FROM image_tag WHERE idpaciente=" . $_POST[ 'idPaciente' ] ;
$qry = mysql_query($sql);
$rs = mysql_fetch_array($qry);

$data['boxes'] = '';
$data['lists'] = '';

if ($rs){
  do{
	
    $data['boxes'] .= '<div class="tagview" style="left:' . $rs['pic_x'] . 'px;top:' . $rs['pic_y'] . 'px;" id="view_'.$rs['id'].'">';
	$data['boxes'] .= '<div class="square"></div>';
	$data['boxes'] .= '<div class="person" style="left:' . $rs['pic_x'] . 'px;top:' . $rs['pic_y']  . 'px;">' . $rs[ 'name' ] . '</div>';
	$data['boxes'] .= '</div>';
	
	$data['lists'] .= '<li id="'.$rs['id'].'"><a>' . $rs['name'] . '</a> (<a class="remove">Eliminar</a>)</li>';
	
  }while($rs = mysql_fetch_array($qry));
}

echo json_encode( $data );

?>