<?php
// conexao.php
// Ajuste conforme seu ambiente local
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'hiremaster_db');
define('DB_USER', 'root');
define('DB_PASS', ''); // coloque a senha do seu DB, se houver

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        $options
    );
} catch (PDOException $e) {
    // Em ambiente de produção não mostre a mensagem completa
    die("Erro na conexão com o banco: " . $e->getMessage());
}
