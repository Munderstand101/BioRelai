<?php

if(isset($_POST['submitCreerCompte']) )
{
    if ($_POST['mail'] == $_POST['confMail'])
    {
        UtilisateurDAO::creerUnCompte($_POST['prenom'],$_POST['nom'],$_POST['mail'], $_POST['mdp']);
        $_SESSION['controleurBioN1']="ConfirmationInscription";
        $_SESSION['identification'] = [];
    }
    else
    {
        $_SESSION['controleurBioN1']="inscription";
        $_SESSION['identification'] = [];
        $messageErreurConnexion = "l'email de confirmation n'est pas bon...";
    }

}

$formulaireInscription = new Formulaire('post', 'index.php', 'fInscription', 'fInscription');

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerTitre("",'Je crée mon compte'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Prénom :'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('prenom', 'prenom', '', 1, 'Entrez votre prenom', ''));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Nom :'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('nom', 'nom', '', 1, 'Entrez votre nom', ''));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('E-mail :'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('mail', 'mail', '', 1, 'Entrez votre E-mail', ''));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Confirmation de le-mail :'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('confMail', 'confMail', '', 1, 'Entrez votre E-mail', ''));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Mot de Passe :'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription-> creerInputSubmit('submitCreerCompte', 'submitCreerCompte', 'Créer un compte'));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerMessage($messageErreurConnexion));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->creerFormulaire();

$menuFInscription= new Menu("fermerConnexion");
$menuFInscription->ajouterComposant($menuFInscription->creerItemLien('<img src="images/fermer.png">', "deconnexion"));
//$menuFInscription->ajouterComposant($menuFInscription->creerItemImage("", "images/fermer.png", ""));
$menuFInscription->creerMenu("",'bio');


require_once 'vues/visiteurs/vueInscription.php';


