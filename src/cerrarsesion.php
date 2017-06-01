<?php
    session_start();

    if (isset($_SESSION['mail']) OR isset($_SESSION['admin'])) {
        session_destroy();
    }
    
    header('Location: index.html');
?>