<?php

$nome = $_SESSION['nome'] ?? 'Cliente';

$produtos = [
    ['nome' => 'Paleta de Sombras - Cherry Blossom ', 'preco' => '99,90', 'imagem' => 'public/assets/img/paleta.png'],
    ['nome' => 'Pó Translúcido Matte 10g - Cloud Touch', 'preco' => '29,90', 'imagem' => 'public/assets/img/po.png'],
    ['nome' => 'Lápis de olho - Berry Eye', 'preco' => '9,90', 'imagem' => 'public/assets/img/lapis.png'],
    ['nome' => 'Máscara de Cílios 10g - Lash Drama', 'preco' => '29,90', 'imagem' => 'public/assets/img/rimel.png'],
    ['nome' => 'Sérum Primer Hidratante 30ml - Glass Skin', 'preco' => '39,90', 'imagem' => 'public/assets/img/serum.png'],
    ['nome' => 'Spray Fixador de Maquiagem 120ml - Super Fix', 'preco' => '39,90', 'imagem' => 'public/assets/img/sprayfix.png'],
    ['nome' => 'Batom Matte - Ruby Flame', 'preco' => '25,90', 'imagem' => 'public/assets/img/batomred.png'],
    ['nome' => 'Batom Líquido Matte 4ml', 'preco' => '29,90', 'imagem' => 'public/assets/img/batom-rosa.png'],
    ['nome' => 'Batom Líquido Matte 4ml', 'preco' => '29,90', 'imagem' => 'public/assets/img/batom-vermelho.png'],
    ['nome' => 'Pó Translúcido Matte 10g', 'preco' => '49,90', 'imagem' => 'public/assets/img/po.png'],
    ['nome' => 'Máscara para Cílios Volume Extremo 10g', 'preco' => '39,90', 'imagem' => 'public/assets/img/mascara.png'],
    ['nome' => 'Batom Cremoso 10g', 'preco' => '34,90', 'imagem' => 'public/assets/img/batom-cremoso.png'],
    ['nome' => 'Paleta de Sombras Cherry Bloom', 'preco' => '89,90', 'imagem' => 'public/assets/img/paleta.png'],
    ['nome' => 'Lápis Delineador para Olhos à Prova d’água', 'preco' => '19,90', 'imagem' => 'public/assets/img/lapis.png'],
    ['nome' => 'Paleta de Sombras Cherry Bloom', 'preco' => '89,90', 'imagem' => 'public/assets/img/paleta.png'],
    ['nome' => 'Paleta de Sombras Cherry Bloom', 'preco' => '89,90', 'imagem' => 'public/assets/img/paleta.png'],
    ['nome' => 'Paleta de Sombras Cherry Bloom', 'preco' => '89,90', 'imagem' => 'public/assets/img/paleta.png'],
    ['nome' => 'Paleta de Sombras Cherry Bloom', 'preco' => '89,90', 'imagem' => 'public/assets/img/paleta.png'],


    
];
// Imagens do carrossel principal.
// As 3 imagens devem ficar DIRETAMENTE dentro de public/assets/img/
// Use exatamente estes nomes ou altere os nomes abaixo.
$heroImagens = [
    'public/assets/img/carrossel10.png',
    'public/assets/img/carrossel2.png',
    'public/assets/img/carrossel3.png',
];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cherry Make | Site Oficial</title>
<link rel="icon" href="public/assets/img/cherry.png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Allura&family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{
    --vinho:#a9002c;
    --vinho2:#82001f;
    --rosa:#e85d83;
    --rosa-claro:#fff4f7;
    --rosa-bg:#fde8ee;
    --texto:#4d202b;
    --branco:#fff;
    --borda:#f0c8d2;
}
html{scroll-behavior:smooth}
body{
    font-family:"Poppins",Arial,sans-serif;
    color:var(--texto);
    background:#fff;
}
a{text-decoration:none;color:inherit}
button{font-family:inherit}

