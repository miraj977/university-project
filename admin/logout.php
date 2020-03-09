<?php

if (isset($_GET['sessionout'])) {
    ob_start();
    session_start();
    session_destroy();
    session_regenerate_id(true);

    header('location:index.php?sessionout');
    exit;
}
ob_start();
session_start();
session_destroy();
session_regenerate_id(true);

header('location:index.php?out');
?>