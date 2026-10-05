<?php

require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/Categoria.php';

class ProdutoController
{
    public function index(): void
    {
        $this->check();

        $produtoModel = new Produto();
        $categoriaModel = new Categoria();

        $produtos = $produtoModel->listarComCategoria(false);
        $categorias = $categoriaModel->listarAtivas();

        $editar = null;

        if (isset($_GET['id'])) {
            $editar = $produtoModel->buscarPorId((int)$_GET['id']);
        }

        require_once __DIR__ . '/../views/produtos.php';
    }


    public function salvar(): void
    {
        $this->check();
        $this->onlyAdmin();

        $id = (int)($_POST['id'] ?? 0);

        $categoriaId = (int)($_POST['categoria_id'] ?? 0);

        // NOVO: recebe o SKU informado no formulário
        $sku = trim((string)($_POST['sku'] ?? ''));

        $nome = trim($_POST['nome'] ?? '');

        $marca = trim($_POST['marca'] ?? '');

        $descricao = trim($_POST['descricao'] ?? '');


        // Recebe a quantidade de estoque
        $estoque = max(
            0,
            (int)($_POST['estoque'] ?? 0)
        );


        // Recebe o preço do formulário.
        // Aceita tanto 29.90 quanto 29,90.
        $precoInformado = trim(
            (string)($_POST['preco'] ?? '0')
        );

        $precoInformado = str_replace(
            ',',
            '.',
            $precoInformado
        );

        $preco = (float)$precoInformado;


        if (!is_finite($preco) || $preco < 0) {
            die("Preço inválido.");
        }


        $descricao =
            $descricao === ''
                ? null
                : $descricao;


        if ($categoriaId <= 0 || $nome === '') {
            die("Dados inválidos.");
        }


        $produtoModel = new Produto();


        // =========================
        // EDITAR PRODUTO
        // =========================

        if ($id > 0) {

            // Atualiza produto + SKU + estoque + preço
            $produtoModel->atualizar(
                $id,
                $categoriaId,
                $sku,
                $nome,
                $marca,
                $descricao,
                $estoque,
                $preco
            );


            // Salva/troca a imagem
            $this->salvarImagemDoProduto($id);


        } else {

            // =========================
            // CADASTRAR NOVO PRODUTO
            // =========================

            // Insere produto + SKU + estoque + preço
            // e pega o ID para nomear a imagem
            $novoId = $produtoModel->inserir(
                $categoriaId,
                $sku,
                $nome,
                $marca,
                $descricao,
                $estoque,
                $preco
            );


            // Salva a imagem usando o ID recém-criado
            $this->salvarImagemDoProduto($novoId);
        }


        header(
            "Location: index.php?controller=produto&action=index"
        );

        exit;
    }


    public function toggle(): void
    {
        $this->check();

        $this->onlyAdmin();

        $id = (int)($_GET['id'] ?? 0);

        $ativo = (int)($_GET['ativo'] ?? 1);


        if ($id <= 0) {
            die("ID inválido.");
        }


        $produtoModel = new Produto();

        $produtoModel->setAtivo(
            $id,
            $ativo === 1
        );


        header(
            "Location: index.php?controller=produto&action=index"
        );

        exit;
    }


    public function remover(): void
    {
        $this->check();

        $this->onlyAdmin();

        $id = (int)($_GET['id'] ?? 0);


        if ($id <= 0) {
            die("ID inválido.");
        }


        $produtoModel = new Produto();

        $produtoModel->remover($id);


        // Remove a imagem do produto, se existir
        $destDir =
            __DIR__ .
            '/../public/uploads/produtos/';


        foreach (
            ['jpg', 'png', 'webp']
            as $ext
        ) {

            $arquivo =
                $destDir .
                $id .
                '.' .
                $ext;


            if (file_exists($arquivo)) {
                unlink($arquivo);
            }
        }


        header(
            "Location: index.php?controller=produto&action=index"
        );

        exit;
    }


    // -------------------------
    // Upload (POO + seguro)
    // -------------------------

    private function salvarImagemDoProduto(
        int $produtoId
    ): void
    {

        if (
            !isset($_FILES['imagem']) ||
            $_FILES['imagem']['error'] !== UPLOAD_ERR_OK
        ) {
            return;
        }


        // Limita tamanho: 2MB
        if (
            ($_FILES['imagem']['size'] ?? 0)
            > 2 * 1024 * 1024
        ) {
            return;
        }


        $tmp =
            $_FILES['imagem']['tmp_name'];


        $mime =
            mime_content_type($tmp);


        $ext = match ($mime) {

            'image/jpeg' => 'jpg',

            'image/png' => 'png',

            'image/webp' => 'webp',

            default => null
        };


        if ($ext === null) {
            return;
        }


        $destDir =
            __DIR__ .
            '/../public/uploads/produtos/';


        if (!is_dir($destDir)) {

            mkdir(
                $destDir,
                0777,
                true
            );
        }


        // Remove versões antigas caso a imagem seja trocada
        foreach (
            ['jpg', 'png', 'webp']
            as $e
        ) {

            $old =
                $destDir .
                $produtoId .
                '.' .
                $e;


            if (file_exists($old)) {
                unlink($old);
            }
        }


        $dest =
            $destDir .
            $produtoId .
            '.' .
            $ext;


        move_uploaded_file(
            $tmp,
            $dest
        );
    }


    // -------------------------
    // Segurança básica de sessão
    // -------------------------

    private function check(): void
    {

        if (
            !isset($_SESSION['usuario_id'])
        ) {

            header(
                "Location: index.php?controller=auth&action=form"
            );

            exit;
        }
    }


    private function onlyAdmin(): void
    {

        if (
            ($_SESSION['perfil'] ?? '')
            !== 'admin'
        ) {

            die("Acesso negado.");
        }
    }
}