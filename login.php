<?php
session_start();
include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['usuario_id'] = $user['id'];
    $_SESSION['nome'] = $user['nome'];
    $_SESSION['tipo'] = $user['tipo'];

    if ($user['tipo'] === 'professor') {
        header('Location: dashboard_professor.php');
    } else {
        header('Location: dashboard_aluno.php');
    }
} else {
    echo "Login inválido. <a href='login.html'>Tentar novamente</a>";
}
?>
