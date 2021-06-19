<html>
    <head>
        <title>ISCRIZIONE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='{{url("js/iscrizione.js")}}' defer></script>
        <link rel="stylesheet" href='{{url("css/login.css")}}'>
        <script type="text/javascript"> const REGISTER_ROUTE="{{route('iscrizione')}}"; </script>
    </head>

    <body>
        <form method="post">

            <input type="hidden" name="_token" value="{{ $csrf_token }}">
            <h1>Registrazione</h1>
            
            <input type="text" id="username" placeholder="Username" name="username" maxlenght="255" required>  
            <p id="check_username" class='errore hidden'> Username già in uso, scegline un altro. </p>
            
            <input type="text" id="email" placeholder="Email" name="email" maxlenght="255" required>
            <p id="check_email" class='errore hidden'> Email già iscritta, effettua il login. </p>
            
            <input type="text" id="nome" placeholder="Nome" name="nome" maxlenght="255" required>
            <input type="text" id="cognome" placeholder="Cognome" name="cognome" maxlenght="255" required>
            <br>
            <h5>Data di nascita: </h5>
            <input type="date" id="data_nascita" name="data_nascita" required>  
            <input type="password" id="passw" placeholder="Password" name="passw" maxlenght="255" required>

            <p id="check_password" class='errore hidden'> Password troppo breve, inserire minimo 6 caratteri. </p>

            <br>
                @if($controllo)
                    <p class='errore'> Errore durante la compilazione dei campi, riprova.</p>
                @endif
            
            <button type="submit" id="submit"> Conferma </button>
        </form>

        <footer>
            <address>Contatti: cicciomeli8@hotmail.com</address>
            <p>Francesco Meli O46002172</p>
        </footer>
    </body>
</html>