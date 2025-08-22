<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Curso Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary mb-4" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">Qualisoft</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('home')}}">Home</a>
                         </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('categories')}}">Categorias</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link active" href="{{route('products')}}">Produtos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    </body>
</html> 