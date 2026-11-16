<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Definindo as variáveis usadas na conexão
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'notafiscal';

// Conectando no banco via mysqli
try{
    $conexao = new mysqli($host, $usuario, $senha, $banco);
} catch (mysqli_sql_exception $e) {
    die('Erro na conexão: ' . $e->getMessage());
}
?>

