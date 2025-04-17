<?php

$_CONFIG = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/private/FamilineConfig.json"), true);

header("Location: https://session." . $_CONFIG["Global"]["domain"] . "/login/embed/?r=" . $_GET['r']);
die();
