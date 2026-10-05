<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController
{
    private Cliente $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }


    // =====================================================
    // PÁGINA DE LOGIN
    // =====================================================

    public function login()
    {
        require __DIR__ . '/../views/cliente_login.php';
    }


    // =====================================================
    // PÁGINA DE CADASTRO
    // =====================================================

    public function cadastro()
    {
        require __DIR__ . '/../views/cliente_cadastro.php';
    }


    // =====================================================
    // PROCESSAR CADASTRO
    // =====================================================

    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header(
                'Location: index.php?controller=cliente&action=cadastro'
            );
            exit;
        }


        $nome = trim($_POST['nome'] ?? '');
        $cpf = trim($_POST['cpf'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $cep = trim($_POST['cep'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $dataNascimento = trim($_POST['data_nascimento'] ?? '');


        // =================================================
        // VALIDAÇÕES
        // =================================================

        if (
            empty($nome) ||
            empty($cpf) ||
            empty($telefone) ||
            empty($email) ||
            empty($cep) ||
            empty($senha) ||
            empty($dataNascimento)
        ) {

            $_SESSION['erro_cliente'] =
                'Preencha todos os campos obrigatórios.';

            header(
                'Location: index.php?controller=cliente&action=cadastro'
            );
            exit;
        }


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $_SESSION['erro_cliente'] =
                'Digite um e-mail válido.';

            header(
                'Location: index.php?controller=cliente&action=cadastro'
            );
            exit;
        }


        if (strlen($senha) < 6) {

            $_SESSION['erro_cliente'] =
                'A senha deve possuir pelo menos 6 caracteres.';

            header(
                'Location: index.php?controller=cliente&action=cadastro'
            );
            exit;
        }


        // =================================================
        // VERIFICAR EMAIL EXISTENTE
        // =================================================

        if ($this->cliente->buscarPorEmail($email)) {

            $_SESSION['erro_cliente'] =
                'Este e-mail já está cadastrado.';

            header(
                'Location: index.php?controller=cliente&action=cadastro'
            );
            exit;
        }


        // =================================================
        // VERIFICAR CPF EXISTENTE
        // =================================================

        if ($this->cliente->buscarPorCpf($cpf)) {

            $_SESSION['erro_cliente'] =
                'Este CPF já está cadastrado.';

            header(
                'Location: index.php?controller=cliente&action=cadastro'
            );
            exit;
        }


        // =================================================
        // CRIPTOGRAFAR SENHA
        // =================================================

        $senhaHash = password_hash(
            $senha,
            PASSWORD_DEFAULT
        );


        // =================================================
        // CADASTRAR
        // =================================================

        try {

            $this->cliente->cadastrar(
                $nome,
                $cpf,
                $telefone,
                $email,
                $cep,
                $senhaHash,
                $dataNascimento
            );

            $_SESSION['sucesso_cliente'] =
                'Conta criada com sucesso! Agora faça seu login.';

            header(
                'Location: index.php?controller=cliente&action=login'
            );
            exit;

        } catch (PDOException $e) {

            $_SESSION['erro_cliente'] =
                'Não foi possível realizar o cadastro.';

            header(
                'Location: index.php?controller=cliente&action=cadastro'
            );
            exit;
        }
    }


    // =====================================================
    // PROCESSAR LOGIN
    // =====================================================

    public function entrar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header(
                'Location: index.php?controller=cliente&action=login'
            );
            exit;
        }


        $login = trim($_POST['login'] ?? '');
        $senha = $_POST['senha'] ?? '';


        if (empty($login) || empty($senha)) {

            $_SESSION['erro_cliente'] =
                'Informe seu e-mail ou CPF e sua senha.';

            header(
                'Location: index.php?controller=cliente&action=login'
            );
            exit;
        }


        $cliente = $this->cliente->buscarPorLogin($login);


        if (!$cliente || !password_verify($senha, $cliente['senha'])) {

            $_SESSION['erro_cliente'] =
                'E-mail/CPF ou senha incorretos.';

            header(
                'Location: index.php?controller=cliente&action=login'
            );
            exit;
        }


        // =================================================
        // CRIAR SESSÃO DO CLIENTE
        // =================================================

        $_SESSION['cliente_id'] = $cliente['id'];
        $_SESSION['cliente_nome'] = $cliente['nome'];
        $_SESSION['cliente_email'] = $cliente['email'];

        $_SESSION['perfil'] = 'cliente';
        $_SESSION['nome'] = $cliente['nome'];


        // =================================================
        // IR PARA O SITE
        // =================================================

        header(
            'Location: index.php?controller=site&action=index'
        );
        exit;
    }


    // =====================================================
    // LOGOUT DO CLIENTE
    // =====================================================

    public function logout()
    {
        unset($_SESSION['cliente_id']);
        unset($_SESSION['cliente_nome']);
        unset($_SESSION['cliente_email']);

        header(
            'Location: index.php?controller=cliente&action=login'
        );
        exit;
    }
}