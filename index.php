<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/private/session.php";
global $_FRENCH;

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var array $_PROFILE
 *  @var boolean $_ADMIN
 *  @var array $_CONFIG
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Familine</title>
    <link rel="icon" href="https://<?= $_CONFIG["Global"]["cdn"] ?>/favicon.svg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?= strpos($_SERVER['HTTP_USER_AGENT'], "+Familine/") !== false ? '<link rel="stylesheet" href="/native.css">' : "" ?>
    <?= strpos($_SERVER['HTTP_USER_AGENT'], "+Familine/") !== false ? '<script>$ = require(\'jquery\');jQuery = require(\'jquery\');</script>' : '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>' ?>
    <link rel="stylesheet" href="https://<?= $_CONFIG["Global"]["cdn"] ?>/styles.css">
</head>
<body>
    <div class='progress' style="display:none;" id="progress_div">
        <div class='bar' id='bar1'></div>
        <div class='percent' id='percent1'></div>
    </div>
    <input type="hidden" id="progress_width" value="0">
    <script src="/js/loading.js"></script>
    <div id="loading">
        <img src="/loader.svg" style="filter:invert(1);width:96px;">
    </div>

    <div id="explore-outer" style="margin-top: -32px;height: max-content;">
        <div id="explore">
            <div>
                <img src="/favicon.svg" width="128px" height="128px">
                <h1 style="color:white !important;font-size: 48px;">Familine</h1>
                <p style="color:white !important;"><?= l("Familine soutient la population ukrainienne.", "Familine supports people in Ukraine.") ?> <a href="/ukraine" style="color:white;"><?= l("En savoir plus.", "Learn More.") ?></a><br>
                    <?php

                    $list = array_reverse(scandir($_SERVER["DOCUMENT_ROOT"] . "/private/news"));
                    foreach ($list as $paf) {
                        if (str_ends_with($paf, ".json")) {
                            $pa = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . $paf), true);
                            if ($pa["limited"] === null || in_array($_USER, $pa["limited"])) {
                                $article = $paf;
                                $data = $pa;
                                break;
                            }
                        }
                    }

                    ?><a href="/news/<?= substr($article, 0, -5) ?>" style="color:white;"><?= l("En ce moment :", "Right Now:") ?> <?= $data["title"][l("fr", "en")] ?></a></p>
                <div id="explore-list" class="container">
                    <a href="https://docs.<?= $_CONFIG["Global"]["domain"] ?>" class="explore-btn">
                        <img src="/icns/familine-docs.svg" width="48px" height="48px" style="height:32px;width:32px;margin: 0 5px;">
                        <span><?= l("Pages", "Docs") ?></span>
                        <span class="explore-description"><?= l("Une encyclopédie de toutes les personnes de la famille", "An encyclopedia with everyone in the family") ?></span>
                    </a>
                    <a href="https://support.<?= $_CONFIG["Global"]["domain"] ?>" class="explore-btn">
                        <img src="/icns/familine-help.svg" width="48px" height="48px" style="height:32px;width:32px;margin: 0 5px;">
                        <span><?= l("Aide", "Help") ?></span>
                        <span class="explore-description"><?= l("Votre point d'accès à l'aide de Familine", "Your access point to help from Familine") ?></span>
                    </a>
                    <a href="https://media.<?= $_CONFIG["Global"]["domain"] ?>" class="explore-btn">
                        <img src="/icns/familine-media.svg" width="48px" height="48px" style="height:32px;width:32px;margin: 0 5px;">
                        <span><?= l("Média", "Media") ?></span>
                        <span class="explore-description"><?= l("Musique, photos et vidéos de la famille au même endroit", "Music, photos and videos from the family all in the same place") ?></span>
                    </a>
