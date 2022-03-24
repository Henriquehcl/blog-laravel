<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <img src="img/blogging.png" alt="logo">
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contato" class="nav-link">Contato</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Administração</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            @method('POST')
                            <input type="submit" class="nav-link" value="sair">
                            <a href="/logout" class="nav-link" onclick="post.preventDefault();
                                this.closest('form').submit();">Sair</a>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                </ul>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <!-- exibir a flash message -->
                    @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                    @endif
                @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Henrique &copy;</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
