<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/search_users.js') }}" defer="true"></script>
    <title> La Gastronomia di Emiliardo
    </title>

    <link rel="shortcut icon" href="http://localhost/hmw1/logobarra.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/search_users.css') }}">
</head>

<body> 

    <header>
        <div id='overlay'>
            <h1 id="selezione"> 
                <em id="potente">Sezione ricerca locale e su spotify....</em>
            </h1> 
        </div>


        <nav>
            <em id="scritta"> La Gastronomia di Emiliardo<br>

   
            <p class='welcome'>        
      Benvenuto {{ $user[0]->Username}}
        </p>
            </em>
            <div id="bottoni">
           
                <a href="{{ asset('home') }}">Home</a>
                <a href="{{ asset('posts') }}">Post</a>
                <a href="{{ asset('logout') }}">Esci</a>
                
            </div>
        </nav>

    </header>

    <div class="fotop"><img id= "img" src="logo_home.png" ></div> 

    <div class="testo">
        

    <div>Username:  {{ $user[0]->Username}}</div>

    </div>

    <p id='scrittaform2'>Inserisci il nome dell'utente che vuoi cercare!!!</p>

    <form id="form" name="search" method="post">
            
            <label>Nome <input id="nome" type='text' name='nome' ></label>
            <label>Cognome <input id="cognome"type='text' name='cognome' ></label>
            <label>&nbsp;<input type='submit'></label>
            

    </form>

    <div id="view"></div>


    <form id='fsp' method='post'>
        <div id="scrittaform" >Inserisci nome del tuo artista preferito </div>
        <input type="text" id="artist" name='artist'>
        <input id ='cercasp' type="submit" value="Cerca">
        <img type="submit" src = 'open-graph-default.png'>
    </form>

    <div id="spotify"></div>



    <footer>

        <p><em>Università degli Studi di Catania <br> Emilio Cassaro </em></p>

        <p><em>Matricola:1000002219<br> e-mail:CSSMLE01A25C342N@studium.unict.it</em></p>

    </footer>

</body>

</html>