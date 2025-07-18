<?php
session_start();
if ($_SESSION['tipo'] !== 'aluno') {
    header('Location: login.html');
    exit();
}
$aluno_id = $_SESSION['usuario_id'];
header("Location: ver_boletim.php?id=$aluno_id");
exit();