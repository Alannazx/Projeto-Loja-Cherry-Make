<?php
function imagemProdutoUrl(int $produtoId): string
{
$baseFs = __DIR__ . "/../public/uploads/produtos/";
$baseUrl = "public/uploads/produtos/";
foreach (['jpg','png','webp'] as $ext) {
if (file_exists($baseFs . $produtoId . '.' . $ext)) {
return $baseUrl . $produtoId . '.' . $ext;
}
}
return "public/assets/img/cherry.png";
}


function estoqueProduto(array $produto): int
{
    if (array_key_exists('estoque', $produto)) {
        return max(0, (int)$produto['estoque']);
    }

    if (array_key_exists('quantidade_estoque', $produto)) {
        return max(0, (int)$produto['quantidade_estoque']);
    }

    if (array_key_exists('quantidade', $produto)) {
        return max(0, (int)$produto['quantidade']);
    }

    return 0;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<link rel="icon" href="/lojacosmeticos_alalet/public/assets/img/cherry.png">
<title>Produtos</title>

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
    --vermelho:#c9153e;
    --branco:#fff;
    --texto:#4c1c29;
    --muted:#9b6978;
    --verde:#dff7e5;
    --sombra:0 12px 35px rgba(143,13,45,.10);
}

body{
    min-height:100vh;
    font-family:"Poppins",Arial,sans-serif;
    color:var(--texto);
    background:
        radial-gradient(circle at 5% 8%, #d51f4d 0 5px, transparent 6px),
        radial-gradient(circle at 12% 17%, #f8b6ca 0 7px, transparent 8px),
        radial-gradient(circle at 92% 12%, #d51f4d 0 5px, transparent 6px),
        radial-gradient(circle at 84% 88%, #f8b6ca 0 6px, transparent 7px),
        linear-gradient(135deg,#fff7fa 0%,#ffe3ec 50%,#fff7fa 100%);
    padding:20px;
}

/* HEADER */
.header{
    width:100%;
    margin-bottom:20px;
}

.header-inner{
    max-width:1500px;
    min-height:105px;
    margin:auto;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(255,255,255,.92);
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

/* Espaço para a logo/cerejas */
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
    color:var(--rosa-forte);
    font-size:9px;
    font-weight:600;
    text-align:center;
    cursor:pointer;
    position:relative;
}

.logo-photo:hover{
    background:#fff0f5;
}

.logo-photo img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.logo h1{
    font-family:"Bodoni Moda",serif;
    font-size:34px;
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
    box-shadow:0 6px 15px rgba(213,31,77,.14);
}

.btn-danger{
    background:#e93458;
    color:white;
}

.btn-inativo{
    background:#ffd7e2;
    color:var(--vinho);
}

.btn-success{
    background:#d9f5df;
    color:#23753a;
}

.btn-ghost{
    background:#ffe1e9;
    color:var(--vinho);
}

/* LAYOUT NOVO */
.grid{
    max-width:1500px;
    margin:auto;
    display:grid;
    grid-template-columns:360px minmax(0,1fr);
    gap:20px;
    align-items:start;
}

.card{
    background:rgba(255,255,255,.94);
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

/* FORMULÁRIO */
.form-group{
    display:flex;
    flex-direction:column;
    margin-bottom:16px;
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
    box-shadow:0 0 0 3px rgba(213,31,77,.08);
}

textarea.input{
    resize:none;
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

/* ÁREA DE PRODUTOS */
.products-card{
    min-width:0;
}

.products-top{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:15px;
    margin-bottom:20px;
    flex-wrap:wrap;
}

.products-top h2{
    margin-bottom:0;
}

.catalog-tools{
    display:flex;
    gap:10px;
    align-items:center;
}

.search-box{
    width:220px;
    padding:11px 14px;
    border:1.5px solid #f4b0c4;
    border-radius:13px;
    outline:none;
    font-family:"Poppins",Arial,sans-serif;
    background:#fffafd;
}

.summary{
    display:flex;
    gap:10px;
    margin-bottom:20px;
}

.summary-item{
    flex:1;
    background:#fff1f5;
    border:1px solid #f8d2de;
    border-radius:16px;
    padding:13px 16px;
}

.summary-item small{
    display:block;
    color:var(--muted);
    font-size:10px;
}

.summary-item strong{
    display:block;
    color:var(--vinho);
    font-size:22px;
}

/* CARDS DE PRODUTO — substitui a tabela antiga */
.product-grid{
    display:grid;
    grid-template-columns:repeat(3,minmax(0,1fr));
    gap:15px;
}

.product-item{
    border:1px solid #f5d5df;
    border-radius:20px;
    background:#fff;
    overflow:hidden;
    transition:.2s ease;
    min-width:0;
}

.product-item:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(143,13,45,.10);
}

.product-main{
    padding:14px;
}

.product-head{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:10px;
}

.product-image{
    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:18px;
    background:#fff2f6;
    border:1px solid #f8d5df;
}

.product-info{
    flex:1;
    min-width:0;
}

.product-id{
    color:var(--rosa-forte);
    font-size:11px;
    font-weight:700;
}

.product-name{
    color:#35151f;
    font-size:14px;
    font-weight:700;
    margin-top:3px;
    line-height:1.25;
}

.product-brand{
    color:var(--muted);
    font-size:11px;
    margin-top:4px;
}

.category-tag{
    display:inline-block;
    margin-top:9px;
    padding:5px 8px;
    border-radius:9px;
    background:#ffe5ed;
    color:var(--vinho);
    font-size:9px;
    font-weight:600;
}

.product-meta{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top:13px;
    padding-top:12px;
    border-top:1px dashed #f2ccd8;
}

.stock-label{
    font-size:10px;
    color:var(--muted);
}

.estoque-input{
    font-size:14px;
    font-weight:600;
}

.stock-value{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:42px;
    padding:6px 9px;
    margin-left:4px;
    border-radius:10px;
    background:#fff0e7;
    color:var(--vinho);
    font-weight:700;
    font-size:12px;
}

.tag{
    padding:6px 9px;
    border-radius:10px;
    font-size:10px;
    font-weight:700;
}

.ok{
    background:#dff7e5;
    color:#23753a;
}

.off{
    background:#ffe0e0;
    color:#a52b2b;
}

.acoes{
    display:flex;
    gap:6px;
    padding:11px 14px;
    border-top:1px solid #f5d5df;
}

.acoes .btn{
    flex:1;
    min-width:0;
    padding:8px 5px;
    font-size:10px;
}

/* RESPONSIVO */
@media(max-width:1250px){
    .product-grid{
        grid-template-columns:repeat(2,minmax(0,1fr));
    }
}

@media(max-width:1050px){
    .grid{
        grid-template-columns:1fr;
    }

    .product-grid{
        grid-template-columns:repeat(3,minmax(0,1fr));
    }
}

@media(max-width:800px){
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

    .product-grid{
        grid-template-columns:repeat(2,minmax(0,1fr));
    }

    .catalog-tools{
        width:100%;
    }

    .search-box{
        width:100%;
    }
}

@media(max-width:560px){
    .card{
        padding:18px;
    }

    .product-grid{
        grid-template-columns:1fr;
    }

    .summary{
        flex-direction:column;
    }
}
</style>
</head>

<body>

<div class="header">

    <div class="header-inner">

        <div class="logo">
        <div class="logo-photo">
    <img
        src="public/assets/img/cherry2.png"
        alt="Logo Cherry Make"
    >
</div>
            <h1>Loja Cherry Make</h1>
            <span class="badge">Produtos</span>
        </div>

        <div class="user">
            Olá,
            <strong><?= htmlspecialchars($_SESSION['nome'] ?? 'Usuário') ?></strong>

            <a class="btn btn-ghost"
               href="index.php?controller=auth&action=logout">
                Sair
            </a>
        </div>

    </div>

</div>

<div class="grid">

    <div class="card">

        <h2 class="bodoni-moda-uniquifier">
            <?= $editar ? "Editar Produto #".(int)$editar['id'] : "Cadastrar Produto" ?>
        </h2>

        <form method="post"
              action="index.php?controller=produto&action=salvar"
              enctype="multipart/form-data">

            <input type="hidden"
                   name="id"
                   value="<?= $editar ? (int)$editar['id'] : 0 ?>">

            <div class="form-group">

                <label>Categoria</label>

                <select class="input" name="categoria_id" required>

                    <option value="">Selecione...</option>

                    <?php foreach ($categorias as $c): ?>

                    <option value="<?= (int)$c['id'] ?>"
                    <?= $editar && (int)$editar['categoria_id'] === (int)$c['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['nome']) ?>
                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="form-group">

                <label>Nome</label>

                <input class="input"
                       type="text"
                       name="nome"
                       required
                       value="<?= $editar ? htmlspecialchars($editar['nome']) : '' ?>">

            </div>

            <div class="form-group">

             <label>Marca</label>

             <input class="input"
             type="text"
             name="marca"
            required
            value="<?= $editar ? htmlspecialchars($editar['marca'] ?? '') : '' ?>">

</div>
            
            <div class="form-group">

                <label>Descrição (opcional)</label>

                <textarea class="input"
                          name="descricao"
                          rows="4"><?= $editar ? htmlspecialchars($editar['descricao'] ?? '') : '' ?></textarea>

            </div>

            <div class="form-group">

                <label>Imagem do produto</label>

                <input class="input"
                       type="file"
                       name="imagem"
                       accept="image/png, image/jpeg, image/webp">

                <small class="muted">
                    Formatos: JPG, PNG e WEBP (até 2MB)
                </small>

            </div>


            <div class="form-group">
                <label>Estoque</label>
                <input class="input estoque-input"
                       type="number"
                       name="estoque"
                       min="0"
                       step="1"
                       required
                       value="<?= $editar ? estoqueProduto($editar) : '' ?>"
                       placeholder="Ex: 25">
            </div>

            <div class="actions">

                <button class="btn" type="submit">
                    Salvar
                </button>

                <a class="btn btn-ghost"
                   href="index.php?controller=produto&action=index">
                    Limpar
                </a>

            </div>

        </form>

    </div>


    <div class="card products-card">

        <div class="products-top">
            <h2 class="bodoni-moda-uniquifier">Lista de Produtos ♡</h2>

            <div class="catalog-tools">
                <input id="buscarProduto" class="search-box" type="text" placeholder="Buscar produto..." autocomplete="off">
                <button id="filtrarProduto" class="btn btn-ghost" type="button">Filtrar</button>
            </div>
        </div>

        <div class="summary">
            <div class="summary-item">
                <small>Total de produtos</small>
                <strong><?= count($produtos) ?></strong>
            </div>

            <div class="summary-item">
                <small>Estoque total</small>
                <strong>
                    <?php
                    $estoqueTotal = 0;
                    foreach ($produtos as $produtoResumo) {
                        $estoqueTotal += estoqueProduto($produtoResumo);
                    }
                    echo $estoqueTotal;
                    ?>
                </strong>
            </div>
        </div>

        <div class="product-grid">

            <?php foreach ($produtos as $p): ?>

                <article class="product-item"
                           data-search="<?= htmlspecialchars(
                               strtolower(
                                   (string)$p['id'] . ' ' .
                                   (string)$p['nome'] . ' ' .
                                   (string)$p['marca'] . ' ' .
                                   (string)$p['categoria_nome']
                               ),
                               ENT_QUOTES,
                               'UTF-8'
                           ) ?>">

                    <div class="product-main">

                        <div class="product-head">

                            <img class="product-image"
                                 src="<?= imagemProdutoUrl((int)$p['id']) ?>"
                                 alt="Produto">

                            <div class="product-info">

                                <div class="product-id">
                                    #<?= (int)$p['id'] ?>
                                </div>

                                <div class="product-name">
                                    <?= htmlspecialchars($p['nome']) ?>
                                </div>

                                <div class="product-brand">
                                    <?= htmlspecialchars($p['marca']) ?>
                                </div>

                                <span class="category-tag">
                                    <?= htmlspecialchars($p['categoria_nome']) ?>
                                </span>

                            </div>

                        </div>

                        <div class="product-meta">

                            <div>
                                <span class="stock-label">Estoque</span>
                                <span class="stock-value">
                                    <?= estoqueProduto($p) ?>
                                </span>
                                <span class="stock-label">unid.</span>
                            </div>

                            <div>
                                <?= ((int)$p['ativo'] === 1)
                                    ? '<span class="tag ok">Ativo</span>'
                                    : '<span class="tag off">Inativo</span>' ?>
                            </div>

                        </div>

                    </div>

                    <div class="acoes">

                        <a class="btn"
                           href="index.php?controller=produto&action=index&id=<?= (int)$p['id'] ?>">
                            Editar
                        </a>

                        <?php if ((int)$p['ativo'] === 1): ?>

                            <a class="btn btn-inativo"
                               href="index.php?controller=produto&action=toggle&id=<?= (int)$p['id'] ?>&ativo=0">
                                Inativar
                            </a>

                        <?php else: ?>

                            <a class="btn btn-success"
                               href="index.php?controller=produto&action=toggle&id=<?= (int)$p['id'] ?>&ativo=1">
                                Ativar
                            </a>

                        <?php endif; ?>

                        <a class="btn btn-danger"
                           href="index.php?controller=produto&action=remover&id=<?= (int)$p['id'] ?>"
                           onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                            Excluir
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>
    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const campo = document.getElementById('buscarProduto');
    const botao = document.getElementById('filtrarProduto');
    const cards = Array.from(document.querySelectorAll('.product-item'));

    function normalizar(texto) {
        return texto
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
    }

    function buscarProdutos() {
        const termo = normalizar(campo.value.trim());

        cards.forEach(function (card) {
            const conteudo = normalizar(card.dataset.search || '');
            card.style.display = termo === '' || conteudo.includes(termo)
                ? ''
                : 'none';
        });
    }

    campo.addEventListener('input', buscarProdutos);
    botao.addEventListener('click', buscarProdutos);

    campo.addEventListener('keydown', function (evento) {
        if (evento.key === 'Enter') {
            evento.preventDefault();
            buscarProdutos();
        }
    });
});
</script>

</body>
</html>
