<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/private/session-noconf.php"; global $_FRENCH;

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var array $_PROFILE
 *  @var boolean $_ADMIN
 *  @var array $_CONFIG
 */

if (!$_FRENCH) {
    header("Location: /welcome/confirm/" .  isset($_GET['r']) ? "?r=" . urlencode($_GET['r']) : "?r=/") and die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue sur Familine</title>
    <link rel="icon" href="/app/cdn/favicon.svg">
    <link rel="stylesheet" href="/app/cdn/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?= strpos($_SERVER['HTTP_USER_AGENT'], "+Familine/") !== false ? '<link rel="stylesheet" href="/native.css">' : "" ?>
    <?= strpos($_SERVER['HTTP_USER_AGENT'], "+Familine/") !== false ? '<script>$ = require(\'jquery\');jQuery = require(\'jquery\');</script>' : '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>' ?>
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

    <div class="container" style="text-align: center;">
        <br><br>
        <h1>Bienvenue <?php $p = explode(" ", $_FULLNAME); array_shift($p); echo(implode(" ", $p)) ?> !</h1>
        <h3>Vous y êtes enfin ! Bienvenue sur Familine !</h3>
        <hr>
        <h5>Familine, c'est une multitude de services qui vous attend</h5>
        <img class="welcome-intro-img" src="/icns/familine-docs.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Pages">
        <img class="welcome-intro-img" src="/icns/familine-help.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Aide">
        <img class="welcome-intro-img" src="/icns/familine-movies.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Films">
        <img class="welcome-intro-img" src="/icns/familine-photos.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Photos">
        <img class="welcome-intro-img" src="/icns/familine-planning.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Planning">
        <img class="welcome-intro-img" src="/icns/familine-recall.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Généalogie">
        <img class="welcome-intro-img" src="/icns/familine-share.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Partage">
        <img class="welcome-intro-img" src="/icns/familine-you.png" style="width:64px;filter:contrast(0) brightness(0%);" alt="Discussions">
        <p>Pages · Aide · Films · Photos · Planning · Généalogie · Partage · Discussions</p>
        <br>
    </div>

    <div class="welcome-box-0 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div>
                    <h2>Un compte... tout Familine</h2>
                    <p>Avec seulement votre compte Familine, vous avez accès à une multitude de services tous interconnectés les uns avec les autres.</p>
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div>
                    <img id="01-account" alt="" src="01-account-dark.svg" style="width:100%;">
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-1 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div>
                    <img id="02-privacy" alt="" src="02-privacy-dark.svg" style="width:100%;">
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div>
                    <h2>Une sécurité sur tous les points</h2>
                    <p>Ce qui est dans la famille doit le rester. Aucune des données présentes sur Familine n'est accessible au public, l'utilisation d'un compte est obligatoire.</p>
                    <p>De plus, certaines données strictement personnelles sont accessibles par vous et seulement par vous.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-2 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div>
                    <h2>N'importe où, n'importe quand</h2>
                    <p>Où que vous vous trouvez dans le monde, depuis n'importe quel appareil, et à n'importe quelle heure de la journée, Familine reste accessible pour vous et toute la famille.</p>
                    <p class="text-muted small">(Familine n'est pas accessible en Chine)</p>
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div>
                    <img id="03-devices" alt="" src="03-devices-dark.svg" style="width:100%;">
                </div>
            </div>
        </div>
    </div>

    <div style="text-align:center;">
        <br>
        <h3>Ce n'est pas tout ...</h3>
        <h5>Voici ce qui vous attend sur Familine</h5>
        <br>
    </div>

    <div class="welcome-box-3 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div>
                    <img id="04-app-docs" class="screenshot" alt="" src="04-app-docs-dark.jpg" style="width:100%;">
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Pages</h2>
                    <p>En quelques clics, vous accédez à des centaines d'informations concernant les membres de notre famille, écrites par notre famille pour notre famille.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-4 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Aide</h2>
                    <p>Vous obtenez de l'aide facilement et rapidement et pouvez même contacter un technicien au besoin ; vous ne serez jamais laissé à l'abandon.</p>
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div>
                    <img id="05-app-help" class="screenshot" alt="" src="05-app-help-dark.jpg" style="width:100%;">
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-5 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div>
                    <img id="06-app-movies" class="screenshot" alt="" src="06-app-movies-dark.jpg" style="width:100%;">
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Films</h2>
                    <p>La famille produit des films depuis des années, et vous pouvez désormais les regarder en ligne, même sans le support original.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-6 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Photos</h2>
                    <p>La photo est un moyen d'expression vivant et actif. Familine vous propose de consulter une énorme galerie de photos de grande qualité.</p>
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div>
                    <img id="07-app-photos" class="screenshot" alt="" src="07-app-photos-dark.jpg" style="width:100%;">
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-7 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div>
                    <img id="08-app-planning" class="screenshot" alt="" src="08-app-planning-dark.jpg" style="width:100%;">
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Planning</h2>
                    <p>Organiser des événements et garder la trace des invités peut parfois être difficile. Familine rend ça plus facile, et vous permet aussi d'être à l'heure sur votre programme.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-8 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Généalogie</h2>
                    <p>Un énorme travail de généalogie a été effectué par la famille, et Familine le met maintenant à disposition de toute la famille. Consultez facilement et rapidement des informations sur vos ancêtres.</p>
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div>
                    <img id="09-app-recall" class="screenshot" alt="" src="09-app-recall-dark.jpg" style="width:100%;">
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-9 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div>
                    <img id="10-app-share" class="screenshot" alt="" src="10-app-share-dark.jpg" style="width:100%;">
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Partage</h2>
                    <p>Partager des fichiers s'avère complexe, n'est-ce pas ? Familine rend ça facile, rapide et sécurisé, que vous vouliez partager avec des membres de la famille ou avec d'autres personnes.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-box-10 welcome-box">
        <div class="container welcome-box-container">
            <div class="welcome-box-container--inner">
                <div class="welcome-box-app">
                    <h2>Discussions</h2>
                    <p>Discuter avec un membre de la famille dont nous n'avons aucun contact peut être compliqué. Familine vous propose de communiquer avec tous les utilisateurs dans un endroit centralisé.</p>
                </div>
            </div>
            <div class="welcome-box-container--inner">
                <div>
                    <img id="11-app-yikes" class="screenshot" alt="" src="11-app-yikes-dark.jpg" style="width:100%;">
                </div>
            </div>
        </div>
    </div>

    <div style="text-align:center;">
        <br>
        <h3>Alors ?</h3>
        <h5>Prêt à commencer l'aventure ?</h5>
        <a href="/welcome/confirm/<?= isset($_GET['r']) ? "?r=" . urlencode($_GET['r']) : "?r=/" ?>" type="button" class="btn btn-success">Continuer vers l'accueil de Familine</a>
        <p style="margin-top:5px;" class="small text-muted">En continuant, vous certifiez avoir lu et accepté les <a href="https://minteck.org/legal/#/terms" target="_blank">conditions générales d'utilisation</a> ainsi que la <a href="https://minteck.org/legal/#/privacy" target="_blank">politique de confidentialité</a>.</p>
        <br>
    </div>

    <script src="/js/iframe.js"></script>
    <script src="/js/navigation.js"></script>

    <style>
        .welcome-box-container {
            display: grid;
            grid-template-columns: 50% 50%;
        }

        .welcome-box-container .welcome-box-container--inner {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .welcome-box-container .welcome-box-container--inner > div {
            width: 100%;
        }

        .welcome-box {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .welcome-box-app {
            text-align: center;
            padding: 10px;
        }

        .screenshot {
            border-radius: 5px;
            box-shadow: 5px 8px 11px 2px rgba(0, 0, 0, 30%);
        }

        .welcome-box-0 {
            background-color: rgba(0, 0, 0, .25);
        }

        .welcome-box-1 {
            background-color: rgba(0, 0, 0, .17);
        }

        .welcome-box-2 {
            background-color: rgba(0, 0, 0, .09);
        }

        .welcome-box-3 {
            background-color: rgba(236, 88, 58, 25%);
        }

        .welcome-box-4 {
            background-color: rgba(234, 111, 58, 25%);
        }

        .welcome-box-5 {
            background-color: rgba(236, 206, 59, 25%);
        }

        .welcome-box-6 {
            background-color: rgba(59, 239, 59, 25%);
        }

        .welcome-box-7 {
            background-color: rgba(58, 233, 109, 25%);
        }

        .welcome-box-8 {
            background-color: rgba(53, 183, 255, 25%);
        }

        .welcome-box-9 {
            background-color: rgba(149, 59, 239, 25%);
        }

        .welcome-box-10 {
            background-color: rgba(237, 59, 211, 25%);
        }

        @media (prefers-color-scheme: dark) {
            .welcome-box-0 {
                background-color: rgba(128, 128, 128, .25);
            }

            .welcome-box-1 {
                background-color: rgba(128, 128, 128, .17);
            }

            .welcome-box-2 {
                background-color: rgba(128, 128, 128, .09);
            }

            .welcome-intro-img {
                filter: contrast(0) brightness(200%) !important;
            }
        }

        @media (max-width: 700px) {
            .welcome-box-container {
                grid-template-columns: 1fr !important;
            }
        }
    </style>

    <script>
        function dark() {
            return window.matchMedia("(prefers-color-scheme: dark)").matches;
        }

        setInterval(() => {
            if (dark()) {
                document.getElementById("01-account").src = "01-account-dark.svg";
                document.getElementById("02-privacy").src = "02-privacy-dark.svg";
                document.getElementById("03-devices").src = "03-devices-dark.svg";
                document.getElementById("04-app-docs").src = "04-app-docs-dark.jpg";
                document.getElementById("05-app-help").src = "05-app-help-dark.jpg";
                document.getElementById("06-app-movies").src = "06-app-movies-dark.jpg";
                document.getElementById("07-app-photos").src = "07-app-photos-dark.jpg";
                document.getElementById("08-app-planning").src = "08-app-planning-dark.jpg";
                document.getElementById("09-app-recall").src = "09-app-recall-dark.jpg";
                document.getElementById("10-app-share").src = "10-app-share-dark.jpg";
                document.getElementById("11-app-yikes").src = "11-app-yikes-dark.jpg";
            } else {
                document.getElementById("01-account").src = "01-account-light.svg";
                document.getElementById("02-privacy").src = "02-privacy-light.svg";
                document.getElementById("03-devices").src = "03-devices-light.svg";
                document.getElementById("04-app-docs").src = "04-app-docs-light.jpg";
                document.getElementById("05-app-help").src = "05-app-help-light.jpg";
                document.getElementById("06-app-movies").src = "06-app-movies-light.jpg";
                document.getElementById("07-app-photos").src = "07-app-photos-light.jpg";
                document.getElementById("08-app-planning").src = "08-app-planning-light.jpg";
                document.getElementById("09-app-recall").src = "09-app-recall-light.jpg";
                document.getElementById("10-app-share").src = "10-app-share-light.jpg";
                document.getElementById("11-app-yikes").src = "11-app-yikes-light.jpg";
            }
        }, 100)
    </script>
</body>
</html>
