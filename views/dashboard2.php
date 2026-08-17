<?php
$nome = $_SESSION['nome'] ?? 'Usuário';
$perfil = $_SESSION['perfil'] ?? 'vendedor';
?>

<!doctype html>
<html lang="pt-br">

<head>

<meta charset="utf-8">

<link rel="icon" href="/lojacosmeticos_alalet/public/assets/img/favicon.png">

<title>Dashboard - Cherry Make</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

/* =========================================================
   CONFIGURAÇÕES GERAIS
========================================================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

@import url('https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Poppins:wght@300;400;500;600;700&display=swap');

:root{
    --vinho:#8B001F;
    --vinho-escuro:#690016;
    --rosa:#FFC1D6;
    --rosa-claro:#FFF5F8;
    --rosa-medio:#F58AAA;
    --branco:#FFFFFF;
    --texto:#5B1B2A;
    --muted:#806F75;
    --borda:#F4CBD7;
}

body{

    min-height:100vh;

    font-family:"Poppins", Arial, Helvetica, sans-serif;

    color:var(--texto);

    background:

        radial-gradient(
            circle at 3% 15%,
            var(--rosa) 0px,
            var(--rosa) 7px,
            transparent 8px
        ),

        radial-gradient(
            circle at 97% 25%,
            var(--vinho) 0px,
            var(--vinho) 7px,
            transparent 8px
        ),

        radial-gradient(
            circle at 5% 75%,
            var(--vinho) 0px,
            var(--vinho) 6px,
            transparent 7px
        ),

        radial-gradient(
            circle at 95% 85%,
            var(--rosa) 0px,
            var(--rosa) 8px,
            transparent 9px
        ),

        linear-gradient(
            135deg,
            #FFF8FA,
            #FFDCE7
        );

    padding:35px;
}


/* =========================================================
   CONTAINER
========================================================= */

.container{

    width:100%;

    max-width:1350px;

    margin:auto;

    background:var(--branco);

    border-radius:35px;

    overflow:hidden;

    box-shadow:0 20px 50px rgba(139,0,31,.15);
}


/* =========================================================
   TOPO
========================================================= */

.topbar{

    min-height:135px;

    padding:25px 45px;

    background:
        linear-gradient(
            135deg,
            var(--vinho),
            var(--vinho-escuro)
        );

    display:flex;

    justify-content:space-between;

    align-items:center;

    color:white;
}


/* =========================================================
   MARCA
========================================================= */

.brand{

    display:flex;

    align-items:center;

    gap:18px;
}


.cherry-logo{

    width:75px;

    height:75px;

    border-radius:50%;

    background:rgba(255,193,214,.18);

    border:1px solid rgba(255,255,255,.25);

    display:flex;

    justify-content:center;

    align-items:center;

    overflow:hidden;
}


.cherry-logo img{

    width:100%;

    height:100%;

    object-fit:contain;

    padding:7px;
}


.brand h1{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:38px;

    font-weight:600;

    letter-spacing:-1px;

    margin-bottom:2px;
}


.brand small{

    font-size:11px;

    letter-spacing:4px;

    color:var(--rosa);

    text-transform:uppercase;
}


/* =========================================================
   USUÁRIO
========================================================= */

.pill{

    background:rgba(255,255,255,.13);

    border:1px solid rgba(255,255,255,.12);

    padding:15px 23px;

    border-radius:30px;

    font-size:13px;

    white-space:nowrap;
}


.pill a{

    text-decoration:none;

    color:var(--rosa);

    font-weight:bold;

    margin-left:7px;
}


.pill a:hover{
    color:white;
}


/* =========================================================
   ÁREA PRINCIPAL
========================================================= */

.card{

    background:#FFF9FB;

    padding:45px 70px 50px;

    min-height:600px;
}


/* =========================================================
   BOAS-VINDAS
========================================================= */

.welcome{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:35px;
}


.welcome-text h2{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:48px;

    line-height:1.1;

    color:var(--vinho);

    margin-bottom:10px;
}


.welcome-text h2 span{
    color:var(--rosa-medio);
}


.welcome-text p{

    font-size:15px;

    color:var(--muted);

    margin-bottom:20px;
}


.decoracao{

    width:490px;

    height:3px;

    border-top:3px dotted var(--rosa-medio);

    position:relative;
}


.decoracao::after{

    content:"♡";

    position:absolute;

    right:-15px;

    top:-20px;

    color:var(--rosa-medio);

    font-size:28px;
}


/* =========================================================
   LOGO
========================================================= */

.logo-destaque{

    width: 140px;

    height: 140px;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

    color:var(--vinho);

    text-align:center;

    background:white;

    box-shadow:0 8px 20px rgba(139,0,31,.08);

    overflow:hidden;

    padding:15px;
}


.logo-destaque img{

    width: 140px;

    height: 140px;

    object-fit:contain;

    margin-bottom:6px;
}



/* =========================================================
   MENU
   SOMENTE PRODUTOS E VENDAS
========================================================= */

