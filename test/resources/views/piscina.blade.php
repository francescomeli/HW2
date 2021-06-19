<html>
    <head>
        <title>LE NOSTRE PISCINE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{url("css/mini-homework2.css")}}'> 
        <script src='{{url("js/preferiti.js")}}' defer></script>
        <script src='{{url("js/operazione.js")}}' defer></script>
        <script type="text/javascript"> const REGISTER_ROUTE="{{route('piscine')}}"; </script>
    </head>

    <body>
        <header>
            <h1>LE PISCINE CHE TI OFFRIAMO</h1>
            <div id="link">
            <a href="{{route('homepage')}}">Homepage</a>
            </div>
        </header>

        <section>
            <h1 id="preferiti" class="hidden">Preferiti:</h1>
            
            <div id="selezionati">
            </div>
        
            <div id="disponibili">
                <h1>Disponibili:</h1>
            </div>

            <div id="offerte">
            </div>
            
        </section>

        <section id="area_corsi">
            <h2>
                Vuoi sapere quali corsi ci sono nella piscina che preferisci?
            </h2>
            <p>
                Scegli una tra le piscine che gestiamo e verifica se il corso che vorresti incominciare è presente.
            </p>

            <div id="ricerca">
                <form id="info" method="post">         
                    Piscina: 
                    <select name="corsi" id="corsi">
                    <option value="null"></option>
                        <!--$query="SELECT codice_p,nome_p FROM PISCINA";-->
                        @foreach($piscine as $piscina){
                            <option value='{{$piscina["codice_p"]}}'>{{$piscina["codice_p"]}} - {{$piscina["nome_p"]}}</option>
                        }
                        @endforeach
                    
                    </select>
                    <button type="submit" id="Cerca">
                        Cerca
                    </button>
                </form>
                <div id="risultato">
                </div>
            </div>
        </section>

        <footer>
            <address>Contatti: cicciomeli8@hotmail.com</address>
            <p>Francesco Meli O46002172</p>
        </footer>
    </body>
</html>
