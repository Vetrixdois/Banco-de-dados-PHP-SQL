<?php
// cadastrar.php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

if (!$nome || !$email) {
    $_SESSION['msg'] = ['type' => 'error', 'text' => 'Nome e e-mail são obrigatórios.'];
    header('Location: index.php#cadastro');
    exit();
}

try {
    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email]);

    $_SESSION['msg'] = ['type' => 'success', 'text' => 'Usuário cadastrado com sucesso.'];
    header('Location: index.php');
    exit();
} catch (PDOException $e) {
    $_SESSION['msg'] = ['type' => 'error', 'text' => 'Erro ao cadastrar: ' . $e->getMessage()];
    header('Location: index.php#cadastro');
    exit();
}