.nav{

    display:grid;

    grid-template-columns:repeat(2, 1fr);

    gap:20px;

    margin-bottom:30px;

    width:100%;
}


.nav a{

    text-decoration:none;

    min-height:125px;

    border-radius:20px;

    background:#FFD8E3;

    color:var(--vinho);

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

    text-align:center;

    font-weight:600;

    font-size:15px;

    border:1px solid transparent;

    transition:.3s;

    padding:20px;
}


.nav-icon{

    width:48px;

    height:48px;

    margin-bottom:12px;

    display:flex;

    align-items:center;

    justify-content:center;
}


.nav-icon img{

    width:00%;

    height:100%;

    object-fit:contain;
}


.nav a:first-child{

    background:var(--vinho);

    color:white;
}


.nav a:hover{

    transform:translateY(-4px);

    border-color:var(--vinho);

    box-shadow:0 8px 20px rgba(139,0,31,.12);
}


/* =========================================================
   KPIs
   SOMENTE VENDAS E PRODUTOS
========================================================= */

.kpis{

    display:grid;

    grid-template-columns:repeat(2, 1fr);

    gap:20px;

    margin-bottom:30px;

    width:100%;
}


.kpi{

    min-height:150px;

    padding:28px;

    border-radius:20px;

    background:white;

    border:1px solid var(--borda);

    position:relative;

    overflow:hidden;

    transition:.3s;
}


.kpi:hover{

    transform:translateY(-3px);

    box-shadow:0 8px 20px rgba(139,0,31,.08);
}


.kpi::after{

    position:absolute;

    right:25px;

    bottom:5px;

    font-size:65px;

    color:var(--rosa);

    opacity:.7;
}


.kpi:first-child::after{
    content:"♡";
}


.kpi:last-child::after{
    content:"♡";
}


.label{

    color:var(--vinho);

    font-size:13px;

    font-weight:600;

    text-transform:uppercase;

    margin-bottom:12px;
}


.value{

    font-family:"Bodoni Moda", Georgia, serif;

    color:var(--vinho);

    font-size:45px;

    font-weight:600;
}


/* =========================================================
   PARTE INFERIOR
   SOMENTE OS DOIS BLOCOS
========================================================= */

.bottom-area{

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:20px;

    margin-top:5px;

    width:100%;
}


/* =========================================================
   INFORMAÇÃO
========================================================= */

.info-box{

    background:white;

    border:1px solid var(--borda);

    border-radius:22px;

    padding:28px;

    display:flex;

    flex-direction:column;

    justify-content:center;

    min-height:235px;
}


.info-top{

    display:flex;

    align-items:center;

    gap:18px;

    margin-bottom:22px;
}


.info-icon{

    min-width:75px;

    width:75px;

    height:75px;

    border-radius:50%;

    background:var(--rosa);

    display:flex;

    justify-content:center;

    align-items:center;

    overflow:hidden;
}


.info-icon img{

    width:100%;

    height:100%;

    object-fit:contain;

    padding:8px;
}


.info-box h3{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:25px;

    color:var(--vinho);

    margin-bottom:5px;
}


.info-box p{

    color:var(--muted);

    font-size:14px;

    line-height:1.6;
}


/* =========================================================
   OBSERVAÇÃO
========================================================= */

.observacao{

    background:#FFF1F5;

    border:1px solid #F5B9CB;

    border-radius:15px;

    padding:16px 18px;

    color:var(--texto);

    font-size:12px;

    line-height:1.5;
}


.observacao strong{
    color:var(--vinho);
}


/* =========================================================
   CARD PROMOCIONAL
========================================================= */

.promo{

    min-height:235px;

    border-radius:22px;

    background:
        linear-gradient(
            135deg,
            rgba(139,0,31,.95),
            rgba(105,0,22,.98)
        );

    position:relative;

    overflow:hidden;

    padding:30px;

    color:white;

    display:flex;

    flex-direction:column;

    justify-content:center;
}


.promo::before{

    content:"";

    position:absolute;

    width:160px;

    height:160px;

    border-radius:50%;

    background:rgba(255,193,214,.15);

    right:-50px;

    top:-60px;
}


.promo::after{

    content:"";

    position:absolute;

    width:100px;

    height:100px;

    border-radius:50%;

    background:rgba(255,193,214,.1);

    right:70px;

    bottom:-50px;
}


.promo small{

    font-size:11px;

    letter-spacing:4px;

    color:var(--rosa);

    margin-bottom:12px;
}


.promo h3{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:27px;

    font-weight:500;

    margin-bottom:10px;
}


.promo p{

    color:#FFDCE7;

    font-family:"Bodoni Moda", Georgia, serif;

    font-style:italic;

    font-size:18px;

    max-width:260px;
}


/* =========================================================
   IMAGEM DO PRODUTO
========================================================= */

.makeup{

    position:absolute;

    right:15px;

    bottom:5px;

    width:170px;

    height:170px;

    display:flex;

    justify-content:center;

    align-items:center;

    z-index:2;

    overflow:hidden;
}