<!--                    <a href="https://planning.<?= $_CONFIG["Global"]["domain"] ?>" class="explore-btn">-->
<!--                        <img src="/icns/familine-planning.svg" width="48px" height="48px" style="height:32px;width:32px;margin: 0 5px;">-->
<!--                        <span>Planning</span>-->
<!--                        <span class="explore-description">Gérez vos présences et absences aux événements de Familine</span>-->
<!--                    </a>-->
                    <a href="https://genealogy.<?= $_CONFIG["Global"]["domain"] ?>" class="explore-btn">
                        <img src="/icns/familine-recall.svg" width="48px" height="48px" style="height:32px;width:32px;margin: 0 5px;">
                        <span><?= l("Généalogie", "Genealogy") ?></span>
                        <span class="explore-description"><?= l("Un accès plus simple à la généalogie", "A simpler access to genealogy") ?></span>
                    </a>
                    <a href="https://share.<?= $_CONFIG["Global"]["domain"] ?>" class="explore-btn">
                        <img src="/icns/familine-share.svg" width="48px" height="48px" style="height:32px;width:32px;margin: 0 5px;">
                        <span><?= l("Partage", "Share") ?></span>
                        <span class="explore-description"><?= l("Partagez des fichiers avec qui vous voulez", "Share files with whoever you want") ?></span>
                    </a>
                    <!-- <a href="https://chat.<?= $_CONFIG["Global"]["domain"] ?>" class="explore-btn">
                        <img src="/icns/familine-you.svg" width="48px" height="48px" style="height:32px;width:32px;margin: 0 5px;">
                        <span>Discussions</span>
                        <span class="explore-description">Communiquez de façon simple et sécurisée avec la famille</span>
                    </a> -->
                </div>
                <div style="color: white;text-align: center;margin-top: 10px;opacity: .5;font-size: 14px;">
                    <a style="color:white;display:inline-block;" href="/connect"><?= l("Connecter un appareil", "Connect device") ?> (beta)</a> · <a target="_blank" style="color:white;display:inline-block;" href="https://gitlab.minteck.org/familine"><?= l("Code source", "Source code") ?></a> · version <?= str_replace("%ea%", l("accès anticipé", "early access"), file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/version.txt")) ?>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

    <br>
    <div class="container">
        <h1><span id="home-greeting"><?= l("Bienvenue", "Welcome") ?></span> <?php $p = explode(" ", $_FULLNAME); array_shift($p); echo(implode(" ", $p)) ?></h1>
        <script>
            hours = new Date().getHours();
            switch (hours) {
                case 23:
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                    document.getElementById("home-greeting").innerText = "<?= l("Bonne nuit", "Good night") ?>";
                    break;
                case 5:
                case 6:
                case 7:
                    document.getElementById("home-greeting").innerText = "<?= l("Bon matin", "Good morning") ?>";
                    break;
                case 8:
                case 9:
                case 10:
                case 11:
                    document.getElementById("home-greeting").innerText = "<?= l("Bonne journée", "Good morning") ?>";
                    break;
                case 12:
                case 13:
                    document.getElementById("home-greeting").innerText = "<?= l("Bon appétit", "Have a good meal") ?>";
                    break;
                case 14:
                case 15:
                case 16:
                case 17:
                    document.getElementById("home-greeting").innerText = "<?= l("Bonne après-midi", "Good afternoon") ?>";
                    break;
                case 18:
                    document.getElementById("home-greeting").innerText = "<?= l("Bonne fin de journée", "Good evening") ?>";
                    break;
                case 19:
                case 20:
                    document.getElementById("home-greeting").innerText = "<?= l("Bon appétit", "Have a good meal") ?>";
                    break;
                case 21:
                case 22:
                    document.getElementById("home-greeting").innerText = "<?= l("Bonne soirée", "Good evening") ?>";
                    break;
            }
        </script>
        <br>
        <?php foreach (array_reverse(scandir($_SERVER["DOCUMENT_ROOT"] . "/private/news")) as $article): if (str_ends_with($article, ".json")): ?>
        <?php $data = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . $article), true);

        if (!$_FRENCH && file_exists($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . substr($article, 0, -5) . ".en.html")) {
            $html = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . substr($article, 0, -5) . ".en.html");
        } else {
            $html = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . substr($article, 0, -5) . ".html");
        }

        $summary = trim(explode("<!---->", $html)[0]);
        $full = trim($html);
        ?>
        <?php if ($data["limited"] === null || in_array($_USER, $data["limited"])): ?>
        <div class="jumbotron">
            <h5><?= $data["date"][l("fr","en")] ?></h5>
            <h3><?= $data["title"][l("fr","en")] ?></h3>
            <p><?= $summary ?></p>
            <a class="news-link" href="/news/<?= substr($article, 0, -5) ?>"><?= l("En lire plus...", "Read more...") ?></a>
        </div>
        <?php endif; endif; endforeach; ?>

    </div>

    <br>

    <script src="/js/iframe.js"></script>
    <script src="/js/navigation.js"></script>
    <script src="/js/statusbar.js"></script>
    <style>
        summary { display: none; }
    </style>
</body>
</html>
