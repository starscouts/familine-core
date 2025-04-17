<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/private/session-noconf.php";

/** @var string $_FULLNAME
 *  @var string $_USER
 *  @var array $_PROFILE
 *  @var boolean $_ADMIN
 *  @var array $_CONFIG
 */

global $_WELCOMED;
if (!file_exists("/mnt/familine/private/welcomed.json")) {
    file_put_contents("/mnt/familine/private/welcomed.json", "[]");
}
$_WELCOMED = json_decode(file_get_contents("/mnt/familine/private/welcomed.json"), true);

$_WELCOMED[] = $_USER;
file_put_contents("/mnt/familine/private/welcomed.json", json_encode($_WELCOMED));

if (!isset($_GET['r'])) { $_GET['r'] = "/"; }
header("Location: " . $_GET['r']);
die();