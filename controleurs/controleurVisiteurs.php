<?php
//Bouton connexion
$menuConnecttion= new Menu("btnConnexion");
$menuConnecttion->ajouterComposant($menuConnecttion->creerItemLien("connexion", "connexion"));
$menuConnecttion->ajouterComposant($menuConnecttion->creerItemLien("inscription", "inscription"));
$menuConnecttion->creerMenu("",'bio');

require_once 'vues/visiteurs/vueVisiteur.php';