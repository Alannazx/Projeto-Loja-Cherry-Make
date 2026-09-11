<?php
session_start();
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cherry Make | Carrinho</title>

<link rel="icon" href="/lojacosmeticos_alalet/public/assets/img/cherry.png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Allura&family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

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
        --borda: #f0c8d2;
        --branco: #fff;
    }

    body {
        font-family: "Poppins", Arial, sans-serif;
        color: var(--texto);
        background: #fff9fb;
        min-height: 100vh;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    /* =========================
       TOPO
    ========================= */

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

    /* =========================
       HEADER
    ========================= */

    .header {
        height: 100px;

        padding: 0 5%;

        display: flex;
        align-items: center;
        justify-content: space-between;

        background: rgba(255, 250, 252, .97);

        border-bottom: 1px solid #f3d6de;
    }

    .logo {
        display: flex;
        align-items: center;

        gap: 8px;
    }

    .logo img {
        width: 70px;
        height: 70px;

        object-fit: contain;
    }

    .logo-text {
        color: var(--vinho);

        font-family: "Bodoni Moda", Georgia, serif;

        font-size: 35px;

        line-height: .8;
    }

    .logo-text span {
        display: block;

        margin-left: 13px;

        color: var(--rosa);

        font-family: "Allura", cursive;

        font-size: 32px;
    }

    .back {
        color: var(--vinho);

        font-size: 12px;
        font-weight: 600;

        transition: .2s;
    }

    .back:hover {
        color: var(--rosa);
    }

    /* =========================
       CONTEÚDO
    ========================= */

    .container {
        width: 90%;
        max-width: 1200px;

        margin: 55px auto;
    }

    .title {
        text-align: center;

        margin-bottom: 40px;
    }

    .title h1 {
        color: var(--vinho);

        font-family: "Bodoni Moda", Georgia, serif;

        font-size: 32px;

        letter-spacing: 1px;
    }

    .title p {
        color: #87626c;

        font-size: 12px;

        margin-top: 7px;
    }

    /* =========================
       LAYOUT
    ========================= */

    .cart-layout {
        display: grid;

        grid-template-columns: 1fr 350px;

        gap: 30px;

        align-items: start;
    }

    /* =========================
       LISTA
    ========================= */

    .cart-products {
        background: #fff;

        border: 1px solid var(--borda);

        border-radius: 15px;

        overflow: hidden;
    }

    .cart-header {
        padding: 18px 25px;

        border-bottom: 1px solid #f2dce2;

        color: var(--vinho);

        font-family: "Bodoni Moda", Georgia, serif;

        font-size: 17px;
    }

    .cart-item {
        padding: 20px;

        display: grid;

        grid-template-columns: 100px 1fr auto;

        gap: 20px;

        align-items: center;

        border-bottom: 1px solid #f3e3e7;
    }

    .cart-item:last-child {
        border-bottom: 0;
    }

    /* =========================
       IMAGEM
    ========================= */

    .product-image {
        width: 100px;
        height: 100px;

        border-radius: 12px;

        background: var(--rosa-claro);

        display: flex;

        align-items: center;
        justify-content: center;

        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;

        object-fit: contain;
    }

    /* =========================
       INFORMAÇÕES
    ========================= */

    .product-info h3 {
        color: var(--texto);

        font-family: "Bodoni Moda", Georgia, serif;

        font-size: 17px;

        margin-bottom: 8px;
    }

    .product-price {
        color: var(--rosa);

        font-size: 13px;

        font-weight: 600;
    }

    /* =========================
       AÇÕES
    ========================= */

    .actions {
        display: flex;

        align-items: center;

        gap: 20px;
    }

    .quantity {
        display: flex;

        align-items: center;

        border: 1px solid #e5c4ce;

        border-radius: 7px;

        overflow: hidden;
    }

    .quantity button {
        width: 30px;
        height: 30px;

        border: 0;

        background: #fff;

        color: var(--vinho);

        font-size: 16px;

        cursor: pointer;
    }

    .quantity button:hover {
        background: var(--rosa-claro);
    }

    .quantity span {
        width: 30px;

        text-align: center;

        font-size: 12px;

        font-weight: 600;
    }

    .subtotal {
        min-width: 85px;

        text-align: right;

        color: var(--vinho);

        font-size: 14px;

        font-weight: 700;
    }

    .remove {
        border: 0;

        background: transparent;

        color: #b77a88;

        font-size: 18px;

        cursor: pointer;

        transition: .2s;
    }

    .remove:hover {
        color: #a9002c;
    }

    /* =========================
       RESUMO
    ========================= */

    .summary {
        background: #fff;

        border: 1px solid var(--borda);

        border-radius: 15px;

        padding: 27px;

        position: sticky;

        top: 25px;
    }

    .summary h2 {
        color: var(--vinho);

        font-family: "Bodoni Moda", Georgia, serif;

        font-size: 21px;

        margin-bottom: 25px;
    }

    .summary-row {
        display: flex;

        justify-content: space-between;

        margin-bottom: 14px;

        font-size: 12px;

        color: #76535e;
    }

    .summary-row strong {
        color: var(--texto);
    }

    .line {
        height: 1px;

        background: #f1dce2;

        margin: 22px 0;
    }

    .total {
        display: flex;

        justify-content: space-between;

        align-items: center;
    }

    .total span {
        font-size: 14px;

        font-weight: 600;
    }

    .total strong {
        color: var(--vinho);

        font-size: 23px;
    }

    /* =========================
       BOTÕES
    ========================= */

    .checkout {
        width: 100%;

        margin-top: 25px;

        height: 45px;

        border: 0;

        border-radius: 8px;

        background: var(--vinho);

        color: #fff;

        font-size: 11px;

        font-weight: 700;

        letter-spacing: .5px;

        cursor: pointer;

        transition: .2s;
    }

    .checkout:hover {
        background: var(--vinho2);

        transform: translateY(-2px);
    }

    .clear {
        width: 100%;

        margin-top: 10px;

        height: 40px;

        border: 1px solid #e2bbc7;

        border-radius: 8px;

        background: #fff;

        color: var(--vinho);

        font-size: 10px;

        font-weight: 600;

        cursor: pointer;

        transition: .2s;
    }

    .clear:hover {
        background: var(--rosa-claro);
    }

    .continue {
        display: block;

        text-align: center;

        margin-top: 15px;

        color: var(--rosa);

        font-size: 10px;

        font-weight: 600;
    }

    /* =========================
       CARRINHO VAZIO
    ========================= */

    .empty {
        display: none;

        background: #fff;

        border: 1px solid var(--borda);

        border-radius: 15px;

        padding: 70px 20px;

        text-align: center;
    }

    .empty-icon {
        font-size: 45px;

        margin-bottom: 15px;
    }

    .empty h2 {
        color: var(--vinho);

        font-family: "Bodoni Moda", Georgia, serif;

        font-size: 24px;

        margin-bottom: 8px;
    }

    .empty p {
        color: #87626c;

        font-size: 12px;

        margin-bottom: 22px;
    }

    .empty a {
        display: inline-block;

        padding: 12px 25px;

        border-radius: 7px;

        background: var(--vinho);

        color: #fff;

        font-size: 11px;

        font-weight: 600;
    }

    /* =========================
       RESPONSIVO
    ========================= */

    @media(max-width: 850px) {

        .cart-layout {
            grid-template-columns: 1fr;
        }

        .summary {
            position: static;
        }
    }

    @media(max-width: 600px) {

        .header {
            height: 80px;
            padding: 0 4%;
        }

        .logo img {
            width: 52px;
            height: 52px;
        }

        .logo-text {
            font-size: 25px;
        }

        .logo-text span {
            font-size: 24px;
        }

        .container {
            width: 94%;
            margin: 35px auto;
        }

        .cart-item {
            grid-template-columns: 75px 1fr;
        }

        .product-image {
            width: 75px;
            height: 75px;
        }

        .actions {
            grid-column: 1 / -1;

            justify-content: space-between;
        }

        .subtotal {
            text-align: left;
        }
    }

</style>


</head>

<body>

<div class="top-strip">
    ♥ FRETE GRÁTIS PARA TODO O BRASIL EM COMPRAS ACIMA DE R$150,00 ♥
</div>

<header class="header">

<a href="/lojacosmeticos_alalet/" class="logo">


    <div class="logo-text">
        Cherry
        <span>Make♡</span>
    </div>

</a>


<a
    href="/lojacosmeticos_alalet/views/site.php"
    class="back"
>
    ← CONTINUAR COMPRANDO
</a>


</header>

<main class="container">

<div class="title">

    <h1>
        MEU CARRINHO
    </h1>

    <p>
        Seus produtos favoritos estão aqui ♥
    </p>

</div>


<!-- CARRINHO COM PRODUTOS -->

<div
    class="cart-layout"
    id="cartLayout"
>

    <section class="cart-products">

        <div class="cart-header">
            Produtos selecionados
        </div>

        <div id="cartItems"></div>

    </section>


    <!-- RESUMO -->

    <aside class="summary">

        <h2>
            Resumo do pedido
        </h2>

        <div class="summary-row">

            <span>
                Produtos
            </span>

            <strong id="totalItens">
                0
            </strong>

        </div>


        <div class="summary-row">

            <span>
                Subtotal
            </span>

            <strong id="subtotal">
                R$ 0,00
            </strong>

        </div>


        <div class="summary-row">

            <span>
                Frete
            </span>

            <strong>
                A calcular
            </strong>

        </div>


        <div class="line"></div>


        <div class="total">

            <span>
                TOTAL
            </span>

            <strong id="total">
                R$ 0,00
            </strong>

        </div>


        <button
            class="checkout"
            onclick="finalizarCompra()"
        >
            FINALIZAR COMPRA
        </button>


        <button
            class="clear"
            onclick="limparCarrinho()"
        >
            LIMPAR CARRINHO
        </button>


        <a
            href="/lojacosmeticos_alalet/views/site.php"
            class="continue"
        >
            ← Continuar comprando
        </a>

    </aside>

</div>


<!-- CARRINHO VAZIO -->

<div
    class="empty"
    id="emptyCart"
>

    <div class="empty-icon">
    ☹
    </div>

    <h2>
        Seu carrinho está vazio
    </h2>

    <p>
        Que tal escolher alguns produtos incríveis?
    </p>

    <a href="/lojacosmeticos_alalet/views/site.php#produtos">
        VER PRODUTOS
    </a>

</div>
```

</main>

<script>

    /* =========================================
       CARREGAR CARRINHO
    ========================================= */

    function obterCarrinho() {

        return JSON.parse(
            localStorage.getItem('carrinho')
        ) || [];

    }


    /* =========================================
       SALVAR CARRINHO
    ========================================= */

    function salvarCarrinho(carrinho) {

        localStorage.setItem(
            'carrinho',
            JSON.stringify(carrinho)
        );

    }


    /* =========================================
       FORMATAR PREÇO
    ========================================= */

    function formatarPreco(preco) {

        return 'R$ ' + Number(preco)
            .toFixed(2)
            .replace('.', ',');

    }


    /* =========================================
       MOSTRAR CARRINHO
    ========================================= */

    function mostrarCarrinho() {

        const carrinho = obterCarrinho();

        const cartItems =
            document.getElementById('cartItems');

        const cartLayout =
            document.getElementById('cartLayout');

        const emptyCart =
            document.getElementById('emptyCart');

        let total = 0;

        let quantidadeTotal = 0;


        cartItems.innerHTML = '';


        /* CARRINHO VAZIO */

        if (carrinho.length === 0) {

            cartLayout.style.display = 'none';

            emptyCart.style.display = 'block';

            return;

        }


        cartLayout.style.display = 'grid';

        emptyCart.style.display = 'none';


        /* PRODUTOS */

        carrinho.forEach(function(produto, index) {

            const preco =
                Number(
                    String(produto.preco)
                    .replace(',', '.')
                );

            const quantidade =
                Number(produto.quantidade);

            const subtotal =
                preco * quantidade;

            total += subtotal;

            quantidadeTotal += quantidade;


            const item =
                document.createElement('div');

            item.className = 'cart-item';


            item.innerHTML = `

                <div class="product-image">

                    <img
                        src="${produto.imagem}"
                        alt="${produto.nome}"
                    >

                </div>


                <div class="product-info">

                    <h3>
                        ${produto.nome}
                    </h3>

                    <div class="product-price">
                        ${formatarPreco(preco)}
                    </div>

                </div>


                <div class="actions">

                    <div class="quantity">

                        <button
                            onclick="diminuirQuantidade(${index})"
                        >
                            −
                        </button>

                        <span>
                            ${quantidade}
                        </span>

                        <button
                            onclick="aumentarQuantidade(${index})"
                        >
                            +
                        </button>

                    </div>


                    <div class="subtotal">

                        ${formatarPreco(subtotal)}

                    </div>


                    <button
                        class="remove"
                        onclick="removerProduto(${index})"
                        title="Remover"
                    >
                        🗑
                    </button>

                </div>

            `;


            cartItems.appendChild(item);

        });


        document.getElementById('totalItens')
            .textContent = quantidadeTotal;


        document.getElementById('subtotal')
            .textContent = formatarPreco(total);


        document.getElementById('total')
            .textContent = formatarPreco(total);

    }


    /* =========================================
       AUMENTAR
    ========================================= */

    function aumentarQuantidade(index) {

        const carrinho = obterCarrinho();

        carrinho[index].quantidade++;

        salvarCarrinho(carrinho);

        mostrarCarrinho();

    }


    /* =========================================
       DIMINUIR
    ========================================= */

    function diminuirQuantidade(index) {

        const carrinho = obterCarrinho();

        if (carrinho[index].quantidade > 1) {

            carrinho[index].quantidade--;

        } else {

            carrinho.splice(index, 1);

        }

        salvarCarrinho(carrinho);

        mostrarCarrinho();

    }


    /* =========================================
       REMOVER
    ========================================= */

    function removerProduto(index) {

        const carrinho = obterCarrinho();

        carrinho.splice(index, 1);

        salvarCarrinho(carrinho);

        mostrarCarrinho();

    }


    /* =========================================
       LIMPAR
    ========================================= */

    function limparCarrinho() {

        if (confirm('Deseja realmente limpar seu carrinho?')) {

            localStorage.removeItem('carrinho');

            mostrarCarrinho();

        }

    }


    /* =========================================
       FINALIZAR
    ========================================= */

    function finalizarCompra() {

        const carrinho = obterCarrinho();

        if (carrinho.length === 0) {

            alert('Seu carrinho está vazio.');

            return;

        }

        alert(
            '♥ Compra iniciada com sucesso!\n\n' +
            'A próxima etapa será o pagamento.'
        );

    }


    /* =========================================
       INICIAR
    ========================================= */

    document.addEventListener(
        'DOMContentLoaded',
        function() {

            mostrarCarrinho();

        }
    );

</script>

</body>

</html>
