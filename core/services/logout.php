<?php
$_SESSION['token'] = ""; // Remove a variável 'token' da sessão

// Destrua a sessão completamente
session_unset();
session_destroy();
session_write_close();

// Limpe o cookie da sessão
setcookie(session_name(), '',  0, '/');

header("Location: " . "../../index.php");
exit;
