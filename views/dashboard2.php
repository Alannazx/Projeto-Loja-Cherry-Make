<?php
$nome = $_SESSION['nome'] ?? 'Usuário';
$perfil = $_SESSION['perfil'] ?? 'vendedor';
?>

<!doctype html>
<html lang="pt-br">

<head>

<meta charset="utf-8">

<link rel="icon" href="/lojacosmeticos_alalet/public/assets/img/cherry.png">

<title>Dashboard - Cherry Make</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Poppins:wght@300;400;500;600;700&family=Allura&display=swap" rel="stylesheet">

<style>

/* =========================================================
   CONFIGURAÇÕES GERAIS
========================================================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

:root{

    --vinho:#99001f;
    --vinho-escuro:#7b0019;

    --rosa:#ef7898;
    --rosa-claro:#fff7f9;
    --rosa-medio:#f5a4b8;
    --rosa-forte:#e85d83;

    --branco:#ffffff;

    --texto:#65182a;
    --texto-claro:#8b4c5b;

    --borda:#f2b7c7;

    --fundo:#fff9fb;
}

html{
    scroll-behavior:smooth;
}

body{

    min-height:100vh;

    font-family:"Poppins", Arial, sans-serif;

    color:var(--texto);

    background:
        radial-gradient(circle at 84% 17%,
            #ef7898 0px,
            #ef7898 6px,
            transparent 7px
        ),

        radial-gradient(circle at 89% 22%,
            #f5a4b8 0px,
            #f5a4b8 6px,
            transparent 7px
        ),

        radial-gradient(circle at 94% 16%,
            #99001f 0px,
            #99001f 6px,
            transparent 7px
        ),

        radial-gradient(circle at 91% 27%,
            #f5a4b8 0px,
            #f5a4b8 5px,
            transparent 6px
        ),

        linear-gradient(
            135deg,
            #fffafb,
            #fff1f5
        );

    padding:0;
}


/* =========================================================
   CONTAINER PRINCIPAL
========================================================= */

.container{

    width:100%;

    max-width:1535px;

    min-height:100vh;

    margin:0 auto;

    background:rgba(255,255,255,.75);

    border:1px solid #e7a6b8;

    border-radius:0 0 18px 18px;

    overflow:hidden;

    box-shadow:0 10px 35px rgba(139,0,31,.08);
}


/* =========================================================
   TOPO
========================================================= */

.topbar{

    min-height:140px;

    padding:30px 70px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    background:rgba(255,255,255,.88);

    border-bottom:1px solid rgba(242,183,199,.25);
}


/* =========================================================
   MARCA
========================================================= */

.brand{

    display:flex;

    align-items:center;

    gap:17px;
}

.cherry-logo{

    width:78px;

    height:78px;

    display:flex;

    align-items:center;

    justify-content:center;

    overflow:hidden;
}

.cherry-logo img{

    width:100%;

    height:100%;

    object-fit:contain;
}

.brand h1{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:42px;

    font-weight:600;

    line-height:1;

    color:var(--vinho);

    letter-spacing:-1px;
}

.brand h1 span{

    font-family:"Allura", cursive;

    color:var(--rosa-forte);

    font-size:42px;

    font-weight:400;

    margin-left:5px;
}

.brand small{

    display:block;

    margin-top:8px;

    font-size:9px;

    letter-spacing:4px;

    color:var(--vinho);

    text-transform:uppercase;
}


/* =========================================================
   CENTRO DO TOPO
========================================================= */

.dashboard-title{

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    margin-left:80px;
}

.dashboard-title span{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:19px;

    color:var(--vinho);

    position:relative;
}

.dashboard-title span::after{

    content:"";

    display:block;

    width:110px;

    border-bottom:2px dotted var(--rosa);

    margin:7px auto 0;
}


/* =========================================================
   USUÁRIO
========================================================= */

.top-actions{

    display:flex;

    align-items:center;

    gap:18px;
}

.notification{

    width:58px;

    height:58px;

    border-radius:50%;

    background:#fff0f4;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:26px;

    color:var(--vinho);

    position:relative;
}

.notification .number{

    position:absolute;

    top:-3px;

    right:-2px;

    width:22px;

    height:22px;

    border-radius:50%;

    background:var(--vinho);

    color:white;

    font-size:11px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:bold;
}

