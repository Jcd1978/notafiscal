<?php
include 'conexao.php';

// dados vindos do formulário (cad_nota.html)
$dt_emissao = $_POST['dt_emissao'];
$dt_envio   = $_POST['dt_envio'];
$cnpj       = $_POST['cnpj'];
$vl_total   = str_replace(['.', ','], ['', '.'], $_POST['vl_total']);

try {
    // cd_nota é auto_increment; o CNPJ precisa já existir em tb_cliente (chave estrangeira)
    $insert = $conexao->prepare(
        "INSERT INTO tb_nota (dt_emissao, dt_envio, vl_total, fk_nr_cnpj) VALUES (?, ?, ?, ?)"
    );
    $insert->bind_param("ssds", $dt_emissao, $dt_envio, $vl_total, $cnpj);
    $insert->execute();

    header("Location: ../cad_nota.html");
    exit;

} catch (mysqli_sql_exception $e) {
    echo "<script>alert('Erro ao cadastrar nota. Verifique se o CNPJ está cadastrado.'); history.back();</script>";
}
?>
