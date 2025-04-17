<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/../session.php";

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var string $_SUID
 *  @var array $_PROFILE
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Familine Média</title>
    <link rel="icon" href="https://familine.minteck.org/icns/familine-media.svg">
    <link rel="stylesheet" href="https://familine.minteck.org/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:30px;">
        <h1>Familine Média</h1>
        <p>Écoutez de la musique, visionnez des photos et regardez vos films familiaux préférés grâce à la suite Familine Média.</p>
        <div class="list-group">
            <a href="https://cinema.familine.minteck.org" class="list-group-item list-group-item-action">
                <img src="https://familine.minteck.org/icns/familine-movies.svg" style="width:32px;vertical-align: middle;"> <span style="vertical-align: middle;">Films</span>
            </a>
            <a href="https://music.familine.minteck.org" class="list-group-item list-group-item-action">
                <img src="https://familine.minteck.org/icns/familine-music.svg" style="width:32px;vertical-align: middle;"> <span style="vertical-align: middle;">Musique</span>
            </a>
            <a href="https://photos.familine.minteck.org" class="list-group-item list-group-item-action">
                <img src="https://familine.minteck.org/icns/familine-photos.svg" style="width:32px;vertical-align: middle;"> <span style="vertical-align: middle;">Photos</span>
            </a>
        </div>
    </div>
    <script>
        console.log("Injecting Familine header")
        document.body.innerHTML = document.body.innerHTML + "<iframe style=\"position:fixed;left:0;right:0;top:0;border: none;width: 100%;height:32px;\" src=\"https://<?= /** @var array $_CONFIG */
            $_CONFIG["Global"]["cdn"] ?>/statusbar.php\"></iframe>";
        document.getElementsByTagName("html")[0].style.marginTop = "32px";
        document.getElementsByTagName("html")[0].style.height = "calc(100vh - 32px)";
    </script>
</body>
</html>