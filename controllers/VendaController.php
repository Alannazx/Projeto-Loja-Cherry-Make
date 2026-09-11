<?php

require_once __DIR__ . '/../models/Venda.php';
require_once __DIR__ . '/../config/db.php';

class VendaController
{
    private Venda $venda;

    public function __construct()
    {
        $pdo = Database::getConnection();

        $this->venda = new Venda($pdo);
    }

    /**
     * Página de vendas.
     */
    public function index(): void
    {
        $this->verificarLogin();

        // Todas as vendas de todos os meses
        $vendas = $this->venda->listarTodos();

        // Total geral
        $totalVendas = $this->venda->total();

        // Produtos cadastrados
        $produtos = $this->venda->listarProdutos();

        // Vendedores cadastrados
        $vendedores = $this->venda->listarVendedores();

        require __DIR__ . '/../views/vendas.php';
    }

    /**
     * Registra uma nova venda.
     */
    public function store(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirecionar();
        }

        $data = trim($_POST['data'] ?? '');

        $quantidade = filter_var(
            $_POST['quantidade'] ?? null,
            FILTER_VALIDATE_INT
        );

        $produtoId = filter_var(
            $_POST['produto_id'] ?? null,
            FILTER_VALIDATE_INT
        );

        $vendedorId = filter_var(
            $_POST['vendedor_id'] ?? null,
            FILTER_VALIDATE_INT
        );

        if (!$this->dataValida($data)) {
            $this->mensagem(
                'error',
                'Informe uma data válida.'
            );

            $this->redirecionar();
        }

        if ($quantidade === false || $quantidade < 1) {
            $this->mensagem(
                'error',
                'A quantidade de vendas deve ser maior que zero.'
            );

            $this->redirecionar();
        }

        if ($produtoId === false || $produtoId < 1) {
            $this->mensagem(
                'error',
                'Selecione um produto.'
            );

            $this->redirecionar();
        }

        if ($vendedorId === false || $vendedorId < 1) {
            $this->mensagem(
                'error',
                'Selecione um vendedor.'
            );

            $this->redirecionar();
        }

        try {

            /*
             * O horário NÃO é enviado aqui.
             *
             * O campo created_at do banco possui:
             *
             * DEFAULT CURRENT_TIMESTAMP
             *
             * Portanto o banco registra automaticamente
             * o momento em que a venda foi cadastrada.
             */

            $this->venda->criar(
                $data,
                $quantidade,
                $produtoId,
                $vendedorId
            );

            $this->mensagem(
                'success',
                'Venda registrada com sucesso!'
            );

        } catch (Throwable $e) {

            error_log(
                'Erro ao registrar venda: ' .
                $e->getMessage()
            );

            $this->mensagem(
                'error',
                'Não foi possível registrar a venda.'
            );
        }

        $this->redirecionar();
    }

    /**
     * Exclui uma venda.
     */
    public function delete(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirecionar();
        }

        $id = filter_var(
            $_POST['id'] ?? null,
            FILTER_VALIDATE_INT
        );

        if ($id === false || $id < 1) {
            $this->mensagem(
                'error',
                'Registro de venda inválido.'
            );

            $this->redirecionar();
        }

        try {

            if ($this->venda->excluir($id)) {

                $this->mensagem(
                    'success',
                    'Registro excluído com sucesso!'
                );

            } else {

                $this->mensagem(
                    'error',
                    'Venda não encontrada.'
                );
            }

        } catch (Throwable $e) {

            error_log(
                'Erro ao excluir venda: ' .
                $e->getMessage()
            );

            $this->mensagem(
                'error',
                'Não foi possível excluir a venda.'
            );
        }

        $this->redirecionar();
    }

    /**
     * Atualiza uma venda.
     */
    public function update(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirecionar();
        }

        $id = filter_var(
            $_POST['id'] ?? null,
            FILTER_VALIDATE_INT
        );

        $data = trim($_POST['data'] ?? '');

        $quantidade = filter_var(
            $_POST['quantidade'] ?? null,
            FILTER_VALIDATE_INT
        );

        $produtoId = filter_var(
            $_POST['produto_id'] ?? null,
            FILTER_VALIDATE_INT
        );

        $vendedorId = filter_var(
            $_POST['vendedor_id'] ?? null,
            FILTER_VALIDATE_INT
        );

        if (
            $id === false ||
            $id < 1 ||
            !$this->dataValida($data) ||
            $quantidade === false ||
            $quantidade < 1 ||
            $produtoId === false ||
            $produtoId < 1 ||
            $vendedorId === false ||
            $vendedorId < 1
        ) {
            $this->mensagem(
                'error',
                'Dados da venda inválidos.'
            );

            $this->redirecionar();
        }

        try {

            $this->venda->atualizar(
                $id,
                $data,
                $quantidade,
                $produtoId,
                $vendedorId
            );

            $this->mensagem(
                'success',
                'Venda atualizada com sucesso!'
            );

        } catch (Throwable $e) {

            error_log(
                'Erro ao atualizar venda: ' .
                $e->getMessage()
            );

            $this->mensagem(
                'error',
                'Não foi possível atualizar a venda.'
            );
        }

        $this->redirecionar();
    }

    /**
     * Verifica se o usuário está logado.
     */
    private function verificarLogin(): void
    {
        if (empty($_SESSION['nome'])) {

            header(
                'Location: /lojacosmeticos_alalet/index.php?controller=auth&action=form'
            );

            exit;
        }
    }

    /**
     * Valida a data.
     */
    private function dataValida(string $data): bool
    {
        $date = DateTime::createFromFormat(
            'Y-m-d',
            $data
        );

        return $date !== false &&
               $date->format('Y-m-d') === $data;
    }

    /**
     * Mensagem flash.
     */
    private function mensagem(
        string $tipo,
        string $texto
    ): void {

        $_SESSION['flash'] = [
            'tipo' => $tipo,
            'texto' => $texto
        ];
    }

    /**
     * Redireciona para a página de vendas.
     */
    private function redirecionar(): void
    {
        header(
            'Location: /lojacosmeticos_alalet/index.php?controller=venda&action=index'
        );

        exit;
    }
}
