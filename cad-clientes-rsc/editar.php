<?php 
require "config/conexao.php"; 

$id = $_GET["id"] ?? null; 
if (!$id) { 
    die("Cliente não informado."); 
} 

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id"); 
$stmt->execute([":id" => $id]); 
$cliente = $stmt->fetch(PDO::FETCH_ASSOC); 

if (!$cliente) { 
    die("Cliente não encontrado."); 
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Seu CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1><i class="fa-solid fa-user-pen"></i> Editar Cliente</h1>

    <form method="POST" action="atualizar.php"> 
        <input type="hidden" name="id" value="<?= $cliente['id'] ?>"> 
        
        <label><i class="fa-solid fa-user"></i> Nome</label> 
        <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required> 
        
        <label><i class="fa-solid fa-envelope"></i> E-mail</label> 
        <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required> 

        <label><i class="fa-solid fa-phone"></i> Telefone</label> 
        <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone'] ?? '') ?>"> 

        <label><i class="fa-solid fa-city"></i> Cidade</label> 
        <input type="text" name="cidade" value="<?= htmlspecialchars($cliente['cidade'] ?? '') ?>"> 

        <div class="form-actions">
            <button type="submit" class="btn btn-novo">
                <i class="fa-solid fa-floppy-disk"></i> Salvar Alterações
            </button>
            <a href="index.php" class="btn btn-voltar">
                <i class="fa-solid fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form> 
</div>

</body>
</html>