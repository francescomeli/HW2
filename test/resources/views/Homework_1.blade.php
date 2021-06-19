<html>
    <head>
        <title>PISCINE CATANIA</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{url("css/Homework_1.css")}}'/>
        <script src='{{url("js/caricamento_api1.js")}}' defer></script>
        <script type="text/javascript"> const REGISTER_ROUTE="{{route('homepage')}}"; </script>
    </head>
    
    <body>
        <header>  
            <nav>
                @if(session('identificativo')!=null)
                    <a id='button' href="{{route('logout')}}">Logout</a>         
                    <p> Benvenuto/a {{$nome}}</p>
                
                @else
                    <a id='button' href="{{route('login')}}">Login</a>
                    <a id='button' href="{{route('iscrizione')}}">Iscriviti</a>
                @endif
            </nav>

            <div id="immagine1">       
            </div>
            <div id="immagine2">       
            </div>

            <h1>
            <strong>Trova la piscina che </strong><br/>
            <em>fa per te...</em>
            </h1>
        </header>

        <section>
            <div id="main">
                <h2>Benvenuto nel sito dedicato alla gestione delle piscine di Catania</h2>
                <p>
                    Vuoi iniziare a fare sport oppure vuoi solamente dedicarti del tempo? <br/>
                    Qui puoi scegliere quello che ti interessa e trovare l'offerta più adatta ai tuoi bisogni.
                </p>
            </div>

            <div id="offerte">
                <div id="corso">
                    <img src="https://www.mfsport.net/wp-content/uploads/2020/04/perez.jpg"/>
                    <a class="descrizione" href="{{route('corsi')}}">I nostri corsi</a>
                    <p>
                        Bisogno di iniziare qualcosa di nuovo? Scegli tra i corsi disponibili.
                    </p>
                </div>

                <div id="piscine">
                    <img src="https://assets.centralindex.com/W/48/1ac317bd4bbaf000812ac33dc3425055.jpg"/>
                    <a class="descrizione" href="{{route('piscine')}}">Le nostre piscine</a>
                    <p>
                        Trova la piscina più vicina per fare quello che cerchi.
                    </p>
                </div>

                <div id="relax">
                    <img src="https://www.ilgazzettino.it/photos/MED_HIGH/92/00/5059200_1239_massaggio.jpg"/>
                    <a class="descrizione" href="{{route('relax')}}">Area relax</a>
                    <p>
                        Un rifugio di relax, attrezzato per farvi vivere un percorso innovativo.
                    </p>
                </div>
            </div>
        </section>

        <section id="area_sport">
            <h2>
                Non sei interessato ai corsi che offriamo?
            </h2>
            <p>
                Tenersi in forma o avere un hobby sano e divertente sono fattori essenziali per una persona di successo.
                Se qui non hai trovato quello che fa per te, fai una ricerca e trova i dettagli dello sport che più ti interessa.
                Ricorda che i nostri corsi sono in continuo aggiornamento, contattateci via mail per avere informazioni sulla futura introduzione 
                di nuovi corsi nella nostra pagina.
            </p>

            <div id="ricerca">
                <form id="info">
                    Inserisci uno sport (lingua inglese): 
                    <input type="text" id="sport">
                    <input type="submit" id="submit" value="Cerca">
                </form>
                <div id="risultato">
                </div>
                <div id="cercata" class="hidden">
                </div>
            </div>
        </section>

        <footer>
            <address>Contatti: cicciomeli8@hotmail.com</address>
            <p>Francesco Meli O46002172</p>
        </footer>

    </body>
</html>