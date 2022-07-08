
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Login
        </title>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
 
    <body>
           
    <div id="overlay">
        <h1>Login</h1>
        
        @if($errore == 'errore')

        <p class='errore'> Credenziali errate! </p>
        
        @endif

    <main>

        <form name = "login" method="post" action="{{ route ('login') }}">
            @csrf
                <label>E-mail <input type='text' name='email'></label>
                <label>Password <input type='password' name='password'></label>
                <label>&nbsp;<input id='bottone' type='submit'></label>

        </form>

    </main>
    <div><a href="{{ route('registrati') }}" > Non sei registrato? Clicca qui</a></div>


    <footer>
        <p>Powered By Emilio Cassaro, 2022, All Rights Reserved</p>
    </footer>

</body>
</div>

</html>