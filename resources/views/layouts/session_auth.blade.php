@php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true)
    {
        header('Location: http://54.158.36.225:8000/login_sign_up');

        exit();
    }

@endphp
