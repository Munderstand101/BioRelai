<?php

//submitNewProduitEnVente
if(isset($_POST['submitNewProduitEnVente']) ) {

    if (isset($_POST['idVente'],$_POST['idProduit'],$_POST['unite'],$_POST['quantite'],$_POST['prix']))
    {
        ProposerDAO::nouveauProduitEnVente($_POST['idVente'],$_POST['idProduit'],$_POST['unite'],$_POST['quantite'],$_POST['prix']);
        echo("<script>alert('Le nouvelle nouveau produit a bien ete ajouter en vente');</script>");

    }
    else
    {
        echo("<script>alert('Echec lors de l ajout d un nouveau produit en vente !!');</script>");
    }
} // Ajout d'un nouveau produit en vente

//submitEditProduitEnVente
else if(isset($_POST['submitEditProduitEnVente']) ) {

    if (isset($_POST['idVente'],$_POST['idProduit'],$_POST['unite'],$_POST['quantite'],$_POST['prix']))
    {
        ProposerDAO::modifierProduitEnVente($_POST['idVente'],$_POST['idProduit'],$_POST['unite'],$_POST['quantite'],$_POST['prix']);

        echo("<script>alert('La produit en vente a bien ete modifier');</script>");
    }
    else
    {
        echo("<script>alert('Echec lors de la modification du produit en vente !!');</script>");
    }
} // modification d'un produit en vente


$_SESSION['ventes'] = new VentesDTO(VenteDAO::lesVentes());
$_SESSION['proposers'] = new ProposersDTO(ProposerDAO::lesPropositions());

$_SESSION['produits'] = new ProduitsDTO(ProduitDAO::lesProduits());
$_SESSION['producteurs'] = new ProducteursDTO(ProducteurDAO::lesProducteurs());
$_SESSION['utilisateurs'] = new UtilisateursDTO(UtilisateurDAO::lesUtilisateurs());


$menuProducteurs= new Menu("menuBioRelai");
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Produits", "Produits"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Ventes", "Ventes"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Factures", "Factures"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("MonCompte", "MonCompte"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Deconnexion", "deconnexion"));
$menuProducteurs->creerMenu("",'menuProducteurs');



if (isset($_GET['MenuVente'])) {
    $_SESSION['MenuVente'] = $_GET['MenuVente'];
    if (isset($_GET['id'])) {
        $_SESSION['idVente'] = $_GET['id'];

    }
}
else {
    if (!isset($_SESSION['MenuVente'])) {
        $_SESSION['MenuVente'] = "gererMesVentes2";
    }
}

$option = $_SESSION['MenuVente'];


