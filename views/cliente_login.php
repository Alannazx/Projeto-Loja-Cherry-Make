<?php

$erro = $_SESSION['erro_cliente'] ?? '';
$sucesso = $_SESSION['sucesso_cliente'] ?? '';

unset($_SESSION['erro_cliente']);
unset($_SESSION['sucesso_cliente']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link
    rel="icon"
    href="/lojacosmeticos_alalet/public/assets/img/cherry.png"
>

<title>Login | Cherry Make</title>

<link
    href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,500;6..96,600;6..96,700&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

:root{
    --vinho:#99001f;
    --vinho-escuro:#7b0019;
    --rosa:#ef7898;
    --borda:#f2b7c7;
    --texto:#65182a;
}


/* =====================================================
   PÁGINA
===================================================== */

body{

    min-height:100vh;

    font-family:"Poppins",sans-serif;

    background:
        radial-gradient(
            circle at 90% 15%,
            #ffd4e0 0 120px,
            transparent 121px
        ),
        radial-gradient(
            circle at 8% 85%,
            #ffdce6 0 130px,
            transparent 131px
        ),
        linear-gradient(
            135deg,
            #fff4f7,
            #ffdce6
        );

    display:flex;

    align-items:center;

    justify-content:center;

    padding:25px;
}


/* =====================================================
   CONTAINER
===================================================== */

.login-container{

    width:100%;

    max-width:1450px;

    min-height:780px;

    display:grid;

    /*
       FORMULÁRIO MAIS LARGO
    */

    grid-template-columns:48% 58%;

    overflow:hidden;

    border-radius:30px;

    background:#fff;

    box-shadow:
        0 25px 70px rgba(153,0,31,.15);
}


/* =====================================================
   FOTO
===================================================== */

.image-space{

    position:relative;

    width: 110%;

    height:110%;

    min-height:750px;

    overflow:hidden;

    background:#f6b2c6;
}



.image-space img{

    position:absolute;

    inset:0;

    width:100%;

    height:100%;

    object-fit:cover;

    object-position:center;

    display:block;
}


/* =====================================================
   PLACEHOLDER
===================================================== */

.image-placeholder{

    position:absolute;

    inset:0;

    width:100%;

    height:100%;

    border:0;

    border-radius:0;

    display:flex;

    align-items:center;

    justify-content:center;

    text-align:center;

    color:var(--vinho);

    background:#f6b2c6;

    font-size:14px;
}


/* =====================================================
   FORMULÁRIO
===================================================== */

.form-area{

    background:rgba(255,255,255,.97);

    display:flex;

    align-items:center;

    justify-content:center;

    padding:55px 70px;
}


/* =====================================================
   FORMULÁRIO MAIOR
===================================================== */

.form-card{

    width:100%;

    max-width:590px;

    text-align:center;
}


/* =====================================================
   TÍTULO
===================================================== */

.heart{

    color:var(--rosa);

    font-size:30px;

    margin-bottom:8px;
}

h1{

    font-family:"Bodoni Moda",serif;

    color:var(--vinho);

    font-size:38px;

    margin-bottom:9px;
}

.subtitle{

    color:#888;

    font-size:12px;

    line-height:1.6;

    margin-bottom:32px;
}


/* =====================================================
   ALERTAS
===================================================== */

.alert{

    padding:12px 15px;

    border-radius:12px;

    margin-bottom:18px;

    font-size:12px;

    text-align:left;
}

.alert-error{

    background:#fff0f3;

    border:1px solid #f1b6c5;

    color:#a00025;
}

.alert-success{

    background:#f1fff7;

    border:1px solid #b8e4c9;

    color:#287348;
}


/* =====================================================
   CAMPOS
===================================================== */

.form-group{

    text-align:left;

    margin-bottom:20px;
}

label{

    display:block;

    color:var(--vinho);

    font-size:12px;

    font-weight:600;

    margin-bottom:8px;
}

.input-wrapper{

    position:relative;
}

.input{

    width:100%;

    height:54px;

    padding:0 50px 0 17px;

    border:1.5px solid var(--borda);

    border-radius:14px;

    background:#fffafd;

    color:var(--texto);

    font-family:"Poppins",sans-serif;

    font-size:13px;

    outline:none;

    transition:.2s;
}

.input::placeholder{

    color:#b79ca5;
}

.input:focus{

    border-color:var(--rosa);

    box-shadow:
        0 0 0 3px rgba(239,120,152,.12);
}

.input-icon{

    position:absolute;

    right:17px;

    top:50%;

    transform:translateY(-50%);

    color:var(--rosa);

    font-size:18px;
}


/* =====================================================
   CHECKBOX
===================================================== */

.remember{

    display:flex;

    align-items:center;

    gap:8px;

    margin:4px 0 22px;

    color:#777;

    font-size:11px;

    text-align:left;
}

.remember input{

    accent-color:var(--vinho);
}


/* =====================================================
   BOTÃO LOGIN
===================================================== */

.btn-login{

    width:100%;

    height:54px;

    border:0;

    border-radius:27px;

    background:var(--vinho);

    color:#fff;

    font-family:"Poppins",sans-serif;

    font-size:13px;

    font-weight:600;

    cursor:pointer;

    transition:.2s;
}

.btn-login:hover{

    background:var(--vinho-escuro);

    transform:translateY(-2px);

    box-shadow:
        0 8px 20px rgba(153,0,31,.20);
}


/* =====================================================
   DIVISOR
===================================================== */

.divider{

    display:flex;

    align-items:center;

    gap:12px;

    margin:25px 0;
}

.divider::before,
.divider::after{

    content:"";

    flex:1;

    height:1px;

    background:#ead6dc;
}

.divider span{

    color:#aaa;

    font-size:11px;
}


/* =====================================================
   CADASTRO
===================================================== */

.btn-cadastro{

    width:100%;

    height:52px;

    border-radius:26px;

    border:1.5px solid var(--rosa);

    background:#fff;

    color:var(--vinho);

    display:flex;

    align-items:center;

    justify-content:center;

    text-decoration:none;

    font-size:12px;

    font-weight:600;

    transition:.2s;
}

.btn-cadastro:hover{

    background:#fff0f4;

    transform:translateY(-2px);
}


/* =====================================================
   RODAPÉ
===================================================== */

.footer-text{

    margin-top:25px;

    color:var(--rosa);

    font-size:11px;

    font-weight:600;
}


/* =====================================================
   RESPONSIVO
===================================================== */

@media(max-width:1050px){

    .login-container{

        grid-template-columns:40% 60%;

        max-width:1100px;
    }

    .form-area{

        padding:45px 40px;
    }
}


@media(max-width:850px){

    body{

        padding:15px;
    }

    .login-container{

        grid-template-columns:1fr;

        max-width:650px;

        min-height:auto;
    }

    .image-space{

        height:350px;

        min-height:350px;
    }

    .form-area{

        padding:45px 35px;
    }
}


@media(max-width:600px){

    .login-container{

        border-radius:22px;
    }

    .image-space{

        height:280px;

        min-height:280px;
    }

    .form-area{

        padding:35px 22px;
    }

    h1{

        font-size:30px;
    }
}

</style>

</head>

<body>


<div class="login-container">


    <!-- =================================================
         FOTO
    ================================================== -->

    <div class="image-space">

        <img
            src="/lojacosmeticos_alalet/public/assets/img/logincliente.png"
            alt="Cherry Make"
            onerror="
                this.style.display='none';
                document.getElementById('imagePlaceholder').style.display='flex';
            "
        >

        <div
            class="image-placeholder"
            id="imagePlaceholder"
            style="display:none;"
        >


        </div>

    </div>


    <!-- =================================================
         LOGIN
    ================================================== -->

    <div class="form-area">

        <div class="form-card">

            <div class="heart">
                ♥
            </div>

            <h1>
                Olá, seja bem-vindo(a)!
            </h1>

            <p class="subtitle">

                Acesse sua conta e continue aproveitando
                <br>
                o melhor da Cherry Make.

            </p>


            <?php if (!empty($erro)): ?>

                <div class="alert alert-error">

                    <?= htmlspecialchars($erro) ?>

                </div>

            <?php endif; ?>


            <?php if (!empty($sucesso)): ?>

                <div class="alert alert-success">

                    <?= htmlspecialchars($sucesso) ?>

                </div>

            <?php endif; ?>


            <form
                method="POST"
                action="index.php?controller=cliente&action=entrar"
            >


                <!-- EMAIL / CPF -->

                <div class="form-group">

                    <label for="login">
                        E-mail ou CPF
                    </label>

                    <div class="input-wrapper">

                        <input
                            class="input"
                            type="text"
                            id="login"
                            name="login"
                            placeholder="Digite seu e-mail ou CPF"
                            required
                        >

                        <span class="input-icon">
                            ♡
                        </span>

                    </div>

                </div>


                <!-- SENHA -->

                <div class="form-group">

                    <label for="senha">
                        Senha
                    </label>

                    <div class="input-wrapper">

                        <input
                            class="input"
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            required
                        >

                        <span
                            class="input-icon"
                            style="cursor:pointer;"
                            onclick="mostrarSenha()"
                            id="olho"
                        >
                            ◉
                        </span>

                    </div>

                </div>


                <!-- LEMBRAR -->

                <label class="remember">

                    <input
                        type="checkbox"
                        name="lembrar"
                    >

                    Mantenha-me conectado

                </label>


                <!-- ENTRAR -->

                <button
                    type="submit"
                    class="btn-login"
                >

                    Entrar
                    &nbsp; →

                </button>


            </form>


            <div class="divider">

                <span>ou</span>

            </div>


            <!-- CADASTRO -->

            <a
                href="index.php?controller=cliente&action=cadastro"
                class="btn-cadastro"
            >

                ♡
                &nbsp;
                Criar uma nova conta

            </a>


            <div class="footer-text">

                ♥ Juntas por uma beleza real!

            </div>

        </div>

    </div>

</div>


<script>

function mostrarSenha(){

    const senha = document.getElementById('senha');

    if(senha.type === 'password'){

        senha.type = 'text';

    }else{

        senha.type = 'password';

    }

}

</script>

</body>

</html>