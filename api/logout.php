<?php
require_once 'config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}
session_destroy();
header('Location: ../index.html');
exit;
?>