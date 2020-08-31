<?php
    session_start();
    $conn = mysqli_connect('localhost', 'skrupa', 'apollo12', 'login');
    if(isset($_SESSION['useri']) && isset($_SESSION['usern'])){
        $query="SELECT user_id FROM users where uimie='".$_SESSION['useri']."' AND unazwisko = '".$_SESSION['usern']."'";
        $wynik = mysqli_query($conn, $query);
        $wiersz=mysqli_fetch_row($wynik);
        $id=$wiersz[0];

        //sprawdzenie sesji
        $query2="UPDATE sessions SET slogoff=NOW() where slogoff is null and user_id=$id";
        $wynik2=mysqli_query($conn, $query2);

        //niszczenie danych sesji
            session_unset();
            session_destroy();
    }
?>