<?php

$page = htmlspecialchars(strtoupper(str_replace(".php", "", basename($_SERVER['PHP_SELF']))));
if($page==="INDEX")
	$page = "<span class=\"glyphicon glyphicon-home\"></span>";

echo "<nav class=\"navbar navbar-default navbar-fixed-top\">\n"; 
echo "  <div class=\"container-fluid\">\n"; 
echo "    <div class=\"navbar-header\">\n"; 
echo "      <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">\n"; 
echo "        <span class=\"icon-bar\"></span>\n"; 
echo "        <span class=\"icon-bar\"></span>\n"; 
echo "        <span class=\"icon-bar\"></span>                        \n"; 
echo "      </button>\n"; 
echo "      <span class=\"navbar-brand\">$page</span>\n"; 
echo "    </div>\n"; 
echo "    <div class=\"collapse navbar-collapse\" id=\"myNavbar\">\n"; 
echo "      <ul class=\"nav navbar-nav navbar-right\">\n"; 
echo "        <li><a href=\"index.php\"><span class=\"glyphicon glyphicon-home\"></span></a></li>\n"; 
echo "		<li class=\"dropdown\">\n"; 
if(!isset($_COOKIE["authentification"])) {
	echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-user\"></span>CONNEXION\n"; 
	echo "          <span class=\"caret\"></span></a>\n"; 
	echo "          <ul class=\"dropdown-menu\">\n"; 
	echo "            <li><a href=\"connexion.html\">Connexion</a></li>\n"; 
	echo "            <li><a href=\"inscription.html\">Inscription</a></li>\n"; 
	echo "          </ul>\n"; 
}  else {
	echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-user\"></span>".$_COOKIE["NomUtil"]."\n"; 
	echo "          <span class=\"caret\"></span></a>\n"; 
	echo "          <ul class=\"dropdown-menu\">\n"; 
	echo "            <li><a href=\"panier.php\">Mon panier</a></li>\n"; 
	echo "            <li><a href=\"deconnexion.php\">Déconnexion</a></li>\n"; 
	echo "          </ul>\n"; 	
}
echo "        </li>\n"; 
echo "		<li class=\"dropdown\">\n"; 
echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-shopping-cart\"></span>PRODUITS\n"; 
echo "          <span class=\"caret\"></span></a>\n"; 
echo "          <ul class=\"dropdown-menu\">\n"; 
echo "            <li><a href=\"produits.php\">Produits</a></li>\n"; 
echo "            <li><a href=\"index.php#contact\">Contact</a></li>\n"; 
echo "          </ul>\n"; 
echo "        </li>\n"; 
echo "        <li class=\"dropdown\">\n"; 
echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-flag\"></span>LANGUE\n"; 
echo "          <span class=\"caret\"></span></a>\n"; 
echo "          <ul class=\"dropdown-menu\">\n"; 
echo "            <li><a href=\"#\">Anglais</a></li>\n"; 
echo "            <li><a href=\"#\">Français</a></li>\n"; 
echo "          </ul>\n"; 
echo "        </li>\n"; 
echo "        <li class=\"dropdown\">\n"; 
echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">INFO\n"; 
echo "          <span class=\"caret\"></span></a>\n"; 
echo "          <ul class=\"dropdown-menu\">\n"; 
echo "            <li><a href=\"sites.php\">Liste des sites</a></li>\n"; 
echo "            <li><a href=\"dictionnaire.php\">Dictionnaire financier</a></li>\n"; 
echo "          </ul>\n"; 
echo "        </li>\n"; 
echo "        <li><a href=\"#\"><span class=\"glyphicon glyphicon-search\"></span></a></li>\n"; 
echo "      </ul>\n"; 
echo "    </div>\n"; 
echo "  </div>\n"; 
echo "</nav>\n"; 

?>