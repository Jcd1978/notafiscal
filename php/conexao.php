<?php
// Definindo as variáveis usadas na conexão
$host = "localhost";
$banco = "notafiscal";
$usuario = "root";
$senha = "Jcmd@1978";

// Conectando no banco via mysqli
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

echo "Conectado com sucesso!";
?>
