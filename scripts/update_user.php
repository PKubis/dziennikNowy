<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connect.php";

    $userId = $_POST["userId"];
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $haslo = $_POST["haslo"];
    $rola = $_POST["role"];

    // Update user in the database
    $sql = "UPDATE users SET username='$imie', lastname='$nazwisko', password='$haslo', role='$rola' WHERE id=$userId";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["success"] = "Użytkownik został zaktualizowany.";
    } else {
        $_SESSION["error"] = "Błąd podczas aktualizacji użytkownika: " . $conn->error;
    }

    $conn->close();
    header("location: ../db/5_dbtable_usun_add_update.php");
    exit();
}
?>
