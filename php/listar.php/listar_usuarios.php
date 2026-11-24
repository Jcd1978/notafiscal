<?php
// Importa a mesma conexão que você usou no insert_usuario.php
include 'php/conexao.php';

// Busca os usuários sem trazer a coluna 'senha'
$sql = "SELECT id_usuario, nm_usuario, email FROM tb_usuario ORDER BY id_usuario ASC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <!-- Usa o mesmo CSS do seu cadastro -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* Ajustes complementares para a tabela e botões */
        .container-lista {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn-editar, .btn-excluir {
            padding: 6px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
            margin-right: 5px;
        }
        .btn-editar { background-color: #007bff; }
        .btn-excluir { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container-lista">
        <h2>Usuários Cadastrados</h2>

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome Completo</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while ($usuario = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['id_usuario']) ?></td>
                            <td><?= htmlspecialchars($usuario['nm_usuario']) ?></td>
                            <td><?= htmlspecialchars($usuario['email']) ?></td>
                            <td>
                                <a href="editar_usuario.php?id=<?= $usuario['id_usuario'] ?>" class="btn-editar">Editar</a>
                                <a href="php/excluir_usuario.php?id=<?= $usuario['id_usuario'] ?>" 
                                   class="btn-excluir" 
                                   onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                                   Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhum usuário cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="nav-links" style="margin-top: 20px;">
            <a href="cad_usuario.html">Cadastrar Novo Usuário</a> | 
            <a href="index.html">Voltar para o Login</a>
        </div>
    </div>
</body>
</html>
