<?php

if(isset($_POST['submitModifCompte']) ) {

    if (isset($_POST['idUser'],$_POST['nomUser'],$_POST['prenomUser'],$_POST['mailUser'],$_POST['mdp']))
    {
        UtilisateurDAO::modifierUnCompte($_POST['idUser'],$_POST['nomUser'],$_POST['prenomUser'],$_POST['mailUser'],$_POST['mdp']);

        echo("<script>alert('Le compte a bien ete modifier');</script>");
        $_SESSION['controleurBioN1']="MonCompte";
    }
    else
    {
        echo("<script>alert('Echec lors de la modification du compte !!');</script>");
    }
} // modification du compte

else if(isset($_POST['submitModifProducteur']) ) {

    try {

        if (isset($_POST['idProducteur'],$_POST['adresseProducteur'],$_POST['communeProducteur'],$_POST['descriptifProducteur'],$_FILES['photoProducteur']))
        {
            $file_name = $_FILES['photoProducteur']['name'];
            $file_type = $_FILES['photoProducteur']['type'];
            $tmp_name = $_FILES['photoProducteur']['tmp_name'];

            $file_explode = explode('.',$file_name);
            $file_ext = end($file_explode);

            $extensions = ["png", "jpg", "jpeg"];

            if(in_array($file_ext, $extensions) === true){
                $types = ["image/png", "image/jpg", "image/jpeg"];
                if(in_array($file_type, $types) === true){

                    $time = time();
                    $file = $time.$file_name;
                    $chemin = "./upload/producteurs/".$file;
                    if(move_uploaded_file($tmp_name,$chemin)){

                        ProducteurDAO::modifierUnProducteur($_POST['idProducteur'],$_POST['adresseProducteur'],$_POST['communeProducteur'],$_POST['descriptifProducteur'],$chemin);
                        echo("<script>alert('Le producteur a bien ete modifier');</script>");
                        $_SESSION['controleurBioN1']="MonCompte";
                    }

                }
            }

            $_SESSION['controleurBioN1']="MonCompte";
        }
        else
        {
            echo("<script>alert('Echec lors de la modification du producteur !!');</script>");
            $_SESSION['controleurBioN1']="MonCompte";
        }

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
} // modification du producteur


$_SESSION['utilisateurs'] = new UtilisateursDTO(UtilisateurDAO::lesUtilisateurs());
$_SESSION['producteurs'] = new ProducteursDTO(ProducteurDAO::lesProducteurs());

$idUser = $_SESSION['identification']['idUtilisateur'];
$status = $_SESSION['identification']['statut'];

if ($status=="adherents")
    {
        $menuAdherents= new Menu("menuBioRelai");
        $menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Achats", "Achats"));
        $menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Factures", "Factures"));
        $menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Panier", "Panier"));
        $menuAdherents->ajouterComposant($menuAdherents->creerItemLien("MonCompte", "MonCompte"));
        $menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Deconnexion", "deconnexion"));
        $menuAdherents->creerMenu("",'menuAdherents');
    }
else if ($status=="producteurs")
    {
        $menuProducteurs= new Menu("menuBioRelai");
        $menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Produits", "Produits"));
        $menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Ventes", "Ventes"));
        $menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Factures", "Factures"));
        $menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("MonCompte", "MonCompte"));
        $menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Deconnexion", "deconnexion"));
        $menuProducteurs->creerMenu("",'menuProducteurs');
    }


if ($_SESSION['utilisateurs']->getUtilisateurs()!=null)
{
    $utilisateur = $_SESSION['utilisateurs']->chercheUtilisateur($idUser);
}

if ($utilisateur!=null)
{
    $nomUser = $utilisateur->getNomUtilisateur();
    $prenomUser = $utilisateur->getPrenomUtilisateur();
    $mailUser = $utilisateur->getMail();

    $editUtilisateur = new Formulaire("post", "index.php", "fModifCompte", "fModifCompte");
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerTitre("titre",  "Utilisateur : ".$nomUser),"1");
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerID("idUser",$idUser,  ""), "WW");

    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerLabel('Nom :'));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerInputTexte('nomUser', 'nomUser', $nomUser, 1, 'Entrez un Nom', ''));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerBr());

    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerLabel('Prenom :'));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerInputTexte('prenomUser', 'prenomUser', $prenomUser, 1, 'Entrez un Prenom', ''));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerBr());

    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerLabel('Mail :'));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerInputTexte('mailUser', 'mailUser', $mailUser, 1, 'Entrez un Mail', ''));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerBr());

    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerLabel('Mdp :'));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerInputTexte('mdp', 'mdp', '', 1, 'Entrez un mdp', ''));
    $editUtilisateur->ajouterComposantLigne($editUtilisateur->creerBr());

    $editUtilisateur->ajouterComposantLigne($editUtilisateur-> creerInputSubmit('submitModifCompte', 'submitModifCompte', " Modifier l&rsquo;Utilisateur' "));

    $editUtilisateur->ajouterComposantTab();
    $editUtilisateur->creerFormulaire();

}
else{

}

