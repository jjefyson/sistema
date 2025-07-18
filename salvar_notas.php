<?php
include 'conexao.php';
$id = $_POST['id_aluno'];
$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b3 = $_POST['b3'];
$b4 = $_POST['b4'];

$conn->query("UPDATE notas SET b1=$b1, b2=$b2, b3=$b3, b4=$b4 WHERE id_aluno=$id");

header("Location: ver_boletim.php?id=$id");
exit();