<?php
session_start();
if ($_SESSION['tipo'] !== 'professor') {
    header('Location: login.html');
    exit();
}
include 'conexao.php';
$result = $conn->query("SELECT * FROM usuarios WHERE tipo = 'aluno'");
?>
<h2>Bem-vindo, Professor <?= $_SESSION['nome'] ?></h2>
<a href="logout.php">Sair</a>
<h3>Alunos:</h3>
<ul>
<?php while ($aluno = $result->fetch_assoc()): ?>
    <li>
        <?= $aluno['nome'] ?> -
        <a href="ver_boletim.php?id=<?= $aluno['id'] ?>">Ver</a> |
        <a href="editar_notas.php?id=<?= $aluno['id'] ?>">Editar Notas</a>
    </li>
<?php endwhile; ?>
</ul>
