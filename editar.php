<?php
// editar.php
session_start();
require 'conexao.php';

$usuario = null;

if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {
    $id = filter_input(INPUT_GET, 'edit_id', FILTER_SANITIZE_NUMBER_INT);

    $sql_select = "SELECT id, nome, email FROM usuarios WHERE id = ?";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->execute([$id]);
    $usuario = $stmt_select->fetch();

    if (!$usuario) {
        $_SESSION['msg'] = ['type' => 'error', 'text' => 'Usuário não encontrado.'];
        header('Location: index.php');
        exit();
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // processa atualização
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (!$id || !$nome || !$email) {
        $_SESSION['msg'] = ['type' => 'error', 'text' => 'Dados inválidos para atualização.'];
        header('Location: index.php');
        exit();
    }

    $sql_update = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
    try {
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->execute([$nome, $email, $id]);

        $_SESSION['msg'] = ['type' => 'success', 'text' => 'Alterações salvas com sucesso.'];
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['msg'] = ['type' => 'error', 'text' => 'Erro ao atualizar: ' . $e->getMessage()];
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
  <?php if ($usuario): ?>
    <div class="card">
      <h2>Editar Usuário: <?= htmlspecialchars($usuario['nome']); ?></h2>
      <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']); ?>">
        <div class="form-row">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']); ?>" required maxlength="150">
        </div>
        <div class="form-row">
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']); ?>" required maxlength="255">
        </div>
        <button type="submit" class="primary">Salvar Alterações</button>
        <button type="button" onclick="window.location.href='index.php'">Cancelar</button>
      </form>
    </div>
  <?php endif; ?>
</div>
</body>
</html>
