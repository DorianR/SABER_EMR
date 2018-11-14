<?php
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = 'NtSistema$';

  $conn = @mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

  $dbname = 'saber2';
  mysql_select_db($dbname);

?>