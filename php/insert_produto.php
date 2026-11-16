<?php
include 'conexao.php';
 
$nome  = $_POST['produto_nome'];
$valor = $_POST['produto_preco'];
 
// aceita vírgula no valor (ex: 10,50 -> 10.50)
$valor = str_replace(',', '.', $valor);
 
// cd_produto é auto_increment, então não entra no insert
$insert = $conexao->prepare(
    "INSERT INTO tb_produto (nm_produto, vl_unitario) VALUES (?, ?)"
);
$insert->bind_param("ss", $nome, $valor);
 
if ($insert->execute()) {
    header("Location: ../obrigado.html");
} else {
    echo "<script>alert('Erro ao cadastrar produto'); history.back();</script>";
}
?>