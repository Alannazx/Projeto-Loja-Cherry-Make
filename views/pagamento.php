<?php

session_start();

$nomeCliente =
    $_SESSION['cliente_nome']
    ?? $_SESSION['nome']
    ?? 'Cliente';

$emailCliente =
    $_SESSION['cliente_email']
    ?? '';

$clienteCep =
    $cliente['cep']
    ?? '';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Pagamento | Cherry Make</title>

<link
    rel="icon"
    href="/lojacosmeticos_alalet/public/assets/img/cherry.png"
>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link
    href="https://fonts.googleapis.com/css2?family=Allura&family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
>

<style>

/* =========================================================
   RESET
========================================================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --vinho: #a9002c;
    --vinho-escuro: #82001f;
    --vinho-header: #97001f;
    --rosa: #e85d83;
    --rosa-claro: #fff4f7;
    --rosa-fundo: #fdecef;
    --texto: #4d202b;
    --texto-claro: #87626c;
    --borda: #edc7d2;
    --branco: #ffffff;
}

body {

    font-family:
        "Poppins",
        Arial,
        sans-serif;

    background:
        linear-gradient(
            135deg,
            #fffafd 0%,
            #fff5f8 100%
        );

    color: var(--texto);

    min-height: 100vh;
}


/* =========================================================
   HEADER
========================================================= */

.header {

    height: 86px;

    background:
        linear-gradient(
            90deg,
            #8e001d,
            #a9002c,
            #8e001d
        );

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 4%;

    box-shadow:
        0 3px 15px
        rgba(100, 0, 25, .12);
}

.logo {

    display: flex;

    align-items: center;

    gap: 12px;

    text-decoration: none;
}

.logo img {

    width: 62px;
    height: 62px;

    object-fit: contain;

    border-radius: 50%;

    background: white;
}

.logo-text {

    color: white;

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 32px;

    font-weight: 600;

    line-height: .75;
}

.logo-text span {

    display: block;

    margin-left: 12px;
    margin-top: 4px;

    font-family:
        "Allura",
        cursive;

    font-size: 27px;

    color: #ffc1d3;
}

.user-area {

    color: white;

    font-size: 11px;

    border:
        1px solid
        rgba(255,255,255,.22);

    background:
        rgba(255,255,255,.08);

    border-radius: 30px;

    padding: 10px 18px;
}

.user-area strong {
    font-weight: 600;
}

.user-area a {

    color: white;

    text-decoration: none;

    margin-left: 8px;
}

.user-area a:hover {
    color: #ffc1d3;
}


/* =========================================================
   CONTAINER
========================================================= */

.page {

    width: 94%;

    max-width: 1500px;

    margin: 24px auto 60px;
}


/* =========================================================
   TÍTULO
========================================================= */

.page-title {

    display: flex;

    align-items: center;

    gap: 20px;

    margin-bottom: 25px;
}

.back-button {

    width: 48px;
    height: 48px;

    min-width: 48px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #ffe3eb;

    color: var(--vinho);

    font-size: 23px;

    text-decoration: none;

    transition: .2s;
}

.back-button:hover {

    background: var(--vinho);

    color: white;

    transform: translateX(-3px);
}

.page-title h1 {

    color: var(--vinho);

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 32px;

    line-height: 1;
}

.page-title p {

    margin-top: 5px;

    color: var(--texto-claro);

    font-size: 11px;
}


/* =========================================================
   LAYOUT
========================================================= */

.checkout {

    display: grid;

    grid-template-columns:
        1fr
        1.3fr
        1fr;

    gap: 22px;

    align-items: start;
}


/* =========================================================
   CARDS
========================================================= */

.box {

    background:
        rgba(255,255,255,.95);

    border:
        1px solid var(--borda);

    border-radius: 14px;

    box-shadow:
        0 5px 20px
        rgba(120, 0, 35, .04);
}

.box-header {

    padding: 20px 22px;

    border-bottom:
        1px solid #f1dce2;

    display: flex;

    align-items: center;

    gap: 10px;
}

.box-icon {

    font-size: 25px;

    color: var(--vinho);
}

.box-header h2 {

    color: var(--vinho);

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 21px;
}

.box-content {
    padding: 20px;
}


/* =========================================================
   CARRINHO
========================================================= */

.cart-item {

    display: grid;

    grid-template-columns:
        82px
        1fr;

    gap: 13px;

    padding: 13px 0;

    border-bottom:
        1px solid #f1e2e6;
}

.cart-item:last-child {
    border-bottom: 0;
}

.cart-image {

    width: 82px;
    height: 82px;

    border:
        1px solid #efced8;

    border-radius: 10px;

    background: #fff7f9;

    overflow: hidden;
}

.cart-image img {

    width: 100%;
    height: 100%;

    object-fit: contain;
}

.cart-name {

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    color: var(--texto);

    font-size: 14px;

    line-height: 1.25;
}

.cart-sku {

    color: #94747d;

    font-size: 9px;

    margin-top: 5px;
}

.cart-quantity {

    color: #87626c;

    font-size: 10px;

    margin-top: 3px;
}

.cart-price {

    color: var(--vinho);

    font-weight: 700;

    font-size: 12px;

    margin-top: 5px;
}

.continue {

    display: block;

    margin-top: 15px;

    color: var(--vinho);

    font-size: 10px;

    font-weight: 600;

    text-decoration: none;
}


/* =========================================================
   PAGAMENTO
========================================================= */

.payment-content {
    padding: 24px;
}

.payment-main-title {

    display: flex;

    align-items: center;

    gap: 13px;

    margin-bottom: 4px;
}

.payment-main-title .symbol {

    width: 44px;
    height: 44px;

    border-radius: 12px;

    background: #ffe6ee;

    display: flex;

    align-items: center;
    justify-content: center;

    color: var(--vinho);

    font-size: 25px;
}

.payment-main-title h2 {

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 27px;

    color: var(--vinho);
}

.payment-subtitle {

    color: var(--texto-claro);

    font-size: 11px;

    margin-left: 57px;

    margin-bottom: 20px;
}


