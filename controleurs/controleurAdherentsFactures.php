<?php

$menuAdherents= new Menu("menuBioRelai");
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Achats", "Achats"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Factures", "Factures"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Panier", "Panier"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("MonCompte", "MonCompte"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Deconnexion", "deconnexion"));
$menuAdherents->creerMenu("",'menuAdherents');


$_SESSION['produits'] = new ProduitsDTO(ProduitDAO::lesProduits());
$_SESSION['categories'] = new CategoriesDTO(CategorieDAO::lesCategories());
$_SESSION['producteurs'] = new ProducteursDTO(ProducteurDAO::lesProducteurs());
$_SESSION['utilisateurs'] = new UtilisateursDTO(UtilisateurDAO::lesUtilisateurs());
$_SESSION['lignescommandes'] = new LignescommandesDTO(LignescommandeDAO::lesLignescommande());
$_SESSION['commandes'] = new CommandesDTO(CommandeDAO::lesCommandes());



/*

function afficherTableauCommandes()
{
    $composant = "<div class='article'><div class='corps'>
        <table class='tab'>
                    <thead>
                        <tr>
                            <td>#ID</td>
                            <td>dateCommande</td>
                            <td>idVente </td>
                            <td>idAdherent</td>
                            <td>statut</td>                          
                    </thead>";
    foreach($_SESSION['commandes']->getCommandes() as $commande){
        if($commande->getStatut() == "valide"){
            $composant .= '<tr class="pair" >';

            $composant .= "<td>" . $commande->getIdCommandes() . "</td>";
            $composant .= "<td>" . $commande->getDateCommandes() . "</td>";
            $composant .= "<td>" . $commande->getIdVente() . "</td>";
            $composant .= "<td>" . $commande->getIdAdherent() . "</td>";
            $composant .= "<td>" . $commande->getStatut() . "</td>";
        }
    }
        
    $composant .= "</table></div></div>";

    echo $composant;

}*/

function creerFormulaireDemande($uneCommande, $lignescommandes) //$listeDemandesEffectues, $listeUtilisateurs
{

    $id = $uneCommande->getIdCommandes();
    $formForma = new Formulaire("post", "index.php", "demandeEffectues", "form");

    $formForma->ajouterComposantLigne($formForma->creerID("idForma", '', ""));
    $formForma->ajouterComposantLigne($formForma->creerTitre("titre", "Commande : ".$id, ""));

    

    $composant = "<table class='tab'>
                        <thead>
                            <tr>
                                <td>Photo</td>
                                <td>Nom</td>
                                <td>Quantite</td>	
                                <td>Status</td>		
                            </tr>
                        </thead>";

    foreach ($lignescommandes->getLignescommandes() as $uneLigneComposants)
    {
        $composant .= '<tr class="pair" >';
        if ($uneLigneComposants->getIdCommande() == $id)
        {
            if ($uneCommande->getStatut()!="encours" && $uneCommande->getIdAdherent() == $_SESSION['identification']['idUtilisateur'])
            {
                $idProduit = $uneLigneComposants->getIdProduit();
                $produit = $_SESSION['produits']->chercheProduit($idProduit);

                $composant .= "<td><img class='fit-picture' src='" . $produit->getPhotoProduit() . "' alt='" . $produit->getNomProduit() . "'></td>";
                $composant .= "<td>" . $produit->getNomProduit() . "</td>";
                $composant .= "<td>" . $uneLigneComposants->getQuantite() . "</td>";
                $composant .= "<td>" . $uneCommande->getStatut() . "</td>";
            }
        }
        $composant .= "</tr>";
    }

    $composant .= "</table>";
    $formForma->ajouterComposantLigne($formForma->creerCorpDiv("corps", $composant), "1");
    $formForma->ajouterComposantTab();
    $formForma->creerArticle2();
    return $formForma;
}

foreach ($_SESSION['commandes']->getCommandes() as $uneCommande) {
    //
    $lignescommandes = $_SESSION['lignescommandes'];
    //
    $lesFormForma[$uneCommande->getIdCommandes()] = creerFormulaireDemande($uneCommande, $lignescommandes); //
}



require_once 'vues/adherents/vueAdherentsFactures.php';