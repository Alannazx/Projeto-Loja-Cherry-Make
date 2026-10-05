<?php

$nome = $_SESSION['nome'] ?? 'Usuário';
$perfil = $_SESSION['perfil'] ?? 'vendedor';

$relatorios = $relatorios ?? [];
$admins = $admins ?? [];

$sucesso = isset($_GET['sucesso']);

$erro = $_GET['erro'] ?? '';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="icon"
        href="/lojacosmeticos_alalet/public/assets/img/cherry.png"
    >

    <title>Relatórios - Cherry Make</title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@500;600&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --vinho: #8B001F;
            --vinho-escuro: #650017;

            --rosa: #FFC1D6;
            --rosa-medio: #F58AAA;
            --rosa-claro: #FFF4F8;

            --branco: #FFFFFF;

            --texto: #5B1B2A;
            --muted: #806F75;

            --borda: #F1D2DC;

            --fundo: #FFF9FB;
        }

        body {
            min-height: 100vh;
            padding: 25px;

            font-family: "Poppins", Arial, sans-serif;

            color: var(--texto);

            background:
                radial-gradient(
                    circle at 10% 15%,
                    rgba(255,193,214,.65) 0 5px,
                    transparent 6px
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(139,0,31,.22) 0 5px,
                    transparent 6px
                ),
                linear-gradient(
                    135deg,
                    #FFF9FB,
                    #FFE7EF
                );
        }

        .container {
            width: 100%;
            max-width: 1180px;

            margin: auto;

            background: var(--branco);

            border-radius: 28px;

            overflow: hidden;

            box-shadow:
                0 20px 55px rgba(139,0,31,.13);
        }

        /* TOPO */

        .topbar {
            min-height: 105px;

            padding: 22px 38px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    var(--vinho),
                    var(--vinho-escuro)
                );
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-button {
            width: 43px;
            height: 43px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            text-decoration: none;

            color: var(--vinho);
            background: #FFF1F5;

            font-size: 23px;

            transition: .2s;
        }

        .back-button:hover {
            transform: translateX(-3px);
            background: var(--rosa);
        }

        .brand-logo {
            width: 56px;
            height: 56px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            border: 1px solid rgba(255,255,255,.25);
            background: rgba(255,193,214,.12);
        }

        .brand-logo img {
            width: 135%;
            height: 135%;

            object-fit: contain;
        }

        .brand h1 {
            font-family: "Bodoni Moda", Georgia, serif;

            font-size: 30px;
        }

        .brand small {
            display: block;

            margin-top: 4px;

            color: var(--rosa);

            font-size: 9px;

            letter-spacing: 2.5px;

            text-transform: uppercase;
        }

        .login-info {
            padding: 10px 16px;

            border-radius: 22px;

            font-size: 11px;

            background: rgba(255,255,255,.10);

            border: 1px solid rgba(255,255,255,.13);
        }

        .login-info strong {
            color: var(--rosa);
        }

        .login-info a {
            color: white;
            margin-left: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        /* CONTEÚDO */

        .content {
            padding: 42px 50px 50px;

            background: var(--fundo);
        }

        .intro {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 30px;

            margin-bottom: 32px;
        }

        .intro h2 {
            font-family: "Bodoni Moda", Georgia, serif;

            color: var(--vinho);

            font-size: 42px;

            line-height: 1.1;
        }

        .intro h2 span {
            color: var(--rosa-medio);
        }

        .intro p {
            margin-top: 9px;

            color: var(--muted);

            font-size: 13px;
        }

        .report-icon {
            width: 90px;
            height: 90px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 24px;

            color: var(--vinho);

            background: #FFE3EC;

            font-size: 42px;

            transform: rotate(4deg);
        }

        /* MENSAGENS */

        .alert {
            margin-bottom: 20px;

            padding: 13px 17px;

            border-radius: 12px;

            font-size: 12px;

            font-weight: 500;
        }

        .alert-success {
            color: #17643B;

            background: #EAF8F0;

            border: 1px solid #BFE7CE;
        }

        .alert-error {
            color: #8B001F;

            background: #FFF0F4;

            border: 1px solid #F2B7C8;
        }

        /* ÁREA DE NOVO RELATÓRIO */

        .editor {
            display: grid;

            grid-template-columns: 330px 1fr;

            gap: 0;

            background: white;

            border: 1px solid var(--borda);

            border-radius: 22px;

            overflow: hidden;

            box-shadow:
                0 10px 25px rgba(139,0,31,.05);
        }

        .editor-side {
            padding: 30px;

            color: white;

            background:
                linear-gradient(
                    160deg,
                    var(--vinho),
                    var(--vinho-escuro)
                );
        }

        .editor-side h3 {
            font-family: "Bodoni Moda", Georgia, serif;

            font-size: 25px;

            margin-bottom: 12px;
        }

        .editor-side p {
            color: #FFDDE7;

            font-size: 12px;

            line-height: 1.7;
        }

        .mini-info {
            margin-top: 30px;

            padding-top: 20px;

            border-top: 1px solid rgba(255,255,255,.18);
        }

        .mini-info strong {
            display: block;

            margin-bottom: 4px;

            color: var(--rosa);

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1px;
        }

        .mini-info span {
            font-size: 12px;
        }

        .form-area {
            padding: 30px;
        }

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 180px;

            gap: 17px;

            margin-bottom: 17px;
        }

        .field label {
            display: block;

            margin-bottom: 7px;

            font-size: 11px;

            font-weight: 600;

            color: var(--texto);
        }

        .field select,
        .field input,
        .field textarea {
            width: 100%;

            border: 1px solid var(--borda);

            border-radius: 12px;

            outline: none;

            color: var(--texto);

            background: #FFFCFD;

            font-family: "Poppins", Arial, sans-serif;
        }

        .field select,
        .field input {
            height: 45px;

            padding: 0 13px;
        }

        .field textarea {
            min-height: 180px;

            padding: 14px;

            resize: vertical;

            line-height: 1.6;

            font-size: 13px;
        }

        .field select:focus,
        .field input:focus,
        .field textarea:focus {
            border-color: var(--rosa-medio);

            box-shadow:
                0 0 0 3px
                rgba(245,138,170,.15);
        }

        .button-area {
            display: flex;

            justify-content: flex-end;

            margin-top: 17px;
        }

        .btn-save {
            height: 45px;

            padding: 0 25px;

            border: 0;

            border-radius: 12px;

            color: white;

            background: var(--vinho);

            font-family: "Poppins", Arial, sans-serif;

            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }

        .btn-save:hover {
            background: var(--vinho-escuro);

            transform: translateY(-1px);

            box-shadow:
                0 7px 17px rgba(139,0,31,.17);
        }

        /* HISTÓRICO */

        .historico {
            margin-top: 28px;
        }

        .section-title {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 15px;
        }

        .section-title h3 {
            font-family: "Bodoni Moda", Georgia, serif;

            color: var(--vinho);

            font-size: 25px;
        }

        .contador {
            padding: 6px 12px;

            border-radius: 20px;

            color: var(--vinho);

            background: #FFE6EE;

            font-size: 10px;

            font-weight: 600;
        }

        .reports {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 17px;
        }

        .report-card {
            padding: 22px;

            background: white;

            border: 1px solid var(--borda);

            border-radius: 17px;

            transition: .2s;
        }

        .report-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 10px 25px rgba(139,0,31,.07);
        }

        .report-header {
            display: flex;

            justify-content: space-between;

            gap: 15px;

            align-items: flex-start;

            padding-bottom: 13px;

            border-bottom: 1px solid #F7E7ED;
        }

        .report-author {
            color: var(--vinho);

            font-size: 13px;

            font-weight: 700;
        }

        .report-date {
            color: var(--muted);

            font-size: 10px;

            white-space: nowrap;
        }

        .report-text {
            margin-top: 15px;

            color: #69444E;

            font-size: 12px;

            line-height: 1.7;

            white-space: pre-wrap;

            word-break: break-word;
        }

        .report-footer {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 17px;
        }

        .report-time {
            color: #A58A92;

            font-size: 9px;
        }

        .delete {
            height: 30px;

            padding: 0 13px;

            border: 0;

            border-radius: 15px;

            color: white;

            background: var(--vinho);

            font-family: "Poppins", Arial, sans-serif;

            font-size: 9px;

            cursor: pointer;

            transition: .2s;
        }

        .delete:hover {
            background: var(--vinho-escuro);
        }

        .empty {
            grid-column: 1 / -1;

            padding: 40px;

            text-align: center;

            color: var(--muted);

            background: white;

            border: 1px dashed var(--borda);

            border-radius: 17px;

            font-size: 12px;
        }

        .footer {
            margin-top: 30px;

            text-align: center;

            color: var(--rosa-medio);

            font-family: "Bodoni Moda", Georgia, serif;

            font-style: italic;

            font-size: 15px;
        }

        @media (max-width: 850px) {

            .content {
                padding: 30px 25px;
            }

            .editor {
                grid-template-columns: 1fr;
            }

            .editor-side {
                padding: 24px;
            }

            .reports {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 650px) {

            body {
                padding: 12px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }

            .login-info {
                width: 100%;
                text-align: center;
            }

            .intro {
                flex-direction: column;
                align-items: flex-start;
            }

            .intro h2 {
                font-size: 34px;
            }

            .report-icon {
                align-self: center;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-area {
                padding: 22px;
            }

            .button-area {
                justify-content: stretch;
            }

            .btn-save {
                width: 100%;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <!-- TOPO -->

    <header class="topbar">

        <div class="brand">

            <a
                href="javascript:history.back()"
                class="back-button"
                title="Voltar"
            >
                ‹
            </a>

            <div class="brand-logo">

                <img
                    src="/lojacosmeticos_alalet/public/assets/img/cherry2.png"
                    alt="Cherry Make"
                >

            </div>

            <div>

                <h1>Cherry Make</h1>

                <small>
                    Maquiagem que realça você
                </small>

            </div>

        </div>

        <div class="login-info">

            Logado como

            <strong>
                <?php echo htmlspecialchars($nome); ?>
            </strong>

            (<?php echo htmlspecialchars($perfil); ?>)

            <a
                href="/lojacosmeticos_alalet/index.php?controller=auth&action=logout"
            >
                Sair
            </a>

        </div>

    </header>


    <!-- CONTEÚDO -->

    <main class="content">

        <section class="intro">

            <div>

                <h2>
                    Central de
                    <span>Relatórios</span>
                </h2>

                <p>
                    Registre as informações importantes do seu dia de trabalho.
                </p>

            </div>

            <div class="report-icon">
                ✎
            </div>

        </section>


        <!-- MENSAGEM -->

        <?php if ($sucesso): ?>

            <div class="alert alert-success">
                ✓ Relatório registrado com sucesso!
            </div>

        <?php endif; ?>


        <?php if (!empty($erro)): ?>

            <div class="alert alert-error">
                ⚠
                <?php echo htmlspecialchars($erro); ?>
            </div>

        <?php endif; ?>


        <!-- NOVO RELATÓRIO -->

        <section class="editor">

            <div class="editor-side">

                <h3>
                    Novo relatório
                </h3>

                <p>
                    Escreva abaixo as informações que deseja registrar.
                    Você pode descrever acontecimentos, observações,
                    atividades realizadas ou outras informações importantes.
                </p>

                <div class="mini-info">

                    <strong>
                        Registros
                    </strong>

                    <span>
                        Os relatórios ficam armazenados no banco de dados.
                    </span>

                </div>

                <div class="mini-info">

                    <strong>
                        Data
                    </strong>

                    <span>
                        Informe a data correspondente ao relatório.
                    </span>

                </div>

            </div>


            <div class="form-area">

                <form
                    method="POST"
                    action="/lojacosmeticos_alalet/index.php?controller=relatorio&action=store"
                >

                    <div class="form-grid">

                        <!-- ADMIN -->

                        <div class="field">

                            <label for="usuario_id">
                                Nome do vendedor
                            </label>

                            <select
                                id="usuario_id"
                                name="usuario_id"
                                required
                            >

                                <option value="">
                                    Selecione o vendedor
                                </option>

                                <?php foreach ($admins as $admin): ?>

                                    <option
                                        value="<?php echo (int)$admin['id']; ?>"
                                    >

                                        <?php
                                        echo htmlspecialchars(
                                            $admin['nome']
                                        );
                                        ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>


                        <!-- DATA -->

                        <div class="field">

                            <label for="data">
                                Data do relatório
                            </label>

                            <input
                                type="date"
                                id="data"
                                name="data"
                                value="<?php echo date('Y-m-d'); ?>"
                                required
                            >

                        </div>

                    </div>


                    <!-- TEXTO -->

                    <div class="field">

                        <label for="relatorio">
                            Relatório
                        </label>

                        <textarea
                            id="relatorio"
                            name="relatorio"
                            placeholder="Digite aqui o relatório..."
                            required
                        ></textarea>

                    </div>


                    <div class="button-area">

                        <button
                            type="submit"
                            class="btn-save"
                        >
                            ✓ Salvar relatório
                        </button>

                    </div>

                </form>

            </div>

        </section>


        <!-- HISTÓRICO -->

        <section class="historico">

            <div class="section-title">

                <h3>
                    Relatórios registrados
                </h3>

                <span class="contador">
                    <?php echo count($relatorios); ?>
                    registros
                </span>

            </div>


            <div class="reports">

                <?php if (empty($relatorios)): ?>

                    <div class="empty">

                        ✎

                        <br><br>

                        Nenhum relatório registrado ainda.

                    </div>

                <?php else: ?>

                    <?php foreach ($relatorios as $registro): ?>

                        <article class="report-card">

                            <div class="report-header">

                                <div class="report-author">

                                    <?php
                                    echo htmlspecialchars(
                                        $registro['usuario_nome']
                                        ?? 'Usuário'
                                    );
                                    ?>

                                </div>

                                <div class="report-date">

                                    <?php
                                    echo date(
                                        'd/m/Y',
                                        strtotime(
                                            $registro['data']
                                        )
                                    );
                                    ?>

                                </div>

                            </div>


                            <div class="report-text">

                                <?php
                                echo htmlspecialchars(
                                    $registro['relatorio']
                                );
                                ?>

                            </div>


                            <div class="report-footer">

                                <span class="report-time">

                                    Registrado às

                                    <?php
                                    echo !empty($registro['created_at'])
                                        ? date(
                                            'H:i',
                                            strtotime(
                                                $registro['created_at']
                                            )
                                        )
                                        : '--:--';
                                    ?>

                                </span>


                                <?php if (!empty($registro['id'])): ?>

                                    <form
                                        method="POST"
                                        action="/lojacosmeticos_alalet/index.php?controller=relatorio&action=delete"
                                        onsubmit="return confirm('Deseja excluir este relatório?');"
                                    >

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?php echo (int)$registro['id']; ?>"
                                        >

                                        <button
                                            type="submit"
                                            class="delete"
                                        >
                                            Excluir
                                        </button>

                                    </form>

                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </section>


        <div class="footer">
            Maquiagem que realça você ♡
        </div>

    </main>

</div>

</body>

</html>