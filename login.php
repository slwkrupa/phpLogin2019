<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zaloguj się do systemu!</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <form method="POST" action="logowanie.php">
        <fieldset>
            <legend>Logowanie</legend>
                <input type="text" placeholder="Login" name="login"><label>Podaj swój login</label><br>
                <input type="password" placeholder="Hasło" name="pass"><label>Podaj swoje hasło<label><br>
                <input type="submit" value="Zaloguj">
        </fieldset>
    </form>
</body>
</html>