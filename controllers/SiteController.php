<?php

require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/Site.php';

class SiteController
{
    private Produto $produto;
    private Site $site;

    public function __construct()
    {
        // O Produto já faz a conexão com o banco.
        $this->produto = new Produto();
        $this->site = new Site();
    }

    /**
     * Abre a página principal da loja, enviando produtos e categorias
     * cadastradas no banco de dados.
     */
    public function index(): void
    {
        $produtos = $this->produto->listarComCategoria(true);
        $categorias = $this->site->listarCategorias();

        require __DIR__ . '/../views/site.php';
    }

    /**
     * Retorna os dados de um produto para o card/modal.
     */
    public function produto(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            http_response_code(400);

            echo json_encode([
                'sucesso' => false,
                'mensagem' => 'Produto inválido.'
            ], JSON_UNESCAPED_UNICODE);

            exit;
        }

        $produto = $this->produto->buscarPorId($id);

        if (!$produto) {
            http_response_code(404);

            echo json_encode([
                'sucesso' => false,
                'mensagem' => 'Produto não encontrado.'
            ], JSON_UNESCAPED_UNICODE);

            exit;
        }

        echo json_encode([
            'sucesso' => true,
            'produto' => $produto
        ], JSON_UNESCAPED_UNICODE);

        exit;
    }
}
