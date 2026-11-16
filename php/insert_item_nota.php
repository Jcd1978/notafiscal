<?php
include 'conexao.php';

$cd_nota    = (int) $_POST['cd_nota'];
$cd_produto = (int) $_POST['cd_produto'];
$qt         = (int) $_POST['qt'];

// Busca o valor unitário pelo ID do produto
$busca = $conexao->prepare("SELECT cd_produto, vl_unitario FROM tb_produto WHERE cd_produto = ?");
$busca->bind_param("i", $cd_produto);
$busca->execute();
$produto = $busca->get_result()->fetch_assoc();

if (!$produto) {
    echo "<script>alert('Produto não encontrado'); history.back();</script>";
    exit;
}

$cd_produto    = $produto['item_produto_id'];
$vl_total_item = $qt * $produto['vl_unitario'];

try{
   $insert = $conexao->prepare(
    "INSERT INTO tb_produto_has_tb_nota (fk_cd_produto, fk_cd_nota, qt_produto, vl_total_item) VALUES (?, ?, ?, ?)"
   );
   $insert->bind_param("iiid", $cd_produto, $cd_nota, $qt, $vl_total_item);
   $insert->execute();

    header("Location: ../obrigado.html");
    exit;

    } catch (mysqli_sql_exception $e) {
    echo "<script>alert('Erro ao cadastrar item. Verifique se o número da nota existe.'); history.back();</script>";
}
?>