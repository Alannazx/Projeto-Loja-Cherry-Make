<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/lojacosmeticos_alalet/public/assets/img/cherry.png">

    <title>Cherry Make - Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&family=Great+Vibes&display=swap"
          rel="stylesheet">


    <style>

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


        /* ================================
           PÁGINA
        ================================= */

        .login-page {
            width: 100vw;
            height: 100vh;
            display: flex;
        }


        /* ================================
           LADO ESQUERDO - CARROSSEL
        ================================= */

        .brand-side {
            width: 45%;
            height: 100vh;

            position: relative;

            overflow: hidden;

            background: #a90032;
        }


        /* ÁREA DO CARROSSEL */

        .carousel {
            width: 100%;
            height: 100%;

            position: relative;

            overflow: hidden;
        }


        /* CADA IMAGEM */

        .carousel-slide {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            opacity: 0;

            visibility: hidden;

            transition:
                opacity 1s ease-in-out,
                visibility 1s ease-in-out;
        }


        /* IMAGEM ATIVA */

        .carousel-slide.active {
            opacity: 1;
            visibility: visible;
        }


        .imagem-lateral {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            object-position: center;

            user-select: none;

            pointer-events: none;
        }


        /* ================================
           BOTÕES DO CARROSSEL
        ================================= */

        .carousel-button {
            position: absolute;

            top: 50%;

            transform: translateY(-50%);

            width: 45px;
            height: 45px;

            border: none;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.75);

            color: #a90032;

            font-size: 35px;

            line-height: 1;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            z-index: 10;

            transition: all .25s ease;
        }


        .carousel-button:hover {
            background: #ffffff;

            transform: translateY(-50%) scale(1.08);

            box-shadow:
                0 5px 20px rgba(0, 0, 0, .15);
        }


        .carousel-prev {
            left: 20px;
        }


        .carousel-next {
            right: 20px;
        }


        /* ================================
           INDICADORES
        ================================= */

        .carousel-dots {
            position: absolute;

            bottom: 25px;

            left: 50%;

            transform: translateX(-50%);

            display: flex;

            gap: 9px;

            z-index: 10;
        }


        .carousel-dot {
            width: 10px;
            height: 10px;

            padding: 0;

            border: none;

            border-radius: 50%;

            background: rgba(255, 255, 255, .6);

            cursor: pointer;

            transition: all .3s ease;
        }


        .carousel-dot.active {
            width: 28px;

            border-radius: 10px;

            background: #ffffff;
        }


        /* ================================
           LADO DIREITO
        ================================= */

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


        /* ================================
           BOLINHAS
        ================================= */

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


        /* ================================
           CARD
        ================================= */

        .login-card {
            width: min(590px, 100%);

            background: white;

            border-radius: 25px;

            padding: 55px 52px;

            position: relative;

            z-index: 2;

            box-shadow:
                0 25px 70px rgba(128, 0, 35, .08);

            border: 1px solid #f5d9e2;
        }


        /* ================================
           CORAÇÃO
        ================================= */

        .top-heart {
            text-align: center;

            font-size: 30px;

            color: #f47d9f;

            margin-bottom: 10px;
        }


        /* ================================
           TÍTULO
        ================================= */

        .login-title {
            font-family: "Playfair Display", serif;

            color: #8d0a2a;

            text-align: center;

            font-size: clamp(32px, 3vw, 45px);

            margin-bottom: 10px;
        }


        /* ================================
           SUBTÍTULO
        ================================= */

        .login-subtitle {
            text-align: center;

            color: #777;

            font-size: 16px;

            margin-bottom: 40px;
        }


        /* ================================
           CAMPOS
        ================================= */

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
                0 0 0 4px rgba(196, 0, 56, .08);
        }


        .input::placeholder {
            color: #aaa;
        }


        /* ================================
           BOTÕES
        ================================= */

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


        /* ENTRAR */

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
                0 10px 25px rgba(157, 0, 45, .20);
        }


        button.btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 30px rgba(157, 0, 45, .30);
        }


        /* CADASTRAR */

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


        /* ================================
           RESPONSIVO
        ================================= */

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


        /* ================================
           CELULAR
        ================================= */

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


            .carousel-button {
                width: 38px;
                height: 38px;

                font-size: 28px;
            }


            .carousel-prev {
                left: 10px;
            }


            .carousel-next {
                right: 10px;
            }


            .carousel-dots {
                bottom: 15px;
            }

        }

    </style>

</head>


