<?php 
$DB_NAME = 'knauf_cleaneo';

/** Usuário do banco de dados MySQL */
$DB_USER = 'root';

/** Senha do banco de dados MySQL */
$DB_PASSWORD = '';

/** nome do host do MySQL */
$DB_HOST = 'localhost';

/** nome da pasta raiz do projeto **/
define("ROOT", "http://localhost/knauf/cleaneo");

$conn = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);

mysql_query("SET NAMES 'utf8'", $conn);

if($conn){ $db = mysql_select_db($DB_NAME);}else{echo 'nao conectou';}

?>