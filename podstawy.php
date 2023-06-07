<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
$firstName = "Janusz";
$lastName = "Nowak";

echo "Imię i nazwisko: $firstName $lastName<br>";


//heredoc
echo <<< DATA
    <hr>
    Imię: $firstName<br>
    Nazwisko: $lastName<br>
DATA;

$data = <<< DATA
  <hr>
  Imię: $firstName<br>
  Nazwisko: $lastName<br>
DATA;

?>
</body>
</html>
