<?php

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController
{
    private Categoria $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria();
    }

    /**
     * Verifica se o usuário está logado.
     */
    private function verificarLogin(): void
    {
        if (empty($_SESSION['nome'])) {

            header(
                'Location: index.php?controller=auth&action=form'
            );

            exit;
        }
    }

    /**
     * Verifica se o usuário é administrador.
     */
    private function verificarAdmin(): void
    {
        $perfil = strtolower($_SESSION['perfil'] ?? '');

        if ($perfil !== 'adm' && $perfil !== 'admin') {

            http_response_code(403);

            exit('Acesso negado.');
        }
    }

    /**
     * Página principal das categorias.
     */
    public function index(): void
    {
        $this->verificarLogin();
        $this->verificarAdmin();

        $categorias = $this->categoria->listarTodas();

        $editar = null;

        if (isset($_GET['id'])) {

            $editar = $this->categoria->buscarPorId(
                (int) $_GET['id']
            );
        }

        require __DIR__ . '/../views/categorias.php';
    }

    /**
     * Cadastra uma nova categoria.
     */
    public function salvar(): void
    {
        $this->verificarLogin();
        $this->verificarAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            header(
                'Location: index.php?controller=categoria&action=index'
            );

            exit;
        }

        $nome = trim($_POST['nome'] ?? '');

        if ($nome === '') {

            header(
                'Location: index.php?controller=categoria&action=index&erro=' .
                urlencode('Digite o nome da categoria.')
            );

            exit;
        }

        try {

            $this->categoria->inserir($nome);

            header(
                'Location: index.php?controller=categoria&action=index&sucesso=' .
                urlencode('Categoria cadastrada com sucesso!')
            );

            exit;

        } catch (PDOException $e) {

            header(
                'Location: index.php?controller=categoria&action=index&erro=' .
                urlencode('Não foi possível cadastrar a categoria.')
            );

            exit;
        }
    }

    /**
     * Atualiza uma categoria.
     */
    public function atualizar(): void
    {
        $this->verificarLogin();
        $this->verificarAdmin();

        $id = (int) ($_POST['id'] ?? 0);

        $nome = trim($_POST['nome'] ?? '');

        if ($id <= 0 || $nome === '') {

            header(
                'Location: index.php?controller=categoria&action=index&erro=' .
                urlencode('Dados inválidos.')
            );

            exit;
        }

        try {

            $this->categoria->atualizar(
                $id,
                $nome
            );

            header(
                'Location: index.php?controller=categoria&action=index&sucesso=' .
                urlencode('Categoria atualizada com sucesso!')
            );

            exit;

        } catch (PDOException $e) {

            header(
                'Location: index.php?controller=categoria&action=index&erro=' .
                urlencode('Não foi possível atualizar a categoria.')
            );

            exit;
        }
    }

    /**
     * Ativa ou inativa uma categoria.
     */
    public function toggle(): void
    {
        $this->verificarLogin();
        $this->verificarAdmin();

        $id = (int) ($_GET['id'] ?? 0);

        $ativo = (int) ($_GET['ativo'] ?? 0);

        if ($id <= 0) {

            header(
                'Location: index.php?controller=categoria&action=index'
            );

            exit;
        }

        try {

            $this->categoria->setAtivo(
                $id,
                $ativo === 1
            );

            header(
                'Location: index.php?controller=categoria&action=index'
            );

            exit;

        } catch (PDOException $e) {

            header(
                'Location: index.php?controller=categoria&action=index&erro=' .
                urlencode('Não foi possível alterar o status.')
            );

            exit;
        }
    }

    /**
     * Exclui uma categoria.
     */
    public function excluir(): void
    {
        $this->verificarLogin();
        $this->verificarAdmin();

        $id = (int) ($_GET['id'] ?? 0);

        if ($id <= 0) {

            header(
                'Location: index.php?controller=categoria&action=index&erro=' .
                urlencode('Categoria inválida.')
            );

            exit;
        }

        try {

            $this->categoria->excluir($id);

            header(
                'Location: index.php?controller=categoria&action=index&sucesso=' .
                urlencode('Categoria excluída com sucesso!')
            );

            exit;

        } catch (PDOException $e) {

            header(
                'Location: index.php?controller=categoria&action=index&erro=' .
                urlencode(
                    'Não foi possível excluir a categoria. Ela pode estar sendo utilizada por algum produto.'
                )
            );

            exit;
        }
    }
}