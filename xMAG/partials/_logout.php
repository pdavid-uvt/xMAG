<?php

session_start();
echo "Se deconectează...";
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["userId"]);

// session_unset();
// session_destroy();

header("location: /xMAG/index.php");
?>