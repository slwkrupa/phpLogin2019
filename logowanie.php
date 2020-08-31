<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Rejestrowanie...</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <style>
        .info_ramka {
            width: 500px;
            min-height: 300px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
            background-color: #e0ebeb;

        }

        </style>
</head>
<body>

<?php
        $conn = mysqli_connect('localhost','skrupa','apollo12','login');
    if(isset($_POST['login']) && isset($_POST['pass'])) {

        //czyszczenie loginu i hasła
        $login = mysqli_real_escape_string($conn,trim($_POST['login']));
        $pass = mysqli_real_escape_string($conn,trim($_POST['pass']));

        //hashowanie hasła
        if($login!="" && $pass!="") {
            $pass = sha1(md5($pass));
            $query = "SELECT imie,nazwisko,id_user,ulogin,uhaslo FROM users WHERE ulogin='$login' AND uhaslo='$pass'";

            mysqli_query($conn,"SET NAMES UTF8");
            $wynik = mysqli_query($conn,$query);

            if(mysqli_num_rows($wynik)==1) {
                //dane znaleziono, logowanie
                session_start();
                $wiersz=mysqli_fetch_row($wynik);
                $_SESSION['useri']=$wiersz[0];
                $_SESSION['usern']=$wiersz[1];

                //rejestracja sesji użytkownika w bazie 

                $query_sesja = "INSERT INTO sessions VALUES(null,NOW(),null,$wiersz[2])";
                $wynik_sesja = mysqli_query($conn,$query_sesja);
                if($wynik_sesja) {
                    echo "<div class=info_ramka><h2>Informacja!</h2><p>Zalogowano poprawnie</p>
                    <div id='countdown'>Za 4 sekund przeniesienie ze strony</div>
                    </div>";
                    header("Refresh:4; url=main.php");
                }
                else {
                    echo "<div class=info_ramka><h2>Informacja!</h2><p>Nie znaleziono użytkownika!</p>
                    <div id='countdown'>Za 4 sekund przeniesienie ze strony</div>
                    </div>";
                    header("Refresh:4; url=login.php");
                }               
            }
            
            else {
                echo "<div class=info_ramka><h2>Informacja!</h2><p>Nie znaleziono użytkownika!</p>
                <div id='countdown'>Za 4 sekund przeniesienie ze strony</div>
                </div>";
                header("Refresh:4; url=login.php");
                
                }

        }
    }

    else {
        echo "<p>Hackerze rąbany wyłącz to!</p>";
    }
    mysqli_close($conn);

    ?>
    
    </body>
    <script>
    var timeLeft = 5;
    var timer = setInterval(function(){
        
        timeLeft -= 1;
        document.getElementById('countdown').innerHTML = "Za " + timeLeft+  " sekund przeniesienie ze strony";
    
        console.log(timeLeft);
       
    },1000)
    
    </script>
    </html>