/* =========================================================
   MÉTODOS
========================================================= */

.payment-methods {

    display: grid;

    grid-template-columns:
        1fr
        1fr;

    gap: 15px;
}

.payment-card {

    min-height: 180px;

    padding: 23px;

    border:
        1px solid #efc8d4;

    border-radius: 12px;

    background: white;

    cursor: pointer;

    transition: .25s;

    display: flex;

    flex-direction: column;

    justify-content: space-between;
}

.payment-card:hover {

    transform: translateY(-3px);

    box-shadow:
        0 8px 25px
        rgba(169,0,44,.10);

    border-color: var(--rosa);
}

.payment-card.active {

    background:
        linear-gradient(
            145deg,
            #a9002c,
            #8d0024
        );

    border-color: var(--vinho);

    color: white;
}

.payment-card-icon {

    font-size: 34px;

    margin-bottom: 12px;
}

.payment-card h3 {

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 18px;

    margin-bottom: 6px;
}

.payment-card p {

    font-size: 10px;

    opacity: .75;

    line-height: 1.5;
}

.payment-arrow {

    width: 34px;
    height: 34px;

    border:
        1px solid currentColor;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-top: 15px;
}


/* =========================================================
   ENDEREÇO
========================================================= */

.address {

    margin-top: 24px;

    padding-top: 22px;

    border-top:
        1px solid #f0dce2;
}

.address-title {

    color: var(--vinho);

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 19px;

    margin-bottom: 15px;
}

.form-grid {

    display: grid;

    grid-template-columns:
        1fr
        1fr;

    gap: 12px;
}

.field {

    display: flex;

    flex-direction: column;

    gap: 5px;
}

.field.full {
    grid-column: 1 / -1;
}

.field label {

    font-size: 9px;

    font-weight: 600;

    color: #76525e;
}

.field input {

    width: 100%;

    height: 38px;

    padding: 0 10px;

    border:
        1px solid #e6c7d0;

    border-radius: 7px;

    outline: none;

    background: white;

    color: var(--texto);

    font-size: 10px;
}

.field input:focus {

    border-color:
        var(--rosa);

    box-shadow:
        0 0 0 3px
        rgba(232,93,131,.09);
}

.cep-group {

    display: flex;

    gap: 6px;
}

.cep-group input {
    flex: 1;
}

.cep-button {

    height: 38px;

    padding: 0 13px;

    border: 0;

    border-radius: 7px;

    background:
        var(--vinho);

    color: white;

    font-size: 9px;

    font-weight: 600;

    cursor: pointer;
}

.cep-status {

    display: none;

    color: var(--rosa);

    font-size: 9px;

    margin-top: 3px;
}


/* =========================================================
   FRETE
========================================================= */

.freight {

    margin-top: 18px;

    padding-top: 18px;

    border-top:
        1px solid #f0dce2;
}

.freight-title {

    color: var(--vinho);

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 16px;

    margin-bottom: 10px;
}

.freight-options {

    display: flex;

    flex-direction: column;

    gap: 7px;
}

.freight-option {

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 10px 12px;

    border:
        1px solid #edced7;

    border-radius: 7px;

    background: white;

    cursor: pointer;

    font-size: 9px;
}

.freight-option.selected {

    border-color:
        var(--vinho);

    background:
        #fff1f5;
}

.freight-option strong {
    color: var(--vinho);
}

.freight-message {

    color: #92737c;

    font-size: 9px;
}


/* =========================================================
   RESUMO
========================================================= */

.summary-content {
    padding: 22px;
}

.summary-row {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 16px;

    font-size: 11px;

    color: #80616b;
}

.summary-row strong {
    color: var(--texto);
}

.summary-line {

    height: 1px;

    background: #f0dce2;

    margin: 20px 0;
}

.total {

    display: flex;

    justify-content: space-between;

    align-items: center;
}

.total span {

    font-size: 15px;

    font-weight: 600;
}

.total strong {

    color: var(--vinho);

    font-size: 25px;
}

.finish-button {

    width: 100%;

    height: 47px;

    border: 0;

    border-radius: 8px;

    background:
        linear-gradient(
            90deg,
            #a9002c,
            #970025
        );

    color: white;

    font-size: 10px;

    font-weight: 700;

    cursor: pointer;

    margin-top: 24px;
}

.clear-button {

    width: 100%;

    height: 42px;

    margin-top: 10px;

    border:
        1px solid #e2bbc7;

    border-radius: 8px;

    background: white;

    color: var(--vinho);

    font-size: 9px;

    font-weight: 600;

    cursor: pointer;
}

.security {

    margin-top: 14px;

    padding: 12px;

    border-radius: 8px;

    background: #fff0f5;

    color: #825765;

    font-size: 9px;

    line-height: 1.5;
}


/* =========================================================
   =========================================================
   CARD FLUTUANTE DE PAGAMENTO
   =========================================================
========================================================= */

.payment-overlay {

    position: fixed;

    inset: 0;

    background:
        rgba(65, 0, 20, .55);

    backdrop-filter: blur(5px);

    display: none;

    align-items: center;

    justify-content: center;

    padding: 20px;

    z-index: 9999;
}

.payment-overlay.show {

    display: flex;

    animation: aparecer .25s ease;
}

@keyframes aparecer {

    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}


/* =========================================================
   CARD FLUTUANTE
========================================================= */

.payment-modal {

    width: 100%;

    max-width: 560px;

    max-height: 90vh;

    overflow-y: auto;

    background: white;

    border-radius: 20px;

    border:
        1px solid #edc0cc;

    box-shadow:
        0 25px 80px
        rgba(90,0,30,.30);

    animation:
        subir .3s ease;
}

@keyframes subir {

    from {

        opacity: 0;

        transform:
            translateY(30px)
            scale(.96);

    }

    to {

        opacity: 1;

        transform:
            translateY(0)
            scale(1);

    }
}


/* =========================================================
   CABEÇALHO DO MODAL
========================================================= */

