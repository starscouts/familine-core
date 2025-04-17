<?php
/*
 * MIT License
 *
 * Copyright (c) 2022- Minteck
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */


require_once $_SERVER['DOCUMENT_ROOT'] . "/private/session.php";
global $_FRENCH;

/** @var string $_FULLNAME
 * @var string $_USER
 * @var string $_SUID
 * @var array $_PROFILE
 */

if (isset($_GET['a'])) {
    if (!str_contains($_GET['a'], "/") && !str_contains($_GET['a'], ".")) {
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . $_GET['a'] . ".json")) {
            $data = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . $_GET['a'] . ".json"), true);

            if (!$_FRENCH && file_exists($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . $_GET['a'] . ".en.html")) {
                $html = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . $_GET['a'] . ".en.html");
            } else {
                $html = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/news/" . $_GET['a'] . ".html");
            }

            $summary = trim(explode("<!---->", $html)[0]);
            $full = trim($html);
            if (!($data["limited"] === null || in_array($_USER, $data["limited"]))) {
                header("Location: /");
                die();
            }
        } else {
            header("Location: /");
            die();
        }
    } else {
        header("Location: /");
        die();
    }
} else {
    header("Location: /");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data["title"] ?> - Familine</title>
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
    <h1><?= $data["title"][l("fr", "en")] ?></h1>
    <h3><?= $data["date"][l("fr", "en")] ?></h3>
    <?= $full ?>
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