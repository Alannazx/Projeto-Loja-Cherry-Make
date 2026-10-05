<?php

require_once dirname(__DIR__) . '/models/Relatorio.php';

class RelatorioController
{
    private Relatorio $relatorio;

    public function __construct()
    {
        $this->relatorio = new Relatorio();
    }

    /**
     * Verifica se o usuário está logado
     */
    private function verificarLogin(): void
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=auth&action=form');
            exit;
        }
    }

    /**
     * Exibe a página de relatórios
     */
    public function index(): void
    {
        $this->verificarLogin();

        $relatorios = $this->relatorio->listarTodos();
        $admins = $this->relatorio->listarAdmins();

        // Caminho correto para a pasta views
        require dirname(__DIR__) . '/views/relatorios.php';
    }

    /**
     * Salva um novo relatório
     */
    public function store(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=relatorio&action=index');
            exit;
        }

        $usuarioId = (int) ($_POST['usuario_id'] ?? 0);
        $data = trim($_POST['data'] ?? '');
        $relatorioTexto = trim($_POST['relatorio'] ?? '');

        // Busca novamente somente os administradores
        $admins = $this->relatorio->listarAdmins();

        $idsAdmins = array_map(
            fn($admin) => (int) $admin['id'],
            $admins
        );

        // Verifica se o usuário selecionado realmente é administrador
        if (!in_array($usuarioId, $idsAdmins, true)) {
            header(
                'Location: index.php?controller=relatorio&action=index&erro=' .
                urlencode('Selecione um vendedor administrador válido.')
            );
            exit;
        }

        if (empty($data)) {
            header(
                'Location: index.php?controller=relatorio&action=index&erro=' .
                urlencode('Informe a data do relatório.')
            );
            exit;
        }

        if (empty($relatorioTexto)) {
            header(
                'Location: index.php?controller=relatorio&action=index&erro=' .
                urlencode('Digite o relatório antes de salvar.')
            );
            exit;
        }

        try {
            $this->relatorio->criar(
                $usuarioId,
                $data,
                $relatorioTexto
            );

            header(
                'Location: index.php?controller=relatorio&action=index&sucesso=' .
                urlencode('Relatório registrado com sucesso!')
            );
            exit;

        } catch (Exception $e) {

            header(
                'Location: index.php?controller=relatorio&action=index&erro=' .
                urlencode($e->getMessage())
            );
            exit;
        }
    }

    /**
     * Exclui um relatório
     */
    public function delete(): void
    {
        $this->verificarLogin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=relatorio&action=index');
            exit;
        }

        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0) {
            header(
                'Location: index.php?controller=relatorio&action=index&erro=' .
                urlencode('Relatório inválido.')
            );
            exit;
        }

        try {
            $this->relatorio->excluir($id);

            header(
                'Location: index.php?controller=relatorio&action=index&sucesso=' .
                urlencode('Relatório excluído com sucesso!')
            );
            exit;

        } catch (Exception $e) {

            header(
                'Location: index.php?controller=relatorio&action=index&erro=' .
                urlencode($e->getMessage())
            );
            exit;
        }
    }
}