.modal-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 22px 25px;

    background:
        linear-gradient(
            135deg,
            #a9002c,
            #850020
        );

    color: white;

    border-radius:
        20px 20px 0 0;
}

.modal-title {

    display: flex;

    align-items: center;

    gap: 12px;
}

.modal-title-icon {

    width: 42px;
    height: 42px;

    border-radius: 11px;

    background:
        rgba(255,255,255,.15);

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 22px;
}

.modal-title h2 {

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 22px;
}

.modal-title p {

    font-size: 9px;

    opacity: .8;

    margin-top: 2px;
}

.close-modal {

    width: 35px;
    height: 35px;

    border: 0;

    border-radius: 50%;

    background:
        rgba(255,255,255,.15);

    color: white;

    font-size: 21px;

    cursor: pointer;

    transition: .2s;
}

.close-modal:hover {

    background: white;

    color: var(--vinho);
}


/* =========================================================
   CONTEÚDO MODAL
========================================================= */

.modal-body {

    padding: 25px;
}


/* =========================================================
   CARTÃO
========================================================= */

.card-preview {

    width: 100%;

    height: 185px;

    border-radius: 15px;

    padding: 22px;

    margin-bottom: 23px;

    background:
        linear-gradient(
            135deg,
            #a9002c,
            #650019
        );

    color: white;

    box-shadow:
        0 10px 25px
        rgba(130,0,31,.20);

    position: relative;

    overflow: hidden;
}

.card-preview::after {

    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    border-radius: 50%;

    right: -60px;
    top: -60px;

    background:
        rgba(255,255,255,.08);
}

.card-brand {

    display: flex;

    justify-content: space-between;

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 17px;
}

.card-chip {

    width: 42px;
    height: 30px;

    border-radius: 6px;

    background:
        linear-gradient(
            135deg,
            #e7b66d,
            #f6d99d
        );

    margin-top: 20px;
}

.card-number-preview {

    font-size: 17px;

    letter-spacing: 2px;

    margin-top: 15px;

    font-family: monospace;
}

.card-bottom {

    display: flex;

    justify-content: space-between;

    margin-top: 10px;

    font-size: 9px;

    text-transform: uppercase;
}


/* =========================================================
   CAMPOS DO CARTÃO
========================================================= */

.modal-fields {

    display: grid;

    grid-template-columns:
        1fr
        1fr;

    gap: 13px;
}

.modal-field {

    display: flex;

    flex-direction: column;

    gap: 6px;
}

.modal-field.full {
    grid-column: 1 / -1;
}

.modal-field label {

    font-size: 9px;

    font-weight: 600;

    color: #6d4c56;
}

.modal-field input,
.modal-field select {

    width: 100%;

    height: 42px;

    border:
        1px solid #e2c3cc;

    border-radius: 8px;

    padding: 0 12px;

    outline: none;

    font-family: "Poppins";

    font-size: 10px;

    color: var(--texto);

    background: #fffafd;
}

.modal-field input:focus,
.modal-field select:focus {

    border-color:
        var(--rosa);

    box-shadow:
        0 0 0 3px
        rgba(232,93,131,.10);
}

.card-submit {

    width: 100%;

    height: 46px;

    margin-top: 20px;

    border: 0;

    border-radius: 9px;

    background:
        linear-gradient(
            90deg,
            #a9002c,
            #850020
        );

    color: white;

    font-size: 10px;

    font-weight: 700;

    cursor: pointer;
}

.card-submit:hover {
    background: var(--vinho-escuro);
}

.modal-security {

    text-align: center;

    color: #92717b;

    font-size: 8px;

    margin-top: 12px;
}


/* =========================================================
   PIX MODAL
========================================================= */

.pix-modal-content {
    text-align: center;
}

.pix-modal-content > p {

    color: var(--texto-claro);

    font-size: 10px;

    line-height: 1.6;

    margin-bottom: 18px;
}

.modal-qr {

    width: 220px;
    height: 220px;

    margin: 0 auto 18px;

    border:
        1px solid #e5c5cf;

    border-radius: 12px;

    padding: 8px;

    background: white;

    display: flex;

    align-items: center;
    justify-content: center;

    overflow: hidden;
}

.modal-qr img {

    width: 100%;
    height: 100%;

    object-fit: contain;
}

.modal-qr-placeholder {

    color: #94737d;

    font-size: 9px;

    padding: 20px;
}

.pix-code-title {

    color: var(--vinho);

    font-family:
        "Bodoni Moda",
        Georgia,
        serif;

    font-size: 17px;

    margin-bottom: 8px;
}

.pix-code {

    display: flex;

    gap: 7px;
}

.pix-code input {

    flex: 1;

    height: 42px;

    border:
        1px solid #e2c3cc;

    border-radius: 8px;

    padding: 0 10px;

    font-size: 9px;

    color: #75525e;

    outline: none;
}

.pix-copy {

    height: 42px;

    padding: 0 13px;

    border: 0;

    border-radius: 8px;

    background: var(--vinho);

    color: white;

    font-size: 9px;

    font-weight: 600;

    cursor: pointer;
}

.pix-copy:hover {
    background: var(--vinho-escuro);
}

.pix-instructions {

    margin-top: 17px;

    padding: 13px;

    border-radius: 9px;

    background: #fff1f5;

    color: #775762;

    font-size: 9px;

    line-height: 1.6;
}

.pix-timer-modal {

    margin-top: 13px;

    color: var(--rosa);

    font-size: 10px;

    font-weight: 600;
}


/* =========================================================
   BOTÃO FECHAR
========================================================= */

.modal-cancel {

    width: 100%;

    height: 42px;

    margin-top: 9px;

    border:
        1px solid #e1bec9;

    border-radius: 8px;

    background: white;

    color: var(--vinho);

    font-size: 9px;

    font-weight: 600;

    cursor: pointer;
}


/* =========================================================
   RESPONSIVO
========================================================= */

