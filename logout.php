<?php
    session_start();
    ob_clean();
    session_destroy();
    header('Location: index.php');
?>