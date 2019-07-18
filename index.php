<header>
    <figure>
        <img src="image/logo-tellescom.png" alt="Logo da Tellescom com nome" id="cabecalho">
    </figure>
</header>

<link rel="stylesheet" href="css/login.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Login Tellescom</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<!--Coded with love by Mutiullah Samim
    Changes by Thiago Melo
-->
<body>
<div>
    <div class="user_card">
        <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
                <img src="image/telle-logo-peq.png" class="brand_logo" alt="Logo da Tellescom">
            </div>
        </div>
        <div class="d-flex justify-content-center form_container">
            <form action="inc/login.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="login" class="form-control input_user" placeholder="Login" autofocus="">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="senha" class="form-control input_pass" placeholder="Senha">
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="button" class="btn login_btn">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<footer class="navbar-fixed-bottom" id="barra-final">
    <style>
        #logo-baixo{
            float: right;
        }
        #copyr{
            float: right;
            padding: 15px;
            color: #ffffff;
        }
        p{
            color: #ffffff;
        }
        </style>
        <span><figure><img id="logo-baixo" src="image/logo_tlc_foot.png"></figure></span>
        <p id="copyr"><strong>&copy;2019 Tellescom Indústria E Comércio Em Telecomunicação Eireli</strong></p>
        <p>Contato: ti.mao@tellescom.com.br - Equipe de T.I. Manaus </p>
        <p><small>Project: Heimdall - Developed by: Thiago Melo</small></p>
</footer>
</html>
