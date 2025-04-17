<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/../session.php";

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var string $_SUID
 *  @var array $_PROFILE
 *  @var boolean $_ADMIN
 */

if (!$_ADMIN) {

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Familine Planning</title>
    <link rel="icon" href="https://familine.minteck.org/icns/familine-planning.svg">
    <link rel="stylesheet" href="https://familine.minteck.org/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#ffffff !important;">
<iframe src="https://planning.<?= /** @var array $_CONFIG */
$_CONFIG["Global"]["domain"] ?>/hp/etudiant" style="
    border: none;
    background-color: #ffffff;
    position: fixed;
    top: 32px;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: calc(100vh - 32px);
"></iframe>
<script>
    console.log("Injecting Familine header")
    document.body.innerHTML = document.body.innerHTML + "<iframe style=\"position:fixed;left:0;right:0;top:0;border: none;width: 100%;height:32px;\" src=\"https://<?= /** @var array $_CONFIG */
        $_CONFIG["Global"]["cdn"] ?>/statusbar.php\"></iframe>";
    document.getElementsByTagName("html")[0].style.marginTop = "32px";
    document.getElementsByTagName("html")[0].style.height = "calc(100vh - 32px)";

function tt(orig, newt) {
    document.getElementsByTagName('iframe')[0].contentDocument.querySelector("#breadcrumbBandeau.titre-onglet[aria-label=\"" + orig + "\"]").innerText = newt;
    document.getElementsByTagName('iframe')[0].contentDocument.querySelector("h3.fil-ariane").style.display = "none";
}

function te(orig, newt) {
    document.getElementsByTagName('iframe')[0].contentDocument.querySelector(".Texte10.Gras.AlignementMilieu").innerText = document.getElementsByTagName('iframe')[0].contentDocument.querySelector(".Texte10.Gras.AlignementMilieu").innerText.replaceAll(orig, newt);
}

function tmt(orig, newt) {
    Array.from(document.getElementsByTagName("iframe")[0].contentDocument.querySelectorAll(".Texte12")).forEach((e) => { if (e.innerText === orig) { e.innerText = newt; } });
    Array.from(document.getElementsByTagName("iframe")[0].contentDocument.querySelectorAll(".collection-item.with-action")).forEach((e) => { if (e.innerText === orig) { e.innerHTML = "<span>" + newt + "</span>"; } });
    if (document.getElementsByTagName("iframe")[0].contentDocument.getElementById("GInterface.Instances[2]_Titre").children[1].innerText === orig) { document.getElementsByTagName("iframe")[0].contentDocument.getElementById("GInterface.Instances[2]_Titre").children[1].innerHTML = "<span>" + newt + "</span>"; };
}

function tme(orig, newt) {
    if (document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".card-content").innerText === orig) { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".card-content").innerText = newt; }
}

function tmh(orig, newt) {
    document.getElementsByTagName("iframe")[0].contentDocument.querySelectorAll("span.as-header.collapsible-header").forEach((e) => { if (e.innerText === orig) { e.innerText = newt; } });
}

injectedVer = false;

