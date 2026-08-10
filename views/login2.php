<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cherry Make - Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&family=Great+Vibes&display=swap"
          rel="stylesheet">


    <style>

        /* =========================================
           CONFIGURAÇÕES GERAIS
        ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html,
        body {

            width: 100%;
            height: 100%;

        }


        body {

            font-family: "DM Sans", sans-serif;

            background: #fff7fa;

            overflow: hidden;

        }


        /* =========================================
           TELA PRINCIPAL
        ========================================= */

        .login-page {

            width: 100vw;
            height: 100vh;

            display: flex;

        }


        /* =========================================
           LADO ESQUERDO
           AGORA É UMA IMAGEM
        ========================================= */

        .brand-side {

            width: 45%;
            height: 100vh;

            position: relative;

            overflow: hidden;

            background: #a90032;

        }


        /* IMAGEM DO LADO ESQUERDO */

        .imagem-lateral {

            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            object-position: center;

            user-select: none;

            pointer-events: none;

        }


        /* =========================================
           LADO DIREITO
        ========================================= */

        .login-side {

            width: 55%;
            height: 100vh;

            position: relative;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px;

            background:

                radial-gradient(
                    circle at top right,
                    #fff0f5,
                    #fffafa 50%,
                    #ffffff
                );

            overflow: hidden;

        }


        /* =========================================
           POLKA DOTS DO LADO DIREITO
        ========================================= */

        .login-side::before {

            content: "";

            position: absolute;

            inset: 0;

            background-image:

                radial-gradient(
                    circle,
                    rgba(245, 139, 173, .35) 0 4px,
                    transparent 5px
                );

            background-size: 45px 45px;

            opacity: .5;

        }


        /* =========================================
           CARD DE LOGIN
        ========================================= */

        .login-card {

            width: min(590px, 100%);

            background: white;

            border-radius: 25px;

            padding: 55px 52px;

            position: relative;

            z-index: 2;

            box-shadow:

                0 25px 70px rgba(128,0,35,.08);

            border: 1px solid #f5d9e2;

        }


        /* =========================================
           CORAÇÃO
        ========================================= */

        .top-heart {

            text-align: center;

            font-size: 30px;

            color: #f47d9f;

            margin-bottom: 10px;

        }


        /* =========================================
           TÍTULO
        ========================================= */

        .login-title {

            font-family: "Playfair Display", serif;

            color: #8d0a2a;

            text-align: center;

            font-size: clamp(32px, 3vw, 45px);

            margin-bottom: 10px;

        }


        /* =========================================
           SUBTÍTULO
        ========================================= */

        .login-subtitle {

            text-align: center;

            color: #777;

            font-size: 16px;

            margin-bottom: 40px;

        }


        /* =========================================
           CAMPOS
        ========================================= */

        .form-group {

            margin-bottom: 24px;

        }


        .form-group label {

            display: block;

            color: #222;

            font-size: 15px;

            font-weight: 600;

            margin-bottom: 10px;

        }


        .input {

            width: 100%;

            height: 65px;

            padding: 0 20px;

            border: 1.5px solid #efcbd8;

            border-radius: 12px;

            outline: none;

            font-family: inherit;

            font-size: 16px;

            color: #333;

            background: white;

            transition: .25s;

        }


        .input:focus {

            border-color: #c40038;

            box-shadow:

                0 0 0 4px rgba(196,0,56,.08);

        }


        .input::placeholder {

            color: #aaa;

        }


        /* =========================================
           ESQUECEU A SENHA
        ========================================= */

        .forgot {

            display: block;

            text-align: right;

            margin-top: -10px;

            margin-bottom: 25px;

            color: #e92e63;

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

        }


        .forgot:hover {

            text-decoration: underline;

        }


        /* =========================================
           BOTÕES
        ========================================= */

        .btn {

            width: 100%;

            height: 62px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            font-family: inherit;

            font-size: 17px;

            font-weight: 700;

            text-decoration: none;

            cursor: pointer;

            transition: .25s;

        }


        /* =========================================
           BOTÃO ENTRAR
        ========================================= */

        button.btn {

            border: none;

            color: white;

            background:

                linear-gradient(
                    135deg,
                    #c00035,
                    #960024
                );

            box-shadow:

                0 10px 25px rgba(157,0,45,.20);

        }


        button.btn:hover {

            transform: translateY(-2px);

            box-shadow:

                0 14px 30px rgba(157,0,45,.30);

        }


        /* =========================================
           BOTÃO CADASTRAR
        ========================================= */

        a.btn {

            margin-top: 14px;

            color: #a6002d;

            background: white;

            border: 2px solid #c00035;

        }


        a.btn:hover {

            background: #fff1f5;

            transform: translateY(-2px);

        }


        /* =========================================
           RODAPÉ
        ========================================= */

        .footer {

            position: absolute;

            bottom: 25px;

            left: 50%;

            transform: translateX(-50%);

            z-index: 3;

            white-space: nowrap;

            color: #777;

            font-size: 13px;

        }


        /* =========================================
           RESPONSIVO
        ========================================= */

        @media (max-width: 900px) {

            body {

                overflow: auto;

            }


            .login-page {

                height: auto;

                min-height: 100vh;

                flex-direction: column;

            }


            .brand-side {

                width: 100%;

                height: 420px;

                min-height: 420px;

            }


            .login-side {

                width: 100%;

                height: auto;

                min-height: 650px;

                padding: 30px 20px 100px;

            }


            .login-card {

                padding: 40px 25px;

            }

        }


        /* =========================================
           CELULAR
        ========================================= */

        @media (max-width: 500px) {

            .brand-side {

                height: 350px;

                min-height: 350px;

            }


            .login-title {

                font-size: 30px;

            }


            .login-card {

                padding: 30px 20px;

            }


            .footer {

                font-size: 11px;

            }

        }

    </style>

