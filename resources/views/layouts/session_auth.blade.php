@php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true)
    {
        header('Location: http://127.0.0.1:8000/login');
        exit();
    }
@endphp