setInterval(() => {

try {
    ver = document.getElementsByTagName("iframe")[0].contentDocument.getElementsByClassName("ibe_logo")[0].children[0].title.split("-")[0].split(" ")[1].trim() + "." + document.getElementsByTagName("iframe")[0].contentDocument.getElementsByClassName("ibe_logo")[0].children[0].title.split("-")[1].trim();
    document.getElementsByTagName("iframe")[0].contentDocument.getElementsByClassName("ibe_logo")[0].children[0].style.display = "none";
    if (!injectedVer) document.getElementsByTagName("iframe")[0].contentDocument.getElementsByClassName("ibe_logo")[0].children[0].outerHTML = document.getElementsByTagName("iframe")[0].contentDocument.getElementsByClassName("ibe_logo")[0].children[0].outerHTML + "v" + ver + "&nbsp;&nbsp;";
    injectedVer = true;
} catch (e) {}

try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Combo0").innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Événements</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau0").children[0].children[2].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Événements annulés</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau0").children[0].children[1].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Récapitulatif des événements</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Combo2").innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Vie familiale</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau2").children[0].children[1].style.display = "none"; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau2").children[0].children[2].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Statut familial</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau2").children[0].children[3].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Calendrier familial</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Combo3").innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Progrès</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau3").children[0].children[0].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Évaluation des progrès</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau3").children[0].children[2].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Tâches à réaliser</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau3").children[0].children[3].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Ressources familiales</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau3").children[0].children[4].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Travaux surveillés</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau4").children[0].children[1].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Récapitulatif des événements</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Combo4").innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Organisateurs</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Combo5").innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Groupes</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Combo6").innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Membres</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau5").children[0].children[2].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Événements annulés</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau5").children[0].children[1].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Récapitulatif des événements</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau6").children[0].children[2].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Événements annulés</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[0].Instances[1]_Liste_niveau6").children[0].children[1].innerHTML = '<div class="label-menu-container"><span role="presentation" class="label-submenu">Récapitulatif des événements</span></div>'; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[1]").children[0].children[2].children[1].children[0].children[1].children[1].style.display = "none"; } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.getElementById("GInterface.Instances[1]").children[0].children[2].style.display = "none"; } catch (e) {}
try { tt("Récapitulatif des cours", "Récapitulatif des événements"); } catch (e) {}
try { tt("Cours annulés", "Événements annulés"); } catch (e) {}
try { tt("Calendrier scolaire", "Calendrier familial") } catch (e) {}
try { tt("Evaluation des cours", "Évaluation des progrès") } catch (e) {}
try { tt("Travail à faire", "Tâches à réaliser") } catch (e) {}
try { tt("Ressources pédagogiques", "Ressources familiales") } catch (e) {}
try { tt("Devoirs surveillés", "Travaux surveillés") } catch (e) {}
try { tt("Scolarité", "Statut familial") } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".taf header h3 span").innerText = "Tâches à faire" } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".ressourcespedagogiques header h3 span").innerText = "Dernières ressources familiales" } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".no-events[aria-label=\"Aucun travail à faire dans les 7 prochains jours\"] p").innerText = "Aucune tâche à faire dans les 7 prochains jours"; } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".no-events[aria-label=\"Aucune ressource pédagogique\"] p").innerText = "Aucune ressource familiale"; } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".footer-wrapper").style.display = "none"; } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".stopwith-footer").classList.remove("stopwith-footer"); } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".coursannules header h3 span").innerText = "Prochains événements annulés" } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".edt header h3 span").innerText = "3 prochains événements" } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".no-events[aria-label=\"Aucun cours annulé dans les 7 prochains jours\"] p").innerText = "Aucun événement annulé dans les 7 prochains jours"; } catch (e) {}
try { te("Il n'y a aucun cours", "Il n'y a aucun événement"); } catch (e) {}
try { te("Aucun cours annulé sur la période", "Aucun événement annulé sur la période") } catch (e) {}
try { te("Aucun travail à faire n'a été saisi", "Aucune tâche à faire n'a été saisie") } catch (e) {}
try { te("Aucune ressource pédagogique", "Aucune ressource familiale") } catch (e) {}
try { te("Sélectionnez une promotion", "Sélectionnez un groupe") } catch (e) {}
try { te("Sélectionnez un enseignant", "Sélectionnez un organisateur") } catch (e) {}
try { te("Sélectionnez un étudiant", "Sélectionnez un membre") } catch (e) {}
try { Array.from(document.getElementsByClassName("iecb")).forEach((e) => {console.log(e.children[2].innerText = e.children[2].innerText.replaceAll("matière", "catégorie"));}) } catch (e) {}
try { document.getElementsByTagName('iframe')[0].contentDocument.querySelectorAll("#GInterface\\.Instances\\[1\\] > .BorderBox.Table > div > div > div > .EspaceGauche.EspaceHaut.Gras")[1].innerText = "Détail par catégorie"; } catch (e) {}
try { Array.from(document.getElementsByTagName('iframe')[0].contentDocument.querySelectorAll(".ie-ellipsis")).forEach((e) => { e.innerText = e.innerText.replaceAll("matière", "catégorie").replaceAll("Matière", "Catégorie").replaceAll("C. Manqués", "É. Manqués"); }); } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".smartbanner-container.smartbanner-show").style.display = "none"; } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".floating-btn-position.v-bottom").style.display = "none"; } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.querySelector(".widget.retourespace").outerHTML = ""; } catch (e) {}
try { tmt("Calendrier scolaire", "Calendrier familial") } catch (e) {}
try { tmt("Contenu des cours", "Contenu des événements") } catch (e) {}
try { tmt("Cours annulés", "Événements annulés") } catch (e) {}
try { tmt("Emploi du temps", "Programme") } catch (e) {}
try { tmt("Travail à faire", "Tâches à faire") } catch (e) {}
try { tmt("Evaluation des cours", "Évaluation des événements") } catch (e) {}
try { tmt("Devoirs surveillés", "Travaux surveillés") } catch (e) {}
try { tmt("Récapitulatif des cours", "Récapitulatif des événements") } catch (e) {}
try { tme("Aucun cours annulé", "Aucun événement annulé") } catch (e) {}
try { tme("Aucun travail à faire saisi", "Aucune tâche à faire saisie") } catch (e) {}
try { tme("Aucun devoir pour la période sélectionnée", "Aucun travail noté pour la période sélectionnée") } catch (e) {}
try { tme("Aucune note n'a été saisie pour cet étudiant sur la période sélectionnée", "Aucune note n'a été saisie pour ce membre sur la période sélectionnée") } catch (e) {}
try { tme("Aucun devoir surveillé", "Aucun travail surveillé") } catch (e) {}
try { tmh("Cours", "Événements") } catch (e) {}
try { tmh("Résultats", "Notes") } catch (e) {}
try { tmh("Vie scolaire", "Vie familiale") } catch (e) {}
try { tmh("Enseignements", "Contenus") } catch (e) {}
try { if (document.getElementsByTagName("iframe")[0].contentDocument.getElementById("GInterface.Instances[0].Instances[0]").children[1].classList.contains("conteneur-options")) { document.getElementsByTagName("iframe")[0].contentDocument.getElementById("GInterface.Instances[0].Instances[0]").children[1].style.display = "none"; }; } catch (e) {}
try { if (document.getElementsByTagName("iframe")[0].contentDocument.getElementById("GInterface.Instances[0].Instances[0]").children[0].classList.contains("conteneur-options")) { document.getElementsByTagName("iframe")[0].contentDocument.getElementById("GInterface.Instances[0].Instances[0]").children[0].style.display = "none"; }; } catch (e) {}
try { document.getElementsByTagName("iframe")[0].contentDocument.getElementsByClassName("footer-mobile")[0].outerHTML = ""; } catch (e) {}

}, 10)

</script>
</body>
</html>
