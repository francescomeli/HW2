<html>
    <head>
        <title>CORSI</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{url("css/MHW4.css")}}'>
        <script src='{{url("js/corsi.js")}}' defer></script> 
        <script type="text/javascript"> const REGISTER_ROUTE="{{route('corsi')}}"; </script>
    </head>

    <body>
        <header>
            <h1>I NOSTRI CORSI</h1>
            <div id="button">
                <a href="{{route('homepage')}}">Homepage</a>
            </div>
        </header>

        <section>
            <div id="main">
                <h2>
                    In questa sezione vengono mostrati tutti i corsi a cui è possibile iscriversi nelle varie piscine. <br/><br/>
                    Vedi tra tutti e scegli quello che più ti piace.  
                </h2>
            </div>

            <div id="ricerca">
                    <p>Cerca nella pagina:</p>
                    <input type="text" id="trova">
            </div>

            <div id="tot_corsi">
            </div>
        </section>
        

        <footer>
            <address>Contatti: cicciomeli8@hotmail.com</address>
            <p>Francesco Meli O46002172</p>
        </footer>
    </body>
</html>