.vertical-line{

    height:58px;

    width:1px;

    background:#efc2cf;
}

.user-pill{

    min-width:235px;

    padding:12px 18px;

    border-radius:35px;

    background:#fff0f4;

    display:flex;

    align-items:center;

    gap:12px;

    color:var(--vinho);
}

.user-icon{

    width:45px;

    height:45px;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    overflow:hidden;
}

.user-icon img{

    width:100%;

    height:100%;

    object-fit:contain;
}

.user-info{

    flex:1;
}

.user-info small{

    display:block;

    color:var(--rosa-forte);

    font-size:13px;

    margin-bottom:1px;
}

.user-info strong{

    font-size:14px;

    font-weight:500;

    color:var(--vinho);
}

.user-arrow{

    font-size:20px;

    color:var(--vinho);
}


/* =========================================================
   CONTEÚDO
========================================================= */

.card{

    padding:30px 70px 40px;

    background:
        linear-gradient(
            180deg,
            rgba(255,255,255,.65),
            rgba(255,246,249,.8)
        );
}


/* =========================================================
   BOAS-VINDAS
========================================================= */

.welcome{

    display:flex;

    justify-content:space-between;

    align-items:flex-end;

    margin-bottom:27px;
}

.welcome-text h3{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:18px;

    font-weight:400;

    color:var(--vinho);

    margin-bottom:1px;
}

.welcome-text h2{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:56px;

    line-height:1;

    color:var(--vinho);

    margin-bottom:12px;

    font-weight:600;
}

.welcome-text h2::after{

    content:"♡";

    color:var(--rosa-forte);

    font-size:25px;

    margin-left:5px;
}

.welcome-text p{

    font-size:14px;

    color:var(--vinho);

    font-weight:400;
}

.welcome-text p::after{

    content:" ✦";

    color:var(--rosa-forte);

    font-size:18px;
}


/* =========================================================
   DECORAÇÃO
========================================================= */

.dots-decoration{

    width:220px;

    height:100px;

    position:relative;
}

.dots-decoration span{

    position:absolute;

    width:10px;

    height:10px;

    border-radius:50%;
}

.d1{
    right:170px;
    top:10px;
    background:#ef7898;
}

.d2{
    right:115px;
    top:32px;
    background:#f5a4b8;
}

.d3{
    right:65px;
    top:10px;
    background:#99001f;
}

.d4{
    right:20px;
    top:40px;
    background:#ef7898;
}

.d5{
    right:95px;
    top:70px;
    background:#ef7898;
}

.d6{
    right:40px;
    top:78px;
    background:#f5a4b8;
}


/* =========================================================
   MENU PRINCIPAL
========================================================= */

.nav{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:45px;

    width:100%;

    margin-bottom:30px;
}

.nav a{

    min-height:138px;

    border-radius:17px;

    text-decoration:none;

    display:flex;

    align-items:center;

    gap:25px;

    padding:20px 30px;

    color:var(--vinho);

    background:#ffe1e9;

    transition:.25s;

    border:1px solid transparent;
}

.nav a:first-child{

    background:
        linear-gradient(
            135deg,
            #a9002c,
            #87001e
        );

    color:white;
}

.nav a:nth-child(2){

    background:
        linear-gradient(
            135deg,
            #ed6f91,
            #e85d83
        );

    color:white;
}

.nav a:nth-child(3){

    background:#ffdce5;

    color:var(--vinho);
}

.nav a:hover{

    transform:translateY(-4px);

    box-shadow:0 10px 25px rgba(139,0,31,.15);
}

.nav-icon{

    min-width:98px;

    width:98px;

    height:98px;

    border-radius:50%;

    background:rgba(255,255,255,.88);

    display:flex;

    align-items:center;

    justify-content:center;
}

.nav-icon img{

    width:80px;

    height:80px;

    object-fit:contain;
}


.nav-text{

    flex:1;
}

.nav-text h3{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:21px;

    font-weight:500;

    margin-bottom:5px;
}

.nav-text p{

    font-size:13px;

    line-height:1.6;

    max-width:180px;
}

.nav-arrow{

    font-size:30px;

    font-weight:300;
}


/* =========================================================
   SEGUNDA ÁREA
========================================================= */

.middle{

    display:grid;

    grid-template-columns:1.05fr 1fr 1.05fr;

    gap:28px;

    margin-bottom:30px;
}

