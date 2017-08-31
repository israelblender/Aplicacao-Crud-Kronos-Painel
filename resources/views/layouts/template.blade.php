<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>KronosPainel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"
    <meta name="description" content="Aplicacao Kronos para cadastro de pessoas">
    <meta name="keywords" content="kronos, aplicacao, pessoas, cadastro">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @yield('javascript')
</head>

<body>
    <div class="container">
        @include('layouts.menu')
        <br><br>
        @yield('conteudo')
        
    </div>
    <footer class="footer">
        <p>© KronosPainel 2017.</p>
    </footer>
</body>

</html>


