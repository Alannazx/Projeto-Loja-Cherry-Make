<?php

$nome = $_SESSION['nome'] ?? 'Cliente';

/*
|--------------------------------------------------------------------------
| Produtos vindos do banco
|--------------------------------------------------------------------------
| O SiteController envia os produtos encontrados na tabela `produto`.
| As imagens e preços abaixo são apenas fallback para manter o visual
| original enquanto esses campos não existirem na tabela.
*/

$produtos = $produtos ?? [];
$categorias = $categorias ?? [];

$imagensProdutos = [
    'Paleta de Sombras - Cherry Blossom' => 'public/assets/img/paleta.png',
    'Pó Translúcido Matte - Cloud Touch' => 'public/assets/img/po.png',
    'Lápis de olho - Berry Eye' => 'public/assets/img/lapis.png',
    'Máscara de Cílios - Lash Drama' => 'public/assets/img/rimel.png',
    'Base Matte Líquida - Skins' => 'public/assets/img/baseliquida.png',
    'Spray Fixador de Maquiagem - Super Fix' => 'public/assets/img/sprayfix.png',
    'Batom Matte - Ruby Flame' => 'public/assets/img/batomred.png',
    'Blush - Pinky Cheeks' => 'public/assets/img/blush.png',
    'Corretivo líquido - Flawless' => 'public/assets/img/corretivo.png',
    'Gloss - Cherry Glow' => 'public/assets/img/gloss10.png',
    'Sérum Primer Hidratante - Glass Skin' => 'public/assets/img/serum.png',
    'Esponja de Maquiagem - Red Blend' => 'public/assets/img/esponjinha.png',
    'Gel de Sobrancelha - Beaty Brows' => 'public/assets/img/gelsobrancelha.png',
    'Iluminador Prateado - Metalic Cherry' => 'public/assets/img/iluminador.png',
    'Kit Pincéis - Beauty Brushes' => 'public/assets/img/kitpinceis.png',
    'Necessaire - Beauty Case' => 'public/assets/img/bolsa.png',
    'Faixa de cabelo - Sweet Band' => 'public/assets/img/faixa.png',
    'Hidratante Labial - Lip Kiss' => 'public/assets/img/hidratantelabial.png',
    'Cílios Postiços - Dream Lashes' => 'public/assets/img/cilios.png',
    'Cherry Mystery Box' => 'public/assets/img/cherrybox.png',
];

$precosProdutos = [
    'Paleta de Sombras - Cherry Blossom' => '69,90',
    'Pó Translúcido Matte - Cloud Touch' => '29,90',
    'Lápis de olho - Berry Eye' => '9,90',
    'Máscara de Cílios - Lash Drama' => '29,90',
    'Base Matte Líquida - Skins' => '59,90',
    'Spray Fixador de Maquiagem - Super Fix' => '39,90',
    'Batom Matte - Ruby Flame' => '25,90',
    'Blush - Pinky Cheeks' => '19,90',
    'Corretivo líquido - Flawless' => '29,90',
    'Gloss - Cherry Glow' => '39,90',
    'Sérum Primer Hidratante - Glass Skin' => '39,90',
    'Esponja de Maquiagem - Red Blend' => '9,90',
    'Gel de Sobrancelha - Beaty Brows' => '9,90',
    'Iluminador Prateado - Metalic Cherry' => '19,90',
    'Kit Pincéis - Beauty Brushes' => '49,90',
    'Necessaire - Beauty Case' => '49,90',
    'Faixa de cabelo - Sweet Band' => '9,90',
    'Hidratante Labial - Lip Kiss' => '15,90',
    'Cílios Postiços - Dream Lashes' => '9,90',
    'Cherry Mystery Box' => '59,90',
];

/*
|--------------------------------------------------------------------------
| Imagens do carrossel
|--------------------------------------------------------------------------
*/

