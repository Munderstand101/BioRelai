<?php

$menuAdherents= new Menu("menuBioRelai");
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Achats", "Achats"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Factures", "Factures"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Panier", "Panier"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("MonCompte", "MonCompte"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Deconnexion", "deconnexion"));
$menuAdherents->creerMenu("",'menuAdherents');

$_SESSION['listeProduits'] = new ProduitsDTO(ProduitDAO::lesProduits());
$_SESSION['categories'] = new CategoriesDTO(CategorieDAO::lesCategories());
$_SESSION['producteurs'] = new ProducteursDTO(ProducteurDAO::lesProducteurs());
$_SESSION['utilisateurs'] = new UtilisateursDTO(UtilisateurDAO::lesUtilisateurs());





if(isset($_POST['submitNouvelleCommande']) ) {
    $idUser = $_SESSION['identification']['idUtilisateur'];
    //A chaque fois qu on créé une nouvelle commande on passe toutes les commandes de l'utilisateur en valide avant de créer la nouvelle encours
    commandeDAO::toutPasserValide($idUser);
    //On créé la nouvelle commande qui est par défaut en statut 'encours'
    commandeDAO::newCommande($idUser);
    $_SESSION['enable'] = "disabled";
    $_SESSION['Numero Commande'] = commandeDAO::getCommandeEncours($idUser);
    
 
}

if(isset($_POST['submitAjouterProduit']) ) {
    
    $idUser = $_SESSION['identification']['idUtilisateur'];

   // echo"<script>alert(". commandeDAO::getCommandeEncours(1) ."  );</script>";
    //var_dump(commandeDAO::getCommandeEncours(1));
    //var_dump($_POST['idProduit']);
   // var_dump($_POST['quantite']);

    commandeDAO::ajouterProduit(commandeDAO::getCommandeEncours($idUser),$_POST['idProduit'],$_POST['quantite']);
    
}

function afficherTableauProduits()
    {
        $composant = "<div class='article'><div class='corps'>
            <table class='tab'>
                        <thead>
                            <tr>
                                <td>#ID</td>
                                <td>Nom</td>
                                <td>Description </td>
                                <td>Photo</td>
                                <td>Producteur</td>
                                <td>Categorie</td>
                                
                                <td>Ajouter au panier</td>
                                
                        </thead>";

        foreach ($_SESSION['listeProduits']->getProduits() as $unProduit) {
            $composant .= '<tr class="pair" >';

            $composant .= "<td>" . $unProduit->getIdProduit() . "</td>";
            $composant .= "<td>" . $unProduit->getNomProduit() . "</td>";
            $composant .= "<td>" . $unProduit->getDescriptifProduit() . "</td>";
            $composant .= "<td><img class='fit-picture' src='" . $unProduit->getPhotoProduit() . "' alt='" . $unProduit->getNomProduit() . "'></td>";
            $producteur = $_SESSION['utilisateurs']->chercheUtilisateur($unProduit->getIdProducteur());

            $composant .= "<td>" . $producteur->getNomUtilisateur() . "</td>";


            $categorie = $_SESSION['categories']->chercherCategorie($unProduit->getIdCategorie());
            $composant .= "<td>" . $categorie->getNomCategorie() . "</td>";
            $id = $unProduit->getIdProduit();
            $idUser = $_SESSION['identification']['idUtilisateur'];
            $formAjouterPanier = '<form method="post" action="index.php" name="fAjouterProduit" class="fAjouterProduit"><input id="idProduit" name="idProduit" type="hidden" value="' . $id . '">
            <input id="idUser" name="idUser" type="hidden" value="' . $idUser . '">
            <input type="text" name="quantite" /><input  type="submit" name="submitAjouterProduit" id="submitAjouterProduit" value=" Ajouter"></form>';

            

            
            $composant .= "<td>" . $formAjouterPanier . "</td>";
            
        }
        
        $composant .= "</table></div></div>";

        echo $composant;
    }
    
    
   // $numeroCommande = $_SESSION['Numero Commande'];
    
    $formNouvelleCommande='<form action="index.php" method="post" name= "nouvelleCommande" ><input id="idUser" name="idUser" type="hidden" value="' .$_SESSION['identification']['idUtilisateur'] . ' "><input '.  $_SESSION['enable']  . ' type="submit" name="submitNouvelleCommande" id="submitNouvelleCommande" value="Créer une nouvelle commande ">';
    

require_once 'vues/adherents/vueAdherentsAchats.php';