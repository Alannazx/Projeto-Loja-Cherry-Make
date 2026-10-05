<?php

require_once __DIR__ . '/../models/Entrada.php';

class EntradaController
{
    public function index(): void
    {
        $this->check();

        $entradaModel = new Entrada();

        $entradas = $entradaModel->listarTodos();

        $fornecedores = $entradaModel->listarFornecedores();

        $editar = null;

        if (isset($_GET['id'])) {

            $editar = $entradaModel->buscarPorId(
                (int)$_GET['id']
            );
        }

        require_once __DIR__ . '/../views/entrada.php';
    }


    public function salvar(): void
    {
        $this->check();
        $this->onlyAdmin();

        $id = (int)($_POST['id'] ?? 0);

        // Agora recebe o ID do fornecedor
        $fornecedor = (int)($_POST['fornecedor'] ?? 0);

        // Mercadoria que entrou
        $mercadoria = trim(
            (string)($_POST['mercadoria'] ?? '')
        );

        $data = trim(
            (string)($_POST['data'] ?? '')
        );


        if ($fornecedor <= 0) {
            die("Selecione um fornecedor.");
        }


        if ($mercadoria === '') {
            die("Informe qual mercadoria entrou.");
        }


        if ($data === '') {
            die("Informe a data.");
        }


        $entradaModel = new Entrada();


        // EDITAR
        if ($id > 0) {

            $entradaModel->atualizar(
                $id,
                $fornecedor,
                $mercadoria,
                $data
            );

        } else {

            // CADASTRAR
            $entradaModel->inserir(
                $fornecedor,
                $mercadoria,
                $data
            );
        }


        header(
            "Location: index.php?controller=entrada&action=index"
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


        $entradaModel = new Entrada();

        $entradaModel->remover($id);


        header(
            "Location: index.php?controller=entrada&action=index"
        );

        exit;
    }


    private function check(): void
    {
        if (!isset($_SESSION['usuario_id'])) {

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