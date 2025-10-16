📋 Projeto: Sistema de Cadastro e Edição de Usuários (PHP + MySQL)

Este projeto é um sistema simples de gerenciamento de usuários, desenvolvido em PHP com PDO, MySQL e HTML/CSS puro.
Permite cadastrar, listar, editar e excluir usuários, apresentando uma interface limpa e moderna inspirada no estilo das capturas de tela fornecidas.

🚀 Funcionalidades Principais

✅ Listagem completa de usuários cadastrados

✅ Cadastro de novos usuários (nome e e-mail)

✅ Edição de usuários existentes

✅ Exclusão de registros com confirmação em JavaScript

✅ Mensagens de sucesso e erro com feedback visual

✅ Código seguro (uso de PDO e prepared statements)

✅ Design limpo e responsivo em CSS puro

🧩 Estrutura de Pastas
/projeto-usuarios
│
├─ conexao.php          # Arquivo de conexão com o banco de dados (PDO)
├─ index.php            # Página inicial: lista e cadastra usuários
├─ cadastrar.php        # Processa o cadastro de novos usuários
├─ editar.php           # Página e lógica de edição de usuários
├─ deletar.php          # Lógica de exclusão de usuários
│
├─ assets/
│   ├─ css/
│   │   └─ style.css    # Folha de estilos do projeto
│   └─ js/
│       └─ scripts.js   # Funções JavaScript (confirmação de exclusão, etc.)
│
└─ README.md            # Este arquivo de documentação

🛠️ Tecnologias Utilizadas

PHP 8+ (com PDO)

MySQL/MariaDB

HTML5

CSS3

JavaScript (básico, para interações simples)

XAMPP/WAMP (para ambiente local)

⚙️ Instalação e Configuração
1. Clone ou copie os arquivos

Coloque a pasta do projeto dentro do diretório do servidor local, por exemplo:

C:\xampp\htdocs\projeto-usuarios

2. Crie o banco de dados

Acesse o phpMyAdmin e execute o seguinte SQL:

CREATE DATABASE hiremaster_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hiremaster_db;

CREATE TABLE usuarios (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(150) NOT NULL,
  email VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email) VALUES
('Jorginho','jorge@gmail.com'),
('oscar junior','oscar@gmail.com'),
('Pedrinho','pedro@gmail.com');

3. Configure o acesso ao banco

No arquivo conexao.php, ajuste os dados conforme seu ambiente local:

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'hiremaster_db');
define('DB_USER', 'root');
define('DB_PASS', ''); // senha vazia no XAMPP por padrão

4. Acesse no navegador

Abra:

http://localhost/projeto-usuarios/index.php


Pronto! O sistema estará funcionando localmente.

🧠 Funcionamento do Sistema
🔹 Página principal (index.php)

Exibe uma tabela com todos os usuários cadastrados.

Oferece botões para Editar e Deletar.

Possui um formulário de cadastro na parte inferior.

🔹 Cadastro (cadastrar.php)

Recebe os dados do formulário via POST.

Cadastra no banco de dados e redireciona de volta para a listagem.

🔹 Edição (editar.php)

Recebe o ID do usuário via GET (?edit_id=...).

Preenche automaticamente o formulário com os dados do usuário.

Após salvar, redireciona para a página inicial com mensagem de sucesso.

🔹 Exclusão (deletar.php)

Solicita confirmação via JavaScript.

Exclui o usuário selecionado e retorna à listagem com feedback.

🎨 Design e Layout

O estilo visual foi criado em CSS puro, com:

Layout centralizado e espaçamento agradável.

Bordas suaves e caixas arredondadas.

Mensagens de status (verde para sucesso, vermelho para erro).

Tabela limpa e organizada.

Responsividade para telas menores.

🔒 Segurança

Todos os comandos SQL usam Prepared Statements para evitar SQL Injection.

As entradas de usuário são filtradas com filter_input().

O projeto utiliza sessões PHP para gerenciar mensagens de feedback.

💡 Possíveis Extensões Futuras

Paginação da tabela de usuários

Busca e filtro por nome/e-mail

Upload de foto do usuário

Exportação de dados para CSV ou Excel

Implementação de autenticação (login de administrador)

👨‍💻 Autor

Desenvolvido por: Francisco Skraba Pavezzi

🧾 Licença

Este projeto é de uso livre para fins educacionais.
Sinta-se à vontade para modificar e expandir conforme suas necessidades.

📄 Arquivo: README.md
🕓 Última atualização: Outubro de 2025
💾 Versão: 1.0.0