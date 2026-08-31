<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cherry Make - Cadastro</title>

    <!-- FONTES -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,500;6..96,600;6..96,700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

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
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: "Poppins", Arial, sans-serif;

            background:
                radial-gradient(
                    circle at center,
                    #ffffff 0%,
                    #fff9fb 45%,
                    #ffeef4 100%
                );

            overflow: hidden;

            position: relative;
        }


        /* =========================================
           BOLINHAS DO FUNDO
        ========================================= */

        body::before {
            content: "";

            position: absolute;

            top: 0;
            left: 0;

            width: 26%;
            height: 100%;

            background-image:
                radial-gradient(
                    circle,
                    rgba(245, 126, 163, .55) 0 6px,
                    transparent 7px
                );

            background-size: 70px 70px;

            background-position: 0 0;

            opacity: .8;

            pointer-events: none;
        }


        body::after {
            content: "";

            position: absolute;

            top: 0;
            right: 0;

            width: 26%;
            height: 100%;

            background-image:
                radial-gradient(
                    circle,
                    rgba(245, 126, 163, .55) 0 6px,
                    transparent 7px
                );

            background-size: 70px 70px;

            background-position: 35px 20px;

            opacity: .8;

            pointer-events: none;
        }


        /* =========================================
           CONTAINER PRINCIPAL
        ========================================= */

        .cadastro {
            width: 100%;

            min-height: 100vh;

            display: flex;

            align-items: center;
            justify-content: center;

            padding: 30px;

            position: relative;

            z-index: 2;
        }


        /* =========================================
           CARD
        ========================================= */

        .container {
            width: 620px;
            max-width: 100%;

            background: rgba(255, 255, 255, .97);

            border-radius: 28px;

            padding: 45px 58px 38px;

            border: 1px solid #f4d8e1;

            box-shadow:
                0 25px 70px rgba(145, 0, 45, .10);
        }


        /* =========================================
           CORAÇÃO
        ========================================= */

        .heart {
            text-align: center;

            color: #f47e9e;

            font-size: 34px;

            line-height: 1;

            margin-bottom: 14px;
        }


        /* =========================================
           TÍTULO
        ========================================= */

        .container h1 {
            font-family: "Bodoni Moda", serif;

            font-size: 42px;

            font-weight: 600;

            color: #94092c;

            text-align: center;

            line-height: 1.2;

            margin-bottom: 12px;
        }


        /* =========================================
           SUBTÍTULO
        ========================================= */

        .subtitle {
            color: #777;

            text-align: center;

            font-size: 16px;

            line-height: 1.6;

            margin: 0 auto 35px;

            max-width: 470px;
        }


        /* =========================================
           FORMULÁRIO
        ========================================= */

        form {
            width: 100%;
        }


        /* =========================================
           GRUPO DO FORMULÁRIO
        ========================================= */

        .form-group {
            display: flex;

            flex-direction: column;

            margin-bottom: 22px;
        }


        .form-group label {
            margin-bottom: 9px;

            font-size: 15px;

            font-weight: 600;

            color: #171717;
        }


        /* =========================================
           INPUT
        ========================================= */

        .form-group input {
            width: 100%;

            height: 64px;

            padding: 0 20px;

            border: 1.5px solid #f0bfd0;

            border-radius: 12px;

            background: #ffffff;

            color: #333;

            font-family: "Poppins", sans-serif;

            font-size: 16px;

            outline: none;

            transition: .25s;
        }


        .form-group input::placeholder {
            color: #999;
        }


        .form-group input:focus {
            border-color: #c40038;

            box-shadow:
                0 0 0 4px rgba(196, 0, 56, .08);
        }


        /* =========================================
           BOTÃO
        ========================================= */

        .btn {
            width: 100%;

            height: 62px;

            border: none;

            border-radius: 12px;

            cursor: pointer;

            font-family: "Poppins", sans-serif;

            font-size: 17px;

            font-weight: 700;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #c50038,
                    #990026
                );

            box-shadow:
                0 10px 25px rgba(157, 0, 45, .20);

            transition: .25s;

            margin-top: 4px;
        }


        .btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 30px rgba(157, 0, 45, .30);
        }


        /* =========================================
           LINK PARA LOGIN
        ========================================= */

        .login-link {
            text-align: center;

            margin-top: 24px;

            font-size: 14px;

            color: #777;
        }


        .login-link a {
            color: #e52d62;

            font-weight: 600;

            text-decoration: none;

            margin-left: 5px;
        }


        .login-link a:hover {
            text-decoration: underline;
        }


        /* =========================================
           RESPONSIVIDADE
        ========================================= */

        @media (max-width: 900px) {

            body {
                overflow: auto;
            }

            body::before,
            body::after {
                width: 18%;

                background-size: 50px 50px;
            }

            .cadastro {
                min-height: 100vh;

                padding: 30px 20px 80px;
            }

            .container {
                width: 560px;

                padding: 40px 40px 35px;
            }

            .container h1 {
                font-size: 36px;
            }
        }


        @media (max-width: 600px) {

            body::before,
            body::after {
                width: 12%;

                background-size: 40px 40px;
            }

            .cadastro {
                padding: 20px 15px 80px;
            }

            .container {
                padding: 32px 24px;

                border-radius: 22px;
            }

            .container h1 {
                font-size: 30px;
            }

            .subtitle {
                font-size: 14px;
            }

            .form-group input {
                height: 58px;
            }

            .btn {
                height: 58px;
            }
        }

    </style>

</head>


<body>

    <div class="cadastro">

        <div class="container">

            <!-- CORAÇÃO -->

            <div class="heart">
                ♥
            </div>


            <!-- TÍTULO -->

            <h1>
                Crie sua conta!
            </h1>


            <!-- SUBTÍTULO -->

            <p class="subtitle">
                Preencha os dados abaixo para se cadastrar
                <br>
                na Cherry Make.
            </p>


            <!-- =====================================
                 FORMULÁRIO

                 MANTIDO IGUAL AO VIEW ANTIGO
            ====================================== -->

            <form
                action="index.php?controller=usuario&action=store"
                method="POST"
            >

                <!-- NOME -->

                <div class="form-group">

                    <label for="nome">
                        Nome
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        placeholder="Digite seu nome"
                        required
                    >

                </div>


                <!-- E-MAIL -->

                <div class="form-group">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Digite seu e-mail"
                        required
                    >

                </div>


                <!-- SENHA -->

                <div class="form-group">

                    <label for="senha">
                        Senha
                    </label>

                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Digite sua senha"
                        required
                    >

                </div>


                <!-- BOTÃO -->

                <button
                    class="btn"
                    type="submit"
                >
                    Cadastrar
                </button>

            </form>


            <!-- VOLTAR PARA LOGIN -->

            <div class="login-link">

                Já tem uma conta?

                <a href="index.php?controller=usuario&action=login">
                    Fazer login
                </a>

            </div>

        </div>

    </div>

</body>

</html>
