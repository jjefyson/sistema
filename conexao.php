<?php
$conn = new mysqli('localhost', 'root', '', 'sistema_notas');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>