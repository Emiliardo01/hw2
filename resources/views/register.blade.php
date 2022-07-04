<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/register.js') }}" defer="true"></script>
        <title> Registrati
        </title>
        <link rel="shortcut icon" href="http://localhost/hmw1/logobarra.jpg" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    </head>
 
    <body>

           
    <div id="overlay">
        <h1>Compila inserendo i tuoi dati</h1>
        
        <div id='errore'>
            
        </div>


    <main>

        <form id="form" name="register" method="post" action= "{{route('registrati')}}">

                @csrf
                <div id='divnom'><label>Nome <input id="nome" type='text' name='nome' ></label></div>
                <div id='divcogn'><label>Cognome <input id="cognome"type='text' name='cognome' ></label></div>
                <div id='warninge'><label>E-mail <input id="email" type='text' name='email' ></label></div>
                <div id='warningu'><label>Username <input id="username" type='text' name='username' ></label></div>
                <label>Password <input id="pw" type='password' name='password' ></label>
                <p id="radio">
                Maschio<input id="m" type='radio' name='genere' value='m'>
                Femmina<input id="f" type='radio' name='genere' value='f'>
                </p>
                <label>&nbsp;<input type='submit'></label>
                

        </form>

 
    </main>


    <a  href="login.php">Torna al Login!</a>

    <footer>
        <p>Powered By Emilio Cassaro, 2022, All Rights Reserved</p>
    </footer>

</body>


</html>