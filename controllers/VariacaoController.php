<?php
require_once __DIR__ . '/../models/Variacao.php';
require_once __DIR__ . '/../models/Produto.php';

class VariacaoController
{
    public function index(): void
    {
        $this->check();

        $produtoId = (int)($_GET['produto_id'] ?? 0);

        $variacaoModel = new Variacao();
        $produtos = $variacaoModel->listarProdutos();
        $produto = null;
        $variacoes = [];
        $editar = null;

        if ($produtoId > 0) {
            $produtoModel = new Produto();
            $produto = $produtoModel->buscarPorId($produtoId);

            if (!$produto) {
                die("Produto não encontrado.");
            }

            $variacoes = $variacaoModel->listarPorProduto($produtoId);

            if (isset($_GET['id'])) {
                $editar = $variacaoModel->buscarPorId((int)$_GET['id']);
            }
        }

        require_once __DIR__ . '/../views/variacoes.php';
    }

    public function salvar(): void
    {
        $this->check();
        $this->onlyAdmin();

        $id = (int)($_POST['id'] ?? 0);
        $produtoId = (int)($_POST['produto_id'] ?? 0);
        $tamanho = trim($_POST['tamanho'] ?? '');
        $tamanho = $tamanho === '' ? null : $tamanho;

        $cor = trim($_POST['cor'] ?? '');
        $cor = $cor === '' ? null : $cor;

        $sku = trim($_POST['sku'] ?? '');
        
        // Aceita preço no formato brasileiro (ex.: 19,90 ou 1.299,90).
        $precoRaw = trim($_POST['preco'] ?? '0');
        $precoRaw = str_replace(['R$', ' '], '', $precoRaw);
        if (strpos($precoRaw, ',') !== false) {
            $precoRaw = str_replace('.', '', $precoRaw);
            $precoRaw = str_replace(',', '.', $precoRaw);
        }
        $preco = is_numeric($precoRaw) ? (float)$precoRaw : 0;

        if ($produtoId <= 0 || $sku === '' || strlen($sku) > 50 || $preco <= 0) {
            die("Confira o produto, o SKU (até 50 caracteres) e informe um preço válido.");
        }
        if ($tamanho !== null && strlen($tamanho) > 10) {
            die("O tamanho deve ter no máximo 10 caracteres.");
        }
        if ($cor !== null && strlen($cor) > 30) {
            die("A cor deve ter no máximo 30 caracteres.");
        }

        $variacaoModel = new Variacao();

        try {
            if ($id > 0) {
                $variacaoModel->atualizar($id, $tamanho, $cor, $sku, $preco);
            } else {
                $variacaoModel->inseri($produtoId, $tamanho, $cor, $sku, $preco);
            }
        } catch (\PDOException $e) {
            die("Não foi possível salvar. Verifique se o SKU já existe e se o produto informado está cadastrado.");
        }

        header("Location: index.php?controller=variacao&action=index&produto_id=" . $produtoId);
        exit;
    }

    public function deletar(): void
    {
        $this->check();
        $this->onlyAdmin();

        $id = (int)($_GET['id'] ?? 0);
        $produtoId = (int)($_GET['produto_id'] ?? 0);

        if ($id <= 0 || $produtoId <= 0) {
            die("Parâmetros inválidos.");
        }

        $variacaoModel = new Variacao();

        try {
            $variacaoModel->deletar($id);
       } catch (\PDOException $e) {
    die("Erro real do MySQL: " . $e->getMessage());
}

        header("Location: index.php?controller=variacao&action=index&produto_id=" . $produtoId);
        exit;
    }

    private function check(): void
    {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?controller=auth&action=form");
            exit;
        }
    }

    private function onlyAdmin(): void
    {
        if (($_SESSION['perfil'] ?? '') !== 'admin') {
            die("Acesso negado.");
        }
    }
}