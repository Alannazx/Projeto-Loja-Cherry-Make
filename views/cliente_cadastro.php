<?php

$erro = $_SESSION['erro_cliente'] ?? '';

unset($_SESSION['erro_cliente']);

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

<title>Crie sua conta | Cherry Make</title>

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
    --rosa-claro:#fff7f9;
    --rosa-medio:#f5a4b8;
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
   CONTAINER PRINCIPAL
   FORMULÁRIO MAIOR
===================================================== */

.container{

    width:100%;

    max-width:1450px;

    min-height:780px;

    display:grid;


    grid-template-columns:48% 58%;

    overflow:hidden;

    border-radius:30px;

    background:#fff;

    box-shadow:
        0 25px 70px rgba(153,0,31,.15);
}


/* =====================================================
   ÁREA DA FOTO
   A IMAGEM OCUPA TUDO
===================================================== */

.image-area{

    position:relative;

    width:110%;
    height:110%;

    min-height:580px;

    overflow:hidden;

    background:#f6b2c6;
}



.image-area img{

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

.image-placeholder div{

    padding:30px;
}


/* =====================================================
   ÁREA DO FORMULÁRIO
===================================================== */

.form-area{

    background:rgba(255,255,255,.97);

    display:flex;

    align-items:center;

    justify-content:center;

    padding:45px 65px;
}


/* =====================================================
   FORMULÁRIO MAIS LARGO
===================================================== */

.form-card{

    width:100%;

    max-width:600px;
}


/* =====================================================
   TÍTULO
===================================================== */

.heart{

    text-align:center;

    color:var(--rosa);

    font-size:27px;

    margin-bottom:5px;
}

h1{

    font-family:"Bodoni Moda",serif;

    color:var(--vinho);

    text-align:center;

    font-size:37px;

    margin-bottom:8px;
}

.subtitle{

    text-align:center;

    color:#888;

    font-size:12px;

    line-height:1.6;

    margin-bottom:27px;
}


/* =====================================================
   ERRO
===================================================== */

.alert{

    padding:12px 15px;

    border-radius:12px;

    margin-bottom:17px;

    font-size:12px;

    background:#fff0f3;

    border:1px solid #f1b6c5;

    color:#a00025;
}


/* =====================================================
   LINHAS
===================================================== */

.row{

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:18px;
}


/* =====================================================
   CAMPOS
===================================================== */

.form-group{

    margin-bottom:17px;
}

label{

    display:block;

    color:#5c2635;

    font-size:11px;

    font-weight:600;

    margin-bottom:7px;
}

.input{

    width:100%;

    height:51px;

    padding:0 16px;

    border:1.5px solid var(--borda);

    border-radius:13px;

    background:#fffafd;

    color:var(--texto);

    font-family:"Poppins",sans-serif;

    font-size:12px;

    outline:none;

    transition:.2s;
}

.input::placeholder{

    color:#b79ca5;
}

.input:focus{

    border-color:var(--rosa);

    box-shadow:
        0 0 0 3px rgba(239,120,152,.10);
}


/* =====================================================
   SENHA
===================================================== */

.password-wrapper{

    position:relative;
}

.password-wrapper .input{

    padding-right:50px;
}

.eye{

    position:absolute;

    right:17px;

    top:50%;

    transform:translateY(-50%);

    color:var(--rosa);

    cursor:pointer;

    font-size:16px;
}


/* =====================================================
   TERMOS
===================================================== */

.terms{

    display:flex;

    align-items:flex-start;

    gap:8px;

    margin:7px 0 20px;

    color:#777;

    font-size:10px;

    line-height:1.5;
}

.terms input{

    margin-top:3px;

    accent-color:var(--vinho);
}

.terms a{

    color:var(--vinho);

    font-weight:600;
}


/* =====================================================
   BOTÃO CADASTRAR
===================================================== */

.btn{

    width:100%;

    height:53px;

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

.btn:hover{

    background:var(--vinho-escuro);

    transform:translateY(-2px);

    box-shadow:
        0 8px 20px rgba(153,0,31,.18);
}


/* =====================================================
   DIVISOR
===================================================== */

.divider{

    display:flex;

    align-items:center;

    gap:12px;

    margin:18px 0;
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
   BOTÃO LOGIN
===================================================== */

.btn-login{

    width:100%;

    height:49px;

    border-radius:25px;

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

.btn-login:hover{

    background:#fff0f4;

    transform:translateY(-2px);
}


/* =====================================================
   RODAPÉ
===================================================== */

.footer{

    text-align:center;

    color:var(--rosa);

    font-size:10px;

    margin-top:18px;

    font-weight:600;
}


/* =====================================================
   RESPONSIVO
===================================================== */

@media(max-width:1050px){

    .container{

        grid-template-columns:40% 60%;

        max-width:1100px;
    }

    .form-area{

        padding:40px 40px;
    }

    .form-card{

        max-width:600px;
    }
}


@media(max-width:850px){

    body{

        padding:15px;
    }

    .container{

        grid-template-columns:1fr;

        max-width:650px;

        min-height:auto;
    }

    .image-area{

        height:350px;

        min-height:350px;
    }

    .form-area{

        padding:40px 35px;
    }
}


@media(max-width:600px){

    .container{

        border-radius:22px;
    }

    .image-area{

        height:280px;

        min-height:280px;
    }

    .form-area{

        padding:35px 22px;
    }

    .row{

        grid-template-columns:1fr;

        gap:0;
    }

    h1{

        font-size:29px;
    }

    .subtitle{

        font-size:11px;
    }
}

</style>

</head>

<body>


<div class="container">


    <!-- =================================================
         FOTO
    ================================================== -->

    <div class="image-area">

        <img
            src="/lojacosmeticos_alalet/public/assets/img/clientecadastro.png"
            alt="Cherry Make"
            onerror="
                this.style.display='none';
                document.getElementById('placeholder').style.display='flex';
            "
        >

        <div
            class="image-placeholder"
            id="placeholder"
            style="display:none;"
        >

           
        </div>

    </div>


    <!-- =================================================
         FORMULÁRIO
    ================================================== -->

    <div class="form-area">

        <div class="form-card">

            <div class="heart">
                ♥
            </div>

            <h1>
                Crie sua conta!
            </h1>

            <p class="subtitle">

                Com sua conta, você tem acesso a uma experiência
                <br>
                completa e personalizada na Cherry Make.

            </p>


            <?php if (!empty($erro)): ?>

                <div class="alert">

                    <?= htmlspecialchars($erro) ?>

                </div>

            <?php endif; ?>


            <form
                method="POST"
                action="index.php?controller=cliente&action=cadastrar"
            >


                <!-- NOME + CPF -->

                <div class="row">

                    <div class="form-group">

                        <label for="nome">
                            Nome completo
                        </label>

                        <input
                            class="input"
                            type="text"
                            id="nome"
                            name="nome"
                            placeholder="Digite seu nome completo"
                            maxlength="100"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="cpf">
                            CPF
                        </label>

                        <input
                            class="input"
                            type="text"
                            id="cpf"
                            name="cpf"
                            placeholder="Digite seu CPF"
                            maxlength="20"
                            required
                        >

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        class="input"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Digite seu e-mail"
                        maxlength="200"
                        required
                    >

                </div>


                <!-- TELEFONE + DATA -->

                <div class="row">

                    <div class="form-group">

                        <label for="telefone">
                            Telefone
                        </label>

                        <input
                            class="input"
                            type="text"
                            id="telefone"
                            name="telefone"
                            placeholder="Digite seu telefone"
                            maxlength="20"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="data_nascimento">
                            Data de nascimento
                        </label>

                        <input
                            class="input"
                            type="date"
                            id="data_nascimento"
                            name="data_nascimento"
                            required
                        >

                    </div>

                </div>


                <!-- CEP -->

                <div class="form-group">

                    <label for="cep">
                        CEP
                    </label>

                    <input
                        class="input"
                        type="text"
                        id="cep"
                        name="cep"
                        placeholder="Digite seu CEP"
                        maxlength="20"
                        required
                    >

                </div>


                <!-- SENHA -->

                <div class="form-group">

                    <label for="senha">
                        Senha
                    </label>

                    <div class="password-wrapper">

                        <input
                            class="input"
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Crie uma senha"
                            minlength="6"
                            required
                        >

                        <span
                            class="eye"
                            onclick="mostrarSenha()"
                        >
                            ◉
                        </span>

                    </div>

                </div>


                <!-- TERMOS -->

                <label class="terms">

                    <input
                        type="checkbox"
                        required
                    >

                    <span>

                        Eu concordo com os

                        <a href="#">
                            Termos de Uso
                        </a>

                        e a

                        <a href="#">
                            Política de Privacidade
                        </a>.

                    </span>

                </label>


                <!-- CADASTRAR -->

                <button
                    type="submit"
                    class="btn"
                >

                    Cadastrar
                    &nbsp; →

                </button>

            </form>


            <div class="divider">

                <span>ou</span>

            </div>


            <a
                href="index.php?controller=cliente&action=login"
                class="btn-login"
            >

                ♡
                &nbsp;
                Já tenho uma conta

            </a>


            <div class="footer">

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