.makeup img{

    width:100%;

    height:100%;

    object-fit:contain;
}


/* =========================================================
   RESPONSIVO
========================================================= */

@media(max-width:1000px){

    body{
        padding:20px;
    }


    .card{
        padding:35px;
    }


    .welcome{
        align-items:flex-start;
    }


    .logo-destaque{
        width:140px;
        height:140px;
    }


    .logo-destaque img{
        width:70px;
        height:70px;
    }


    .welcome-text h2{
        font-size:40px;
    }

}


@media(max-width:700px){

    body{
        padding:10px;
    }


    .topbar{

        padding:25px;

        flex-direction:column;

        align-items:flex-start;

        gap:20px;
    }


    .pill{

        width:100%;

        text-align:center;

        white-space:normal;
    }


    .card{
        padding:25px;
    }


    .welcome{

        flex-direction:column;

        gap:25px;
    }


    .welcome-text h2{
        font-size:35px;
    }


    .decoracao{
        width:100%;
    }


    .logo-destaque{
        align-self:center;
    }


    .nav{

        grid-template-columns:1fr;

    }


    .kpis{

        grid-template-columns:1fr;

    }


    .bottom-area{

        grid-template-columns:1fr;

    }


    .makeup{

        width:130px;

        height:130px;
    }

}

</style>

</head>


<body>


<div class="container">


    <!-- =====================================================
         TOPO
    ====================================================== -->

    <div class="topbar">


        <div class="brand">


            <div class="cherry-logo">

                <img
                    src="public/assets/img/cherry2.png"
                    alt="Logo Cherry Make"
                >

            </div>


            <div>

                <h1>
                    Cherry Make
                </h1>

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

            <a href="/lojacosmeticos_alalet/index.php?controller=auth&action=logout">
                Sair
            </a>

        </div>


    </div>



    <!-- =====================================================
         CONTEÚDO
    ====================================================== -->

    <div class="card">


        <!-- BOAS-VINDAS -->

        <div class="welcome">


            <div class="welcome-text">

                <h2>

                    Olá,

                    <span>
                        <?php echo htmlspecialchars($nome); ?>!
                    </span>

                </h2>


                <p>
                    Bem-vindo(a) ao painel de controle da Cherry Make.
                </p>


                <div class="decoracao"></div>

            </div>



            <div class="logo-destaque">

                <img
                    src="public/assets/img/logocherrymake.png"
                    alt="Logo Cherry Make"
                >


            </div>


        </div>



        <!-- =================================================
             SOMENTE PRODUTOS E VENDAS
        ================================================== -->

        <div class="nav">


            <a href="/lojacosmeticos_alalet/index.php?controller=produto&action=index">


                <div class="nav-icon">

                    <img
                        src="public/assets/img/produtos.png"
                        alt="Produtos"
                    >

                </div>


                Produtos / Categorias


            </a>



            <a href="/lojacosmeticos_alalet/index.php?controller=venda&action=index">


                <div class="nav-icon">

                    <img
                        src="public/assets/img/vendas.png"
                        alt="Vendas"
                    >

                </div>


                Vendas


            </a>


        </div>



        <!-- =================================================
             SOMENTE VENDAS E PRODUTOS
        ================================================== -->

        <div class="kpis">


            <div class="kpi">

                <div class="label">
                    Vendas (mês)
                </div>

                <div class="value">
                    0
                </div>

            </div>



            <div class="kpi">

                <div class="label">
                    Produtos
                </div>

                <div class="value">
                    0
                </div>

            </div>


        </div>



        <!-- =================================================
             PARTE INFERIOR
        ================================================== -->

        <div class="bottom-area">


            <!-- INFORMAÇÃO -->

            <div class="info-box">


                <div class="info-top">


                    <div class="info-icon">

                        <img
                            src="public/assets/img/perfil.png"
                            alt="Cherry Make"
                        >

                    </div>


                    <div>

                        <h3>
                            Bem-vindo(a),
                            <?php echo htmlspecialchars($nome); ?>!
                        </h3>


                        <p>

                            Escolha um dos módulos acima para continuar
                            utilizando o sistema da Cherry Make.

                        </p>

                    </div>


                </div>



                <div class="observacao">

                    <strong>
                        ♡ Observação:
                    </strong>

                    Esses números serão alimentados quando implementarmos
                    os módulos de vendas e estoque.

                </div>


            </div>



            <!-- CARD PROMOCIONAL -->

            <div class="promo">


                <small>
                    CHERRY MAKE
                </small>


                <h3>

                    Maquiagem que
                    <br>
                    realça você.

                </h3>


                <p>

                    Beleza, delicadeza e estilo em cada detalhe.

                </p>


                <div class="makeup">

                    <img
                        src="public/assets/img/produto.png"
                        alt="Produto Cherry Make"
                    >

                </div>


            </div>


        </div>


    </div>


</div>


</body>

</html>
