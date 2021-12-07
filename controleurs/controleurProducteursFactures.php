<?php

$menuProducteurs = new Menu("menuBioRelai");
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Produits", "Produits"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Ventes", "Ventes"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Factures", "Factures"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("MonCompte", "MonCompte"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Deconnexion", "deconnexion"));
$menuProducteurs->creerMenu("", 'menuProducteurs');


$_SESSION['lignescommandes'] = new LignescommandesDTO(LignescommandeDAO::lesLignescommande());
$_SESSION['commandes'] = new CommandesDTO(CommandeDAO::lesCommandes());
$_SESSION['proposers'] = new ProposersDTO(ProposerDAO::lesPropositions());
$_SESSION['produits'] = new ProduitsDTO(ProduitDAO::lesProduits());
$_SESSION['utilisateurs'] = new UtilisateursDTO(UtilisateurDAO::lesUtilisateurs());
$_SESSION['ventes'] = new VentesDTO(VenteDAO::lesVentes());


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
            if ($uneCommande->getStatut()!="encours")
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

if (empty($lesFormForma)) {
    $message = 'Aucune donne disponible !!';
}


require_once 'vues/producteurs/vueProducteursFactures.php';