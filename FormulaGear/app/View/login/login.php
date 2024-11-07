
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $nombre = $_POST["password"];
    echo "<h3>Las variables ahora son: " . $nombre . "," . $email . "</h3><br>";
} else
    echo "Error"
?>
