<?php
unset($_COOKIE['authentification']);
setcookie("authentification", "", time()-3600, "/");
header('Location: index.php'); 
?>