.middle-box{

    min-height:318px;

    border:1px solid var(--borda);

    border-radius:18px;

    background:rgba(255,255,255,.45);

    padding:22px;

    overflow:hidden;
}


/* =========================================================
   FRASE DO DIA
========================================================= */

.quote-title{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:18px;

    color:var(--vinho);

    margin-bottom:20px;

    padding-left:8px;
}

.quote-content{

    min-height:245px;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    text-align:center;

    position:relative;
}

.quote-mark{

    position:absolute;

    top:-3px;

    font-family:Georgia,serif;

    font-size:65px;

    color:var(--rosa);

    opacity:.85;
}

.quote-text{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:23px;

    font-style:italic;

    line-height:1.45;

    color:var(--vinho);

    max-width:330px;

    margin-top:25px;
}

.quote-script{

    font-family:"Allura", cursive;

    font-size:40px;

    color:var(--rosa-forte);

    line-height:1.1;

    margin-top:8px;
}

.quote-footer{

    font-size:9px;

    letter-spacing:5px;

    color:var(--vinho);

    margin-top:20px;
}

.quote-heart{

    color:var(--vinho);

    font-size:20px;

    margin-top:5px;
}


/* =========================================================
   VENDEDORES
========================================================= */

.sellers-title{

    text-align:center;

    font-family:"Allura", cursive;

    font-size:30px;

    color:var(--vinho);

    margin-bottom:12px;

    position:relative;
}

.sellers-title::after{

    content:"";

    width:110px;

    height:1px;

    background:var(--rosa);

    position:absolute;

    bottom:-2px;

    left:50%;

    transform:translateX(-50%);
}

.sellers{

    display:flex;

    justify-content:center;

    gap:55px;

    margin-top:12px;
}

.seller{

    text-align:center;
}

.seller-photo{

    width:125px;

    height:125px;

    border-radius:50%;

    padding:4px;

    border:2px solid var(--rosa);

    background:white;

    overflow:hidden;

    margin:auto;
}

.seller-photo img{

    width:100%;

    height:100%;

    object-fit:cover;

    border-radius:50%;
}

.seller-name{

    font-family:"Allura", cursive;

    color:var(--rosa-forte);

    font-size:28px;

    margin-top:4px;
}

.seller-role{

    display:inline-block;

    background:#ffe0e8;

    border-radius:20px;

    padding:5px 14px;

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:12px;

    color:var(--vinho);

    margin-top:2px;
}

.seller-role::before{

    content:"♥";

    margin-right:5px;

    color:var(--vinho);
}

.all-sellers{

    width:75%;

    height:38px;

    margin:17px auto 0;

    border:1px solid var(--rosa);

    border-radius:9px;

    background:transparent;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:12px;

    color:var(--vinho);

    text-decoration:none;

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:14px;
}

.all-sellers:hover{

    background:#fff0f4;
}


/* =========================================================
   ATALHOS
========================================================= */

.shortcuts-title{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:18px;

    color:var(--vinho);

    margin-bottom:8px;

    padding-left:8px;
}

.shortcut{

    min-height:54px;

    display:flex;

    align-items:center;

    gap:15px;

    border-bottom:1px solid #f2d3dc;

    text-decoration:none;

    color:var(--vinho);

    padding:7px 4px;

    transition:.2s;
}

.shortcut:last-child{

    border-bottom:none;
}

.shortcut:hover{

    padding-left:10px;

    background:#fff5f7;
}

.shortcut-icon{

    width:47px;

    height:47px;

    border-radius:50%;

    background:#ffe7ed;

    display:flex;

    align-items:center;

    justify-content:center;

    flex-shrink:0;
}

.shortcut-icon img{

    width:27px;

    height:27px;

    object-fit:contain;
}

.shortcut-text{

    flex:1;

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:14px;
}

.shortcut-arrow{

    font-size:25px;

    color:var(--vinho);
}


/* =========================================================
   PARTE INFERIOR / ESTATÍSTICAS
========================================================= */

.bottom-panel{

    display:grid;

    grid-template-columns:1.25fr 1fr 1fr 1fr;

    min-height:162px;

    border:1px solid var(--borda);

    border-radius:18px;

    overflow:hidden;

    background:rgba(255,255,255,.55);
}


