<?php

global $_CONFIG;
$_CONFIG = json_decode(file_get_contents("/mnt/familine/private/FamilineConfig.json"), true);

global $_WELCOMED;
if (!file_exists("/mnt/familine/private/welcomed.json")) {
    file_put_contents("/mnt/familine/private/welcomed.json", "[]");
}
$_WELCOMED = json_decode(file_get_contents("/mnt/familine/private/welcomed.json"), true);

/*if (isset($_COOKIE['FL_SESSION_TOKEN'])) {
    if (strpos($_COOKIE['FL_SESSION_TOKEN'], ".") !== false || strpos($_COOKIE['FL_SESSION_TOKEN'], "/") !== false) {
        header("Location: https://" . $_CONFIG["Global"]["domain"] . "/login/?r=" . urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
        die();
    }

    if (file_exists("/mnt/familine/private/tokens/" . str_replace(".", "", str_replace("/", "", $_COOKIE['FL_SESSION_TOKEN'])))) {
        $_PROFILE = json_decode(file_get_contents("/mnt/familine/private/tokens/" . str_replace(".", "", str_replace("/", "", $_COOKIE['FL_SESSION_TOKEN']))), true);

        if (isset($_PROFILE['familine'])) {
            header("Location: https://" . $_CONFIG["Global"]["domain"] . "/login/?r=" . urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
            die();
        }

        $_USER = $_PROFILE['login'];
        $_SUID = $_PROFILE['login'];
        $_FULLNAME = $_PROFILE['name'];
        $_FRENCH = $_PROFILE['profile']['locale']['name'] === "fr";

        if (!in_array($_USER, $_WELCOMED) && $_FRENCH) {
            header("Location: /welcome/?r=" . urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
            die();
        }
    } else {
        header("Location: https://" . $_CONFIG["Global"]["domain"] . "/login/?r=" . urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
        die();
    }
} else {
    header("Location: https://" . $_CONFIG["Global"]["domain"] . "/login/?r=" . urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
    die();
}*/

$_USER = "test";
$_SUID = "0";
$_FULLNAME = "Test User";
$_FRENCH = true;

$_SERVER["HTTP_USER_AGENT"] = str_replace("+AutomateCloud/", "+FamilineDesktop+AutomateCloud/", $_SERVER["HTTP_USER_AGENT"]);
function l($fr, $en) {
    global $_FRENCH;

    if ($_FRENCH) {
        return $fr;
    } else {
        return $en;
    }
}