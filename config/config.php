<?php 

    const COOKIE_PROTECT = "timer";

    const ALERT_SUCCESS = 1;
    const ALERT_DANGER = 2;
    const ALERT_INFO = 3;
    const ALERT_WARNING = 4;

    define("URL",str_replace("index.php","", (isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
?>