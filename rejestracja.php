<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Rejestracja użykownika</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
 <style>   
.back {
    transition-duration: 0.4s;
}
input[type="submit"] {
    transition-duration: 0.4s;
}
</style>
</head>
<body>
<a class="back" href="main.php">Powrót na stronę główną</a>
    <form method="post" action="register_f.php">
    <fieldset>
    <legend>Zarejestruj</legend>
        <input type="text" placeholder="Wpisz imię" id='imie' name="imie"><label>Imie użytkownika</label><br>
        <input type="text" placeholder="Wpisz nazwisko" name="nazw"><label>Nazwisko użytkownika</label><br>
        <input type="text" placeholder="Wpisz login" name="login"><label>Login użytkownika</label><br>
        <input type="password" placeholder="Wpisz hasło" name="pass"><label>hasło użytkownika</label><br>
        <select name="aut">
            <option value="A">Admin</option>
            <option value="U">Użytkownik</option>
        </select><label>Rodzaj konta<br>
        <input type="submit" value="Zarejestruj">
        </fieldset>
    </form>
</body>
<script>
    var imie = document.getElementById('imie');
    imie.addEventListener('blur', function(){
    walid("imie");});

    function walid(id) {
        var lit = new RegExp("[A-Za-z]")
        if(id=="imie") {
            var czyimie = lit.test(imie.value);
            if(czyimie) {
                var walid1 = true;
                console.log(walid1);
            }
            else {
                alert("Podaj poprawne hasło!");
            }

        }
    }
    



</script>
</html>