<body>


    <div class="login-page">


        <!-- =================================
             LADO ESQUERDO
             CARROSSEL
        ================================== -->

        <section class="brand-side">


            <div class="carousel" id="carousel">


                <!-- IMAGEM 1 -->

                <div class="carousel-slide active">

                    <img
                        src="public/assets/img/cherrylogin1.png"
                        alt="Cherry Make"
                        class="imagem-lateral"
                    >

                </div>


                <!-- IMAGEM 2 -->

                <div class="carousel-slide">

                    <img
                        src="public/assets/img/cherrylogin2.png"
                        alt="Cherry Make"
                        class="imagem-lateral"
                    >

                </div>


                <!-- IMAGEM 3 -->

                <div class="carousel-slide">

                    <img
                        src="public/assets/img/cherrylogin31.png"
                        alt="Cherry Make"
                        class="imagem-lateral"
                    >

                </div>


                <!-- SETA ANTERIOR -->

                <button
                    class="carousel-button carousel-prev"
                    type="button"
                    id="prevSlide"
                    aria-label="Imagem anterior"
                >
                    ‹
                </button>


                <!-- SETA PRÓXIMA -->

                <button
                    class="carousel-button carousel-next"
                    type="button"
                    id="nextSlide"
                    aria-label="Próxima imagem"
                >
                    ›
                </button>


                <!-- INDICADORES -->

                <div
                    class="carousel-dots"
                    aria-label="Navegação do carrossel"
                >

                    <button
                        class="carousel-dot active"
                        type="button"
                        data-slide="0"
                        aria-label="Imagem 1"
                    ></button>

                    <button
                        class="carousel-dot"
                        type="button"
                        data-slide="1"
                        aria-label="Imagem 2"
                    ></button>

                    <button
                        class="carousel-dot"
                        type="button"
                        data-slide="2"
                        aria-label="Imagem 3"
                    ></button>

                </div>


            </div>


        </section>



        <!-- =================================
             LADO DIREITO
        ================================== -->

        <section class="login-side">


            <div class="login-card">


                <div class="top-heart">
                    ♥
                </div>


                <h1 class="login-title">
                    Bem-vindo(a)!
                </h1>


                <p class="login-subtitle">
                    Faça login para acessar o sistema da Cherry Make.
                </p>



                <form
                    method="post"
                    action="/lojacosmeticos_alalet/index.php?controller=auth&action=login"
                >


                    <!-- E-MAIL -->

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
                            autocomplete="username"
                        >

                    </div>



                    <!-- SENHA -->

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
                            autocomplete="current-password"
                        >

                    </div>



                    <!-- ENTRAR -->

                    <button
                        class="btn"
                        type="submit"
                    >
                        Entrar
                    </button>



                    <!-- CADASTRAR -->

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



    <!-- =================================
         JAVASCRIPT DO CARROSSEL
    ================================== -->

    <script>

        document.addEventListener("DOMContentLoaded", function () {


            const slides =
                document.querySelectorAll(".carousel-slide");


            const dots =
                document.querySelectorAll(".carousel-dot");


            const prevButton =
                document.getElementById("prevSlide");


            const nextButton =
                document.getElementById("nextSlide");


            let slideAtual = 0;


            let intervalo;



            /* ============================
               MOSTRAR SLIDE
            ============================ */

            function mostrarSlide(numero) {


                if (numero >= slides.length) {

                    slideAtual = 0;

                }
                else if (numero < 0) {

                    slideAtual = slides.length - 1;

                }
                else {

                    slideAtual = numero;

                }


                slides.forEach(function (slide, index) {

                    slide.classList.toggle(
                        "active",
                        index === slideAtual
                    );

                });


                dots.forEach(function (dot, index) {

                    dot.classList.toggle(
                        "active",
                        index === slideAtual
                    );

                });

            }



            /* ============================
               PRÓXIMO SLIDE
            ============================ */

            function proximoSlide() {

                mostrarSlide(slideAtual + 1);

                reiniciarCarrossel();

            }



            /* ============================
               SLIDE ANTERIOR
            ============================ */

            function slideAnterior() {

                mostrarSlide(slideAtual - 1);

                reiniciarCarrossel();

            }



            /* ============================
               CARROSSEL AUTOMÁTICO
               8000 = 8 SEGUNDOS
            ============================ */

            function iniciarCarrossel() {

                intervalo = setInterval(function () {

                    mostrarSlide(slideAtual + 1);

                }, 8000);

            }



            /* ============================
               REINICIAR CONTADOR
            ============================ */

            function reiniciarCarrossel() {

                clearInterval(intervalo);

                iniciarCarrossel();

            }



            /* ============================
               BOTÃO PRÓXIMO
            ============================ */

            nextButton.addEventListener(
                "click",
                proximoSlide
            );



            /* ============================
               BOTÃO ANTERIOR
            ============================ */

            prevButton.addEventListener(
                "click",
                slideAnterior
            );



            /* ============================
               BOLINHAS
            ============================ */

            dots.forEach(function (dot, index) {

                dot.addEventListener(
                    "click",
                    function () {

                        mostrarSlide(index);

                        reiniciarCarrossel();

                    }
                );

            });



            /* ============================
               INICIAR
            ============================ */

            mostrarSlide(0);

            iniciarCarrossel();


        });

    </script>


</body>

</html>
