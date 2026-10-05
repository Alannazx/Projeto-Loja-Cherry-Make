<?php

$nome = $_SESSION['nome'] ?? 'Usuário';
$perfil = $_SESSION['perfil'] ?? 'vendedor';

?>

<!doctype html>
<html lang="pt-br">

<head>

<meta charset="utf-8">

<link
    rel="icon"
    href="/lojacosmeticos_alalet/public/assets/img/cherry.png"
>

<title>Entrada de Mercadorias | Cherry Make</title>

<style>

@import url('https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

:root{
    --rosa-claro:#fff0f5;
    --rosa:#f8b6ca;
    --rosa-forte:#d51f4d;
    --vinho:#8f0d2d;
    --branco:#fff;
    --texto:#4c1c29;
    --muted:#9b6978;
    --borda:#f4cbd7;
    --sombra:0 12px 35px rgba(143,13,45,.10);
}

body{
    min-height:100vh;
    font-family:"Poppins",Arial,sans-serif;
    color:var(--texto);

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

    padding:20px;
}


/* =========================
   CABEÇALHO
========================= */

.header{
    width:100%;
    margin-bottom:20px;
}

.header-inner{
    max-width:1300px;
    min-height:105px;
    margin:auto;

    display:flex;
    justify-content:space-between;
    align-items:center;

    background:rgba(255,255,255,.94);
    border:1px solid #fff;

    padding:18px 28px;
    border-radius:25px;

    box-shadow:var(--sombra);
}

.logo{
    display:flex;
    align-items:center;
    gap:18px;
}

.back-button{
    width:44px;
    height:44px;
    min-width:44px;

    border-radius:50%;

    background:#fff0f4;
    display:flex;
    align-items:center;
    justify-content:center;

    color:var(--vinho);
    font-size:28px;
    text-decoration:none;

    border:1px solid rgba(242,183,199,.6);

    transition:.2s;
}

.back-button:hover{
    background:var(--vinho);
    color:#fff;
    transform:translateX(-3px);
}

.logo-photo{
    width:62px;
    height:62px;

    border-radius:50%;
    border:2px dashed var(--rosa-forte);

    background:#fff7fa;

    display:flex;
    align-items:center;
    justify-content:center;

    overflow:hidden;
    flex-shrink:0;
}

.logo-photo img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.logo h1{
    font-family:"Bodoni Moda",serif;
    font-size:32px;
    color:var(--vinho);
}

.badge{
    background:#ffe0e9;
    color:var(--vinho);

    padding:10px 17px;
    border-radius:13px;

    font-weight:600;
}

.user{
    display:flex;
    align-items:center;
    gap:15px;

    color:var(--muted);
}

.user strong{
    color:var(--vinho);
}


/* =========================
   BOTÕES
========================= */

.btn{
    text-decoration:none;

    display:inline-flex;
    justify-content:center;
    align-items:center;

    border:0;

    padding:10px 16px;
    border-radius:12px;

    font-family:"Poppins",Arial,sans-serif;
    font-weight:600;
    font-size:12px;

    cursor:pointer;
    transition:.2s ease;

    background:#f7b3c8;
    color:var(--vinho);

    white-space:nowrap;
}

.btn:hover{
    transform:translateY(-2px);

    box-shadow:
        0 6px 15px rgba(213,31,77,.14);
}

.btn-danger{
    background:#e93458;
    color:#fff;
}

.btn-ghost{
    background:#ffe1e9;
    color:var(--vinho);
}


/* =========================
   CONTEÚDO
========================= */

.container{
    max-width:1300px;
    margin:auto;

    display:grid;
    grid-template-columns:370px minmax(0,1fr);

    gap:20px;
    align-items:start;
}

.card{
    background:rgba(255,255,255,.95);

    border:1px solid #fff;
    border-radius:25px;

    padding:25px;

    box-shadow:var(--sombra);
}

.card h2{
    font-family:"Bodoni Moda",serif;
    color:var(--vinho);

    font-size:29px;

    margin-bottom:22px;
}


/* =========================
   FORMULÁRIO
========================= */

.form-group{
    display:flex;
    flex-direction:column;

    margin-bottom:18px;
}

.form-group label{
    margin-bottom:7px;

    font-size:12px;
    font-weight:600;

    color:var(--vinho);
}

.input{
    width:100%;

    padding:12px 14px;

    border:1.5px solid #f4b0c4;
    border-radius:14px;

    background:#fffafd;

    color:var(--texto);

    font-family:"Poppins",Arial,sans-serif;
    font-size:13px;

    outline:none;

    transition:.2s;
}

.input:focus{
    border-color:var(--rosa-forte);

    box-shadow:
        0 0 0 3px rgba(213,31,77,.08);
}

select.input{
    cursor:pointer;
}

.muted{
    margin-top:6px;

    font-size:10px;

    color:var(--muted);
}

.actions{
    display:flex;

    gap:10px;

    margin-top:20px;
}

.actions .btn{
    flex:1;
}

.btn:disabled{
    opacity:.55;
    cursor:not-allowed;
    transform:none;
    box-shadow:none;
}


/* =========================
   LISTA
========================= */

.lista-top{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:15px;

    margin-bottom:20px;
}

.lista-top h2{
    margin-bottom:0;
}

.total{
    background:#fff1f5;

    border:1px solid #f8d2de;

    border-radius:15px;

    padding:10px 15px;

    text-align:center;
}

.total small{
    display:block;

    color:var(--muted);

    font-size:10px;
}

.total strong{
    color:var(--vinho);

    font-size:20px;
}


/* =========================
   TABELA
========================= */

.table-wrapper{
    width:100%;
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:separate;
    border-spacing:0;
}

thead th{
    background:#fff0f5;

    color:var(--vinho);

    font-size:11px;
    font-weight:700;

    padding:14px 12px;

    text-align:left;

    border-bottom:1px solid #f3d1dc;
}

thead th:first-child{
    border-radius:13px 0 0 0;
}

thead th:last-child{
    border-radius:0 13px 0 0;
}

tbody td{
    padding:15px 12px;

    font-size:12px;

    border-bottom:1px solid #f5dce3;

    color:var(--texto);

    background:#fff;
}

tbody tr:hover td{
    background:#fff8fa;
}

.id{
    color:var(--rosa-forte);
    font-weight:700;
}

.fornecedor{
    font-weight:600;
    color:#35151f;
}

.mercadoria{
    font-weight:500;
    color:#5d2636;
}

.data{
    color:var(--muted);
}

.acoes{
    display:flex;
    gap:6px;
}

.acoes .btn{
    padding:8px 12px;
    font-size:10px;
}


/* =========================
   SEM REGISTROS
========================= */

.empty{
    text-align:center;

    padding:40px 20px;

    color:var(--muted);
}

.empty-icon{
    font-size:35px;

    color:var(--rosa);

    margin-bottom:10px;
}

.empty strong{
    display:block;

    color:var(--vinho);

    font-family:"Bodoni Moda",serif;

    font-size:20px;

    margin-bottom:5px;
}


/* =========================
   RESPONSIVO
========================= */

@media(max-width:950px){

    .container{
        grid-template-columns:1fr;
    }

}

@media(max-width:700px){

    body{
        padding:12px;
    }

    .header-inner{
        flex-direction:column;
        gap:15px;
        text-align:center;
    }

    .logo{
        flex-wrap:wrap;
        justify-content:center;
    }

    .user{
        justify-content:center;
    }

    .lista-top{
        flex-direction:column;
        align-items:stretch;
    }

    .total{
        text-align:left;
    }

}

@media(max-width:550px){

    .card{
        padding:18px;
    }

    .logo h1{
        font-size:25px;
    }

    .acoes{
        flex-direction:column;
    }

}

</style>

</head>


<body>


<!-- =========================
     CABEÇALHO
========================= -->

<div class="header">

    <div class="header-inner">


        <div class="logo">


            <!-- BOTÃO VOLTAR -->

            <a
                href="javascript:history.back()"
                class="back-button"
                title="Voltar"
                aria-label="Voltar"
            >
                ‹
            </a>


            <!-- LOGO -->

            <div class="logo-photo">

                <img
                    src="/lojacosmeticos_alalet/public/assets/img/cherry2.png"
                    alt="Logo Cherry Make"
                >

            </div>


            <h1>
                Loja Cherry Make
            </h1>


            <span class="badge">
                Entradas
            </span>


        </div>


        <!-- USUÁRIO -->

        <div class="user">

            <span>
                Olá,
                <strong>
                    <?= htmlspecialchars($nome) ?>
                </strong>
            </span>


            <a
                class="btn btn-ghost"
                href="index.php?controller=auth&action=logout"
            >
                Sair
            </a>

        </div>


    </div>

</div>



<!-- =========================
     CONTEÚDO
========================= -->

<div class="container">


    <!-- =========================
         FORMULÁRIO
    ========================= -->

    <div class="card">


        <h2>

            <?= $editar
                ? 'Editar Entrada'
                : 'Cadastrar Entrada'
            ?>

        </h2>


        <form
            method="post"
            action="index.php?controller=entrada&action=salvar"
        >


            <!-- ID DA ENTRADA -->

            <input
                type="hidden"
                name="id"
                value="<?= $editar
                    ? (int)$editar['id']
                    : 0
                ?>"
            >


            <!-- =========================
                 FORNECEDOR
            ========================= -->

            <div class="form-group">

                <label for="fornecedor">
                    Fornecedor
                </label>


                <select
                    class="input"
                    id="fornecedor"
                    name="fornecedor"
                    required
                >

                    <option value="">
                        Selecione um fornecedor...
                    </option>


                    <?php if (!empty($fornecedores)): ?>


                        <?php foreach ($fornecedores as $fornecedor): ?>


                            <option
                                value="<?= (int)$fornecedor['id_fornecedor'] ?>"
                                <?= (
                                    $editar &&
                                    (int)($editar['fornecedor'] ?? 0)
                                    === (int)$fornecedor['id_fornecedor']
                                )
                                    ? 'selected'
                                    : ''
                                ?>
                            >

                                <?= htmlspecialchars(
                                    $fornecedor['nome']
                                ) ?>

                            </option>


                        <?php endforeach; ?>


                    <?php endif; ?>


                </select>


                <?php if (empty($fornecedores)): ?>

                    <small class="muted">

                        Nenhum fornecedor cadastrado.
                        Cadastre um fornecedor primeiro.

                    </small>

                <?php else: ?>

                    <small class="muted">

                        Selecione um fornecedor cadastrado no sistema.

                    </small>

                <?php endif; ?>


            </div>



            <!-- =========================
                 MERCADORIA
            ========================= -->

            <div class="form-group">

                <label for="mercadoria">
                    Mercadoria
                </label>


                <input
                    class="input"
                    type="text"
                    id="mercadoria"
                    name="mercadoria"
                    required
                    maxlength="255"
                    placeholder="Ex.: Gloss, batom, base líquida..."
                    value="<?= $editar
                        ? htmlspecialchars(
                            $editar['mercadoria'] ?? ''
                        )
                        : ''
                    ?>"
                >


                <small class="muted">

                    Informe qual mercadoria entrou no estoque.

                </small>


            </div>



            <!-- =========================
                 DATA
            ========================= -->

            <div class="form-group">

                <label for="data">
                    Data da entrada
                </label>


                <input
                    class="input"
                    id="data"
                    type="date"
                    name="data"
                    required
                    value="<?= $editar
                        ? htmlspecialchars(
                            $editar['data'] ?? ''
                        )
                        : date('Y-m-d')
                    ?>"
                >

            </div>



            <!-- =========================
                 BOTÕES
            ========================= -->

            <div class="actions">


                <button
                    class="btn"
                    type="submit"
                    <?= empty($fornecedores)
                        ? 'disabled'
                        : ''
                    ?>
                >

                    <?= $editar
                        ? 'Atualizar'
                        : 'Cadastrar'
                    ?>

                </button>


                <a
                    class="btn btn-ghost"
                    href="index.php?controller=entrada&action=index"
                >
                    Limpar
                </a>


            </div>


        </form>


    </div>



    <!-- =========================
         LISTA DE ENTRADAS
    ========================= -->

    <div class="card">


        <div class="lista-top">


            <h2>
                Entradas de Mercadorias ♡
            </h2>


            <div class="total">

                <small>
                    Total de entradas
                </small>


                <strong>
                    <?= count($entradas) ?>
                </strong>

            </div>


        </div>



        <?php if (empty($entradas)): ?>


            <div class="empty">


                <div class="empty-icon">
                    ♡
                </div>


                <strong>
                    Nenhuma entrada cadastrada
                </strong>


                <span>
                    Cadastre uma entrada de mercadoria ao lado.
                </span>


            </div>


        <?php else: ?>


            <div class="table-wrapper">


                <table>


                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Fornecedor
                            </th>

                            <th>
                                Mercadoria
                            </th>

                            <th>
                                Data
                            </th>

                            <th>
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php foreach ($entradas as $entrada): ?>


                            <tr>


                                <!-- ID -->

                                <td class="id">

                                    #<?= (int)$entrada['id'] ?>

                                </td>


                                <!-- FORNECEDOR -->

                                <td class="fornecedor">

                                    <?= htmlspecialchars(
                                        $entrada['fornecedor_nome'] ?? '-'
                                    ) ?>

                                </td>


                                <!-- MERCADORIA -->

                                <td class="mercadoria">

                                    <?= htmlspecialchars(
                                        $entrada['mercadoria'] ?? '-'
                                    ) ?>

                                </td>


                                <!-- DATA -->

                                <td class="data">

                                    <?php

                                    $dataEntrada =
                                        $entrada['data'] ?? '';

                                    if (!empty($dataEntrada)) {

                                        echo htmlspecialchars(
                                            date(
                                                'd/m/Y',
                                                strtotime(
                                                    $dataEntrada
                                                )
                                            )
                                        );

                                    } else {

                                        echo '-';

                                    }

                                    ?>

                                </td>


                                <!-- AÇÕES -->

                                <td>

                                    <div class="acoes">


                                        <a
                                            class="btn"
                                            href="index.php?controller=entrada&action=index&id=<?= (int)$entrada['id'] ?>"
                                        >
                                            Editar
                                        </a>


                                        <a
                                            class="btn btn-danger"
                                            href="index.php?controller=entrada&action=remover&id=<?= (int)$entrada['id'] ?>"
                                            onclick="return confirm('Tem certeza que deseja excluir esta entrada?');"
                                        >
                                            Excluir
                                        </a>


                                    </div>

                                </td>


                            </tr>


                        <?php endforeach; ?>


                    </tbody>


                </table>


            </div>


        <?php endif; ?>


    </div>


</div>


</body>

</html>