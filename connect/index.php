<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/private/session.php";

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
    <title>Connecter un appareil - Familine</title>
    <link rel="icon" href="https://familine.minteck.org/icns/familine.svg">
    <link rel="stylesheet" href="https://familine.minteck.org/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:30px;">
    <h1>Connecter un appareil</h1>
    <p class="text-danger"><b>ATTENTION :</b> Assurez-vous que le code que vous entrez provient bien d'un appareil qui vous appartient, car valider la connexion donnera accès à cet appareil à l'entièreté de votre compte Familine. <u>Familine ne vous demandera <b>jamais</b> d'entrer un code sur cette page.</u></p>
    <div id="error" class="alert alert-danger" style="filter: invert(1) hue-rotate(180deg); display: none;"><b>Hmmm... cela n'a pas fonctionné.</b> Assurez-vous que le code que vous avez entré est correct et qu'il est toujours valide.</div>
    <input id="input" maxlength="7" onkeydown="code();" onkeyup="code();" onchange="code();" onkeypress="code();" type="text" class="form-control" style="filter: invert(1) hue-rotate(180deg); width: 10ch; text-align: center; margin-left: auto; margin-right: auto; font-family: monospace !important; font-size: 2rem;" placeholder="Entrez les 7 caractères">
</div>
<script>
    function code() {
        let input = document.getElementById("input");
        let value = input.value;

        input.value = value.toUpperCase();

        if (input.value.length === 7 && input.value.match(/[^1-9A-Z]*/gm) !== null) {
            input.disabled = true;
        }
    }

    console.log("Injecting Familine header")
    document.body.innerHTML = document.body.innerHTML + "<iframe style=\"position:fixed;left:0;right:0;top:0;border: none;width: 100%;height:32px;\" src=\"https://<?= /** @var array $_CONFIG */
        $_CONFIG["Global"]["cdn"] ?>/statusbar.php\"></iframe>";
    document.getElementsByTagName("html")[0].style.marginTop = "32px";
    document.getElementsByTagName("html")[0].style.height = "calc(100vh - 32px)";
</script>
<style>
    #input::placeholder {
        font-family: "Nunito", sans-serif !important;
        font-size: 1rem;
    }
</style>
</body>
</html>