if ($option == "ajouter")
{
    $addForm = new Formulaire("post", "index.php", "fNewProduitEnVente", "fNewProduitEnVente");

    $addForm->ajouterComposantLigne($addForm->creerTitre("titre", "Ajouter un produit En vente"), "1");

    $addForm->ajouterComposantLigne($addForm->corpsDebut());


    $addForm->ajouterComposantLigne($addForm->creerID("idVente", $_SESSION['idVente'], ""), "");

    function creerSelectProduits($unNom, $unId, $options)
    {
        $composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' required >";
        foreach ($options as $option) {
            if ($option->getIdProducteur()==$_SESSION['identification']['idUtilisateur'])
            {
                $composant .= "<option value = '" . $option->getIdProduit() . "'>" . $option->getNomProduit() . "</option>";
            }

        }
        $composant .= "</select></td></tr>";
        return $composant;
    }

    $addForm->ajouterComposantLigne($addForm->creerLabelFor('idCategorie', 'Categorie Produit :'));
    $addForm->ajouterComposantLigne($addForm->creerBr());

    $addForm->ajouterComposantLigne(creerSelectProduits("idProduit", 1, $_SESSION['produits']->getProduits()));
    $addForm->ajouterComposantLigne($addForm->creerBr());

    $addForm->ajouterComposantLigne($addForm->creerLabelFor('unite','Unité :'));
    $addForm->ajouterComposantLigne($addForm->creerBr());
    $addForm->ajouterComposantLigne($addForm->creerInputTexte('unite', 'unite', '', 1, 'Entrez une unité', ''));
    $addForm->ajouterComposantLigne($addForm->creerBr());


    $addForm->ajouterComposantLigne($addForm->creerLabelFor('quantite','Quantité : '));
    $addForm->ajouterComposantLigne($addForm->creerBr());
    $addForm->ajouterComposantLigne($addForm->creerInputType('quantite', 'quantite', 'quantite', '', 'Entrez une quantité'));
    $addForm->ajouterComposantLigne($addForm->creerBr());


    $addForm->ajouterComposantLigne($addForm->creerLabelFor('prix','Prix :'));
    $addForm->ajouterComposantLigne($addForm->creerBr());
    $addForm->ajouterComposantLigne($addForm->creerInputTexte('prix', 'prix', '', 1, 'Entrez un prix', ''));
    $addForm->ajouterComposantLigne($addForm->creerBr());


    $addForm->ajouterComposantLigne($addForm->divFin());

    $addForm->ajouterComposantLigne($addForm->creerInputSubmit2('submitNewProduitEnVente', 'submitNewProduitEnVente', " Metre en vente le produit"));
    $addForm->ajouterComposantTab();

    $addForm->creerArticle();
}
else if ($option == "modifier")
{
    $optID = $_SESSION['idVente'];
    $propToEdit = $_SESSION['proposers']->chercheProposer($optID);
    $produitToView = $_SESSION['produits']->chercheProduit($propToEdit->getIdProduit());
    if (isset($propToEdit))
    {
        $idProduit = $produitToView->getIdProduit();
        $intitule = $produitToView->getNomProduit();
        $descriptif = $produitToView->getDescriptifProduit();
        $location = $produitToView->getPhotoProduit();
        $idProducteur = $produitToView->getIdProducteur();
        $idCategorie = $produitToView->getIdCategorie();


        $unite = $propToEdit->getUnite();
        $quantite = $propToEdit->getQuantite();
        $prix = $propToEdit->getPrix();


        $editForm = new Formulaire("post", "index.php", "fEditProduitEnVente", "fEditProduitEnVente");

        $editForm->ajouterComposantLigne($editForm->creerTitre("titre", "Modifier un produit En vente"), "1");

        $editForm->ajouterComposantLigne($editForm->corpsDebut());


        $editForm->ajouterComposantLigne($editForm->creerID("idVente", $_SESSION['idVente'], ""), "");

        function creerSelectProduits($unNom, $unId, $options, $default)
        {
            $composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' value='".$default."' required>";
            foreach ($options as $option) {
                if ($option->getIdProducteur()==$_SESSION['identification']['idUtilisateur'])
                {
                    $composant .= "<option value = '" . $option->getIdProduit();
                    if ($default == $option->getIdProduit())
                    {
                        $composant .= "' selected='selected' >";
                    }
                    else
                    {
                        $composant .= "'>";
                    }
                    $composant .=  $option->getNomProduit() . "</option>";
                }

            }
            $composant .= "</select></td></tr>";
            return $composant;
        }

        $editForm->ajouterComposantLigne($editForm->creerLabelFor('idProduit', 'Produit :'));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        $editForm->ajouterComposantLigne(creerSelectProduits("idProduit", 1, $_SESSION['produits']->getProduits(),$idProduit));
        $editForm->ajouterComposantLigne($editForm->creerBr());

        $editForm->ajouterComposantLigne($editForm->creerLabelFor('unite','Unité :'));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        $editForm->ajouterComposantLigne($editForm->creerInputTexte('unite', 'unite', $unite, 1, 'Entrez une unité', ''));
        $editForm->ajouterComposantLigne($editForm->creerBr());


        $editForm->ajouterComposantLigne($editForm->creerLabelFor('quantite','Quantité : '));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        $editForm->ajouterComposantLigne($editForm->creerInputType('quantite', 'quantite', 'quantite', $quantite, 'Entrez une quantité'));
        $editForm->ajouterComposantLigne($editForm->creerBr());


        $editForm->ajouterComposantLigne($editForm->creerLabelFor('prix','Prix :'));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        $editForm->ajouterComposantLigne($editForm->creerInputTexte('prix', 'prix', $prix, 1, 'Entrez un prix', ''));
        $editForm->ajouterComposantLigne($editForm->creerBr());


        $editForm->ajouterComposantLigne($editForm->divFin());

        $editForm->ajouterComposantLigne($editForm->creerInputSubmit2('submitEditProduitEnVente', 'submitEditProduitEnVente', " Modifier la mise en vente de ce produit"));
        $editForm->ajouterComposantTab();

        $editForm->creerArticle();

    }

}
else if ($option == "afficher")
{
    $optID = $_SESSION['idVente'];
    $propToEdit = $_SESSION['proposers']->chercheProposer($optID);
    $produitToView = $_SESSION['produits']->chercheProduit($propToEdit->getIdProduit());
    if (isset($propToEdit))
    {
        $idProduit = $produitToView->getIdProduit();
        $intitule = $produitToView->getNomProduit();
        $descriptif = $produitToView->getDescriptifProduit();
        $location = $produitToView->getPhotoProduit();
        $idProducteur = $produitToView->getIdProducteur();
        $idCategorie = $produitToView->getIdCategorie();


        $unite = $propToEdit->getUnite();
        $quantite = $propToEdit->getQuantite();
        $prix = $propToEdit->getPrix();

        $viewForm = new Formulaire("post", "index.php", "fafficher", "form");

//

        $viewForm->ajouterComposantLigne($viewForm->creerTitre("titre", "Nom : " . $intitule . ""), "1");


        $viewForm->ajouterComposantLigne($viewForm->creerImg("", $location, $intitule), "1");

        $viewForm->ajouterComposantLigne($viewForm->creerCorp("corps", "Description : " . $descriptif), "1");


        $categorie = $_SESSION['categories']->chercherCategorie($produitToView->getIdCategorie());
        $producteur = $_SESSION['utilisateurs']->chercheUtilisateur($produitToView->getIdProducteur());


        $info = $categorie->getNomCategorie() . " du protucteur : " . $producteur->getNomUtilisateur();

        $viewForm->ajouterComposantLigne($viewForm->creerCorp("corps", "Info : " . $info), "1");


        $data = array (
            array("Unité : ",$unite),
            array("Quantité :",$quantite),
            array("Prix :",$prix)
        );

        $tabDetailsForma = new Tableau(1,$data);
        $tabDetailsForma->setTitreTab("Details Produit en vente");



        $viewForm->ajouterComposantTab();


        $viewForm->creerArticle2();
    }
}
else if ($option == "supprimer")
{
    $optID = null;
    $optID = $_SESSION['idVente'];
    $produitToDelete = $_SESSION['proposers']->chercheProposer($optID);
    if (isset($produitToDelete)) // verifie si le produit mis en vente existe
    {
        //supprime le produit mis en vente passer en parametre
        ProposerDAO::supprimerProduitEnVente($optID);
        $message = "Le produit mis en vente a bien ete supprimer";
    } else {
        $message = "Le produit mis en vente n'a pas ete trouver !!";
    }
}
else if ($option == "gererMesVentes2") {

    function creerFormulaireDemande($vente, $liste1, $liste2)
    {

        $idVente = $vente->getIdVente();
        $dateVente = $vente->getDateVente();
        $dateDebutProd = $vente->getDateDebutProd();
        $dateFinProd = $vente->getDateFinProd();
        $dateFinCli = $vente->getDateFinCli();




        $formForma = new Formulaire("post", "index.php", "demandeEffectues", "form");


        $formForma->ajouterComposantLigne($formForma->creerTitre("titre", "Vente : " .$idVente. " Du : ".$dateVente), "1");
        $gg = "<a href='index.php?MenuVente=ajouter&id=".$idVente."'><input type='button' value='Mettre un nouveau produit en vente!'></a>";
        $formForma->ajouterComposantLigne($formForma->creerCorp("corps", $gg), "1");

        $formForma->ajouterComposantLigne($formForma->creerCorp("corps", "Info vente : ", "1"));




        $composant = "<table class='tab'>
                        <thead>
                            <tr>
                             <td>Photo</td>
                             <td>Nom</td>
                             <td>Producteur</td>
                             <td>Categorie</td>
                             <td>Unite</td>
                             <td>Quantite</td>
                             <td>Prix</td>
                             <td>Details</td>
                             <td>Modifier</td>
                             <td>Supprimer</td>
                            </tr>
                        </thead>";


        foreach ($liste1->getPrositions() as $proposition) {
            if ($proposition->getIdVente() == $idVente) {


                $composant .= '<tr class="pair" >';

                $produit = $liste2->chercheProduit($proposition->getIdProduit());

               $composant .= "<td><img class='fit-picture' src='" . $produit->getPhotoProduit() . "' alt='" . $produit->getNomProduit() . "'></td>";


                $composant .= "<td>" .$produit->getNomProduit(). "</td>";
                $composant .= "<td>" .$produit->getDescriptifProduit(). "</td>";


                $categorie = $_SESSION['categories']->chercherCategorie($produit->getIdCategorie());
                $composant .= "<td>" . $categorie->getNomCategorie() . "</td>";

                $composant .= "<td>" .$proposition->getUnite(). "</td>";
                $composant .= "<td>" .$proposition->getQuantite(). "</td>";
                $composant .= "<td>" .$proposition->getPrix(). "€</td>";

                $id = $produit->getIdProduit();


                $formModifier = '<a href="?MenuVente=afficher&id=' . $id . '"><input type="button" value="Voir le produit"/></a>';
                $composant .= "<td>" . $formModifier . "</td>";


                $formModifier = '<a href="?MenuVente=modifier&id=' . $id . '"><input type="button" value="Modifier"/></a>';
                $composant .= "<td>" . $formModifier . "</td>";

                $formSupprimer = '<a href="?MenuVente=supprimer&id=' . $id . '"><input type="button" value="Supprimer"/></a>';

                $composant .= "<td>" . $formSupprimer . "</td>";

                $composant .= "</tr>";
            }

        }


        $composant .= "</table>";
        $formForma->ajouterComposantLigne($formForma->creerCorpDiv("corps", $composant), "1");
        $formForma->ajouterComposantTab();
        $formForma->creerArticle2();
        return $formForma;
    }


    foreach ($_SESSION['ventes']->getVentes() as $vente) {

        $liste1 = $_SESSION['proposers'];
        $liste2 = $_SESSION['produits'];
        $lesFormForma[$vente->getIdVente()] = creerFormulaireDemande($vente, $liste1, $liste2); 
    }

    if (empty($lesFormForma)) {
        $message = 'Aucune donne disponible !!';
    }

} //




require_once 'vues/producteurs/vueProducteursVentes.php';