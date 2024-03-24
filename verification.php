<?php
session_start();

if(isset($_COOKIE['verification']) && $_COOKIE['verification'] === 'verified') {
    header("Location: http://massageapi.duckdns.org/redirectcaptcha.html");
    exit();
}

if(isset($_POST['submit'])) {
    if($_POST['verification_text'] === 'I am not a bot') {
        setcookie('verification', 'verified', time() + (86400 * 30), "/");
        header("Location: http://massageapi.duckdns.org/redirectcaptcha.html");
        exit();
    } else {
        $error_message = "Der eingegebene Text ist falsch. Bitte versuchen Sie es erneut.";
    }
}
?>
