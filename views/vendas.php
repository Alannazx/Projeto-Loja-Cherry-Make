<?php

$nome = $_SESSION['nome'] ?? 'Usuário';
$perfil = $_SESSION['perfil'] ?? 'vendedor';

$vendas = $vendas ?? [];
$produtos = $produtos ?? [];
$vendedores = $vendedores ?? [];

/*
 * O controller envia todas as vendas.
 * Cada venda deve possuir:
 *
 * id
 * data
 * quantidade
 * created_at
 * produto_id
 * produto_nome
 * vendedor_id
 * vendedor_nome
 */

// Todas as vendas
$vendasTodosMeses = $vendas;

/*
 * Ordena da venda mais recente para a mais antiga.
 */
usort($vendasTodosMeses, function ($a, $b) {

    $dataA = ($a['data'] ?? '') . ' ' . ($a['created_at'] ?? '');
    $dataB = ($b['data'] ?? '') . ' ' . ($b['created_at'] ?? '');

    return strcmp($dataB, $dataA);
});

/*
 * Soma todas as vendas.
 */
$totalVendas = (int)($totalVendas ?? array_sum(
    array_map(function ($venda) {
        return (int)($venda['quantidade'] ?? 0);
    }, $vendasTodosMeses)
));

?>

<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        rel="icon"
        href="/lojacosmeticos_alalet/public/assets/img/cherry.png"
    >

    <title>Vendas - Cherry Make</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

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
            --vinho-escuro: #690016;
            --rosa: #FFC1D6;
            --rosa-medio: #F58AAA;
            --rosa-claro: #FFF5F8;
            --branco: #FFFFFF;
            --texto: #5B1B2A;
            --muted: #806F75;
            --borda: #F4CBD7;
        }

        body {
            min-height: 100vh;
            padding: 28px;

            font-family: "Poppins", Arial, sans-serif;

            color: var(--texto);

            background:
                radial-gradient(
                    circle at 3% 8%,
                    var(--rosa) 0 6px,
                    transparent 7px
                ),
                radial-gradient(
                    circle at 97% 20%,
                    var(--vinho) 0 6px,
                    transparent 7px
                ),
                radial-gradient(
                    circle at 4% 85%,
                    var(--vinho) 0 5px,
                    transparent 6px
                ),
                radial-gradient(
                    circle at 96% 90%,
                    var(--rosa) 0 7px,
                    transparent 8px
                ),
                linear-gradient(
                    135deg,
                    #FFF9FB,
                    #FFDCE7
                );
        }

        .container {
            width: 100%;
            max-width: 1250px;

            margin: auto;

            overflow: hidden;

            background: var(--branco);

            border-radius: 30px;

            box-shadow:
                0 20px 50px rgba(139, 0, 31, .14);
        }

        .topbar {
            min-height: 105px;

            padding: 22px 40px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            color: #fff;

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

        .brand-logo {
            width: 58px;
            height: 58px;

            border-radius: 50%;

            overflow: hidden;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                rgba(255, 193, 214, .15);

            border:
                1px solid rgba(255, 255, 255, .25);
        }

        .brand-logo img {
            width: 140%;
            height: 140%;

            object-fit: contain;

            padding: 5px;
        }

        .brand h1 {
            font-family:
                "Bodoni Moda",
                Georgia,
                serif;

            font-size: 31px;

            line-height: 1;
        }

        .brand small {
            display: block;

            margin-top: 5px;

            color: var(--rosa);

            font-size: 9px;

            letter-spacing: 3px;

            text-transform: uppercase;
        }

        .pill {
            padding: 11px 17px;

            border-radius: 25px;

            background:
                rgba(255, 255, 255, .12);

            border:
                1px solid rgba(255, 255, 255, .13);

            font-size: 11px;

            white-space: nowrap;
        }

        .pill a {
            color: var(--rosa);

            text-decoration: none;

            font-weight: 700;

            margin-left: 6px;
        }

        .content {
            padding: 42px 52px 52px;

            background: #FFF9FB;
        }

        .welcome {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 30px;

            margin-bottom: 30px;
        }

        .welcome h2 {
            font-family:
                "Bodoni Moda",
                Georgia,
                serif;

            font-size: 43px;

            line-height: 1.1;

            color: var(--vinho);
        }

        .welcome h2 span {
            color: var(--rosa-medio);
        }

        .welcome p {
            margin-top: 7px;

            color: var(--muted);

            font-size: 13px;
        }

        .decoracao {
            width: 547px;

            margin-top: 14px;

            border-top:
                3px dotted var(--rosa-medio);

            position: relative;
        }

        .decoracao:after {
            content: "♡";

            position: absolute;

            right: -14px;

            top: -18px;

            color: var(--rosa-medio);

            font-size: 25px;
        }

        .logo-destaque {
            width: 100px;
            height: 100px;

            display: flex;

            align-items: center;

            justify-content: center;
        }

        .logo-destaque img {
            width: 110px;
            height: 110px;

            object-fit: contain;
        }

        .resumo {
            display: grid;

            grid-template-columns: 1fr;

            gap: 18px;

            margin-bottom: 22px;
        }

        .resumo-card {
            min-height: 125px;

            padding: 24px 28px;

            border-radius: 20px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            position: relative;

            overflow: hidden;
        }

        .resumo-card:first-child {
            color: #fff;

            background:
                linear-gradient(
                    135deg,
                    var(--vinho),
                    var(--vinho-escuro)
                );
        }

        .resumo-card:after {
            content: "♡";

            position: absolute;

            right: 25px;

            bottom: -8px;

            font-size: 62px;

            color:
                rgba(255, 255, 255, .45);
        }

        .resumo-label {
            font-size: 12px;

            font-weight: 500;
        }

        .resumo-value {
            margin-top: 4px;

            font-family:
                "Bodoni Moda",
                Georgia,
                serif;

            font-size: 40px;

            font-weight: 600;
        }

        .resumo-sub {
            font-size: 11px;

            opacity: .8;
        }

        .box {
            background: #fff;

            border:
                1px solid var(--borda);

            border-radius: 20px;

            padding: 25px;

            margin-top: 18px;
        }

        .box-title {
            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 20px;

            color: var(--vinho);

            font-family:
                "Bodoni Moda",
                Georgia,
                serif;

            font-size: 23px;

            font-weight: 600;
        }

        .box-title span {
            font-family:
                "Poppins",
                Arial,
                sans-serif;

            color: var(--rosa-medio);

            font-size: 21px;
        }

        /*
         * FORMULÁRIO
         */
        .form {
            display: grid;

            grid-template-columns:
                1fr 1fr 150px 120px auto;

            gap: 15px;

            align-items: end;
        }

        .field label {
            display: block;

            margin-bottom: 7px;

            color: var(--texto);

            font-size: 11px;

            font-weight: 600;
        }

        .field input,
        .field select {
            width: 100%;

            height: 45px;

            padding: 0 13px;

            border:
                1px solid var(--borda);

            border-radius: 11px;

            outline: none;

            color: var(--texto);

            background: #fff;

            font-family:
                "Poppins",
                Arial,
                sans-serif;
        }

        .field select {
            cursor: pointer;
        }

        .field input:focus,
        .field select:focus {
            border-color: var(--rosa-medio);

            box-shadow:
                0 0 0 3px
                rgba(255, 193, 214, .25);
        }

        .btn {
            height: 45px;

            padding: 0 22px;

            border: 0;

            border-radius: 11px;

            font-family:
                "Poppins",
                Arial,
                sans-serif;

            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }

        .btn-add {
            color: #fff;

            background: var(--vinho);

            box-shadow:
                0 8px 18px
                rgba(139, 0, 31, .16);
        }

        .btn-add:hover {
            transform: translateY(-1px);

            background:
                var(--vinho-escuro);
        }

        .btn-clear {
            margin-top: 15px;

            color: var(--vinho);

            background: #fff;

            border:
                1px solid var(--rosa-medio);
        }

        .btn-clear:hover {
            background:
                var(--rosa-claro);
        }

        /*
         * TABELA
         */
        .table-wrap {
            overflow: auto;

            border:
                1px solid #F5DCE4;

            border-radius: 14px;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 850px;
        }

        th,
        td {
            padding: 15px 17px;

            border-bottom:
                1px solid #F7E8ED;

            text-align: left;

            font-size: 12px;
        }

        th {
            color: var(--vinho);

            background: #FFF7F9;

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: .5px;
        }

        tr:last-child td {
            border-bottom: 0;
        }

        .qtd {
            color: var(--vinho);

            font-weight: 800;
        }

        .horario {
            color: var(--muted);

            font-size: 11px;

            white-space: nowrap;
        }

        .produto {
            font-weight: 600;

            color: var(--texto);
        }

        .vendedor {
            color: var(--texto);
        }

        .delete {
            min-width: 82px;
            height: 32px;
            padding: 0 14px;

            border: 0;
            border-radius: 18px;

            background: #8B001F;
            color: #FFFFFF;

            cursor: pointer;

            font-family:
                "Poppins",
                Arial,
                sans-serif;

            font-size: 10px;
            font-weight: 600;

            transition: .2s;
        }

        .delete:hover {
            background: #690016;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px
                rgba(139, 0, 31, .18);
        }

        .empty {
            padding: 28px;

            text-align: center;

            color: var(--muted);

            font-size: 12px;
        }

        .footer {
            margin-top: 25px;

            text-align: center;

            color: var(--rosa-medio);

            font-family:
                "Bodoni Moda",
                Georgia,
                serif;

            font-style: italic;

            font-size: 16px;
        }

        @media (max-width: 1100px) {

            .form {
                grid-template-columns:
                    1fr 1fr;
            }

            .btn-add,
            .btn-clear {
                width: 100%;
            }
        }

        @media (max-width: 900px) {

            body {
                padding: 14px;
            }

            .content {
                padding: 30px 25px;
            }

            .topbar {
                padding: 20px 25px;
            }

            .form {
                grid-template-columns:
                    1fr 1fr;
            }

            .btn-add {
                width: 100%;
            }
        }

        @media (max-width: 650px) {

            .topbar {
                flex-direction: column;

                align-items: flex-start;
            }

            .pill {
                width: 100%;

                text-align: center;

                white-space: normal;
            }

            .welcome {
                flex-direction: column;

                align-items: flex-start;
            }

            .welcome h2 {
                font-size: 35px;
            }

            .logo-destaque {
                align-self: center;
            }

            .decoracao {
                width: 100%;
            }

            .resumo {
                grid-template-columns: 1fr;
            }

            .form {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 25px 17px 35px;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <header class="topbar">

        <div class="brand">

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

        <div class="pill">

            Logado como

            <strong>
                <?php echo htmlspecialchars($nome); ?>
            </strong>

            (<?php echo htmlspecialchars($perfil); ?>)

            •

            <a
                href="/lojacosmeticos_alalet/index.php?controller=auth&action=logout"
            >
                Sair
            </a>

        </div>

    </header>


    <main class="content">

        <section class="welcome">

            <div>

                <div class="welcome h2">

                    <h2>

                        Olá,

                        <span>
                            <?php echo htmlspecialchars($nome); ?>!
                        </span>

                    </h2>

                </div>

                <p>
                    Registre suas vendas abaixo.
                </p>

                <div class="decoracao"></div>

            </div>


            <div class="logo-destaque">

                <img
                    src="/lojacosmeticos_alalet/public/assets/img/cherrysemfundo.png"
                    alt="Cherry Make"
                >

            </div>

        </section>


        <section class="resumo">

            <div class="resumo-card">

                <div class="resumo-label">
                    Vendas Totais
                </div>

                <div class="resumo-value">
                    <?php echo $totalVendas; ?>
                </div>

                <div class="resumo-sub">
                    vendas registradas
                </div>

            </div>

        </section>


        <!-- REGISTRAR VENDA -->

        <section class="box">

            <div class="box-title">

                <span>🍒</span>

                Registrar Venda

            </div>


            <form
                class="form"
                method="POST"
                action="/lojacosmeticos_alalet/index.php?controller=venda&action=store"
                id="formVenda"
            >

                <!-- VENDEDOR -->

                <div class="field">

                    <label for="vendedor_id">
                        Vendedor
                    </label>

                    <select
                        id="vendedor_id"
                        name="vendedor_id"
                        required
                    >

                        <option value="">
                            Selecione o vendedor
                        </option>

                        <?php foreach ($vendedores as $vendedor): ?>

                            <option
                                value="<?php echo (int)$vendedor['id']; ?>"
                            >
                                <?php
                                echo htmlspecialchars(
                                    $vendedor['nome']
                                );
                                ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- PRODUTO -->

                <div class="field">

                    <label for="produto_id">
                        Produto
                    </label>

                    <select
                        id="produto_id"
                        name="produto_id"
                        required
                    >

                        <option value="">
                            Selecione o produto
                        </option>

                        <?php foreach ($produtos as $produto): ?>

                            <option
                                value="<?php echo (int)$produto['id']; ?>"
                            >
                                <?php
                                echo htmlspecialchars(
                                    $produto['nome']
                                );
                                ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- DATA -->

                <div class="field">

                    <label for="data">
                        Data da Venda
                    </label>

                    <input
                        type="date"
                        id="data"
                        name="data"
                        value="<?php echo date('Y-m-d'); ?>"
                        required
                    >

                </div>


                <!-- QUANTIDADE -->

                <div class="field">

                    <label for="quantidade">
                        Quantidade
                    </label>

                    <input
                        type="number"
                        id="quantidade"
                        name="quantidade"
                        min="1"
                        value="1"
                        required
                    >

                </div>


                <!-- LIMPAR -->

                <button
                    type="button"
                    class="btn btn-clear"
                    onclick="limparFormulario()"
                >
                    Limpar
                </button>


                <!-- ADICIONAR -->

                <button
                    type="submit"
                    class="btn btn-add"
                >
                    +&nbsp; Adicionar Venda
                </button>

            </form>

        </section>


        <!-- REGISTROS -->

        <section class="box">

            <div class="box-title">

                <span>▣</span>

                Todos os Registros de Vendas

            </div>


            <div class="table-wrap">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Data
                            </th>

                            <th>
                                Horário
                            </th>

                            <th>
                                Vendedor
                            </th>

                            <th>
                                Produto
                            </th>

                            <th>
                                Quantidade
                            </th>

                            <th>
                                Ação
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (empty($vendasTodosMeses)): ?>

                        <tr>

                            <td colspan="6">

                                <div class="empty">

                                    ♡<br>

                                    Nenhuma venda registrada ainda.

                                </div>

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($vendasTodosMeses as $venda): ?>

                            <tr>

                                <!-- DATA -->

                                <td>

                                    <?php

                                    echo date(
                                        'd/m/Y',
                                        strtotime($venda['data'])
                                    );

                                    ?>

                                </td>


                                <!-- HORÁRIO -->

                                <td class="horario">

                                    <?php

                                    if (!empty($venda['created_at'])) {

                                        echo date(
                                            'H:i:s',
                                            strtotime(
                                                $venda['created_at']
                                            )
                                        );

                                    } else {

                                        echo '—';

                                    }

                                    ?>

                                </td>


                                <!-- VENDEDOR -->

                                <td class="vendedor">

                                    <?php

                                    echo htmlspecialchars(
                                        $venda['vendedor_nome']
                                        ?? 'Não informado'
                                    );

                                    ?>

                                </td>


                                <!-- PRODUTO -->

                                <td class="produto">

                                    <?php

                                    echo htmlspecialchars(
                                        $venda['produto_nome']
                                        ?? 'Não informado'
                                    );

                                    ?>

                                </td>


                                <!-- QUANTIDADE -->

                                <td class="qtd">

                                    <?php

                                    $quantidade = (int)(
                                        $venda['quantidade']
                                        ?? 0
                                    );

                                    echo $quantidade;

                                    ?>

                                    <?php

                                    echo $quantidade === 1
                                        ? ' venda'
                                        : ' vendas';

                                    ?>

                                </td>


                                <!-- EXCLUIR -->

                                <td>

                                    <?php if (!empty($venda['id'])): ?>

                                        <form
                                            method="POST"
                                            action="/lojacosmeticos_alalet/index.php?controller=venda&action=delete"
                                            onsubmit="return confirm('Deseja excluir este registro?');"
                                        >

                                            <input
                                                type="hidden"
                                                name="id"
                                                value="<?php echo (int)$venda['id']; ?>"
                                            >

                                            <button
                                                class="delete"
                                                type="submit"
                                                title="Excluir esta venda"
                                            >
                                                Excluir
                                            </button>

                                        </form>

                                    <?php else: ?>

                                        <span
                                            style="color:#D8B4C0"
                                        >
                                            —
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </section>


        <div class="footer">

            Maquiagem que realça você ♡

        </div>

    </main>

</div>


<script>

function limparFormulario() {

    const data =
        document.getElementById('data');

    const quantidade =
        document.getElementById('quantidade');

    const produto =
        document.getElementById('produto_id');

    const vendedor =
        document.getElementById('vendedor_id');


    // Limpa vendedor
    vendedor.value = '';


    // Limpa produto
    produto.value = '';


    // Limpa quantidade
    quantidade.value = '';


    // Coloca a data atual novamente
    const hoje = new Date();

    const ano = hoje.getFullYear();

    const mes = String(
        hoje.getMonth() + 1
    ).padStart(2, '0');

    const dia = String(
        hoje.getDate()
    ).padStart(2, '0');

    data.value =
        `${ano}-${mes}-${dia}`;


    vendedor.focus();
}

</script>


</body>

</html>
