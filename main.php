<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Główna strona</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <style>
    .panel {
        transition-property: background-color;
        transition-duration: 0.4s;
        
    }
    </style>
</head>
<body>
<p class="info">
<?php 
    session_start();
    if(isset($_SESSION['useri']) && isset($_SESSION['usern'])){
        echo "Witaj ".$_SESSION['useri']." ".$_SESSION['usern']."!"; 
        echo "<a href='logoff.php' class='back'>Wyloguj</a>";
    }else{
        echo "nie jesteś zalogowany! [<a href='login.php'>Zaloguj</a>]";
    }
?>
</p>

    <div class="wrapper">
    <div class="panel">
    <h2>Lista loginów systemu</h2>
    </div>
    <a href="rejestracja.php">
    <div class="panel">
    <h2>Rejestracja użytkownika</h2>
    </div></a>

    <div class="panel">
    <h2>Dane sesji</h2>
    </div>
    </div>
</body>
</html>