<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie do Dziennika</title>
</head>
<body>
<h2>Logowanie do Dziennika Lekcyjnego</h2>

<!-- Formularz logowania -->
<h3>Logowanie</h3>
<form action="login.php" method="post">
    <label for="username">Imię:</label><br>
    <input type="text" name="username" required><br><br>

    <label for="lastname">Nazwisko:</label><br>
    <input type="text" name="lastname" required><br><br>

    <label for="password">Hasło:</label><br>
    <input type="password" name="password" required><br><br>

    <label for="role">Rola:</label><br>
    <select name="role" required>
        <option value="admin">Administrator</option>
        <option value="teacher">Nauczyciel</option>
        <option value="student">Student</option>
    </select><br><br>

    <input type="submit" value="Zaloguj">
</form>

<hr> <!-- Linia podziału -->

<!-- Link do rejestracji -->
<p>Nie masz jeszcze konta? <a href="register.php">Zarejestruj się</a></p>
</body>
</html>
