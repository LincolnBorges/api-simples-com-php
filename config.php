<?php
// ----- Conecta no Banco de dados ---- //
$servername = "localhost";
$username = "usuario";
$password = "senha";
$dbname = "banco_de_dados";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
?>