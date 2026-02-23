<?php
session_start();
$id = $_POST['id'];
$isShow = $_POST['isShow'];

if ($isShow == '1') {
    $_SESSION['aciertos'] += 1;
}

header("Location: index.php");
exit;
?>
