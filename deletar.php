<?php
// deletar.php
session_start();
require 'conexao.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['msg'] = ['type' => 'error', 'text' => 'ID inválido para exclusão.'];
    header('Location: index.php');
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

try {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);

    $_SESSION['msg'] = ['type' => 'success', 'text' => 'Usuário removido.'];
    header('Location: index.php');
    exit();
} catch (PDOException $e) {
    $_SESSION['msg'] = ['type' => 'error', 'text' => 'Erro ao remover: ' . $e->getMessage()];
    header('Location: index.php');
    exit();
}