/* =========================================================
   DICA CHERRY
========================================================= */

.cherry-tip{

    padding:25px;

    display:flex;

    align-items:center;

    gap:18px;

    background:linear-gradient(
        135deg,
        #fff0f4,
        #ffe3eb
    );
}

.tip-icon{

    min-width:70px;

    width:70px;

    height:70px;

    border-radius:50%;

    background:white;

    display:flex;

    align-items:center;

    justify-content:center;

    border:1px solid #f5c0cf;

    overflow:hidden;
}

.tip-icon img{

    width:100%;

    height:100%;

    object-fit:contain;

    padding:7px;
}

.tip-text h3{

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:18px;

    font-weight:500;

    color:var(--vinho);

    margin-bottom:5px;
}

.tip-text h3::after{

    content:" ♡";

    color:var(--rosa-forte);
}

.tip-text p{

    font-size:12px;

    line-height:1.6;

    color:var(--vinho);

    max-width:270px;
}


/* =========================================================
   STAT
========================================================= */

.stat{

    display:flex;

    align-items:center;

    gap:18px;

    padding:25px;

    border-left:1px dashed var(--rosa);
}

.stat-icon{

    width:70px;

    height:70px;

    min-width:70px;

    border-radius:50%;

    background:#ffd9e3;

    display:flex;

    align-items:center;

    justify-content:center;
}

.stat-icon img{

    width:38px;

    height:38px;

    object-fit:contain;
}

.stat-info small{

    display:block;

    font-family:"Bodoni Moda", Georgia, serif;

    color:var(--vinho);

    font-size:14px;

    margin-bottom:2px;
}

.stat-info strong{

    display:block;

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:34px;

    line-height:1;

    color:var(--vinho);

    font-weight:500;
}

.stat-link{

    display:block;

    margin-top:8px;

    color:var(--vinho);

    font-family:"Bodoni Moda", Georgia, serif;

    font-size:13px;

    text-decoration:none;
}

.stat-link::after{

    content:"  ›";

    font-size:20px;
}


/* =========================================================
   RESPONSIVO
========================================================= */

@media(max-width:1200px){

    .topbar{

        padding:25px 35px;
    }

    .card{

        padding:30px 35px;
    }

    .dashboard-title{

        margin-left:0;
    }

    .middle{

        grid-template-columns:1fr 1fr;
    }

    .middle-box:last-child{

        grid-column:1 / -1;
    }

    .bottom-panel{

        grid-template-columns:1fr 1fr;
    }

    .cherry-tip{

        grid-column:1 / -1;
    }

    .stat{

        border-top:1px dashed var(--rosa);
    }
}


@media(max-width:850px){

    .topbar{

        flex-wrap:wrap;

        gap:20px;
    }

    .dashboard-title{

        order:3;

        width:100%;
    }

    .top-actions{

        margin-left:auto;
    }

    .nav{

        grid-template-columns:1fr;
    }

    .middle{

        grid-template-columns:1fr;
    }

    .middle-box:last-child{

        grid-column:auto;
    }

    .bottom-panel{

        grid-template-columns:1fr;
    }

    .cherry-tip{

        grid-column:auto;
    }

    .stat{

        border-left:none;

        border-top:1px dashed var(--rosa);
    }
}


