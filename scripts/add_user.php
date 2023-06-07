<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dodaj użytkownika</title>
</head>
<body>
<h4>Dodaj użytkownika</h4>
<form method="post" action="dodaj_uzytkownika.php">
    <label for="username">Imię:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="lastname">Nazwisko:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Hasło:</label>
    <input type="password" name="password" id="password" required><br>

    <label for="role">Rola:</label>
    <select name="role" id="role">
        <option value="student">Student</option>
        <option value="teacher">Nauczyciel</option>
        <option value="admin">Administrator</option>
    </select><br>

    <input type="submit" value="Dodaj użytkownika">
</form>
</body>
</html>
<?php
require_once "../scripts/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["imie"];
    $lastname = $_POST["nazwisko"];
    $password = $_POST["hasło"];
    $role = $_POST["role"];

    // Wstawianie nowego użytkownika do bazy danych
    $sql = "INSERT INTO users (username,lastname, password, role) VALUES ('$username','$lastname', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "Użytkownik został dodany pomyślnie.";
    } else {
        echo "Błąd podczas dodawania użytkownika: " . $conn->error;
    }
}
header("location: ../db/5_dbtable_usun_add_update.php");
$conn->close();
?>
