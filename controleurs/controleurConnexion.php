<?php


    $formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerTitre("",'Je me connecte'));
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Identifiant :'));
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('mail', 'mail', '', 1, 'Entrez votre identifiant', ''));
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Mot de Passe :'));
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerTitre("",'Première visite'));
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->creerFormulaire();

    $menuDInscription= new Menu("demandeInscription");
    $menuDInscription->ajouterComposant($menuDInscription->creerItemLien("Créer un compte", "inscription"));
    $menuDInscription->creerMenu("",'bio');

    $menuFInscription= new Menu("fermerConnexion");
    $menuFInscription->ajouterComposant($menuFInscription->creerItemLien('<img src="images/fermer.png">', "deconnexion"));
    //$menuFInscription->ajouterComposant($menuFInscription->creerItemImage("", "images/fermer.png", ""));
    $menuFInscription->creerMenu("",'bio');


    require_once 'vues/visiteurs/vueConnexion.php';


