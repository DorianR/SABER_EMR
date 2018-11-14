<?php
include('dbconnect.php');

if( !empty( $_POST['type'] ) && $_POST['type'] == "insert" )
{
 
  $idPaciente = $_POST['idPaciente'];  
  $id = $_POST['pic_id'];  
  $name = $_POST['name'];
  $pic_x = $_POST['pic_x'];
  $pic_y = $_POST['pic_y'];
  $sql = "INSERT INTO image_tag (idpaciente,pic_id,name,pic_x,pic_y) VALUES ( '$idPaciente','$id', '$name', $pic_x, $pic_y )";
  $qry = mysql_query($sql);
}

if( !empty( $_POST['type'] ) && $_POST['type'] == "remove")
{
  $tag_id = $_POST['tag_id'];
  $sql = "DELETE FROM image_tag WHERE id = '".$tag_id."'";
  $qry = mysql_query($sql);
}

?>
