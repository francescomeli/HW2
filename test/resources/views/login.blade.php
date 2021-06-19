<html>
    <head>
        <title>ACCEDI/REGISTRATI</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{url("css/login.css")}}'> 
    </head>

    <body>
        <form method="post" action="{{route('login')}}">
            <h1>Login</h1>
            <br/>
            <br/>
            <br/>
            <br/>
            <input type="hidden" name="_token" value="{{ $csrf_token }}">
            <input type="text" id="username" placeholder="Username" name="username" maxlenght="255" required>
            <input type="password" id="passw" placeholder="Password" name="passw" maxlenght="255" required>
                @if($controllo)
                    <p class='errore'> Il nome utente e/o la password che sono state inserite sono errate. </p>
                @endif
            <br/>
            <button type="submit" id="submit"> Accedi </button>
        </form>

        <footer>
            <address>Contatti: cicciomeli8@hotmail.com</address>
            <p>Francesco Meli O46002172</p>
        </footer>
    </body>
</html>