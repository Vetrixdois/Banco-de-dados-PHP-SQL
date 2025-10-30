<?php
// index.php
session_start();
require 'conexao.php';

// Mensagens de sessão (sucesso/erro)
$msg = null;
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

// buscar todos usuários
$stmt = $pdo->query("SELECT id, nome, email FROM usuarios ORDER BY id DESC");
$usuarios = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Lista de Usuários</title>
  <link rel="stylesheet" href="assests/css/style/style.css">
</head>
<body>
<div class="container">
  <h1>Lista de Usuários</h1>
  <div class="table-actions"><a href="#cadastro">Cadastro</a></div>

  <?php if ($msg): ?>
    <div class="msg <?= htmlspecialchars($msg['type']); ?>"><?= htmlspecialchars($msg['text']); ?></div>
  <?php endif; ?>

  <table class="table-custom">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($usuarios) === 0): ?>
        <tr><td colspan="4">Nenhum usuário cadastrado.</td></tr>
      <?php else: ?>
        <?php foreach ($usuarios as $u): ?>
          <tr>
            <td><?= htmlspecialchars($u['id']); ?></td>
            <td><?= htmlspecialchars($u['nome']); ?></td>
            <td><?= htmlspecialchars($u['email']); ?></td>
            <td>
              <a class="acao editar" href="editar.php?edit_id=<?= urlencode($u['id']); ?>">Editar</a>
              <a class="acao deletar" href="javascript:void(0);" onclick="confirmarDelete('<?= addslashes($u['nome']); ?>', 'deletar.php?id=<?= urlencode($u['id']); ?>')">Deletar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- Formulário de cadastro -->
  <div id="cadastro" class="card">
    <h2>Cadastrar Usuário</h2>
    <form action="cadastrar.php" method="POST">
      <div class="form-row">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required maxlength="150">
      </div>
      <div class="form-row">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required maxlength="255">
      </div>
      <button type="submit" class="primary">Gravar</button>
      <button type="button" onclick="cancelarParaIndex()">Cancelar</button>
    </form>
  </div>

</div>

<script src="assests/js/script.js"></script>
</body>
</html>
