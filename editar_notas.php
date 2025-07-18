<?php
session_start();
if ($_SESSION['tipo'] !== 'professor') {
    header('Location: login.html');
    exit();
}
include 'conexao.php';
$id = $_GET['id'];
$aluno = $conn->query("SELECT * FROM usuarios WHERE id = $id")->fetch_assoc();
$notas = $conn->query("SELECT * FROM notas WHERE id_aluno = $id")->fetch_assoc();

if (!$notas) {
    $conn->query("INSERT INTO notas (id_aluno, b1, b2, b3, b4) VALUES ($id, 0,0,0,0)");
    $notas = ['b1'=>0, 'b2'=>0, 'b3'=>0, 'b4'=>0];
}
?>

<h2>Editar Notas de <?= $aluno['nome'] ?></h2>
<form action="salvar_notas.php" method="post">
    <input type="hidden" name="id_aluno" value="<?= $id ?>">
    1º Bimestre: <input type="number" name="b1" value="<?= $notas['b1'] ?>"><br>
    2º Bimestre: <input type="number" name="b2" value="<?= $notas['b2'] ?>"><br>
    3º Bimestre: <input type="number" name="b3" value="<?= $notas['b3'] ?>"><br>
    4º Bimestre: <input type="number" name="b4" value="<?= $notas['b4'] ?>"><br>
    <input type="submit" value="Salvar">
</form>
<a href="dashboard_professor.php">Voltar</a>
