<?php

require_once __DIR__ . '/../models/Fornecedor.php';

class FornecedorController
{
    private Fornecedor $fornecedor;

    public function __construct()
    {
        $this->fornecedor = new Fornecedor();
    }

    private function verificarLogin(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario_id'])) {
            header(
                'Location: /lojacosmeticos_alalet/index.php?controller=auth&action=form'
            );
            exit;
        }
    }

    public function index(): void
    {
        $this->verificarLogin();

        $fornecedores = $this->fornecedor->listarTodos();

        require __DIR__ . '/../views/fornecedor.php';

        // Impede que qualquer código depois da View seja executado
        exit;
    }

    public function store(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header(
                'Location: /lojacosmeticos_alalet/index.php?controller=fornecedor&action=index'
            );
            exit;
        }

        $nome = trim($_POST['nome'] ?? '');
        $cnpj = trim($_POST['cnpj'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $endereco = trim($_POST['endereco'] ?? '');
        $item_fornecido = trim($_POST['item_fornecido'] ?? '');

        if (
            $nome === '' ||
            $cnpj === '' ||
            $telefone === '' ||
            $email === '' ||
            $endereco === '' ||
            $item_fornecido === ''
        ) {
            header(
                'Location: /lojacosmeticos_alalet/index.php?controller=fornecedor&action=index&erro=preencha'
            );
            exit;
        }

        $this->fornecedor->criar(
            $nome,
            $cnpj,
            $telefone,
            $email,
            $endereco,
            $item_fornecido
        );

        header(
            'Location: /lojacosmeticos_alalet/index.php?controller=fornecedor&action=index&sucesso=1'
        );
        exit;
    }

    public function delete(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header(
                'Location: /lojacosmeticos_alalet/index.php?controller=fornecedor&action=index'
            );
            exit;
        }

        $id = (int) ($_POST['id'] ?? 0);

        if ($id > 0) {
            $this->fornecedor->excluir($id);
        }

        header(
            'Location: /lojacosmeticos_alalet/index.php?controller=fornecedor&action=index&excluido=1'
        );
        exit;
    }
}