@media(max-width:1150px) {

    .checkout {

        grid-template-columns:
            1fr
            1fr;
    }

    .summary {

        grid-column:
            1 / -1;
    }
}

@media(max-width:750px) {

    .header {
        height: 75px;
    }

    .logo img {

        width: 48px;
        height: 48px;
    }

    .logo-text {
        font-size: 24px;
    }

    .logo-text span {
        font-size: 22px;
    }

    .user-area {
        display: none;
    }

    .checkout {
        grid-template-columns: 1fr;
    }

    .summary {
        grid-column: auto;
    }

    .payment-methods {
        grid-template-columns: 1fr;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .field.full {
        grid-column: auto;
    }

    .modal-fields {
        grid-template-columns: 1fr;
    }

    .modal-field.full {
        grid-column: auto;
    }

    .payment-modal {
        max-height: 94vh;
    }

    .card-preview {
        height: 160px;
    }

    .card-number-preview {
        font-size: 13px;
    }

    .modal-qr {
        width: 190px;
        height: 190px;
    }

    .pix-code {
        flex-direction: column;
    }

}


/* =========================================================
   PIX ANTIGO ESCONDIDO
========================================================= */

.pix-section {
    display: none;
}

</style>

</head>

<body>


<!-- =====================================================
     HEADER
===================================================== -->

<header class="header">

    <a
        href="/lojacosmeticos_alalet/views/site.php"
        class="logo"
    >

        <img
            src="/lojacosmeticos_alalet/public/assets/img/cherry.png"
            alt="Cherry Make"
        >

        <div class="logo-text">

            Cherry

            <span>
                Make♡
            </span>

        </div>

    </a>


    <div class="user-area">

        Logado como

        <strong>
            <?= htmlspecialchars($nomeCliente) ?>
        </strong>

        •

        <a
            href="/lojacosmeticos_alalet/index.php?controller=cliente&action=logout"
        >
            Sair
        </a>

    </div>

</header>


<!-- =====================================================
     PÁGINA
===================================================== -->

<main class="page">


    <div class="page-title">

        <a
            href="/lojacosmeticos_alalet/views/carrinho.php"
            class="back-button"
            title="Voltar para o carrinho"
        >
            ←
        </a>

        <div>

            <h1>
                Pagamento
            </h1>

            <p>
                Escolha a melhor forma de pagamento para você.
            </p>

        </div>

    </div>


    <div class="checkout">


        <!-- =================================================
             CARRINHO
        ================================================== -->

        <section class="box">

            <div class="box-header">

                <div class="box-icon">
                    🛒
                </div>

                <h2>
                    Produtos no carrinho
                </h2>

            </div>


            <div
                class="box-content"
                id="productsList"
            >
            </div>


            <div style="padding:0 20px 20px;">

                <a
                    href="/lojacosmeticos_alalet/views/site.php"
                    class="continue"
                >
                    ← Continuar comprando
                </a>

            </div>

        </section>


        <!-- =================================================
             PAGAMENTO
        ================================================== -->

        <section class="box">

            <div class="payment-content">


                <div class="payment-main-title">

                    <div class="symbol">
                        💳
                    </div>

                    <h2>
                        Pagamento
                    </h2>

                </div>


                <p class="payment-subtitle">
                    Escolha a melhor forma de pagamento para você.
                </p>


                <div
                    class="payment-methods"
                    id="paymentMethods"
                >


                    <!-- CARTÃO -->

                    <div
                        class="payment-card"
                        id="cardOption"
                        onclick="selecionarPagamento('cartao')"
                    >

                        <div>

                            <div class="payment-card-icon">
                                💳
                            </div>

                            <h3>
                                Pagar com Cartão
                            </h3>

                            <p>
                                Débito, crédito ou parcelado
                            </p>

                        </div>

                        <div class="payment-arrow">
                            →
                        </div>

                    </div>


                    <!-- PIX -->

                    <div
                        class="payment-card"
                        id="pixOption"
                        onclick="selecionarPagamento('pix')"
                    >

                        <div>

                            <div class="payment-card-icon">
                                ◈
                            </div>

                            <h3>
                                Pagar com PIX
                            </h3>

                            <p>
                                Rápido, seguro e prático
                            </p>

                        </div>

                        <div class="payment-arrow">
                            →
                        </div>

                    </div>


                </div>


                <!-- =================================================
                     ENDEREÇO
                ================================================== -->

                <div class="address">

                    <div class="address-title">
                        📦 Dados para entrega
                    </div>


                    <div class="form-grid">


                        <div class="field full">

                            <label>
                                Nome do cliente
                            </label>

                            <input
                                type="text"
                                value="<?= htmlspecialchars($nomeCliente) ?>"
                                readonly
                            >

                        </div>


                        <div class="field full">

                            <label>
                                E-mail
                            </label>

                            <input
                                type="email"
                                value="<?= htmlspecialchars($emailCliente) ?>"
                                readonly
                            >

                        </div>


                        <div class="field">

                            <label>
                                CEP
                            </label>

                            <div class="cep-group">

                                <input
                                    type="text"
                                    id="cep"
                                    maxlength="9"
                                    placeholder="00000-000"
                                    value="<?= htmlspecialchars($clienteCep) ?>"
                                >

                                <button
                                    type="button"
                                    class="cep-button"
                                    onclick="buscarCEP()"
                                >
                                    Buscar
                                </button>

                            </div>

                            <span
                                class="cep-status"
                                id="cepStatus"
                            >
                                Buscando endereço...
                            </span>

                        </div>


                        <div class="field">

                            <label>
                                Número *
                            </label>

                            <input
                                type="text"
                                id="numero"
                                placeholder="Ex.: 120"
                            >

                        </div>


                        <div class="field full">

                            <label>
                                Rua / Logradouro
                            </label>

                            <input
                                type="text"
                                id="logradouro"
                                readonly
                            >

                        </div>


                        <div class="field">

                            <label>
                                Bairro
                            </label>

                            <input
                                type="text"
                                id="bairro"
                                readonly
                            >

                        </div>


                        <div class="field">

                            <label>
                                Cidade
                            </label>

                            <input
                                type="text"
                                id="cidade"
                                readonly
                            >

                        </div>


                        <div class="field">

                            <label>
                                Estado
                            </label>

                            <input
                                type="text"
                                id="uf"
                                readonly
                            >

                        </div>


                        <div class="field">

                            <label>
                                Complemento / especificação
                            </label>

                            <input
                                type="text"
                                id="complemento"
                                placeholder="Apto, bloco, casa..."
                            >

                        </div>

                    </div>


                    <!-- FRETE -->

                    <div class="freight">

                        <div class="freight-title">
                            🚚 Entrega
                        </div>

                        <div
                            class="freight-options"
                            id="freightOptions"
                        >

                            <div class="freight-message">

                                Digite seu CEP para calcular o frete.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =================================================
             RESUMO
        ================================================== -->

        <aside class="box summary">

            <div class="box-header">

                <div class="box-icon">
                    📄
                </div>

                <h2>
                    Resumo do pedido
                </h2>

            </div>


            <div class="summary-content">


                <div class="summary-row">

                    <span>
                        Produtos
                    </span>

                    <strong id="quantidadeResumo">
                        0
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        Subtotal
                    </span>

                    <strong id="subtotalResumo">
                        R$ 0,00
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        Frete
                    </span>

                    <strong id="freteResumo">
                        A calcular
                    </strong>

                </div>


                <div class="summary-line"></div>


                <div class="total">

                    <span>
                        TOTAL
                    </span>

                    <strong id="totalResumo">
                        R$ 0,00
                    </strong>

                </div>


                <button
                    type="button"
                    class="finish-button"
                    onclick="finalizarPedido()"
                >
                    🔒 FINALIZAR COMPRA
                </button>


                <button
                    type="button"
                    class="clear-button"
                    onclick="limparCarrinho()"
                >
                    🗑 LIMPAR CARRINHO
                </button>


                <div class="security">

                    🔒 <strong>Compra segura</strong>

                    <br>

                    Seus dados estão protegidos
                    durante todo o processo.

                </div>


            </div>

        </aside>

    </div>

</main>


<!-- =========================================================
     MODAL CARTÃO
========================================================= -->

<div
    class="payment-overlay"
    id="cartaoModal"
    onclick="fecharModalFora(event, 'cartaoModal')"
>


    <div class="payment-modal">


        <div class="modal-header">


            <div class="modal-title">

                <div class="modal-title-icon">
                    💳
                </div>

                <div>

                    <h2>
                        Dados do cartão
                    </h2>

                    <p>
                        Preencha os dados para continuar
                    </p>

                </div>

            </div>


            <button
                type="button"
                class="close-modal"
                onclick="fecharModal('cartaoModal')"
            >
                ×
            </button>


        </div>


        <div class="modal-body">


            <!-- CARTÃO VISUAL -->

            <div class="card-preview">

                <div class="card-brand">

                    <span>
                        Cherry Make
                    </span>

                    <span>
                        CARD
                    </span>

                </div>


                <div class="card-chip"></div>


                <div
                    class="card-number-preview"
                    id="numeroCartaoPreview"
                >
                    •••• •••• •••• ••••
                </div>


                <div class="card-bottom">

                    <span id="nomeCartaoPreview">
                        NOME DO TITULAR
                    </span>

                    <span id="validadePreview">
                        MM/AA
                    </span>

                </div>

            </div>


            <!-- CAMPOS -->

            <div class="modal-fields">


                <div class="modal-field full">

                    <label>
                        Número do cartão
                    </label>

                    <input
                        type="text"
                        id="numeroCartao"
                        maxlength="19"
                        placeholder="0000 0000 0000 0000"
                        oninput="formatarCartao(this)"
                    >

                </div>


                <div class="modal-field full">

                    <label>
                        Nome impresso no cartão
                    </label>

                    <input
                        type="text"
                        id="nomeCartao"
                        placeholder="NOME DO TITULAR"
                        oninput="atualizarNomeCartao(this)"
                    >

                </div>


                <div class="modal-field">

                    <label>
                        Validade
                    </label>

                    <input
                        type="text"
                        id="validadeCartao"
                        maxlength="5"
                        placeholder="MM/AA"
                        oninput="formatarValidade(this)"
                    >

                </div>


                <div class="modal-field">

                    <label>
                        CVV
                    </label>

                    <input
                        type="password"
                        id="cvvCartao"
                        maxlength="4"
                        placeholder="123"
                    >

                </div>


                <div class="modal-field full">

                    <label>
                        Número de parcelas
                    </label>

                    <select id="parcelas">

                        <option value="1">
                            1x sem juros
                        </option>

                        <option value="2">
                            2x sem juros
                        </option>

                        <option value="3">
                            3x sem juros
                        </option>

                        <option value="4">
                            4x sem juros
                        </option>

                        <option value="5">
                            5x sem juros
                        </option>

                        <option value="6">
                            6x sem juros
                        </option>

                    </select>

                </div>


            </div>


            <button
                type="button"
                class="card-submit"
                onclick="confirmarCartao()"
            >
                CONTINUAR COM CARTÃO
            </button>


            <button
                type="button"
                class="modal-cancel"
                onclick="fecharModal('cartaoModal')"
            >
                Cancelar
            </button>


            <div class="modal-security">

                🔒 Seus dados são protegidos durante o processo.

            </div>


        </div>

    </div>

</div>


<!-- =========================================================
     MODAL PIX
========================================================= -->

<div
    class="payment-overlay"
    id="pixModal"
    onclick="fecharModalFora(event, 'pixModal')"
>


    <div class="payment-modal">


        <div class="modal-header">


            <div class="modal-title">

                <div class="modal-title-icon">
                    ◈
                </div>

                <div>

                    <h2>
                        Pagamento via PIX
                    </h2>

                    <p>
                        Escaneie o QR Code ou copie a chave
                    </p>

                </div>

            </div>


            <button
                type="button"
                class="close-modal"
                onclick="fecharModal('pixModal')"
            >
                ×
            </button>


        </div>


        <div class="modal-body pix-modal-content">


            <p>

                Abra o aplicativo do seu banco,
                escaneie o QR Code abaixo ou copie
                o código PIX para realizar o pagamento.

            </p>


            <!-- QR CODE -->

            <div class="modal-qr">


                <img
                    id="qrCodeModal"
                    src="/lojacosmeticos_alalet/public/assets/img/qrcode-pix-ficticio.png"
                    alt="QR Code PIX"
                    onerror="
                        this.style.display='none';
                        document.getElementById('qrModalPlaceholder').style.display='block';
                    "
                >


                <div
                    class="modal-qr-placeholder"
                    id="qrModalPlaceholder"
                    style="display:none;"
                >

                    Adicione sua imagem de QR Code em:

                    <br><br>

                    <strong>
                        /public/assets/img/
                    </strong>

                    <br>

                    qrcode-pix-ficticio.png

                </div>


            </div>


            <div class="pix-code-title">

                Código / chave PIX

            </div>


            <div class="pix-code">


                <input
                    type="text"
                    id="pixKeyModal"
                    value="cherry.make@pagamentos.com"
                    readonly
                >


                <button
                    type="button"
                    class="pix-copy"
                    onclick="copiarPIXModal()"
                >
                    COPIAR
                </button>


            </div>


            <div class="pix-instructions">

                <strong>
                    Como pagar:
                </strong>

                <br>

                1. Abra o aplicativo do seu banco.
                <br>
                2. Escolha a opção PIX.
                <br>
                3. Escaneie o QR Code ou cole a chave.
                <br>
                4. Confira o valor e confirme.

            </div>


            <div class="pix-timer-modal">

                ◷ Tempo para pagamento:

                <strong id="pixTimerModal">
                    15:00
                </strong>

            </div>


            <button
                type="button"
                class="card-submit"
                onclick="confirmarPIX()"
            >
                JÁ REALIZEI O PAGAMENTO
            </button>


            <button
                type="button"
                class="modal-cancel"
                onclick="fecharModal('pixModal')"
            >
                Voltar

            </button>


        </div>

    </div>

</div>


<script>

/* =========================================================
   CARRINHO
========================================================= */

let carrinho =
    JSON.parse(
        localStorage.getItem('carrinho')
    ) || [];


let subtotal = 0;

let frete = 0;

let formaPagamento = '';

let timerPix = 900;

let timerAtivo = null;


/* =========================================================
   DINHEIRO
========================================================= */

function dinheiro(valor) {

    return 'R$ ' +
        Number(valor)
        .toFixed(2)
        .replace('.', ',');

}


/* =========================================================
   PRODUTOS
========================================================= */

function carregarProdutos() {

    const lista =
        document.getElementById(
            'productsList'
        );

    lista.innerHTML = '';

    subtotal = 0;

    let quantidadeTotal = 0;


    if (carrinho.length === 0) {

        lista.innerHTML = `

            <div
                style="
                    text-align:center;
                    padding:30px 10px;
                    color:#87626c;
                    font-size:11px;
                "
            >

                Seu carrinho está vazio.

            </div>

        `;

        return;

    }


    carrinho.forEach(function(produto) {


        const preco =
            Number(
                String(produto.preco)
                .replace(',', '.')
            );


        const quantidade =
            Number(
                produto.quantidade
            );


        const valorProduto =
            preco * quantidade;


        subtotal += valorProduto;

        quantidadeTotal += quantidade;


        const item =
            document.createElement(
                'div'
            );


        item.className =
            'cart-item';


        item.innerHTML = `

            <div class="cart-image">

                <img
                    src="${produto.imagem}"
                    alt="${produto.nome}"
                >

            </div>


            <div>

                <div class="cart-name">
                    ${produto.nome}
                </div>


                <div class="cart-sku">

                    ${produto.sku
                        ? 'SKU: ' + produto.sku
                        : ''
                    }

                </div>


                <div class="cart-quantity">

                    Quantidade:
                    ${quantidade}

                </div>


                <div class="cart-price">

                    ${dinheiro(valorProduto)}

                </div>

            </div>

        `;


        lista.appendChild(item);

    });


    document.getElementById(
        'quantidadeResumo'
    ).textContent =
        quantidadeTotal;


    document.getElementById(
        'subtotalResumo'
    ).textContent =
        dinheiro(subtotal);


    atualizarTotal();

}


/* =========================================================
   TOTAL
========================================================= */

function atualizarTotal() {

    const total =
        subtotal + frete;


    document.getElementById(
        'totalResumo'
    ).textContent =
        dinheiro(total);

}


/* =========================================================
   CEP
========================================================= */

const campoCEP =
    document.getElementById('cep');


campoCEP.addEventListener(
    'input',
    function() {

        let valor =
            this.value.replace(
                /\D/g,
                ''
            );


        if (valor.length > 5) {

            valor =
                valor.substring(0, 5)
                + '-'
                + valor.substring(5, 8);

        }


        this.value = valor;

    }
);


/* =========================================================
   BUSCAR CEP
========================================================= */

async function buscarCEP() {

    let cep =
        document
        .getElementById('cep')
        .value
        .replace(/\D/g, '');


    if (cep.length !== 8) {

        alert(
            'Digite um CEP válido.'
        );

        return;

    }


    const status =
        document.getElementById(
            'cepStatus'
        );


    status.style.display = 'block';


    try {

        const resposta =
            await fetch(
                'https://viacep.com.br/ws/' +
                cep +
                '/json/'
            );


        const dados =
            await resposta.json();


        if (dados.erro) {

            alert(
                'CEP não encontrado.'
            );

            status.style.display =
                'none';

            return;

        }


        document.getElementById(
            'logradouro'
        ).value =
            dados.logradouro || '';


        document.getElementById(
            'bairro'
        ).value =
            dados.bairro || '';


        document.getElementById(
            'cidade'
        ).value =
            dados.localidade || '';


        document.getElementById(
            'uf'
        ).value =
            dados.uf || '';


        status.textContent =
            '✓ Endereço encontrado';


        status.style.color =
            '#8d3650';


        calcularFrete();


    } catch (erro) {

        status.style.display =
            'none';

        alert(
            'Não foi possível consultar o CEP.'
        );

    }

}


/* =========================================================
   FRETE
========================================================= */

async function calcularFrete() {

    const container =
        document.getElementById(
            'freightOptions'
        );


    container.innerHTML = `

        <div class="freight-message">
            Calculando frete...
        </div>

    `;


    const dados =
        new FormData();


    dados.append(
        'cep',
        document.getElementById('cep').value
    );


    dados.append(
        'valor',
        subtotal
    );


    dados.append(
        'produtos',
        JSON.stringify(carrinho)
    );


    try {

        const resposta =
            await fetch(
                '/lojacosmeticos_alalet/index.php?controller=checkout&action=frete',
                {
                    method: 'POST',
                    body: dados
                }
            );


        const resultado =
            await resposta.json();


        if (!resultado.sucesso) {

            container.innerHTML = `

                <div
                    class="freight-option selected"
                    onclick="selecionarFrete(0, this)"
                >

                    <span>

                        🚚 Frete padrão

                        <br>

                        <small>
                            Valor calculado pela loja
                        </small>

                    </span>

                    <strong>
                        R$ 0,00
                    </strong>

                </div>

            `;


            frete = 0;


            document.getElementById(
                'freteResumo'
            ).textContent =
                'Grátis';


            atualizarTotal();

            return;

        }


        container.innerHTML = '';


        resultado.opcoes.forEach(
            function(opcao, index) {


                const div =
                    document.createElement(
                        'div'
                    );


                div.className =
                    'freight-option';


                div.innerHTML = `

                    <span>

                        🚚
                        ${opcao.nome}

                        ${
                            opcao.prazo
                            ?
                            '<br><small>' +
                            opcao.prazo +
                            ' dias</small>'
                            :
                            ''
                        }

                    </span>


                    <strong>

                        ${dinheiro(
                            opcao.valor
                        )}

                    </strong>

                `;


                div.onclick =
                    function() {

                        selecionarFrete(
                            Number(
                                opcao.valor
                            ),
                            div
                        );

                    };


                container.appendChild(div);


                if (index === 0) {

                    selecionarFrete(
                        Number(opcao.valor),
                        div
                    );

                }

            }
        );


    } catch (erro) {

        container.innerHTML = `

            <div
                class="freight-option selected"
                onclick="selecionarFrete(0, this)"
            >

                <span>
                    🚚 Frete padrão
                </span>

                <strong>
                    Grátis
                </strong>

            </div>

        `;


        frete = 0;


        document.getElementById(
            'freteResumo'
        ).textContent =
            'Grátis';


        atualizarTotal();

    }

}


/* =========================================================
   SELECIONAR FRETE
========================================================= */

function selecionarFrete(
    valor,
    elemento
) {

    document
        .querySelectorAll(
            '.freight-option'
        )
        .forEach(
            function(item) {

                item.classList.remove(
                    'selected'
                );

            }
        );


    elemento.classList.add(
        'selected'
    );


    frete =
        Number(valor);


    document.getElementById(
        'freteResumo'
    ).textContent =
        frete > 0
        ? dinheiro(frete)
        : 'Grátis';


    atualizarTotal();

}


/* =========================================================
   SELECIONAR PAGAMENTO
========================================================= */

function selecionarPagamento(tipo) {

    formaPagamento =
        tipo;


    document
        .getElementById(
            'cardOption'
        )
        .classList.remove(
            'active'
        );


    document
        .getElementById(
            'pixOption'
        )
        .classList.remove(
            'active'
        );


    if (tipo === 'cartao') {

        document
            .getElementById(
                'cardOption'
            )
            .classList.add(
                'active'
            );


        abrirModal('cartaoModal');

    }


    if (tipo === 'pix') {

        document
            .getElementById(
                'pixOption'
            )
            .classList.add(
                'active'
            );


        abrirModal('pixModal');

        iniciarTimerPIX();

    }

}


/* =========================================================
   ABRIR MODAL
========================================================= */

function abrirModal(id) {

    document
        .getElementById(id)
        .classList.add('show');


    document.body.style.overflow =
        'hidden';

}


/* =========================================================
   FECHAR MODAL
========================================================= */

function fecharModal(id) {

    document
        .getElementById(id)
        .classList.remove('show');


    document.body.style.overflow =
        '';


    if (id === 'cartaoModal') {

        document
            .getElementById(
                'cardOption'
            )
            .classList.remove(
                'active'
            );

    }


    if (id === 'pixModal') {

        document
            .getElementById(
                'pixOption'
            )
            .classList.remove(
                'active'
            );

    }

}


/* =========================================================
   FECHAR CLICANDO FORA
========================================================= */

function fecharModalFora(
    evento,
    id
) {

    if (
        evento.target ===
        document.getElementById(id)
    ) {

        fecharModal(id);

    }

}


/* =========================================================
   FORMATAÇÃO CARTÃO
========================================================= */

function formatarCartao(input) {

    let valor =
        input.value
        .replace(/\D/g, '')
        .substring(0, 16);


    valor =
        valor.replace(
            /(\d{4})(?=\d)/g,
            '$1 '
        );


    input.value =
        valor;


    let numeros =
        valor.replace(/\s/g, '');


    if (!numeros) {

        document.getElementById(
            'numeroCartaoPreview'
        ).textContent =
            '•••• •••• •••• ••••';

        return;

    }


    let grupos = [];

    for (
        let i = 0;
        i < 16;
        i += 4
    ) {

        let grupo =
            numeros.substring(
                i,
                i + 4
            );


        if (!grupo) {

            grupo =
                '••••';

        } else {

            grupo =
                grupo.padEnd(
                    4,
                    '•'
                );

        }


        grupos.push(grupo);

    }


    document.getElementById(
        'numeroCartaoPreview'
    ).textContent =
        grupos.join(' ');

}


/* =========================================================
   NOME CARTÃO
========================================================= */

function atualizarNomeCartao(input) {

    let nome =
        input.value
        .toUpperCase();


    input.value =
        nome;


    document.getElementById(
        'nomeCartaoPreview'
    ).textContent =
        nome ||
        'NOME DO TITULAR';

}


/* =========================================================
   VALIDADE
========================================================= */

function formatarValidade(input) {

    let valor =
        input.value
        .replace(/\D/g, '')
        .substring(0, 4);


    if (valor.length > 2) {

        valor =
            valor.substring(0, 2)
            + '/'
            + valor.substring(2);

    }


    input.value =
        valor;


    document.getElementById(
        'validadePreview'
    ).textContent =
        valor || 'MM/AA';

}


/* =========================================================
   CONFIRMAR CARTÃO
========================================================= */

function confirmarCartao() {

    const numero =
        document
        .getElementById(
            'numeroCartao'
        )
        .value
        .replace(/\D/g, '');


    const nome =
        document
        .getElementById(
            'nomeCartao'
        )
        .value
        .trim();


    const validade =
        document
        .getElementById(
            'validadeCartao'
        )
        .value
        .trim();


    const cvv =
        document
        .getElementById(
            'cvvCartao'
        )
        .value
        .trim();


    if (numero.length < 13) {

        alert(
            'Digite um número de cartão válido.'
        );

        return;

    }


    if (!nome) {

        alert(
            'Digite o nome do titular do cartão.'
        );

        return;

    }


    if (
        !/^\d{2}\/\d{2}$/.test(validade)
    ) {

        alert(
            'Digite a validade no formato MM/AA.'
        );

        return;

    }


    if (
        cvv.length < 3
    ) {

        alert(
            'Digite o CVV do cartão.'
        );

        return;

    }


    fecharModal('cartaoModal');


    alert(
        'Dados do cartão preenchidos com sucesso!'
    );

}


/* =========================================================
   COPIAR PIX
========================================================= */

function copiarPIXModal() {

    const campo =
        document.getElementById(
            'pixKeyModal'
        );


    navigator.clipboard
        .writeText(campo.value)
        .then(
            function() {

                const botao =
                    document.querySelector(
                        '.pix-copy'
                    );


                const original =
                    botao.textContent;


                botao.textContent =
                    '✓ COPIADO';


                setTimeout(
                    function() {

                        botao.textContent =
                            original;

                    },
                    1800
                );

            }
        );

}


/* =========================================================
   TIMER PIX
========================================================= */

function iniciarTimerPIX() {

    if (timerAtivo) {

        clearInterval(
            timerAtivo
        );

    }


    timerPix = 900;


    atualizarTimer();


    timerAtivo =
        setInterval(
            function() {

                timerPix--;

                atualizarTimer();


                if (timerPix <= 0) {

                    clearInterval(
                        timerAtivo
                    );

                }

            },
            1000
        );

}


function atualizarTimer() {

    const minutos =
        Math.floor(
            timerPix / 60
        );


    const segundos =
        timerPix % 60;


    const tempo =
        String(minutos)
        .padStart(2, '0')
        +
        ':'
        +
        String(segundos)
        .padStart(2, '0');


    const timer1 =
        document.getElementById(
            'pixTimerModal'
        );


    if (timer1) {

        timer1.textContent =
            tempo;

    }

}


/* =========================================================
   CONFIRMAR PIX
========================================================= */

function confirmarPIX() {

    alert(
        'Pagamento PIX selecionado. Após a confirmação do pagamento, seu pedido será processado.'
    );


    fecharModal('pixModal');

}


/* =========================================================
   FINALIZAR PEDIDO
========================================================= */

function finalizarPedido() {

    if (carrinho.length === 0) {

        alert(
            'Seu carrinho está vazio.'
        );

        return;

    }


    const numero =
        document
        .getElementById(
            'numero'
        )
        .value
        .trim();


    const cep =
        document
        .getElementById(
            'cep'
        )
        .value
        .replace(/\D/g, '');


    if (
        !cep ||
        cep.length !== 8
    ) {

        alert(
            'Digite seu CEP para calcular o frete.'
        );

        document
            .getElementById('cep')
            .focus();

        return;

    }


    if (!numero) {

        alert(
            'Digite o número da casa.'
        );

        document
            .getElementById('numero')
            .focus();

        return;

    }


    if (!formaPagamento) {

        alert(
            'Escolha uma forma de pagamento.'
        );

        return;

    }


    if (
        formaPagamento === 'pix'
    ) {

        abrirModal('pixModal');

        iniciarTimerPIX();

        return;

    }


    if (
        formaPagamento === 'cartao'
    ) {

        abrirModal('cartaoModal');

        return;

    }

}


/* =========================================================
   LIMPAR CARRINHO
========================================================= */

function limparCarrinho() {

    if (
        confirm(
            'Deseja realmente limpar seu carrinho?'
        )
    ) {

        localStorage.removeItem(
            'carrinho'
        );


        carrinho = [];


        carregarProdutos();

    }

}


/* =========================================================
   ESC PARA FECHAR
========================================================= */

document.addEventListener(
    'keydown',
    function(event) {

        if (event.key === 'Escape') {

            const cartao =
                document.getElementById(
                    'cartaoModal'
                );


            const pix =
                document.getElementById(
                    'pixModal'
                );


            if (
                cartao.classList.contains(
                    'show'
                )
            ) {

                fecharModal(
                    'cartaoModal'
                );

            }


            if (
                pix.classList.contains(
                    'show'
                )
            ) {

                fecharModal(
                    'pixModal'
                );

            }

        }

    }
);


/* =========================================================
   INICIAR
========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function() {

        carregarProdutos();


        const cep =
            document.getElementById(
                'cep'
            ).value;


        if (
            cep &&
            cep.replace(/\D/g, '').length === 8
        ) {

            buscarCEP();

        }

    }
);

</script>

</body>

</html>