</head>


<body>


    <!-- =========================================
         PÁGINA DE LOGIN
    ========================================= -->

    <div class="login-page">


        <!-- =====================================
             LADO ESQUERDO
             COLOQUE SUA IMAGEM AQUI
        ====================================== -->

        <section class="brand-side">

            <img
                src="public/assets/img/cherry-login.png"
                alt="Cherry Make"
                class="imagem-lateral"
            >

        </section>



        <!-- =====================================
             LADO DIREITO - LOGIN
        ====================================== -->

        <section class="login-side">


            <!-- CARD -->

            <div class="login-card">


                <!-- CORAÇÃO -->

                <div class="top-heart">

                    ♥ 

                </div>



                <!-- TÍTULO -->

                <h1 class="login-title">

                    Bem-vindo(a)!

                </h1>



                <!-- SUBTÍTULO -->

                <p class="login-subtitle">

                    Faça login para acessar o sistema da Cherry Make.

                </p>



                <!-- =================================
                     FORMULÁRIO
                ================================== -->

                <form
                    action="index.php?controller=usuario&action=login"
                    method="POST"
                >



                    <!-- =============================
                         E-MAIL
                    ============================== -->

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
                            required
                        >

                    </div>



                    <!-- =============================
                         SENHA
                    ============================== -->

                    <div class="form-group">

                        <label for="senha">

                            Senha

                        </label>


                        <input
                            class="input"
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            required
                        >

                    </div>

                    <!-- =============================
                         BOTÃO ENTRAR
                    ============================== -->

                    <button
                        class="btn"
                        type="submit"
                    >

                        Entrar

                    </button>



                    <!-- =============================
                         BOTÃO CADASTRAR
                    ============================== -->

                    <a
                        href="index.php?controller=usuario&action=create"
                        class="btn"
                    >

                        Cadastrar

                    </a>


                </form>


            </div>


        </section>


    </div>


</body>

</html>