@media(max-width:600px){

    body{

        padding:0;
    }

    .container{

        border-radius:0;
    }

    .topbar{

        padding:20px;

        flex-direction:column;

        align-items:flex-start;
    }

    .brand h1{

        font-size:32px;
    }

    .brand h1 span{

        font-size:34px;
    }

    .top-actions{

        width:100%;
    }

    .user-pill{

        flex:1;

        min-width:0;
    }

    .card{

        padding:25px 18px;
    }

    .welcome{

        align-items:flex-start;
    }

    .welcome-text h2{

        font-size:43px;
    }

    .dots-decoration{

        display:none;
    }

    .nav a{

        min-height:120px;

        padding:18px;
    }

    .nav-icon{

        width:75px;

        min-width:75px;

        height:75px;
    }

    .nav-icon img{

        width:45px;

        height:45px;
    }

    .sellers{

        gap:20px;
    }

    .seller-photo{

        width:95px;

        height:95px;
    }

    .seller-name{

        font-size:24px;
    }

    .bottom-panel{

        display:block;
    }

    .cherry-tip{

        padding:20px;
    }

    .stat{

        padding:20px;
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


    <!-- LOGO -->

    <div class="brand">

        <div class="cherry-logo">

            <img
                src="public/assets/img/cherry3.png"
                alt="Logo Cherry Make"
            >

        </div>


        <div>

            <h1>
                Cherry <span>Make♡</span>
            </h1>

            <small>
                Maquiagem que realça você ♥
            </small>

        </div>

    </div>

    <!-- USUÁRIO -->

    <div class="top-actions">

        <div class="notification">
            ✉

            <span class="number">
                3
            </span>

        </div>


        <div class="vertical-line"></div>


        <div class="user-pill">

            <div class="user-icon">

                <img
                    src="public/assets/img/cherry2.png"
                    alt="Cherry Make"
                >

            </div>


            <div class="user-info">

                <small>
                    Bem-vinda,
                </small>

                <strong>
                    <?php echo htmlspecialchars($nome); ?>
                </strong>

            </div>


            <div class="user-arrow">
               ⌄
            </div>

        </div>

    </div>


</div>


<!-- =====================================================
     CONTEÚDO
====================================================== -->

<div class="card">


    <!-- =================================================
         BOAS-VINDAS
    ================================================== -->

    <div class="welcome">


        <div class="welcome-text">

            <h3>
                Bem-vinda de volta,
            </h3>

            <h2>
                <?php echo htmlspecialchars($nome); ?>!
            </h2>

            <p>
                Vamos juntas transformar beleza em confiança.
            </p>

        </div>


        <div class="dots-decoration">

            <span class="d1"></span>
            <span class="d2"></span>
            <span class="d3"></span>
            <span class="d4"></span>
            <span class="d5"></span>
            <span class="d6"></span>

        </div>


    </div>


    <!-- =================================================
         MENU PRINCIPAL
    ================================================== -->

    <div class="nav">


        <!-- PRODUTOS -->

        <a href="/lojacosmeticos_alalet/index.php?controller=produto&action=index">

            <div class="nav-icon">

                <img
                    src="public/assets/img/produtos3.png"
                    alt="Produtos"
                >

            </div>


            <div class="nav-text">

                <h3>
                    Produtos / Categorias
                </h3>

                <p>
                    Cadastre e gerencie seus
                    produtos e categorias
                </p>

            </div>

            <div class="nav-arrow">
                ›
            </div>

        </a>


        <!-- VENDAS -->

        <a href="/lojacosmeticos_alalet/index.php?controller=venda&action=index">

            <div class="nav-icon">

                <img
                    src="public/assets/img/venda3.png"
                    alt="Vendas"
                >

            </div>


            <div class="nav-text">

                <h3>
                    Vendas
                </h3>

                <p>
                    Registre e acompanhe
                    suas vendas
                </p>

            </div>

            <div class="nav-arrow">
                ›
            </div>

        </a>


        <!-- SITE -->

        <a href="/lojacosmeticos_alalet/index.php?controller=site&action=index">

            <div class="nav-icon">
            <img
                            src="public/assets/img/site3.png"
                            
                        >

            </div>


            <div class="nav-text">

                <h3>
                    Site Oficial
                </h3>

                <p>
                    Acesse e gerencie
                    o site da loja
                </p>

            </div>

            <div class="nav-arrow">
                ›
            </div>

        </a>


    </div>


    <!-- =================================================
         ÁREA CENTRAL
    ================================================== -->

    <div class="middle">


        <!-- =================================================
             FRASE DO DIA
        ================================================== -->

        <div class="middle-box">

            <div class="quote-title">
                Frase do dia ♡
            </div>


            <div class="quote-content">

                <div class="quote-mark">
                    “
                </div>

                <div class="quote-text">

                    Cada detalhe importa,
                    <br>
                    cada cliente também.

                </div>


                <div class="quote-script">

                    Você faz a
                    <br>
                    diferença! ♡

                </div>


                <div class="quote-footer">
                    CHERRY MAKE
                </div>

                <div class="quote-heart">
                    ♥
                </div>

            </div>

        </div>


        <!-- =================================================
             VENDEDORES
        ================================================== -->

        <div class="middle-box">

            <div class="sellers-title">
                Nossas Vendedoras ♡
            </div>


            <div class="sellers">


                <div class="seller">

                    <div class="seller-photo">

                        <img
                            src="public/assets/img/let.png"
                            alt="Letícia"
                        >

                    </div>

                    <div class="seller-name">
                        Letícia
                    </div>

                    <div class="seller-role">
                        Vendedora
                    </div>

                </div>


                <div class="seller">

                    <div class="seller-photo">

                        <img
                            src="public/assets/img/lana.png"
                            alt="Alanna"
                        >

                    </div>

                    <div class="seller-name">
                       Alanna
                    </div>

                    <div class="seller-role">
                        Vendedora
                    </div>

                </div>


            </div>


        </div>


        <!-- =================================================
             ATALHOS
        ================================================== -->

        <div class="middle-box">

            <div class="shortcuts-title">
                Atalhos rápidos ♡
            </div>


            <!-- PRODUTO -->

            <a
                href="/lojacosmeticos_alalet/index.php?controller=produto&action=index"
                class="shortcut"
            >

                <div class="shortcut-icon">

                    <img
                        src="public/assets/img/produtos2.png"
                        alt="Produto"
                    >

                </div>

                <div class="shortcut-text">
                    Adicionar produto
                </div>

                <div class="shortcut-arrow">
                    ›
                </div>

            </a>


            <!-- CATEGORIA -->

            <a
                href="/lojacosmeticos_alalet/index.php?controller=produto&action=index"
                class="shortcut"
            >

                <div class="shortcut-icon">

                    <span style="font-size:25px;">
                    ☆
                    </span>

                </div>

                <div class="shortcut-text">
                    Adicionar categoria
                </div>

                <div class="shortcut-arrow">
                    ›
                </div>

            </a>


            <!-- VENDA -->

            <a
                href="/lojacosmeticos_alalet/index.php?controller=venda&action=index"
                class="shortcut"
            >

                <div class="shortcut-icon">

                    <img
                        src="public/assets/img/vendas.png"
                        alt="Venda"
                    >

                </div>

                <div class="shortcut-text">
                    Registrar venda
                </div>

                <div class="shortcut-arrow">
                    ›
                </div>

            </a>


            



        </div>


    </div>


    <!-- =================================================
         ESTATÍSTICAS
    ================================================== -->

    <div class="bottom-panel">


        <!-- =================================================
             DICA
        ================================================== -->

        <div class="cherry-tip">

            <div class="tip-icon">

                <img
                    src="public/assets/img/cherry2.png"
                    alt="Cherry Make"
                >

            </div>


            <div class="tip-text">

                <h3>
                    Dica Cherry
                </h3>

                <p>
                    Mantenha seus produtos e vendas
                    sempre atualizados para oferecer
                    a melhor experiência!
                </p>

            </div>

        </div>


        <!-- =================================================
             PRODUTOS
        ================================================== -->

        <div class="stat">

            <div class="stat-icon">

                <img
                    src="public/assets/img/produtos2.png"
                    alt="Produtos"
                >

            </div>


            <div class="stat-info">

                <small>
                    Produtos cadastrados
                </small>

                <strong>
                    0
                </strong>

                <a
                    href="/lojacosmeticos_alalet/index.php?controller=produto&action=index"
                    class="stat-link"
                >
                    Ver todos
                </a>

            </div>

        </div>


        <!-- =================================================
             VENDAS
        ================================================== -->

        <div class="stat">

            <div class="stat-icon">

                <img
                    src="public/assets/img/vendas.png"
                    alt="Vendas"
                >

            </div>


            <div class="stat-info">

                <small>
                    Vendas registradas
                </small>

                <strong>
                    0
                </strong>

                <a
                    href="/lojacosmeticos_alalet/index.php?controller=venda&action=index"
                    class="stat-link"
                >
                    Ver todas
                </a>

            </div>

        </div>


        <!-- =================================================
             CATEGORIAS
        ================================================== -->

        <div class="stat">

            <div class="stat-icon">

                <span style="font-size:38px;color:#99001f;">
                    ☆
                </span>

            </div>


            <div class="stat-info">

                <small>
                    Categorias ativas
                </small>

                <strong>
                    5
                </strong>

                <a
                    href="/lojacosmeticos_alalet/index.php?controller=produto&action=index"
                    class="stat-link"
                >
                    Ver todas
                </a>

            </div>

        </div>


    </div>


</div>


</div>


</body>

</html>
