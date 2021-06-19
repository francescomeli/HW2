<html>
    <head>
        <title>AREA RELAX</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{url("css/mini-homework3.css")}}'> 
        <script src='{{url("js/caricamento_api2.js")}}' defer></script>
        <script type="text/javascript"> const REGISTER_ROUTE="{{route('relax')}}"; </script>
    </head>

    <body>
        <header>
            <h1>Servizi a tua disposizione</h1>
            <div id="button">
                <a href="{{route('homepage')}}">Homepage</a>
            </div>
        </header>

        <section>
            <div id="main">
                <h2>
                    In questa sezione vengono mostrati tutti i servizi messi a disposizione dalle piscine che gestiamo.<br/>
                    Se stai cercando un modo per goderti del meritato riposo, sei nel posto che fa per te.
                </h2>
            </div>

            <div id="relax">
                <p>
                    Il benessere che una spa può regalare anche dopo una sola giornata deriva non solo dall’atmosfera rilassante,
                    ma anche dai diversi trattamenti che è possibile scegliere. Dalla classica sauna all’idromassaggio,
                    senza dimenticare le più diverse tipologie di massaggi, nelle spa di Catania si possono provare anche trattamenti curativi innovativi o estetici.
                </p>

                <div id="immagine1">
                </div>
                <div id="immagine2">
                </div>
                <div id="immagine3">
                </div>

            </div>

        </section>
        
        <div id="servizio">
            <p>
                Durante il percorso benessere da voi scelto, potrete anche scegliere la musica che vi piacerebbe ascoltare durante la permanenza.<br/>
                Cerchiamo sempre di offrire la migliore esperienza possibile ai nostri clienti, per questo ti invitiamo a 
                suggerirci la playlist che più ti piace prima della tua permanenza, così da farti avere quello che cerchi col minimo sforzo.
            </p>
        </div>

        <div id="ricerca">
            <form id="musica">
                Inserisci il nome della playlist: 
                <input type="text" id="playlist">
                <input type="submit" id="submit" name="submit" value="Cerca">
            </form>
            <div id="risultato">
            </div>
            <div id="cercata" class="hidden">
            </div>
        </div>

        <footer>
            <address>Contatti: cicciomeli8@hotmail.com</address>
            <p>Francesco Meli O46002172</p>
        </footer>
    </body>
</html>