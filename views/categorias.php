<?php

$nome = $_SESSION['nome'] ?? 'Usuário';
$perfil = $_SESSION['perfil'] ?? 'adm';

$categorias = $categorias ?? [];
$editar = $editar ?? null;

$sucesso = $_GET['sucesso'] ?? '';
$erro = $_GET['erro'] ?? '';

?>

<!doctype html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <link
        rel="icon"
        href="/lojacosmeticos_alalet/public/assets/img/cherry.png"
    >

    <title>Categorias | Cherry Make</title>

    <style>

        @import url(
            'https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Poppins:wght@300;400;500;600;700&display=swap'
        );

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --rosa-claro: #fff0f5;
            --rosa: #f8b6ca;
            --rosa-forte: #d51f4d;
            --vinho: #8f0d2d;
            --vermelho: #c9153e;
            --branco: #fff;
            --texto: #4c1c29;
            --muted: #9b6978;
            --verde: #dff7e5;

            --sombra:
                0 12px 35px rgba(143,13,45,.10);
        }

        body {
            min-height: 100vh;

            font-family: "Poppins", Arial, sans-serif;

            color: var(--texto);

            background:
                radial-gradient(
                    circle at 5% 8%,
                    #d51f4d 0 5px,
                    transparent 6px
                ),
                radial-gradient(
                    circle at 12% 17%,
                    #f8b6ca 0 7px,
                    transparent 8px
                ),
                radial-gradient(
                    circle at 92% 12%,
                    #d51f4d 0 5px,
                    transparent 6px
                ),
                radial-gradient(
                    circle at 84% 88%,
                    #f8b6ca 0 6px,
                    transparent 7px
                ),
                linear-gradient(
                    135deg,
                    #fff7fa 0%,
                    #ffe3ec 50%,
                    #fff7fa 100%
                );

            padding: 20px;
        }


        /* =========================
           HEADER
        ========================= */

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .header-inner {
            max-width: 1500px;
            min-height: 105px;

            margin: auto;

            display: flex;

            justify-content: space-between;
            align-items: center;

            background: rgba(255,255,255,.92);

            border: 1px solid #fff;

            padding: 18px 28px;

            border-radius: 25px;

            box-shadow: var(--sombra);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .back-button {
            width: 44px;
            height: 44px;
            min-width: 44px;

            border-radius: 50%;

            background: #fff0f4;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--vinho);

            font-size: 20px;

            text-decoration: none;

            border: 1px solid rgba(242,183,199,.6);

            transition: .2s;
        }

        .back-button:hover {
            background: var(--vinho);
            color: #fff;

            transform: translateX(-3px);
        }

        .logo-photo {
            width: 62px;
            height: 62px;

            border-radius: 50%;

            border: 2px dashed var(--rosa-forte);

            background: #fff7fa;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            flex-shrink: 0;
        }

        .logo-photo img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .logo h1 {
            font-family: "Bodoni Moda", serif;

            font-size: 34px;

            color: var(--vinho);
        }

        .badge {
            background: #ffe0e9;

            color: var(--vinho);

            padding: 10px 17px;

            border-radius: 13px;

            font-weight: 600;
        }

        .user {
            display: flex;

            align-items: center;

            gap: 15px;

            color: var(--muted);
        }

        .user strong {
            color: var(--vinho);
        }


        /* =========================
           BOTÕES
        ========================= */

        .btn {
            text-decoration: none;

            display: inline-flex;

            justify-content: center;
            align-items: center;

            border: 0;

            padding: 10px 16px;

            border-radius: 12px;

            font-family: "Poppins", Arial, sans-serif;

            font-weight: 600;

            font-size: 12px;

            cursor: pointer;

            transition: .2s ease;

            background: #f7b3c8;

            color: var(--vinho);

            white-space: nowrap;
        }

        .btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 6px 15px rgba(213,31,77,.14);
        }

        .btn-ghost {
            background: #ffe1e9;
            color: var(--vinho);
        }

        .btn-success {
            background: #d9f5df;
            color: #23753a;
        }

        .btn-inativo {
            background: #ffd7e2;
            color: var(--vinho);
        }

        /* NOVO BOTÃO EXCLUIR */

        .btn-excluir {
            background: #ffe0e0;
            color: #a52b2b;
        }

        .btn-excluir:hover {
            background: #f7caca;
            color: #8f1f1f;
        }


        /* =========================
           LAYOUT
        ========================= */

        .grid {
            max-width: 1500px;

            margin: auto;

            display: grid;

            grid-template-columns:
                360px
                minmax(0, 1fr);

            gap: 20px;

            align-items: start;
        }

        .card {
            background: rgba(255,255,255,.94);

            border: 1px solid #fff;

            border-radius: 25px;

            padding: 25px;

            box-shadow: var(--sombra);
        }

        .card h2 {
            font-family: "Bodoni Moda", serif;

            color: var(--vinho);

            font-size: 29px;

            margin-bottom: 22px;
        }


        /* =========================
           FORMULÁRIO
        ========================= */

        .form-group {
            display: flex;

            flex-direction: column;

            margin-bottom: 16px;
        }

        .form-group label {
            margin-bottom: 7px;

            font-size: 12px;

            font-weight: 600;

            color: var(--vinho);
        }

        .input {
            width: 100%;

            padding: 12px 14px;

            border: 1.5px solid #f4b0c4;

            border-radius: 14px;

            background: #fffafd;

            color: var(--texto);

            font-family: "Poppins", Arial, sans-serif;

            font-size: 13px;

            outline: none;

            transition: .2s;
        }

        .input:focus {
            border-color: var(--rosa-forte);

            box-shadow:
                0 0 0 3px rgba(213,31,77,.08);
        }

        .actions {
            display: flex;

            gap: 10px;

            margin-top: 20px;
        }

        .actions .btn {
            flex: 1;
        }

        .muted {
            margin-top: 6px;

            font-size: 10px;

            color: var(--muted);
        }


        /* =========================
           ALERTAS
        ========================= */

        .alert {
            max-width: 1500px;

            margin: 0 auto 20px;

            padding: 14px 18px;

            border-radius: 15px;

            font-size: 13px;

            font-weight: 600;
        }

        .alert-success {
            background: #dff7e5;

            color: #23753a;

            border: 1px solid #bcebc8;
        }

        .alert-error {
            background: #ffe0e0;

            color: #a52b2b;

            border: 1px solid #f3bebe;
        }


        /* =========================
           LISTA DE CATEGORIAS
        ========================= */

        .categories-card {
            min-width: 0;
        }

        .categories-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 20px;
        }

        .categories-top h2 {
            margin-bottom: 0;
        }

        .summary {
            display: flex;

            gap: 10px;

            margin-bottom: 20px;
        }

        .summary-item {
            flex: 1;

            background: #fff1f5;

            border: 1px solid #f8d2de;

            border-radius: 16px;

            padding: 13px 16px;
        }

        .summary-item small {
            display: block;

            color: var(--muted);

            font-size: 10px;
        }

        .summary-item strong {
            display: block;

            color: var(--vinho);

            font-size: 22px;
        }


        /* =========================
           CARDS DE CATEGORIA
        ========================= */

        .category-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 15px;
        }

        .category-item {
            border: 1px solid #f5d5df;

            border-radius: 20px;

            background: #fff;

            overflow: hidden;

            transition: .2s ease;
        }

        .category-item:hover {
            transform: translateY(-3px);

            box-shadow:
                0 10px 25px rgba(143,13,45,.10);
        }

        .category-main {
            padding: 18px;
        }

        .category-head {
            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 10px;
        }

        .category-id {
            color: var(--rosa-forte);

            font-size: 11px;

            font-weight: 700;
        }

        .category-name {
            color: #35151f;

            font-size: 16px;

            font-weight: 700;

            margin-top: 5px;

            line-height: 1.25;
        }

        .status {
            padding: 6px 9px;

            border-radius: 10px;

            font-size: 10px;

            font-weight: 700;
        }

        .status.ok {
            background: #dff7e5;
            color: #23753a;
        }

        .status.off {
            background: #ffe0e0;
            color: #a52b2b;
        }

        .category-actions {
            display: flex;

            gap: 6px;

            padding: 11px 14px;

            border-top: 1px solid #f5d5df;
        }

        .category-actions .btn {
            flex: 1;

            min-width: 0;

            padding: 8px 5px;

            font-size: 10px;
        }

        .empty {
            padding: 45px 20px;

            text-align: center;

            color: var(--muted);

            font-size: 13px;

            border: 1px dashed #efbdcc;

            border-radius: 18px;

            background: #fffafd;
        }


        /* =========================
           RESPONSIVO
        ========================= */

        @media(max-width: 1100px) {

            .grid {
                grid-template-columns: 1fr;
            }

            .category-grid {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }
        }

        @media(max-width: 800px) {

            body {
                padding: 12px;
            }

            .header-inner {
                flex-direction: column;

                gap: 15px;

                text-align: center;
            }

            .logo {
                flex-wrap: wrap;

                justify-content: center;
            }

            .user {
                justify-content: center;
            }

            .category-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 560px) {

            .card {
                padding: 18px;
            }

            .category-grid {
                grid-template-columns: 1fr;
            }

            .summary {
                flex-direction: column;
            }

            .category-actions {
                flex-wrap: wrap;
            }

            .category-actions .btn {
                min-width: calc(50% - 3px);
            }

        }

    </style>

