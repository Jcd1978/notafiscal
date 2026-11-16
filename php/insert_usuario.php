<?php
include 'conexao.php';

$nome = $_POST['cad_usuario_nome'];
$email = $_POST['cad_usuario_email'];
$senha = $_POST['cad_usuario_senha'];

$insert = $conexao->prepare(
    "INSERT INTO tb_usuario (nm_usuario, email, senha) VALUES (?, ?, ?)"
);
$insert->bind_param("sss", $nome, $email, $senha);

if ($insert->execute()) {
    echo "<script>alert('Cadastro realizado com sucesso'); window.location.href='../index.html';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar: " . $insert->error . "'); history.back();</script>";
}

header("Location: ../index.html");
exit;
?>