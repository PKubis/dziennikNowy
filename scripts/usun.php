<?php
require_once "../scripts/connect.php";

if (isset($_GET['userIdDelete'])) {
    $id = $_GET['userIdDelete'];

    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("location: ../db/5_dbtable_usun_add_update.php?userDelete=$id");
    } else {
        header("location: ../db/5_dbtable_usun_add_update.php?userDelete=0");
    }
}

$conn->close();
?>
