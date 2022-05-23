<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://getbootstrap.com.br/docs/4.1/examples/cover/cover.css">
</head>
<body class="text-center">
    <script src="../js/app.js"></script>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">HOME</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a href="#" class="nav-link active">HOME</a>
                    <a href="{{ route('painel.login') }}" class="nav-link">LOGIN</a>
                </nav>
            </div>
        </header>
        <main role="main" class="inner cover">
            <h1 class="cover-heading">PROJETO PARA ESTUDO!</h1>
            <p class="lead">
                Olá! Me chamo João Paulo, e atualmente trabalho como desenvolvedor back-end. Como principais
                ferramentas, utilizo PHP, Laravel e MySql. Fique a vontade para ver e apreciar meu trabalho! Desde já, MUITO OBRIGADO!
                Abaixo se encontra o meu GITHUB, onde estão meus repositórios!
            </p>
            <p class="lead">
                <a href="https://github.com/Shaiqna" class="btn btn-lg btn-secondary">GITHUB</a>
            </p>
        </main>
        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>
                    Template de capa usando
                    <a href="https://getbootstrap.com/">Bootstrap</a>
                    , feito pelo
                    <a href="https://twitter.com/mdo">@mdo</a>
                    .
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
