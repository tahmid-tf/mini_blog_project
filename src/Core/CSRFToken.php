<?php

namespace Core;

class CSRFToken{
    public static function generate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $token = bin2hex(random_bytes(32));
        $_SESSION["_csrf_token"] = $token;

        return $token;
    }

    public static function verify($token){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['_csrf_token']) && hash_equals($_SESSION['_csrf_token'], $token)) {
            unset($_SESSION['_csrf_token']); // One-time use
            return true;
        }

        return false;

    }
}