</head>

<body>


    <!-- HEADER -->

    <div class="header">

        <div class="header-inner">

            <div class="logo">

                <a
                    href="javascript:history.back()"
                    class="back-button"
                    title="Voltar"
                    aria-label="Voltar"
                >
                    ‹
                </a>

                <div class="logo-photo">

                    <img
                        src="public/assets/img/cherry2.png"
                        alt="Logo Cherry Make"
                    >

                </div>

                <h1>
                    Loja Cherry Make
                </h1>

                <span class="badge">
                    Categorias
                </span>

            </div>


            <div class="user">

                Olá,

                <strong>
                    <?= htmlspecialchars($nome) ?>
                </strong>

                <a
                    class="btn btn-ghost"
                    href="index.php?controller=auth&action=logout"
                >
                    Sair
                </a>

            </div>

        </div>

    </div>


    <!-- MENSAGEM DE SUCESSO -->

    <?php if ($sucesso): ?>

        <div class="alert alert-success">

            ✓

            <?= htmlspecialchars($sucesso) ?>

        </div>

    <?php endif; ?>


    <!-- MENSAGEM DE ERRO -->

    <?php if ($erro): ?>

        <div class="alert alert-error">

            ⚠

            <?= htmlspecialchars($erro) ?>

        </div>

    <?php endif; ?>


    <!-- CONTEÚDO -->

    <div class="grid">


        <!-- CADASTRO -->

        <div class="card">

            <h2>

                <?= $editar
                    ? 'Editar Categoria'
                    : 'Cadastrar Categoria'
                ?>

            </h2>


            <?php if ($editar): ?>

                <form
                    method="post"
                    action="index.php?controller=categoria&action=atualizar"
                >

                    <input
                        type="hidden"
                        name="id"
                        value="<?= (int)$editar['id'] ?>"
                    >


                    <div class="form-group">

                        <label>
                            ID da categoria
                        </label>

                        <input
                            class="input"
                            type="text"
                            value="<?= (int)$editar['id'] ?>"
                            disabled
                        >

                        <small class="muted">
                            O ID não pode ser alterado.
                        </small>

                    </div>


                    <div class="form-group">

                        <label>
                            Nome da categoria
                        </label>

                        <input
                            class="input"
                            type="text"
                            name="nome"
                            maxlength="100"
                            required
                            value="<?= htmlspecialchars(
                                $editar['nome']
                            ) ?>"
                        >

                    </div>


                    <div class="actions">

                        <button
                            class="btn"
                            type="submit"
                        >
                            Salvar alterações
                        </button>

                        <a
                            class="btn btn-ghost"
                            href="index.php?controller=categoria&action=index"
                        >
                            Cancelar
                        </a>

                    </div>

                </form>


            <?php else: ?>


                <form
                    method="post"
                    action="index.php?controller=categoria&action=salvar"
                >

                    <div class="form-group">

                        <label>
                            Nome da categoria
                        </label>

                        <input
                            class="input"
                            type="text"
                            name="nome"
                            maxlength="100"
                            required
                            placeholder="Ex: Batons"
                        >

                        <small class="muted">
                            A categoria será cadastrada como ativa.
                        </small>

                    </div>


                    <div class="actions">

                        <button
                            class="btn"
                            type="submit"
                        >
                            Cadastrar
                        </button>

                        <button
                            class="btn btn-ghost"
                            type="reset"
                        >
                            Limpar
                        </button>

                    </div>

                </form>

            <?php endif; ?>

        </div>


        <!-- LISTA -->

        <div class="card categories-card">

            <div class="categories-top">

                <h2>
                    Categorias cadastradas ♡
                </h2>

            </div>


            <?php

            $total = count($categorias);

            $ativas = 0;
            $inativas = 0;

            foreach ($categorias as $cat) {

                if ((int)$cat['ativo'] === 1) {
                    $ativas++;
                } else {
                    $inativas++;
                }

            }

            ?>


            <!-- RESUMO -->

            <div class="summary">

                <div class="summary-item">

                    <small>
                        Total de categorias
                    </small>

                    <strong>
                        <?= $total ?>
                    </strong>

                </div>


                <div class="summary-item">

                    <small>
                        Ativas
                    </small>

                    <strong>
                        <?= $ativas ?>
                    </strong>

                </div>


                <div class="summary-item">

                    <small>
                        Inativas
                    </small>

                    <strong>
                        <?= $inativas ?>
                    </strong>

                </div>

            </div>


            <!-- LISTA -->

            <?php if (empty($categorias)): ?>

                <div class="empty">

                    Nenhuma categoria cadastrada.

                    <br><br>

                    Cadastre sua primeira categoria ao lado.

                </div>


            <?php else: ?>


                <div class="category-grid">

                    <?php foreach ($categorias as $c): ?>

                        <article class="category-item">


                            <div class="category-main">

                                <div class="category-head">

                                    <div>

                                        <div class="category-id">
                                            #<?= (int)$c['id'] ?>
                                        </div>


                                        <div class="category-name">

                                            <?= htmlspecialchars(
                                                $c['nome']
                                            ) ?>

                                        </div>

                                    </div>


                                    <?php if ((int)$c['ativo'] === 1): ?>

                                        <span class="status ok">
                                            Ativa
                                        </span>

                                    <?php else: ?>

                                        <span class="status off">
                                            Inativa
                                        </span>

                                    <?php endif; ?>

                                </div>

                            </div>


                            <!-- BOTÕES -->

                            <div class="category-actions">


                                <!-- EDITAR -->

                                <a
                                    class="btn"
                                    href="index.php?controller=categoria&action=index&id=<?= (int)$c['id'] ?>"
                                >
                                    Editar
                                </a>


                                <!-- ATIVAR / INATIVAR -->

                                <?php if ((int)$c['ativo'] === 1): ?>

                                    <a
                                        class="btn btn-inativo"
                                        href="index.php?controller=categoria&action=toggle&id=<?= (int)$c['id'] ?>&ativo=0"
                                        onclick="return confirm('Deseja realmente inativar esta categoria?');"
                                    >
                                        Inativar
                                    </a>

                                <?php else: ?>

                                    <a
                                        class="btn btn-success"
                                        href="index.php?controller=categoria&action=toggle&id=<?= (int)$c['id'] ?>&ativo=1"
                                        onclick="return confirm('Deseja ativar esta categoria?');"
                                    >
                                        Ativar
                                    </a>

                                <?php endif; ?>


                                <!-- EXCLUIR -->

                                <a
                                    class="btn btn-excluir"
                                    href="index.php?controller=categoria&action=excluir&id=<?= (int)$c['id'] ?>"
                                    onclick="return confirm('Deseja realmente excluir a categoria \"<?= htmlspecialchars($c['nome'], ENT_QUOTES, 'UTF-8') ?>\"? Esta ação não poderá ser desfeita.');"
                                >
                                    Excluir
                                </a>


                            </div>


                        </article>

                    <?php endforeach; ?>

                </div>


            <?php endif; ?>

        </div>

    </div>

</body>

</html>