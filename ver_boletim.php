<?php
session_start();
include 'conexao.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM usuarios WHERE id = $id AND tipo = 'aluno'");
$aluno = $result->fetch_assoc();
$notas = $conn->query("SELECT * FROM notas WHERE id_aluno = $id")->fetch_assoc();

if (!$notas) {
    $conn->query("INSERT INTO notas (id_aluno, b1, b2, b3, b4) VALUES ($id, 0,0,0,0)");
    $notas = ['b1'=>0, 'b2'=>0, 'b3'=>0, 'b4'=>0];
}
?>
<h2>Boletim de <?= $aluno['nome'] ?></h2>
<ul>
    <li>1º Bimestre: <?= $notas['b1'] ?></li>
    <li>2º Bimestre: <?= $notas['b2'] ?></li>
    <li>3º Bimestre: <?= $notas['b3'] ?></li>
    <li>4º Bimestre: <?= $notas['b4'] ?></li>
</ul>
<a href="dashboard_<?=$_SESSION['tipo']?>.php">Voltar</a>