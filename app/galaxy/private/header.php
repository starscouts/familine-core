<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/../session.php";

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var array $_PROFILE
 *  @var array $_CONFIG
 */

if (isset($_PROFILE["projectRoles"]) && is_array($_PROFILE["projectRoles"]) && isset($_PROFILE["projectRoles"][0]) && is_array($_PROFILE["projectRoles"][0]) && isset($_PROFILE["projectRoles"][0]["role"]) && is_array($_PROFILE["projectRoles"][0]["role"]) && isset($_PROFILE["projectRoles"][0]["role"]["key"]) && is_string($_PROFILE["projectRoles"][0]["role"]["key"]) && $_PROFILE["projectRoles"][0]["role"]["key"] === "system-admin") {
    $_ADMIN = true;
} else {
    $_ADMIN = false;
}

?>
<?php

$_USER = $_PROFILE['login'];

global $_USER;

if (!isset($_TITLE)) {
    $_TITLE = "Accueil";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_TITLE ?> | Familine Galaxy</title>
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="https://<?= $_CONFIG["Global"]["cdn"] ?>/icns/familine-galaxy.svg">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <a class="navbar-brand" href="/">Familine Recall</a>
        <ul class="navbar-nav" style="width: 100%;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Rechercher
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/search/name">Par prénom</a>
                    <a class="dropdown-item" href="/search/lastname">Par nom</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/search/birth">Par date de naissance</a>
                    <a class="dropdown-item" href="/search/death">Par date de décès</a>
                    <a class="dropdown-item" href="/search/marriage">Par date de mariage</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/search/city">Par ville</a>
                    <a class="dropdown-item" href="/search/dept">Par département</a>
                    <a class="dropdown-item" href="/search/state">Par région</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/me">Ma famille</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/import">Importer une généalogique</a>
            </li>
        </ul>

        <span class="navbar-text" style="width:100%;text-align:right;">
            @<?= $_USER ?>
        </span>
    </nav>
    <br>
