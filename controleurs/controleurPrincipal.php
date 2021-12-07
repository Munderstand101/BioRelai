<?php

$messageErreurConnexion= "";

if (!isset($_SESSION['controleurBioN1']))
{
    $_SESSION['controleurBioN1']="visiteurs";
}


if(isset($_POST['submitConnex']) )
{
    $_SESSION['identification'] = UtilisateurDAO::verification($_POST['mail'], $_POST['mdp']);

    $_SESSION['controleurBioN1']= $_SESSION['identification']['statut'];


    if(!$_SESSION['identification'])
    {
        $_SESSION['controleurBioN1']="connexion";
        $_SESSION['identification'] = [];
        $messageErreurConnexion = 'Login ou mot de passe invalide.';
    }
}

//bio
else if(isset($_GET['bio']) && $_GET['bio']=='connexion'){
    $_SESSION['identification']['statut'] = "visiteurs";
    $_SESSION['controleurBioN1']="connexion";
}

else if(isset($_GET['bio']) && $_GET['bio']=='inscription'){
    $_SESSION['identification']['statut'] = "visiteurs";
    $_SESSION['controleurBioN1']="inscription";
}

else if(isset($_GET['bio']) && $_GET['bio']=='deconnexion'){
    $_SESSION['identification']['statut'] = "visiteurs";
    $_SESSION['controleurBioN1']="visiteurs";
}

//menuAdherents
else if(isset($_GET['menuAdherents']) && $_GET['menuAdherents']=='Achats'){
    $_SESSION['controleurBioN1']="AdherentsAchats";
}

else if(isset($_GET['menuAdherents']) && $_GET['menuAdherents']=='Factures'){
    $_SESSION['controleurBioN1']="AdherentsFactures";
}

else if(isset($_GET['menuAdherents']) && $_GET['menuAdherents']=='Panier'){
    $_SESSION['controleurBioN1']="AdherentsPanier";

}
else if(isset($_GET['menuAdherents']) && $_GET['menuAdherents']=='MonCompte'){
    $_SESSION['controleurBioN1']="MonCompte";
}
else if(isset($_GET['menuAdherents']) && $_GET['menuAdherents']=='deconnexion'){
    $_SESSION['identification']['statut'] = "visiteurs";
    $_SESSION['controleurBioN1']="visiteurs";
}

//menuProducteurs
else if(isset($_GET['menuProducteurs']) && $_GET['menuProducteurs']=='Factures'){
    $_SESSION['controleurBioN1']="ProducteursFactures";
}

else if(isset($_GET['menuProducteurs']) && $_GET['menuProducteurs']=='Produits'){
    $_SESSION['controleurBioN1']="ProducteursProduits";
}

else if(isset($_GET['menuProducteurs']) && $_GET['menuProducteurs']=='Ventes'){
    $_SESSION['controleurBioN1']="ProducteursVentes";
}

else if(isset($_GET['menuProducteurs']) && $_GET['menuProducteurs']=='MonCompte'){
    $_SESSION['controleurBioN1']="MonCompte";
}
else if(isset($_GET['menuProducteurs']) && $_GET['menuProducteurs']=='deconnexion'){
    $_SESSION['identification']['statut'] = "visiteurs";
    $_SESSION['controleurBioN1']="visiteurs";
}



elseif (!isset( $_SESSION['identification'] )){
    $_SESSION['identification']['statut'] = "visiteurs";
    $_SESSION['controleurBioN1']="visiteurs";
}


include_once dispatcher::dispatch($_SESSION['controleurBioN1']);