.top-strip{
    height:28px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(90deg,#99001f,#b9003b,#99001f);
    color:#fff;
    font-size:10px;
    font-weight:600;
    letter-spacing:.8px;
}

.header{
    height:100px;
    padding:0 5%;
    display:flex;
    align-items:center;
    justify-content:space-between;
    background:rgba(255,250,252,.97);
    border-bottom:1px solid #f3d6de;
    position:sticky;
    top:0;
    z-index:20;
}
.logo{
    display:flex;
    align-items:center;
    gap:8px;
    min-width:230px;
}
.logo img{
    width:75px;
    height:75px;
    object-fit:contain;
}
.logo-text{
    color:var(--vinho);
    font-family:"Bodoni Moda",Georgia,serif;
    font-size:35px;
    line-height:.8;
}
.logo-text span{
    display:block;
    margin-left:13px;
    color:var(--rosa);
    font-family:"Allura",cursive;
    font-size:32px;
}
.menu{
    display:flex;
    align-items:center;
    gap:34px;
    font-size:12px;
    font-weight:500;
    color:#781a2d;
}
.menu a{transition:.2s}
.menu a:hover{color:var(--rosa)}
.menu .seta{font-size:14px;margin-left:4px}
.header-icons{
    min-width:230px;
    display:flex;
    justify-content:flex-end;
    align-items:center;
    gap:20px;
}
.icon{
    width:27px;
    height:27px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--vinho);
    font-size:23px;
    position:relative;
}
.cart-badge{
    position:absolute;
    right:-7px;
    top:-7px;
    width:17px;
    height:17px;
    border-radius:50%;
    background:var(--vinho);
    color:#fff;
    font-size:9px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

/* =========================
   CARROSSEL PRINCIPAL
   ========================= */
.hero{
    position:relative;
    width:100%;
    height:520px;
    overflow:hidden;
    background:#fde8ee;
}

.hero-slider{
    position:relative;
    width:100%;
    height:100%;
}

.hero-slide{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    opacity:0;
    visibility:hidden;
    transition:opacity 1s ease, visibility 1s ease;
}

.hero-slide.active{
    opacity:1;
    visibility:visible;
    z-index:1;
}

.hero-slide img{
    width:100%;
    height:100%;
    display:block;
    object-fit:cover;
    object-position:center;
}

.hero-controls{
    position:absolute;
    left:0;
    right:0;
    bottom:20px;
    z-index:5;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
}

.hero-dot{
    width:10px;
    height:10px;
    padding:0;
    border:2px solid #fff;
    border-radius:50%;
    background:rgba(169,0,44,.35);
    cursor:pointer;
    transition:.25s;
}

.hero-dot.active{
    width:28px;
    border-radius:20px;
    background:var(--vinho);
}

.hero-arrow{
    position:absolute;
    top:50%;
    z-index:5;
    transform:translateY(-50%);
    width:42px;
    height:42px;
    border:0;
    border-radius:50%;
    background:rgba(255,255,255,.82);
    color:var(--vinho);
    font-size:24px;
    line-height:1;
    cursor:pointer;
    box-shadow:0 5px 18px rgba(80,0,20,.12);
    transition:.2s;
}

.hero-arrow:hover{
    background:#fff;
    transform:translateY(-50%) scale(1.05);
}

.hero-prev{left:22px}
.hero-next{right:22px}

@media(max-width:850px){
    .hero{height:430px}
}

@media(max-width:560px){
    .hero{height:300px}
    .hero-arrow{
        width:34px;
        height:34px;
        font-size:19px;
    }
    .hero-prev{left:10px}
    .hero-next{right:10px}
    .hero-controls{bottom:12px}
}

.benefits{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    padding:22px 7%;
    background:#fff9fb;
    border-bottom:1px solid #f3dce2;
}
.benefit{
    min-height:72px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:12px;
    text-align:left;
    border-right:1px solid #f0ccd6;
}
.benefit:last-child{border:0}
.benefit-icon{
    color:var(--rosa);
    font-size:25px;
}
.benefit strong{
    display:block;
    color:var(--vinho);
    font-size:10px;
    letter-spacing:.3px;
    margin-bottom:5px;
}
.benefit span{
    display:block;
    font-size:9px;
    color:#6f4a53;
    line-height:1.5;
}

.products-section{
    padding:48px 4.5% 55px;
    background:#fff;
}
.section-title{
    text-align:center;
    color:var(--vinho);
    font-family:"Bodoni Moda",Georgia,serif;
    font-size:22px;
    letter-spacing:1.5px;
    margin-bottom:5px;
}
.section-title:after{
    content:"♥";
    display:block;
    color:var(--vinho);
    font-size:15px;
    margin-top:5px;
}
.product-grid{
    max-width:1250px;
    margin:28px auto 0;
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:18px;
}
.product-card{
    min-height:305px;
    padding:14px 12px 16px;
    border-radius:12px;
    background:#fff;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:flex-end;
    transition:.25s;
}
.product-card:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 25px rgba(120,0,30,.08);
}
.product-image{
    width:100%;
    height:190px;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-bottom:8px;
}
.product-image img{
    width:100%;
    height:190px;
    max-width:100%;
    max-height:190px;
    object-fit:contain;
    display:block;
}
.product-name{
    min-height:38px;
    text-align:center;
    font-size:10px;
    line-height:1.45;
    color:#3f3336;
}
.price{
    color:var(--rosa);
    font-weight:600;
    font-size:11px;
    margin:5px 0 9px;
}
.buy{
    width:100%;
    border:0;
    border-radius:5px;
    background:var(--vinho);
    color:#fff;
    height:28px;
    font-size:9px;
    font-weight:700;
    letter-spacing:.5px;
    cursor:pointer;
    transition:.2s;
}
.buy:hover{background:#7c001d}

.newsletter{
    min-height:92px;
    padding:20px 8%;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:55px;
    background:
        radial-gradient(circle at 4% 50%,#c51d48 0 4px,transparent 5px),
        radial-gradient(circle at 8% 75%,#ef8da6 0 3px,transparent 4px),
        linear-gradient(90deg,#fff0f4,#ffe4eb,#fff0f4);
}
.newsletter h3{
    color:var(--vinho);
    font-size:13px;
    letter-spacing:1px;
}
.newsletter p{font-size:9px;margin-top:3px}
.news-form{
    display:flex;
    width:360px;
    height:34px;
}
.news-form input{
    flex:1;
    border:0;
    outline:0;
    border-radius:18px 0 0 18px;
    padding:0 16px;
    font-size:9px;
}
.news-form button{
    width:115px;
    border:0;
    border-radius:0 18px 18px 0;
    background:var(--vinho);
    color:#fff;
    font-size:9px;
    font-weight:600;
}

.footer{
    padding:42px 8% 15px;
    color:#fff;
    background:linear-gradient(110deg,#99001f,#b40035 55%,#89001e);
}
.footer-grid{
    display:grid;
    grid-template-columns:1.4fr 1fr 1fr 1.2fr 1.2fr;
    gap:35px;
}
.footer-brand{
    font-family:"Bodoni Moda",Georgia,serif;
    font-size:27px;
}
.footer-brand span{
    font-family:"Allura",cursive;
    color:#f5a4b8;
}
.footer p,.footer a{
    font-size:9px;
    line-height:2;
    color:#ffeef3;
}
.footer h4{
    font-size:10px;
    margin-bottom:10px;
    letter-spacing:.5px;
}
.social{
    display:flex;
    gap:10px;
    margin-top:10px;
}
.social span{
    width:22px;
    height:22px;
    border:1px solid #f7b1c3;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:10px;
}
.copyright{
    margin-top:22px;
    padding-top:12px;
    text-align:center;
    border-top:1px solid rgba(255,255,255,.16);
    font-size:8px;
    color:#f7cbd6;
}

@media(max-width:1100px){
    .menu{gap:18px}
    .header{padding:0 3%}
    .logo{min-width:190px}
    .header-icons{min-width:170px}
    .product-grid{grid-template-columns:repeat(4,1fr)}
}
@media(max-width:850px){
    .header{height:auto;padding:18px 5%;flex-wrap:wrap;gap:15px}
    .logo{min-width:auto}
    .menu{order:3;width:100%;justify-content:center;flex-wrap:wrap;gap:18px}
    .header-icons{min-width:auto;margin-left:auto}
    .hero{height:430px}
    .benefits{grid-template-columns:repeat(2,1fr)}
    .benefit:nth-child(2){border-right:0}
    .benefit{border-bottom:1px solid #f0ccd6}
    .product-grid{grid-template-columns:repeat(3,1fr)}
    .footer-grid{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:560px){
    .top-strip{font-size:8px}
    .logo-text{font-size:28px}
    .logo-text span{font-size:27px}
    .logo img{width:58px;height:58px}
    .menu{font-size:10px}
    .benefits{grid-template-columns:1fr}
    .benefit{border-right:0}
    .product-grid{grid-template-columns:repeat(2,1fr);gap:8px}
    .product-card{min-height:280px}
    .newsletter{flex-direction:column;gap:12px;text-align:center}
    .news-form{width:90%}
    .footer-grid{grid-template-columns:1fr 1fr;gap:25px}
}
</style>
</head>

<body>

<div class="top-strip">♥ FRETE GRÁTIS PARA TODO O BRASIL EM COMPRAS ACIMA DE R$150,00 ♥</div>

<header class="header">
    <a href="/lojacosmeticos_alalet/" class="logo">
        <img src="public/assets/img/cherry3.png" alt="Cherry Make">
        <div class="logo-text">
            Cherry
            <span>Make♡</span>
        </div>
    </a>

    <nav class="menu">
        <a href="#inicio">INÍCIO</a>
        <a href="#produtos">PRODUTOS</a>
    </nav>

    <div class="header-icons">
        <a class="icon" href="#produtos" title="Buscar">⌕</a>
        <a class="icon" href="#" title="Minha conta">✉</a>
        <a class="icon" href="#carrinho" title="Carrinho">
        🛍
            <span class="cart-badge">0</span>
        </a>
    </div>
</header>

<main>

<section class="hero" id="inicio">
    <div class="hero-slider" id="heroSlider">

        <?php foreach ($heroImagens as $i => $imagem): ?>
            <div class="hero-slide <?= $i === 0 ? 'active' : '' ?>">
                <img
                    src="<?= htmlspecialchars($imagem) ?>"
                    alt="Banner Cherry Make <?= $i + 1 ?>"
                >
            </div>
        <?php endforeach; ?>

        <button class="hero-arrow hero-prev" type="button" aria-label="Imagem anterior">‹</button>
        <button class="hero-arrow hero-next" type="button" aria-label="Próxima imagem">›</button>

        <div class="hero-controls" aria-label="Navegação do carrossel">
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

<section class="benefits">
    <div class="benefit">
        <div class="benefit-icon">✈</div>
        <div><strong>FRETE GRÁTIS</strong><span>para todo o Brasil em<br>compras acima de R$199</span></div>
    </div>
    <div class="benefit">
        <div class="benefit-icon">☺</div>
        <div><strong>PARCELE EM ATÉ 6X</strong><span>no cartão de crédito<br>com segurança</span></div>
    </div>
    <div class="benefit">
        <div class="benefit-icon">♡</div>
        <div><strong>EMBALAGEM FOFA</strong><span>seu pedido embalado<br>com todo carinho</span></div>
    </div>
    <div class="benefit">
        <div class="benefit-icon">✔</div>
        <div><strong>COMPRA SEGURA</strong><span>seus dados protegidos<br>do início ao fim</span></div>
    </div>
</section>

<section class="products-section" id="produtos">
    <h2 class="section-title">TODOS OS PRODUTOS</h2>

    <div class="product-grid">
        <?php foreach ($produtos as $produto): ?>
            <article class="product-card">
                <div class="product-image">
                    <img
                        src="<?= htmlspecialchars($produto['imagem']) ?>"
                        alt="<?= htmlspecialchars($produto['nome']) ?>"
                        loading="lazy"
                    >
                </div>

                <div class="product-name"><?= htmlspecialchars($produto['nome']) ?></div>
                <div class="price">R$ <?= htmlspecialchars($produto['preco']) ?></div>

                <button
                    type="button"
                    class="buy"
                    onclick="adicionarCarrinho('<?= htmlspecialchars($produto['nome'], ENT_QUOTES) ?>')">
                    COMPRAR
                </button>
            </article>
        <?php endforeach; ?>
    </div>
</section>


</main>

<footer class="footer">
    <div class="footer-grid">
        <div>
            <div class="footer-brand">Cherry <span>Make♡</span></div>
            <p style="margin-top:8px">Maquiagem que realça você.<br>Produtos de qualidade para todos<br>os momentos da sua vida.</p>
            <div class="social">
                <span>◎</span><span>f</span><span>◉</span>
            </div>
        </div>

        <div>
            <h4>INSTITUCIONAL</h4>
            <a href="#">Política de privacidade</a><br>
            <a href="#">Trocas e devoluções</a><br>
            <a href="#">Perguntas frequentes</a><br>
            <a href="#">Fale conosco</a>
        </div>

        <div>
            <h4>AJUDA</h4>
            <a href="#">Como comprar</a><br>
            <a href="#">Formas de pagamento</a><br>
            <a href="#">Prazos de entrega</a><br>
            <a href="#">Rastreamento de pedido</a>
        </div>

        <div>
            <h4>ATENDIMENTO</h4>
            <p>☎ (21) 99999-9999</p>
            <p>✉ atendimento@cherrymake.com.br</p>
            <p>◉ Seg. à Sex. 9h às 18h</p>
        </div>

        <div>
            <h4>FORMAS DE PAGAMENTO</h4>
            <p style="font-size:16px;letter-spacing:3px">VISA  ◉  elo  ◉</p>
            <p style="font-size:16px;letter-spacing:3px">PIX  ▦</p>
        </div>
    </div>

    <div class="copyright">© 2026 Cherry Make. Todos os direitos reservados.</div>
</footer>

<script>
    function adicionarCarrinho(nomeProduto) {
        alert('♥ "' + nomeProduto + '" foi adicionado ao carrinho!');
    }

    document.addEventListener('DOMContentLoaded', function () {

        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.hero-dot');
        const prevButton = document.querySelector('.hero-prev');
        const nextButton = document.querySelector('.hero-next');

        if (!slides.length) return;

        let slideAtual = 0;
        let intervalo;

        function mostrarSlide(indice) {

            slideAtual = (indice + slides.length) % slides.length;

            slides.forEach(function (slide, i) {
                slide.classList.toggle('active', i === slideAtual);
            });

            dots.forEach(function (dot, i) {
                dot.classList.toggle('active', i === slideAtual);
            });
        }

        function iniciarCarrossel() {

            clearInterval(intervalo);

            // 8000 = 8 segundos
            intervalo = setInterval(function () {
                mostrarSlide(slideAtual + 1);
            }, 8000);
        }

        if (nextButton) {
            nextButton.addEventListener('click', function () {
                mostrarSlide(slideAtual + 1);
                iniciarCarrossel();
            });
        }

        if (prevButton) {
            prevButton.addEventListener('click', function () {
                mostrarSlide(slideAtual - 1);
                iniciarCarrossel();
            });
        }

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                mostrarSlide(Number(dot.dataset.slide));
                iniciarCarrossel();
            });
        });

        mostrarSlide(0);
        iniciarCarrossel();

    });
</script>

</body>
</html>