$heroImagens = [
    'public/assets/img/carrossel10.png',
    'public/assets/img/carrossel2.png',
    'public/assets/img/carrossel333.png',
];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cherry Make | Site Oficial</title>

    <link rel="icon" href="/lojacosmeticos_alalet/public/assets/img/cherry.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Allura&family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --vinho: #a9002c;
            --vinho2: #82001f;
            --rosa: #e85d83;
            --rosa-claro: #fff4f7;
            --rosa-bg: #fde8ee;
            --texto: #4d202b;
            --branco: #fff;
            --borda: #f0c8d2;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Poppins", Arial, sans-serif;
            color: var(--texto);
            background: #fff;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        /* =====================================================
           TOPO
        ===================================================== */

        .top-strip {
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(
                90deg,
                #99001f,
                #b9003b,
                #99001f
            );
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .8px;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            min-height: 92px;
            padding: 0 3.8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            background: rgba(255, 250, 252, .98);
            border-bottom: 1px solid #f3d6de;
            position: relative;
            z-index: 20;
        }

        .site-brand-group {
            display: flex;
            align-items: center;
            min-width: 245px;
            flex: 0 0 245px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 230px;
        }

        .logo img {
            width: 68px;
            height: 68px;
            object-fit: contain;
            border-radius: 50%;
        }

        .logo-text {
            color: var(--vinho);
            font-family: "Bodoni Moda", Georgia, serif;
            font-size: 32px;
            line-height: .8;
        }

        .logo-text span {
            display: block;
            margin-left: 11px;
            color: var(--rosa);
            font-family: "Allura", cursive;
            font-size: 29px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-left: auto;
        }

        .header-action {
            height: 42px;
            min-width: 42px;
            padding: 0 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid #efc8d3;
            border-radius: 24px;
            background: #fff;
            color: var(--vinho);
            font-size: 11px;
            font-weight: 700;
            transition: .2s;
            box-shadow: 0 2px 8px rgba(120,0,30,.04);
        }

        .header-action:hover {
            background: #fff0f4;
            border-color: #eab4c4;
            transform: translateY(-1px);
        }

        .header-action.login {
            padding-right: 17px;
        }

        .header-action svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .header-action.cart {
            width: 42px;
            padding: 0;
            position: relative;
        }

        .header-action.cart svg {
            width: 19px;
            height: 19px;
        }

        .cart-badge {
            position: absolute;
            right: -5px;
            top: -6px;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            background: var(--vinho);
            color: #fff;
            font-size: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* =====================================================
           PESQUISA
        ===================================================== */

        .header-search {
            flex: 1 1 620px;
            width: min(620px, 100%);
            max-width: 620px;
            height: 46px;
            display: flex;
            align-items: center;
            border: 1px solid #efcfd8;
            border-radius: 25px;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(120,0,30,.05);
        }

        .header-search input {
            flex: 1;
            height: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            padding: 0 18px 0 22px;
            color: #6e4a55;
            font-family: inherit;
            font-size: 12px;
        }

        .header-search input::placeholder { color: #8791a5; }

        .header-search button {
            width: 44px;
            height: 44px;
            margin-right: 1px;
            border: 0;
            border-radius: 50%;
            background: var(--vinho);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-search button:hover { background: var(--vinho2); }

        .search-icon {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
        }

        /* =====================================================
           CATEGORIAS VINDAS DO BANCO
        ===================================================== */

        .categories-bar {
            min-height: 68px;
            padding: 9px 3.8%;
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff6f8;
            border-bottom: 1px solid #f3d6de;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .categories-bar::-webkit-scrollbar { display: none; }

        .category-item {
            flex: 0 0 auto;
            min-width: 116px;
            height: 42px;
            padding: 0 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: 1px solid #f0d3dc;
            border-radius: 24px;
            background: #fff;
            color: var(--vinho);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
            transition: .2s;
        }

        .category-item:hover, .category-item.active {
            background: var(--vinho);
            border-color: var(--vinho);
            color: #fff;
        }

        .category-icon {
            width: 17px;
            height: 17px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .category-icon svg {
            width: 17px;
            height: 17px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .category-empty {
            width: 100%;
            text-align: center;
            color: #80616a;
            font-size: 11px;
        }

        /* =====================================================
           CARROSSEL
        ===================================================== */

        .hero {
            position: relative;
            width: 100%;
            height: 335px;
            overflow: hidden;
            background: #fde8ee;
        }

        .hero-slider {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1s ease, visibility 1s ease;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 1;
        }

        .hero-slide img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
        }

        .hero-controls {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 20px;
            z-index: 5;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .hero-dot {
            width: 10px;
            height: 10px;
            padding: 0;
            border: 2px solid #fff;
            border-radius: 50%;
            background: rgba(169, 0, 44, .35);
            cursor: pointer;
            transition: .25s;
        }

        .hero-dot.active {
            width: 28px;
            border-radius: 20px;
            background: var(--vinho);
        }

        .hero-arrow {
            position: absolute;
            top: 50%;
            z-index: 5;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, .82);
            color: var(--vinho);
            font-size: 24px;
            line-height: 1;
            cursor: pointer;
            box-shadow: 0 5px 18px rgba(80, 0, 20, .12);
            transition: .2s;
        }

        .hero-arrow:hover {
            background: #fff;
            transform: translateY(-50%) scale(1.05);
        }

        .hero-prev {
            left: 22px;
        }

        .hero-next {
            right: 22px;
        }

        /* =====================================================
           BENEFÍCIOS
        ===================================================== */

        .benefits {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            padding: 22px 7%;
            background: #fff9fb;
            border-bottom: 1px solid #f3dce2;
        }

        .benefit {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-align: left;
            border-right: 1px solid #f0ccd6;
        }

        .benefit:last-child {
            border: 0;
        }

        .benefit-icon {
            color: var(--rosa);
            font-size: 25px;
        }

        .benefit strong {
            display: block;
            color: var(--vinho);
            font-size: 10px;
            letter-spacing: .3px;
            margin-bottom: 5px;
        }

        .benefit span {
            display: block;
            font-size: 9px;
            color: #6f4a53;
            line-height: 1.5;
        }

        /* =====================================================
           PRODUTOS
        ===================================================== */

        .products-section {
            padding: 64px 4.5% 55px;
            background: #fff;
        }

        .section-title {
            text-align:center; color:var(--vinho); font-family:"Bodoni Moda",Georgia,serif;
            font-size:38px; line-height:1.15; font-weight:600; letter-spacing:.2px; margin-bottom:8px;
        }

        .product-grid {
            max-width: 1250px;
            margin: 28px auto 0;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
        }

        .product-card {
            min-height: 305px;
            padding: 14px 12px 16px;
            border-radius: 12px;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            transition: .25s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(120, 0, 30, .08);
        }

        .product-image {
            width: 100%;
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
        }

        .product-image img {
            width: 100%;
            height: 190px;
            max-width: 100%;
            max-height: 190px;
            object-fit: contain;
            display: block;
        }

        .product-name {
            min-height: 38px;
            text-align: center;
            font-size: 10px;
            line-height: 1.45;
            color: #3f3336;
        }

        .price {
            color: var(--rosa);
            font-weight: 600;
            font-size: 11px;
            margin: 5px 0 9px;
        }

        .buy {
            width: 100%;
            border: 0;
            border-radius: 5px;
            background: var(--vinho);
            color: #fff;
            height: 28px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .5px;
            cursor: pointer;
            transition: .2s;
        }

        .buy:hover {
            background: #7c001d;
        }

        /* =====================================================
           CARD DE DETALHES DO PRODUTO
        ===================================================== */

        .product-card {
            cursor: pointer;
        }

        .product-modal {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(60, 0, 20, .55);
        }

        .product-modal.active {
            display: flex;
        }

        .product-modal-box {
            position: relative;
            width: min(760px, 95vw);
            max-height: 90vh;
            overflow: auto;
            display: grid;
            grid-template-columns: 42% 58%;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(80, 0, 20, .25);
        }

        .product-modal-image {
            min-height: 390px;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--rosa-claro);
        }

        .product-modal-image img {
            width: 100%;
            max-height: 350px;
            object-fit: contain;
        }

        .product-modal-content {
            padding: 38px;
        }

        .product-modal-close {
            position: absolute;
            top: 12px;
            right: 15px;
            width: 34px;
            height: 34px;
            border: 0;
            border-radius: 50%;
            background: #fff;
            color: var(--vinho);
            font-size: 23px;
            cursor: pointer;
            box-shadow: 0 3px 12px rgba(80, 0, 20, .12);
        }

        .product-modal-category {
            color: var(--rosa);
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .product-modal-content h2 {
            color: var(--vinho);
            font-family: "Bodoni Moda", Georgia, serif;
            font-size: 25px;
            line-height: 1.25;
            margin-bottom: 8px;
        }

        .product-modal-brand {
            color: #80616a;
            font-size: 11px;
            margin-bottom: 18px;
        }

        .product-modal-description {
            color: #5d4a50;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 18px;
        }

        .product-modal-stock {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            background: var(--rosa-claro);
            color: var(--vinho);
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .product-modal-buy {
            width: 100%;
            min-height: 42px;
            border: 0;
            border-radius: 7px;
            background: var(--vinho);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .6px;
            cursor: pointer;
        }

        .product-modal-buy:disabled {
            background: #c8b5bb;
            cursor: not-allowed;
        }

        @media(max-width:700px) {
            .product-modal-box {
                grid-template-columns: 1fr;
            }

            .product-modal-image {
                min-height: 240px;
            }

            .product-modal-image img {
                max-height: 220px;
            }

            .product-modal-content {
                padding: 25px;
            }
        }

        /* =====================================================
           NEWSLETTER
        ===================================================== */

        .newsletter {
            min-height: 92px;
            padding: 20px 8%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 55px;

            background:
                radial-gradient(
                    circle at 4% 50%,
                    #c51d48 0 4px,
                    transparent 5px
                ),
                radial-gradient(
                    circle at 8% 75%,
                    #ef8da6 0 3px,
                    transparent 4px
                ),
                linear-gradient(
                    90deg,
                    #fff0f4,
                    #ffe4eb,
                    #fff0f4
                );
        }

        .newsletter h3 {
            color: var(--vinho);
            font-size: 13px;
            letter-spacing: 1px;
        }

        .newsletter p {
            font-size: 9px;
            margin-top: 3px;
        }

        .news-form {
            display: flex;
            width: 360px;
            height: 34px;
        }

        .news-form input {
            flex: 1;
            border: 0;
            outline: 0;
            border-radius: 18px 0 0 18px;
            padding: 0 16px;
            font-size: 9px;
        }

        .news-form button {
            width: 115px;
            border: 0;
            border-radius: 0 18px 18px 0;
            background: var(--vinho);
            color: #fff;
            font-size: 9px;
            font-weight: 600;
            cursor: pointer;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            padding: 42px 8% 15px;
            color: #fff;
            background: linear-gradient(
                110deg,
                #99001f,
                #b40035 55%,
                #89001e
            );
        }

        .footer-grid {
            display: grid;
            grid-template-columns:
                1.4fr
                1fr
                1fr
                1.2fr
                1.2fr;
            gap: 35px;
        }

        .footer-brand {
            font-family: "Bodoni Moda", Georgia, serif;
            font-size: 27px;
        }

        .footer-brand span {
            font-family: "Allura", cursive;
            color: #f5a4b8;
        }

        .footer p,
        .footer a {
            font-size: 9px;
            line-height: 2;
            color: #ffeef3;
        }

        .footer h4 {
            font-size: 10px;
            margin-bottom: 10px;
            letter-spacing: .5px;
        }

        .social {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .social span {
            width: 22px;
            height: 22px;
            border: 1px solid #f7b1c3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        .copyright {
            margin-top: 22px;
            padding-top: 12px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, .16);
            font-size: 8px;
            color: #f7cbd6;
        }

        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media(max-width:1100px) {

            .site-brand-group {min-width:210px;flex-basis:210px;}

            .header {
                padding: 0 3%;
                gap: 16px;
            }

            .logo {
                min-width: 190px;
            }

            .header-search {
                max-width: 520px;
            }

            .product-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media(max-width:850px) {

            .header {height:auto;min-height:82px;padding:12px 5%;gap:10px;}

            .site-brand-group {
                min-width: 0;
                flex: 1 1 auto;
            }

            .logo { min-width: auto; }

            .header-actions { margin-left: 0; }
            .header-action.login span { display:none; }
            .header-action.login { width:42px; padding:0; }

            .hero {height:300px;}
            .categories-bar{min-height:64px;padding:9px 4%;}
            .category-item{min-width:108px;padding:0 16px;}

            .benefits {
                grid-template-columns: repeat(2, 1fr);
            }

            .benefit:nth-child(2) {
                border-right: 0;
            }

            .benefit {
                border-bottom: 1px solid #f0ccd6;
            }

            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:560px) {

            .top-strip {
                font-size: 8px;
            }

            .logo-text {
                font-size: 28px;
            }

            .logo-text span {
                font-size: 27px;
            }

            .logo img {width:54px;height:54px;}
            .logo-text {font-size:26px;}
            .logo-text span {font-size:24px;}
            .section-title{font-size:28px;}

            .benefits {
                grid-template-columns: 1fr;
            }

            .benefit {
                border-right: 0;
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }

            .product-card {
                min-height: 280px;
            }

            .newsletter {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            .news-form {
                width: 90%;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 25px;
            }

            .hero {
                height: 300px;
            }

            .hero-arrow {
                width: 34px;
                height: 34px;
                font-size: 19px;
            }

            .hero-prev {
                left: 10px;
            }

            .hero-next {
                right: 10px;
            }

            .hero-controls {
                bottom: 12px;
            }
        }

    </style>

</head>

<body>

    <!-- =====================================================
         FAIXA SUPERIOR
    ====================================================== -->

    <div class="top-strip">
        ♥ FRETE GRÁTIS PARA TODO O BRASIL EM COMPRAS ACIMA DE R$169,00 ♥
    </div>


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="header">

        <div class="site-brand-group">
            <a href="/lojacosmeticos_alalet/index.php?controller=site&action=index" class="logo" aria-label="Cherry Make - Início">
                <img src="/lojacosmeticos_alalet/public/assets/img/cherry3.png" alt="Cherry Make">
                <div class="logo-text">Cherry<span>Make♡</span></div>
            </a>
        </div>

        <form class="header-search" onsubmit="event.preventDefault(); filtrarProdutos();">
            <input id="siteSearch" type="search" placeholder="O que você está procurando?" aria-label="Pesquisar produtos">
            <button type="submit" aria-label="Pesquisar">
                <svg class="search-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="10.8" cy="10.8" r="6.3"></circle>
                    <path d="M15.6 15.6L21 21"></path>
                </svg>
            </button>
        </form>

        <div class="header-actions">
            <a class="header-action login" href="/lojacosmeticos_alalet/index.php?controller=cliente&action=logincliente" title="Login">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="8" r="3.2"></circle>
                    <path d="M5.5 20c.7-3.5 2.9-5.2 6.5-5.2s5.8 1.7 6.5 5.2"></path>
                </svg>
                <span>Login</span>
            </a>

            <a class="header-action cart" href="/lojacosmeticos_alalet/views/carrinho.php" title="Carrinho" aria-label="Carrinho">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4 5h2l1.6 9.2a2 2 0 0 0 2 1.7h7.8a2 2 0 0 0 1.9-1.4L21 8H7"></path>
                    <circle cx="10" cy="19" r="1.3"></circle>
                    <circle cx="18" cy="19" r="1.3"></circle>
                </svg>
                <span class="cart-badge" id="cartBadge">0</span>
            </a>
        </div>

    </header>

    <main>


        <!-- =================================================
             CARROSSEL
        ================================================== -->

        <section
            class="hero"
            id="inicio"
        >

            <div
                class="hero-slider"
                id="heroSlider"
            >

                <?php foreach ($heroImagens as $i => $imagem): ?>

                    <div
                        class="hero-slide <?= $i === 0 ? 'active' : '' ?>"
                    >

                        <img
                            src="/lojacosmeticos_alalet/<?= htmlspecialchars($imagem) ?>"
                            alt="Banner Cherry Make <?= $i + 1 ?>"
                        >

                    </div>

                <?php endforeach; ?>


                <button
                    class="hero-arrow hero-prev"
                    type="button"
                    aria-label="Imagem anterior"
                >
                    ‹
                </button>


                <button
                    class="hero-arrow hero-next"
                    type="button"
                    aria-label="Próxima imagem"
                >
                    ›
                </button>


                <div
                    class="hero-controls"
                    aria-label="Navegação do carrossel"
                >

                    <?php foreach ($heroImagens as $i => $imagem): ?>

                        <button
                            type="button"
                            class="hero-dot <?= $i === 0 ? 'active' : '' ?>"
                            data-slide="<?= $i ?>"
                            aria-label="Ir para imagem <?= $i + 1 ?>"
                        ></button>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>


        <!-- =================================================
             BENEFÍCIOS
        ================================================== -->

        <section class="benefits">

            <div class="benefit">

                <div class="benefit-icon">
                    ✈
                </div>

                <div>
                    <strong>FRETE GRÁTIS</strong>

                    <span>
                        para todo o Brasil em<br>
                        compras acima de R$169
                    </span>
                </div>

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    ☺
                </div>

                <div>
                    <strong>PARCELE EM ATÉ 6X</strong>

                    <span>
                        no cartão de crédito<br>
                        com segurança
                    </span>
                </div>

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    ♡
                </div>

                <div>
                    <strong>EMBALAGEM FOFA</strong>

                    <span>
                        seu pedido embalado<br>
                        com todo carinho
                    </span>
                </div>

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    ✔
                </div>

                <div>
                    <strong>COMPRA SEGURA</strong>

                    <span>
                        seus dados protegidos<br>
                        do início ao fim
                    </span>
                </div>

            </div>

        </section>


        <!-- =================================================
             PRODUTOS
        ================================================== -->

<nav class="categories-bar" aria-label="Categorias de produtos">
        <?php if (!empty($categorias)): ?>
            <?php foreach ($categorias as $categoria): ?>
                <?php
                    $categoriaId = (int)($categoria['id'] ?? 0);
                    $categoriaNome = $categoria['nome'] ?? $categoria['descricao'] ?? 'Categoria';
                ?>
                <a
                    class="category-item"
                    href="#produtos"
                    data-category-id="<?= $categoriaId ?>"
                    data-category-name="<?= htmlspecialchars(mb_strtolower((string)$categoriaNome, 'UTF-8')) ?>"
                    onclick="filtrarCategoria(event, <?= $categoriaId ?>, <?= htmlspecialchars(json_encode((string)$categoriaNome, JSON_UNESCAPED_UNICODE), ENT_QUOTES) ?>)"
                >
                    <span class="category-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24">
                            <path d="M5 7.5h14M7 12h10M9 16.5h6"></path>
                        </svg>
                    </span>
                    <span><?= htmlspecialchars((string)$categoriaNome) ?></span>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="category-empty">Nenhuma categoria cadastrada.</div>
        <?php endif; ?>
    </nav>

        <section
            class="products-section"
            id="produtos"
        >

            <h2 class="section-title">
                TODOS OS PRODUTOS
            </h2>


            <div class="product-grid">

                <?php if (empty($produtos)): ?>

                    <p style="grid-column:1/-1;text-align:center;color:#80616a;font-size:12px;padding:40px 0;">
                        Nenhum produto disponível no momento.
                    </p>

                <?php else: ?>

                    <?php foreach ($produtos as $produto): ?>

                        <?php
                        $id = (int)($produto['id'] ?? 0);
                        $nomeProduto = $produto['nome'] ?? 'Produto';
                        $estoqueProduto = (int)($produto['estoque'] ?? 0);
                        $categoriaIdProduto = (int)($produto['categoria_id'] ?? $produto['id_categoria'] ?? 0);
                        $categoriaNomeProduto = $produto['categoria_nome'] ?? $produto['categoria'] ?? '';

                        $imagemProduto = !empty($produto['imagem'])
                            ? $produto['imagem']
                            : ($imagensProdutos[$nomeProduto] ?? 'public/assets/img/cherrybox.png');

                        $precoProduto = $produto['preco']
                            ?? ($precosProdutos[$nomeProduto] ?? null);
                        ?>

                        <article
                            class="product-card"
                            data-category-id="<?= $categoriaIdProduto ?>"
                            data-category-name="<?= htmlspecialchars(mb_strtolower((string)$categoriaNomeProduto, 'UTF-8')) ?>"
                            onclick="abrirProduto(<?= $id ?>)"
                            title="Ver detalhes do produto"
                        >

                            <div class="product-image">
                                <img
                                    src="/lojacosmeticos_alalet/<?= htmlspecialchars($imagemProduto) ?>"
                                    alt="<?= htmlspecialchars($nomeProduto) ?>"
                                    loading="lazy"
                                >
                            </div>

                            <div class="product-name">
                                <?= htmlspecialchars($nomeProduto) ?>
                            </div>

                            <?php if ($precoProduto !== null && $precoProduto !== ''): ?>
                                <div class="price">
                                    R$ <?= htmlspecialchars((string)$precoProduto) ?>
                                </div>
                            <?php endif; ?>

                            <button
                                type="button"
                                class="buy"
                                onclick="event.stopPropagation(); adicionarCarrinho(
                                    <?= htmlspecialchars(json_encode($nomeProduto, JSON_UNESCAPED_UNICODE), ENT_QUOTES) ?>,
                                    <?= htmlspecialchars(json_encode((string)($precoProduto ?? '0,00'), JSON_UNESCAPED_UNICODE), ENT_QUOTES) ?>,
                                    <?= htmlspecialchars(json_encode('/lojacosmeticos_alalet/' . $imagemProduto, JSON_UNESCAPED_UNICODE), ENT_QUOTES) ?>,
                                    <?= $estoqueProduto ?>
                                )"
                                <?= $estoqueProduto <= 0 ? 'disabled' : '' ?>
                            >
                                <?= $estoqueProduto <= 0 ? 'SEM ESTOQUE' : 'COMPRAR' ?>
                            </button>

                        </article>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </section>


    </main>


    <!-- =====================================================
         CARD DE DETALHES DO PRODUTO
    ====================================================== -->

    <div
        class="product-modal"
        id="productModal"
        onclick="fecharProduto(event)"
    >

        <div class="product-modal-box" onclick="event.stopPropagation()">

            <button
                type="button"
                class="product-modal-close"
                onclick="fecharProduto()"
                aria-label="Fechar"
            >×</button>

            <div class="product-modal-image">
                <img id="modalImagem" src="" alt="">
            </div>

            <div class="product-modal-content">

                <div class="product-modal-category" id="modalCategoria"></div>

                <h2 id="modalNome">Produto</h2>

                <div class="product-modal-brand" id="modalMarca"></div>

                <div class="product-modal-description" id="modalDescricao">
                    Carregando informações...
                </div>

                <div class="product-modal-stock" id="modalEstoque"></div>

                <button
                    type="button"
                    class="product-modal-buy"
                    id="modalComprar"
                >COMPRAR</button>

            </div>

        </div>

    </div>


    <!-- =====================================================
         NEWSLETTER
    ====================================================== -->

    <section class="newsletter">

        <div>

            <h3>
                ENTRE PARA O UNIVERSO CHERRY ♥
            </h3>

            <p>
                Receba novidades, lançamentos e ofertas especiais.
            </p>

        </div>


        <form
            class="news-form"
            onsubmit="event.preventDefault(); alert('♥ Cadastro realizado com sucesso!');"
        >

            <input
                type="email"
                placeholder="Seu melhor e-mail"
                required
            >

            <button type="submit">
                CADASTRAR
            </button>

        </form>

    </section>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="footer">

        <div class="footer-grid">


            <div>

                <div class="footer-brand">
                    Cherry <span>Make♡</span>
                </div>

                <p style="margin-top:8px">

                    Maquiagem que realça você.<br>
                    Produtos de qualidade para todos<br>
                    os momentos da sua vida.

                </p>

                <div class="social">

                    <span>◎</span>
                    <span>f</span>
                    <span>◉</span>

                </div>

            </div>


            <div>

                <h4>
                    INSTITUCIONAL
                </h4>

                <a href="#">
                    Política de privacidade
                </a>
                <br>

                <a href="#">
                    Trocas e devoluções
                </a>
                <br>

                <a href="#">
                    Perguntas frequentes
                </a>
                <br>

                <a href="#">
                    Fale conosco
                </a>

            </div>


            <div>

                <h4>
                    AJUDA
                </h4>

                <a href="#">
                    Como comprar
                </a>
                <br>

                <a href="#">
                    Formas de pagamento
                </a>
                <br>

                <a href="#">
                    Prazos de entrega
                </a>
                <br>

                <a href="#">
                    Rastreamento de pedido
                </a>

            </div>


            <div>

                <h4>
                    ATENDIMENTO
                </h4>

                <p>
                    ☎ (21) 54321-9876
                </p>

                <p>
                    ✉ atendimento@cherrymake.com.br
                </p>

                <p>
                    ◉ Seg. à Sex. 9h às 18h
                </p>

            </div>


            <div>

                <h4>
                    FORMAS DE PAGAMENTO
                </h4>

                <p style="font-size:16px;letter-spacing:3px">
                    VISA ◉ elo ◉
                </p>

                <p style="font-size:16px;letter-spacing:3px">
                    PIX ▦
                </p>

            </div>


        </div>


        <div class="copyright">

            © 2026 Cherry Make. Todos os direitos reservados.

        </div>

    </footer>


    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>


        function filtrarProdutos(){
            const termo=(document.getElementById('siteSearch')?.value||'').trim().toLowerCase();
            document.querySelectorAll('.product-card').forEach(function(card){
                const nome=(card.querySelector('.product-name')?.textContent||'').toLowerCase();
                const categoria=(card.dataset.categoryName||'').toLowerCase();
                card.style.display=(!termo||nome.includes(termo)||categoria.includes(termo))?'':'none';
            });
            document.querySelectorAll('.category-item').forEach(function(item){ item.classList.remove('active'); });
            document.getElementById('produtos')?.scrollIntoView({behavior:'smooth',block:'start'});
        }

        function filtrarCategoria(evento, categoriaId, categoriaNome){
            if (evento) evento.preventDefault();
            const termo = String(categoriaNome || '').toLowerCase();
            document.querySelectorAll('.category-item').forEach(function(item){
                item.classList.toggle('active', Number(item.dataset.categoryId) === Number(categoriaId));
            });
            document.querySelectorAll('.product-card').forEach(function(card){
                const id = Number(card.dataset.categoryId || 0);
                const nome = (card.dataset.categoryName || '').toLowerCase();
                card.style.display = (id === Number(categoriaId) || (!id && nome === termo)) ? '' : 'none';
            });
            document.getElementById('produtos')?.scrollIntoView({behavior:'smooth',block:'start'});
        }

        /* =====================================================
           CARRINHO
        ====================================================== */

        function obterCarrinho() {

            try {

                return JSON.parse(
                    localStorage.getItem('carrinho')
                ) || [];

            } catch (erro) {

                console.error(
                    'Erro ao carregar o carrinho:',
                    erro
                );

                return [];

            }

        }


        /*
        |--------------------------------------------------------------------------
        | ADICIONAR PRODUTO
        |--------------------------------------------------------------------------
        */

        function adicionarCarrinho(
            nomeProduto,
            precoProduto,
            imagemProduto,
            estoqueProduto = 0
        ) {

            let carrinho = obterCarrinho();

            const produtoExistente = carrinho.find(
                function (produto) {
                    return produto.nome === nomeProduto;
                }
            );

            if (Number(estoqueProduto) <= 0) {
                mostrarMensagemCarrinho('Este produto está sem estoque.');
                return;
            }

            if (produtoExistente) {

                const quantidadeAtual =
                    Number(produtoExistente.quantidade) || 0;

                if (quantidadeAtual >= Number(estoqueProduto)) {
                    mostrarMensagemCarrinho(
                        'Estoque máximo disponível: ' +
                        estoqueProduto + ' unidade(s).'
                    );
                    return;
                }

                produtoExistente.quantidade++;
                produtoExistente.estoque = Number(estoqueProduto);

            } else {

                carrinho.push({
                    nome: nomeProduto,
                    preco: precoProduto,
                    imagem: imagemProduto,
                    estoque: Number(estoqueProduto),
                    quantidade: 1
                });

            }

            localStorage.setItem(
                'carrinho',
                JSON.stringify(carrinho)
            );

            atualizarBadgeCarrinho();

            mostrarMensagemCarrinho(nomeProduto);

        }


        /*
        |--------------------------------------------------------------------------
        | CARD DE DETALHES DO PRODUTO
        |--------------------------------------------------------------------------
        */

        async function abrirProduto(id) {

            if (!id) return;

            const modal = document.getElementById('productModal');
            const nome = document.getElementById('modalNome');
            const categoria = document.getElementById('modalCategoria');
            const marca = document.getElementById('modalMarca');
            const descricao = document.getElementById('modalDescricao');
            const estoque = document.getElementById('modalEstoque');
            const imagem = document.getElementById('modalImagem');
            const comprar = document.getElementById('modalComprar');

            modal.classList.add('active');

            nome.textContent = 'Carregando...';
            categoria.textContent = '';
            marca.textContent = '';
            descricao.textContent = 'Buscando informações do produto...';
            estoque.textContent = '';
            imagem.removeAttribute('src');
            comprar.disabled = true;

            try {

                const resposta = await fetch(
                    '/lojacosmeticos_alalet/index.php?controller=site&action=produto&id=' +
                    encodeURIComponent(id)
                );

                const dados = await resposta.json();

                if (!resposta.ok || !dados.sucesso) {
                    throw new Error(
                        dados.mensagem || 'Não foi possível carregar o produto.'
                    );
                }

                const produto = dados.produto;

                nome.textContent = produto.nome || 'Produto';
                categoria.textContent =
                    produto.categoria_nome || '';

                marca.textContent = produto.marca
                    ? 'Marca: ' + produto.marca
                    : '';

                descricao.textContent = produto.descricao
                    || 'Este produto não possui uma descrição cadastrada.';

                const quantidadeEstoque =
                    Number(produto.estoque) || 0;

                estoque.textContent = quantidadeEstoque > 0
                    ? 'Em estoque: ' + quantidadeEstoque + ' unidade(s)'
                    : 'Produto sem estoque';

                const imagemProduto =
                    produto.imagem ||
                    '/lojacosmeticos_alalet/public/assets/img/cherrybox.png';

                imagem.src = imagemProduto;
                imagem.alt = produto.nome || 'Produto';

                comprar.disabled = quantidadeEstoque <= 0;

                comprar.textContent = quantidadeEstoque > 0
                    ? 'COMPRAR'
                    : 'SEM ESTOQUE';

                comprar.onclick = function () {

                    adicionarCarrinho(
                        produto.nome || 'Produto',
                        produto.preco ?? '0,00',
                        imagemProduto,
                        quantidadeEstoque
                    );

                };

            } catch (erro) {

                console.error('Erro ao carregar produto:', erro);

                nome.textContent = 'Erro';
                descricao.textContent =
                    'Não foi possível carregar as informações deste produto.';
                estoque.textContent = '';
                comprar.disabled = true;

            }

        }


        function fecharProduto(evento) {

            if (
                evento &&
                evento.target &&
                evento.target.id !== 'productModal'
            ) {
                return;
            }

            const modal =
                document.getElementById('productModal');

            if (modal) {
                modal.classList.remove('active');
            }

        }

        document.addEventListener(
            'keydown',
            function (evento) {

                if (evento.key === 'Escape') {
                    fecharProduto();
                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | ATUALIZAR BADGE
        |--------------------------------------------------------------------------
        */

        function atualizarBadgeCarrinho() {

            const carrinho = obterCarrinho();

            let quantidadeTotal = 0;


            carrinho.forEach(
                function (produto) {

                    quantidadeTotal += Number(
                        produto.quantidade
                    ) || 0;

                }
            );


            const badge = document.getElementById(
                'cartBadge'
            );


            if (badge) {

                badge.textContent = quantidadeTotal;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | MENSAGEM DE PRODUTO ADICIONADO
        |--------------------------------------------------------------------------
        */

        function mostrarMensagemCarrinho(nomeProduto) {

            /*
            | Evita criar várias mensagens ao mesmo tempo
            */

            const mensagemAntiga = document.querySelector(
                '.cart-message'
            );

            if (mensagemAntiga) {

                mensagemAntiga.remove();

            }


            const mensagem = document.createElement(
                'div'
            );

            mensagem.className = 'cart-message';


            mensagem.innerHTML =
                '♥ <strong>' +
                nomeProduto +
                '</strong> foi adicionado ao carrinho!';


            mensagem.style.position = 'fixed';
            mensagem.style.right = '25px';
            mensagem.style.bottom = '25px';
            mensagem.style.zIndex = '9999';
            mensagem.style.background = '#a9002c';
            mensagem.style.color = '#fff';
            mensagem.style.padding = '14px 20px';
            mensagem.style.borderRadius = '10px';
            mensagem.style.fontSize = '12px';
            mensagem.style.boxShadow =
                '0 8px 25px rgba(80,0,20,.25)';
            mensagem.style.maxWidth = '320px';


            document.body.appendChild(
                mensagem
            );


            setTimeout(
                function () {

                    mensagem.style.opacity = '0';
                    mensagem.style.transition = '.3s';

                    setTimeout(
                        function () {

                            mensagem.remove();

                        },
                        300
                    );

                },
                2200
            );

        }


        /* =====================================================
           CARROSSEL
        ====================================================== */

        document.addEventListener(
            'DOMContentLoaded',
            function () {


                /*
                |--------------------------------------------------------------------------
                | Atualiza carrinho assim que a página abre
                |--------------------------------------------------------------------------
                */

                atualizarBadgeCarrinho();


                /*
                |--------------------------------------------------------------------------
                | Elementos do carrossel
                |--------------------------------------------------------------------------
                */

                const slides =
                    document.querySelectorAll(
                        '.hero-slide'
                    );

                const dots =
                    document.querySelectorAll(
                        '.hero-dot'
                    );

                const prevButton =
                    document.querySelector(
                        '.hero-prev'
                    );

                const nextButton =
                    document.querySelector(
                        '.hero-next'
                    );


                if (!slides.length) {

                    return;

                }


                let slideAtual = 0;

                let intervalo;


                /*
                |--------------------------------------------------------------------------
                | Mostrar slide
                |--------------------------------------------------------------------------
                */

                function mostrarSlide(indice) {

                    slideAtual =
                        (indice + slides.length)
                        % slides.length;


                    slides.forEach(
                        function (slide, i) {

                            slide.classList.toggle(
                                'active',
                                i === slideAtual
                            );

                        }
                    );


                    dots.forEach(
                        function (dot, i) {

                            dot.classList.toggle(
                                'active',
                                i === slideAtual
                            );

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | Iniciar carrossel
                |--------------------------------------------------------------------------
                | Cada imagem fica 8 segundos
                */

                function iniciarCarrossel() {

                    clearInterval(intervalo);


                    intervalo = setInterval(
                        function () {

                            mostrarSlide(
                                slideAtual + 1
                            );

                        },
                        8000
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | Próximo
                |--------------------------------------------------------------------------
                */

                if (nextButton) {

                    nextButton.addEventListener(
                        'click',
                        function () {

                            mostrarSlide(
                                slideAtual + 1
                            );

                            iniciarCarrossel();

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | Anterior
                |--------------------------------------------------------------------------
                */

                if (prevButton) {

                    prevButton.addEventListener(
                        'click',
                        function () {

                            mostrarSlide(
                                slideAtual - 1
                            );

                            iniciarCarrossel();

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | Bolinhas
                |--------------------------------------------------------------------------
                */

                dots.forEach(
                    function (dot) {

                        dot.addEventListener(
                            'click',
                            function () {

                                mostrarSlide(
                                    Number(
                                        dot.dataset.slide
                                    )
                                );

                                iniciarCarrossel();

                            }
                        );

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | Inicia
                |--------------------------------------------------------------------------
                */

                mostrarSlide(0);

                iniciarCarrossel();

            }
        );


    </script>


</body>

</html>