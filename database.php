<?php
// Sprawdzenie czy użytkownik jest zalogowany
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Pobranie danych zalogowanego użytkownika z bazy danych
$servername = "localhost";
$username = "nazwa_uzytkownika";
$password = "haslo";
$dbname = "nazwa_bazy_danych";

// Tworzenie połączenia z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
}

// Pobranie danych zalogowanego użytkownika
$loggedInUser = $_SESSION["username"];

$sql = "SELECT * FROM users WHERE username = '$loggedInUser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imie = $row["imie"];
    $nazwisko = $row["nazwisko"];
    $rola = $row["rola"];
}

// Zamykanie połączenia z bazą danych
$conn->close();
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza danych</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<h2>Podgląd danych zalogowanego użytkownika</h2>

<table>
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Rola</th>
        <th>Przedmiot</th>
        <th>Ocena</th>
        <th>Kartkówka</th>
        <th>Sprawdzian</th>
        <th>Odpowiedź</th>
        <th>Średnia ocen</th>
    </tr>
    <tr>
        <td><?php echo $imie; ?></td>
        <td><?php echo $nazwisko; ?></td>
        <td><?php echo $rola; ?></td>
        <td>...</td> <!-- Dane przedmiotu -->
        <td>...</td> <!-- Dane oceny -->
        <td>...</td> <!-- Dane kartkówki -->
        <td>...</td> <!-- Dane sprawdzianu -->
        <td>...</td> <!-- Dane odpowiedzi -->
        <td>...</td> <!-- Dane średniej ocen -->
    </tr>
    <!-- Możesz dodać więcej wierszy z danymi ucznia, jeśli jest to potrzebne -->
</table>
</body>
</html>
