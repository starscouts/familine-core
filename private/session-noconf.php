<?php

global $_CONFIG;
$_CONFIG = json_decode(file_get_contents("/mnt/familine/private/FamilineConfig.json"), true);

if ($_SERVER['REMOTE_ADDR'] !== "127.0.0.1" && $_SERVER['REMOTE_ADDR'] !== "::0") {
    if (isset($_COOKIE['FL_SESSION_TOKEN'])) {
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
        } else {
            header("Location: https://" . $_CONFIG["Global"]["domain"] . "/login/?r=" . urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
            die();
        }
    } else {
        header("Location: https://" . $_CONFIG["Global"]["domain"] . "/login/?r=" . urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
        die();
    }

}

if (isset($_PROFILE["projectRoles"]) && is_array($_PROFILE["projectRoles"]) && isset($_PROFILE["projectRoles"][0]) && is_array($_PROFILE["projectRoles"][0]) && isset($_PROFILE["projectRoles"][0]["role"]) && is_array($_PROFILE["projectRoles"][0]["role"]) && isset($_PROFILE["projectRoles"][0]["role"]["key"]) && is_string($_PROFILE["projectRoles"][0]["role"]["key"]) && $_PROFILE["projectRoles"][0]["role"]["key"] === "system-admin") {
    $_ADMIN = true;
} else {
    $_ADMIN = false;
}

function l($fr, $en) {
    global $_FRENCH;

    if ($_FRENCH) {
        return $fr;
    } else {
        return $en;
    }
}