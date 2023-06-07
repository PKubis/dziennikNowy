<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja do Dziennika Lekcyjnego</title>
    <link rel="stylesheet" href="table1.css">
</head>
<body>
<h2>Rejestracja do Dziennika Lekcyjnego</h2>

<!-- Komunikat sukcesu -->
<?php if (isset($_SESSION['success'])): ?>
    <p style="color: green;"><?php echo $_SESSION['success']; ?></p>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Komunikat błędu -->
<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- Formularz rejestracji -->
<h3>Rejestracja</h3>
<form action="register_process.php" method="post">
    <label for="firstName">Podaj imię:</label><br>
    <input type="text" name="firstName" required><br><br>

    <label for="lastName">Podaj nazwisko:</label><br>
    <input type="text" name="lastName" required><br><br>

    <label for="role">Wybierz rolę:</label><br>
    <select name="role" required>
        <option value="teacher">Nauczyciel</option>
        <option value="student">Student</option>
    </select><br><br>

    <label for="class">Wybierz klasę:</label><br>
    <select name="class" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select><br><br>

    <label for="password">Podaj hasło:</label><br>
    <input type="password" name="password" required><br><br>

    <label for="confirmPassword">Potwierdź hasło:</label><br>
    <input type="password" name="confirmPassword" required><br><br>

    <input type="submit" value="Zarejestruj">
</form>
</body>
</html>
