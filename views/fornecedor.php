<?php

$nome = $_SESSION['nome'] ?? 'Usuário';
$perfil = $_SESSION['perfil'] ?? 'vendedor';

$fornecedores = $fornecedores ?? [];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fornecedores - Cherry Make</title>

    <link
        rel="icon"
        href="/lojacosmeticos_alalet/public/assets/img/cherry.png"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,500;6..96,600&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --vinho: #99001f;
            --vinho-escuro: #7b0019;

            --rosa: #ef7898;
            --rosa-claro: #fff7f9;
            --rosa-medio: #f5a4b8;
            --rosa-forte: #e85d83;

            --branco: #ffffff;

            --texto: #65182a;
            --texto-claro: #8b4c5b;

            --borda: #f2b7c7;

            --fundo: #fff9fb;
        }

        html {
            scroll-behavior: smooth;
        }

        body {

            min-height: 100vh;

            font-family: "Poppins", Arial, sans-serif;

            color: var(--texto);

            background:
                radial-gradient(
                    circle at 84% 17%,
                    #ef7898 0px,
                    #ef7898 6px,
                    transparent 7px
                ),

                radial-gradient(
                    circle at 89% 22%,
                    #f5a4b8 0px,
                    #f5a4b8 6px,
                    transparent 7px
                ),

                radial-gradient(
                    circle at 94% 16%,
                    #99001f 0px,
                    #99001f 6px,
                    transparent 7px
                ),

                radial-gradient(
                    circle at 91% 27%,
                    #f5a4b8 0px,
                    #f5a4b8 5px,
                    transparent 6px
                ),

                linear-gradient(
                    135deg,
                    #fffafb,
                    #fff1f5
                );

            padding: 0;
        }


        /* =========================================================
           CABEÇALHO
        ========================================================= */

        header {

            min-height: 105px;

            padding: 20px 55px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background: var(--vinho);

            box-shadow:
                0 5px 18px rgba(139, 0, 31, .15);
        }


        .logo-area {

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .logo-area img {

            width: 60px;

            height: 60px;

            object-fit: contain;

            background: white;

            padding: 5px;

            border-radius: 50%;
        }


        .btn-voltar-header {

            width: 44px;

            height: 44px;

            min-width: 44px;

            border-radius: 50%;

            background: #fff0f4;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--vinho);

            font-size: 25px;

            line-height: 1;

            text-decoration: none;

            border: 1px solid rgba(242,183,199,.6);

            transition: .2s;

            cursor: pointer;
        }


        .btn-voltar-header:hover {

            background: var(--rosa-claro);

            transform: translateX(-3px);
        }


        .logo-area h1 {

            font-family: "Bodoni Moda", Georgia, serif;

            color: white;

            font-size: 28px;

            font-weight: 600;
        }


        .usuario {

            display: flex;

            align-items: center;

            gap: 15px;
        }


        .usuario-info {

            color: white;

            text-align: right;
        }


        .usuario-info strong {

            display: block;

            font-size: 14px;
        }


        .usuario-info span {

            font-size: 12px;

            opacity: .85;
        }


        .btn-sair {

            text-decoration: none;

            background: white;

            color: var(--vinho);

            padding: 9px 18px;

            border-radius: 22px;

            font-size: 13px;

            font-weight: 600;

            transition: .2s;
        }


        .btn-sair:hover {

            background: var(--rosa-claro);

            transform: translateY(-2px);
        }


        /* =========================================================
           CONTAINER
        ========================================================= */

        .container {

            width: 92%;

            max-width: 1250px;

            margin: 35px auto 60px;
        }


        /* =========================================================
           TOPO DA PÁGINA
        ========================================================= */

        .topo-pagina {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

            gap: 20px;
        }


        .titulo {

            display: flex;

            align-items: center;

            gap: 18px;
        }


        .titulo-texto h2 {

            font-family: "Bodoni Moda", Georgia, serif;

            font-size: 34px;

            color: var(--vinho);

            margin-bottom: 4px;
        }


        .titulo-texto p {

            color: var(--texto-claro);

            font-size: 14px;
        }


        /* =========================================================
           MENSAGENS
        ========================================================= */

        .mensagem {

            padding: 13px 16px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 13px;

            font-weight: 500;
        }


        .sucesso {

            background: #edf9f0;

            color: #24733a;

            border: 1px solid #c6e8ce;
        }


        .erro {

            background: #fff0f2;

            color: #a00025;

            border: 1px solid #f1c4cd;
        }


        /* =========================================================
           FORMULÁRIO
        ========================================================= */

        .card-form {

            background: rgba(255,255,255,.92);

            border: 1px solid var(--borda);

            border-radius: 18px;

            padding: 28px;

            box-shadow:
                0 8px 25px rgba(105, 0, 22, .07);

            margin-bottom: 30px;
        }


        .card-form h3 {

            font-family: "Bodoni Moda", Georgia, serif;

            font-size: 23px;

            color: var(--vinho);

            margin-bottom: 22px;
        }


        .form-grid {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 18px;
        }


        .campo {

            display: flex;

            flex-direction: column;
        }


        .campo.full {

            grid-column: 1 / -1;
        }


        .campo label {

            font-size: 13px;

            font-weight: 600;

            color: var(--texto);

            margin-bottom: 7px;
        }


        .campo input {

            width: 100%;

            height: 44px;

            border: 1px solid #e8c5d0;

            border-radius: 9px;

            padding: 0 13px;

            outline: none;

            font-family: "Poppins", sans-serif;

            font-size: 13px;

            color: var(--texto);

            background: white;

            transition: .2s;
        }


        .campo input:focus {

            border-color: var(--vinho);

            box-shadow:
                0 0 0 3px rgba(139,0,31,.08);
        }


        .acoes-form {

            margin-top: 22px;

            display: flex;

            justify-content: flex-end;

            gap: 10px;
        }


        .btn-limpar {

            border: 1px solid #e5c1cc;

            background: white;

            color: var(--texto-claro);

            padding: 11px 20px;

            border-radius: 9px;

            font-family: "Poppins", sans-serif;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;
        }


        .btn-limpar:hover {

            background: var(--rosa-claro);
        }


        .btn-cadastrar {

            border: none;

            background: var(--vinho);

            color: white;

            padding: 11px 22px;

            border-radius: 9px;

            font-family: "Poppins", sans-serif;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }


        .btn-cadastrar:hover {

            background: var(--vinho-escuro);

            transform: translateY(-1px);
        }


        /* =========================================================
           LISTA
        ========================================================= */

        .card-lista {

            background: rgba(255,255,255,.92);

            border: 1px solid var(--borda);

            border-radius: 18px;

            box-shadow:
                0 8px 25px rgba(105, 0, 22, .07);

            overflow: hidden;
        }


        .cabecalho-lista {

            padding: 22px 25px;

            border-bottom: 1px solid var(--borda);

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .cabecalho-lista h3 {

            font-family: "Bodoni Moda", Georgia, serif;

            font-size: 23px;

            color: var(--vinho);
        }


        .contador {

            background: #fff0f4;

            color: var(--vinho);

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 600;
        }


        .tabela-container {

            width: 100%;

            overflow-x: auto;
        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 950px;
        }


        th {

            background: #fff5f8;

            color: var(--vinho);

            text-align: left;

            padding: 14px 12px;

            font-size: 12px;

            font-weight: 700;

            border-bottom: 1px solid var(--borda);
        }


        td {

            padding: 15px 12px;

            font-size: 12px;

            color: var(--texto);

            border-bottom: 1px solid #f3e4e8;

            vertical-align: middle;
        }


        tbody tr:hover {

            background: #fffafb;
        }


        .id-fornecedor {

            font-weight: 700;

            color: var(--vinho);
        }


        .nome-fornecedor {

            font-weight: 600;
        }


        .item {

            display: inline-block;

            background: #fff0f4;

            color: var(--vinho);

            padding: 5px 9px;

            border-radius: 7px;

            font-size: 11px;

            font-weight: 600;
        }


        .btn-excluir {

            border: 1px solid #f0c7cf;

            background: #fff0f2;

            color: #a00025;

            padding: 7px 12px;

            border-radius: 7px;

            font-family: "Poppins", sans-serif;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }


        .btn-excluir:hover {

            background: #a00025;

            color: white;
        }


        .sem-registros {

            padding: 45px 20px;

            text-align: center;

            color: var(--texto-claro);

            font-size: 14px;
        }


        .sem-registros strong {

            display: block;

            color: var(--vinho);

            font-family: "Bodoni Moda", Georgia, serif;

            font-size: 20px;

            margin-bottom: 5px;
        }


        /* =========================================================
           RESPONSIVO
        ========================================================= */

        @media (max-width: 800px) {

            header {

                padding: 15px 20px;
            }


            .usuario-info {

                display: none;
            }


            .container {

                width: 94%;

                margin-top: 25px;
            }


            .topo-pagina {

                align-items: flex-start;

                flex-direction: column;
            }


            .titulo {

                align-items: flex-start;
            }


            .titulo-texto h2 {

                font-size: 29px;
            }


            .form-grid {

                grid-template-columns: 1fr;
            }


            .campo.full {

                grid-column: auto;
            }


            .acoes-form {

                flex-direction: column;
            }


            .btn-limpar,
            .btn-cadastrar {

                width: 100%;
            }
        }


        @media (max-width: 550px) {

            .logo-area h1 {

                font-size: 22px;
            }


            .logo-area img {

                width: 50px;

                height: 50px;
            }

            .btn-voltar-header {

                width: 40px;

                height: 40px;

                min-width: 40px;

                font-size: 23px;
            }


            .card-form {

                padding: 20px;
            }


            .cabecalho-lista {

                align-items: flex-start;

                gap: 10px;

                flex-direction: column;
            }
        }

    </style>

</head>


<body>


<!-- =========================================================
     CABEÇALHO
========================================================= -->

<header>

    <div class="logo-area">

        <a
            href="javascript:history.back()"
            class="btn-voltar-header"
            title="Voltar"
            aria-label="Voltar para a página anterior"
        >
            ‹
        </a>

        <img
            src="/lojacosmeticos_alalet/public/assets/img/cherry2.png"
            alt="Cherry Make"
        >

        <h1>
            Cherry Make
        </h1>

    </div>


    <div class="usuario">

        <div class="usuario-info">

            <strong>
                <?= htmlspecialchars($nome) ?>
            </strong>

            <span>
                <?= htmlspecialchars($perfil) ?>
            </span>

        </div>


        <a
            class="btn-sair"
            href="/lojacosmeticos_alalet/index.php?controller=auth&action=logout"
        >
            Sair
        </a>

    </div>

</header>


<!-- =========================================================
     CONTEÚDO
========================================================= -->

<main class="container">


    <!-- =====================================================
         TÍTULO + BOTÃO VOLTAR
    ====================================================== -->

    <div class="topo-pagina">


        <div class="titulo">


            <div class="titulo-texto">

                <h2>
                    Fornecedores
                </h2>

                <p>
                    Cadastre e gerencie os fornecedores de matéria-prima da loja.
                </p>

            </div>

        </div>

    </div>


    <!-- =====================================================
         MENSAGEM DE SUCESSO
    ====================================================== -->

    <?php if (isset($_GET['sucesso'])): ?>

        <div class="mensagem sucesso">

            Fornecedor cadastrado com sucesso!

        </div>

    <?php endif; ?>


    <!-- =====================================================
         MENSAGEM DE EXCLUSÃO
    ====================================================== -->

    <?php if (isset($_GET['excluido'])): ?>

        <div class="mensagem sucesso">

            Fornecedor excluído com sucesso!

        </div>

    <?php endif; ?>


    <!-- =====================================================
         MENSAGEM DE ERRO
    ====================================================== -->

    <?php if (isset($_GET['erro'])): ?>

        <div class="mensagem erro">

            <?php if ($_GET['erro'] === 'preencha'): ?>

                Preencha todos os campos para cadastrar o fornecedor.

            <?php else: ?>

                Não foi possível realizar a operação.

            <?php endif; ?>

        </div>

    <?php endif; ?>


    <!-- =====================================================
         FORMULÁRIO
    ====================================================== -->

    <section class="card-form">

        <h3>
            Novo fornecedor
        </h3>


        <form
            action="/lojacosmeticos_alalet/index.php?controller=fornecedor&action=store"
            method="POST"
        >


            <div class="form-grid">


                <!-- NOME -->

                <div class="campo">

                    <label for="nome">
                        Nome do fornecedor
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Digite o nome"
                        required
                    >

                </div>


                <!-- CNPJ -->

                <div class="campo">

                    <label for="cnpj">
                        CNPJ
                    </label>

                    <input
                        type="text"
                        id="cnpj"
                        name="cnpj"
                        placeholder="00.000.000/0000-00"
                        maxlength="18"
                        required
                    >

                </div>


                <!-- TELEFONE -->

                <div class="campo">

                    <label for="telefone">
                        Telefone
                    </label>

                    <input
                        type="text"
                        id="telefone"
                        name="telefone"
                        placeholder="(00) 00000-0000"
                        maxlength="15"
                        required
                    >

                </div>


                <!-- E-MAIL -->

                <div class="campo">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="fornecedor@email.com"
                        required
                    >

                </div>


                <!-- ENDEREÇO -->

                <div class="campo full">

                    <label for="endereco">
                        Endereço
                    </label>

                    <input
                        type="text"
                        id="endereco"
                        name="endereco"
                        placeholder="Rua, número, bairro, cidade..."
                        required
                    >

                </div>


                <!-- ITEM FORNECIDO -->

                <div class="campo full">

                    <label for="item_fornecido">
                        Item fornecido
                    </label>

                    <input
                        type="text"
                        id="item_fornecido"
                        name="item_fornecido"
                        placeholder="Ex.: batons, embalagens, pigmentos..."
                        required
                    >

                </div>


            </div>


            <div class="acoes-form">


                <button
                    type="reset"
                    class="btn-limpar"
                >
                    Limpar
                </button>


                <button
                    type="submit"
                    class="btn-cadastrar"
                >
                    + Cadastrar fornecedor
                </button>


            </div>


        </form>

    </section>


    <!-- =====================================================
         LISTA DE FORNECEDORES
    ====================================================== -->

    <section class="card-lista">


        <div class="cabecalho-lista">

            <h3>
                Fornecedores cadastrados
            </h3>


            <span class="contador">

                <?= count($fornecedores) ?>

                fornecedor(es)

            </span>

        </div>


        <?php if (!empty($fornecedores)): ?>


            <div class="tabela-container">

                <table>


                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Nome
                            </th>

                            <th>
                                CNPJ
                            </th>

                            <th>
                                Telefone
                            </th>

                            <th>
                                E-mail
                            </th>

                            <th>
                                Endereço
                            </th>

                            <th>
                                Item fornecido
                            </th>

                            <th>
                                Ação
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php foreach ($fornecedores as $fornecedor): ?>


                            <tr>


                                <!-- ID -->

                                <td>

                                    <span class="id-fornecedor">

                                        #<?= htmlspecialchars(
                                            $fornecedor['id_fornecedor']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- NOME -->

                                <td>

                                    <span class="nome-fornecedor">

                                        <?= htmlspecialchars(
                                            $fornecedor['nome']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- CNPJ -->

                                <td>

                                    <?= htmlspecialchars(
                                        $fornecedor['cnpj']
                                    ) ?>

                                </td>


                                <!-- TELEFONE -->

                                <td>

                                    <?= htmlspecialchars(
                                        $fornecedor['telefone']
                                    ) ?>

                                </td>


                                <!-- EMAIL -->

                                <td>

                                    <?= htmlspecialchars(
                                        $fornecedor['email']
                                    ) ?>

                                </td>


                                <!-- ENDEREÇO -->

                                <td>

                                    <?= htmlspecialchars(
                                        $fornecedor['endereco']
                                    ) ?>

                                </td>


                                <!-- ITEM -->

                                <td>

                                    <span class="item">

                                        <?= htmlspecialchars(
                                            $fornecedor['item_fornecido']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- EXCLUIR -->

                                <td>

                                    <form
                                        action="/lojacosmeticos_alalet/index.php?controller=fornecedor&action=delete"
                                        method="POST"
                                        onsubmit="return confirmarExclusao();"
                                    >


                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?= htmlspecialchars(
                                                $fornecedor['id_fornecedor']
                                            ) ?>"
                                        >


                                        <button
                                            type="submit"
                                            class="btn-excluir"
                                        >
                                            Excluir
                                        </button>


                                    </form>

                                </td>


                            </tr>


                        <?php endforeach; ?>


                    </tbody>


                </table>

            </div>


        <?php else: ?>


            <div class="sem-registros">

                <strong>
                    Nenhum fornecedor cadastrado
                </strong>

                Cadastre o primeiro fornecedor usando o formulário acima.

            </div>


        <?php endif; ?>


    </section>


</main>


<script>


    /* =========================================================
       MÁSCARA CNPJ
    ========================================================= */

    const campoCnpj = document.getElementById('cnpj');


    campoCnpj.addEventListener('input', function () {

        let valor = this.value.replace(/\D/g, '');

        valor = valor.substring(0, 14);


        if (valor.length > 12) {

            valor = valor.replace(
                /^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2}).*/,
                '$1.$2.$3/$4-$5'
            );

        }

        else if (valor.length > 8) {

            valor = valor.replace(
                /^(\d{2})(\d{3})(\d{3})(\d{1,4}).*/,
                '$1.$2.$3/$4'
            );

        }

        else if (valor.length > 5) {

            valor = valor.replace(
                /^(\d{2})(\d{3})(\d{1,3}).*/,
                '$1.$2.$3'
            );

        }

        else if (valor.length > 2) {

            valor = valor.replace(
                /^(\d{2})(\d{1,3}).*/,
                '$1.$2'
            );

        }


        this.value = valor;

    });


    /* =========================================================
       MÁSCARA TELEFONE
    ========================================================= */

    const campoTelefone = document.getElementById('telefone');


    campoTelefone.addEventListener('input', function () {

        let valor = this.value.replace(/\D/g, '');

        valor = valor.substring(0, 11);


        if (valor.length > 10) {

            valor = valor.replace(
                /^(\d{2})(\d{5})(\d{4}).*/,
                '($1) $2-$3'
            );

        }

        else if (valor.length > 6) {

            valor = valor.replace(
                /^(\d{2})(\d{4})(\d{0,4}).*/,
                '($1) $2-$3'
            );

        }

        else if (valor.length > 2) {

            valor = valor.replace(
                /^(\d{2})(\d{0,5}).*/,
                '($1) $2'
            );

        }


        this.value = valor;

    });


    /* =========================================================
       CONFIRMAR EXCLUSÃO
    ========================================================= */

    function confirmarExclusao() {

        return confirm(
            'Tem certeza que deseja excluir este fornecedor?'
        );

    }

</script>


</body>

</html>