if ($_SESSION['producteurs']->getProducteurs()!=null)
{
    $producteur = $_SESSION['producteurs']->chercheProducteur($idUser);
}

if ($producteur!=null)
{
    $nomAdresseProducteur = $producteur->getAdresseProducteur();
    $communeProducteur = $producteur->getCommuneProducteur();
    $codePostalProducteur = $producteur->getCodePostalProducteur();
    $descriptifProducteur = $producteur->getDescriptifProducteur();
    $photoProducteur = $producteur->getPhotoProducteur();

    $editProducteur = new Formulaire("post", "index.php", "fModifCompte", "fModifCompte");
    $editProducteur->ajouterComposantLigne($editProducteur->creerTitre("titre",  "Producteur : "),"1");
    $editProducteur->ajouterComposantLigne($editProducteur->creerID("idProducteur",$idUser,  ""), "WW");

    $editProducteur->ajouterComposantLigne($editProducteur->creerLabel('Adresse Producteur :'));
    $editProducteur->ajouterComposantLigne($editProducteur->creerInputTexte('adresseProducteur', 'adresseProducteur', $nomAdresseProducteur, 1, 'Adresse Producteur :', ''));
    $editProducteur->ajouterComposantLigne($editProducteur->creerBr());

    $editProducteur->ajouterComposantLigne($editProducteur->creerLabel('Commune Producteur :'));
    $editProducteur->ajouterComposantLigne($editProducteur->creerInputTexte('communeProducteur', 'communeProducteur', $communeProducteur, 1, 'Commune Producteur :', ''));
    $editProducteur->ajouterComposantLigne($editProducteur->creerBr());

    $editProducteur->ajouterComposantLigne($editProducteur->creerLabel('CodePostal Producteur :'));
    $editProducteur->ajouterComposantLigne($editProducteur->creerInputTexte('codePostalProducteur', 'codePostalProducteur', $codePostalProducteur, 1, 'CodePostal Producteur :', ''));
    $editProducteur->ajouterComposantLigne($editProducteur->creerBr());

    $editProducteur->ajouterComposantLigne($editProducteur->creerLabel('Description Producteur :'));
//$editProducteur->ajouterComposantLigne($editProducteur->creerInputTexte('descriptifProducteur', 'descriptifProducteur', $descriptifProducteur, 1, 'Descriptif Producteur :', ''));
    $editProducteur->ajouterComposantLigne($editProducteur->creerTextarea('descriptifProducteur', 'descriptifProducteur', 'Entrez une description', 6, 80, $descriptifProducteur));
    $editProducteur->ajouterComposantLigne($editProducteur->creerBr());

  /*  $editProducteur->ajouterComposantLigne($editProducteur->creerLabel('Photo Producteur :'));
    $editProducteur->ajouterComposantLigne($editProducteur->creerInputTexte('photoProducteur', 'photoProducteur', $photoProducteur, 1, 'Photo Producteur :', ''));
    $editProducteur->ajouterComposantLigne($editProducteur->creerBr());*/

    $editProducteur->ajouterComposantLigne($editProducteur->creerLabelFor('photoProducteur','Photo Producteur :'));
    $editProducteur->ajouterComposantLigne($editProducteur->creerBr());
    $editProducteur->ajouterComposantLigne($editProducteur->creerInputType('file', 'photoProducteur', 'photoProducteur', "", "image/png, image/jpeg"));
    $editProducteur->ajouterComposantLigne($editProducteur->creerBr());



    $editProducteur->ajouterComposantLigne($editProducteur-> creerInputSubmit('submitModifProducteur', 'submitModifProducteur', " Modifier' "));

    $editProducteur->ajouterComposantTab();
    $editProducteur->creerFormulaire2();

}
else{

}

require_once 'vues/vueMonCompte.php';
