<?php

require_once __DIR__ . '/../models/Venda.php';
require_once __DIR__ . '/../config/db.php';

class VendaController
{
    private Venda $venda;

    public function __construct()
    {
        // O index.php já carrega config/db.php e inicia a sessão.
        // Aqui usamos a mesma conexão do projeto.
        $pdo = Database::getConnection();

        $this->venda = new Venda($pdo);
    }

    public function index(): void
    {
        $this->verificarLogin();

        $mesAtual = date('Y-m');

        $vendas = $this->venda->listarPorMes($mesAtual);
        $totalVendas = $this->venda->totalPorMes($mesAtual);
        $totalGeral = $this->venda->total();

        require __DIR__ . '/../views/vendas.php';
    }

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

        if (!$this->dataValida($data)) {
            $this->mensagem('error', 'Informe uma data válida.');
            $this->redirecionar();
        }

        if ($quantidade === false || $quantidade < 1) {
            $this->mensagem(
                'error',
                'A quantidade de vendas deve ser maior que zero.'
            );
            $this->redirecionar();
        }

        try {
            $this->venda->criar($data, $quantidade);
            $this->mensagem('success', 'Venda registrada com sucesso!');
        } catch (Throwable $e) {
            error_log('Erro ao registrar venda: ' . $e->getMessage());
            $this->mensagem('error', 'Não foi possível registrar a venda.');
        }

        $this->redirecionar();
    }

    public function delete(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirecionar();
        }

        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);

        if ($id === false || $id < 1) {
            $this->mensagem('error', 'Registro de venda inválido.');
            $this->redirecionar();
        }

        try {
            if ($this->venda->excluir($id)) {
                $this->mensagem('success', 'Registro excluído com sucesso!');
            } else {
                $this->mensagem('error', 'Venda não encontrada.');
            }
        } catch (Throwable $e) {
            error_log('Erro ao excluir venda: ' . $e->getMessage());
            $this->mensagem('error', 'Não foi possível excluir a venda.');
        }

        $this->redirecionar();
    }

    public function update(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirecionar();
        }

        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
        $data = trim($_POST['data'] ?? '');
        $quantidade = filter_var(
            $_POST['quantidade'] ?? null,
            FILTER_VALIDATE_INT
        );

        if ($id === false || $id < 1 || !$this->dataValida($data) ||
            $quantidade === false || $quantidade < 1) {
            $this->mensagem('error', 'Dados da venda inválidos.');
            $this->redirecionar();
        }

        try {
            $this->venda->atualizar($id, $data, $quantidade);
            $this->mensagem('success', 'Venda atualizada com sucesso!');
        } catch (Throwable $e) {
            error_log('Erro ao atualizar venda: ' . $e->getMessage());
            $this->mensagem('error', 'Não foi possível atualizar a venda.');
        }

        $this->redirecionar();
    }

    private function verificarLogin(): void
    {
        if (empty($_SESSION['nome'])) {
            header(
                'Location: /lojacosmeticos_alalet/index.php?controller=auth&action=form'
            );
            exit;
        }
    }

    private function dataValida(string $data): bool
    {
        $date = DateTime::createFromFormat('Y-m-d', $data);

        return $date !== false && $date->format('Y-m-d') === $data;
    }

    private function mensagem(string $tipo, string $texto): void
    {
        $_SESSION['flash'] = [
            'tipo' => $tipo,
            'texto' => $texto
        ];
    }

    private function redirecionar(): void
    {
        header(
            'Location: /lojacosmeticos_alalet/index.php?controller=venda&action=index'
        );
        exit;
    }
}
