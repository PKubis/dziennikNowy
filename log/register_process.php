<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobieranie danych z formularza rejestracji
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $class = $_POST['class'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Sprawdzenie czy hasła się zgadzają
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = 'Hasła nie zgadzają się';
        header("Location: register.php");
        exit();
    }

    // Połączenie z bazą danych
    require_once "connect.php";

    // Przygotowanie zapytania SQL
    $sql = "INSERT INTO users (firstName, lastName, role, class, password) VALUES (?, ?, ?, ?, ?)";

    // Utworzenie przygotowanego wyrażenia SQL
    $stmt = $conn->prepare($sql);

    // Wiązanie parametrów
    $stmt->bind_param("sssis", $firstName, $lastName, $role, $class, $password);

    // Wykonanie zapytania
    if ($stmt->execute()) {
        // Użytkownik został pomyślnie zarejestrowany
        $_SESSION['success'] = 'Rejestracja zakończona sukcesem. Możesz się teraz zalogować.';
        header("Location: login.php");
        exit();
    } else {
        // W przypadku błędu zapisu do bazy danych
        $_SESSION['error'] = 'Wystąpił błąd podczas rejestracji użytkownika';
        header("Location: register.php");
        exit();
    }

    // Zamknięcie połączenia i zwolnienie zasobów
    $stmt->close();
    $conn->close();
} else {
    // Przekierowanie w przypadku bezpośredniego dostępu do pliku
    header("Location: register.php");
    exit();
}
