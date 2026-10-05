<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Vendedor</title>

</head>
<body>
<style>
.cadastro{
 margin:0;
 padding:0;
 box-sizing:border-box;
}


:root{
 --bg1:#FFD3F0;
 --bg2:#FF277B;
 --card:#FFF7D6;
 --txt:#000;
 --muted:#7D7777;
 --radius:40px;

}


body{
    min-height:100vh; /* troque height por min-height */
    display:flex;
    justify-content:center;
    align-items:flex-start; /* em vez de center */
    padding:20px 0;
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(135deg, var(--bg1), var(--bg2));
    

.container{
    width:420px;
    background:var(--card);
    border-radius:var(--radius);
    padding:40px;
    box-shadow:0 15px 40px rgba(255,255,255,.2);
    height:auto; 
}


.container h1{
 font-size:35px;
 color:var(--txt);
 text-align: center;
 margin-bottom: 30px;
}

.form-group{
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
    
        }

        .form-group label{
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--muted);
        }

        .form-group input{
            padding: 14px;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
            background-color:rgba(125, 119, 119, 0.51) ;
            border:1px solid rgba(255,255,255,.12);

        }

        .form-group input:focus{
            border-color: var(--bg2);
    
        }




/* ===============================
  BOTÕES
  =============================== */
.btn{
 width: 100%;
 padding:15px;
 border:none;
 border-radius:12px;
 cursor: pointer;
 font-size: 18px;
 font-weight: bold;
 color:#0b0b1a;
 background-color: #F5B6C7;
 transition: 0.3s;
 }

 .btn:hover{
    background-color: #ff8fb0;
    transform: scale(1.02);
 }

 /* ===============================
  FONTE
  =============================== */
@import url('https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

.bodoni-moda-uniquifier {
 font-family: "Bodoni Moda", serif;
 font-optical-sizing: auto;
 font-weight: weight;
 font-style: normal;
}

/* ===============================
  FIM DA FONTE
  =============================== */


</style>

    

    <form action="index.php?controller=usuario&action=store" method="POST">
    <div class="cadastro" >
    <div class="container">

    <h1 class="bodoni-moda-uniquifier" >  Cadastro de Vendedor</h1>
      
    <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <button class="btn" type="submit">
                Cadastrar
            </button>
            </div>
    </form>
    
</body>
</html>