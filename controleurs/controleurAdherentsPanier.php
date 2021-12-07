<?php

$menuAdherents= new Menu("menuBioRelai");
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Achats", "Achats"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Factures", "Factures"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Panier", "Panier"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("MonCompte", "MonCompte"));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien("Deconnexion", "deconnexion"));
$menuAdherents->creerMenu("",'menuAdherents');

$_SESSION['lignescommandes'] = new LignescommandesDTO(LignescommandeDAO::lesLignescommande());
if(isset($_POST['submitSupprimerCommande']) ) {
    
    LignescommandeDAO::deleteLignesCommande($_POST['idCommande']);
    commandeDAO::deleteCommande($_POST['idCommande']);
    
}

if(isset($_POST['submitValiderCommande']) ) {
    commandeDAO::passerValide($_POST['idCommande']);
    $_SESSION['enable'] = "";
    $_SESSION['Numero Commande']= "Pas de commande en cours, veuillez créer une nouvelle commande";
    
    
}

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
                            <td>Supprimer</td>  
                            <td>Valider</td>  
                            <td>Modifier</td>                      
                    </thead>";
    foreach($_SESSION['commandes']->getCommandes() as $commande){
        if($commande->getStatut() == "encours"){
            $composant .= '<tr class="pair" >';

            $composant .= "<td>" . $commande->getIdCommandes() . "</td>";
            $composant .= "<td>" . $commande->getDateCommandes() . "</td>";
            $composant .= "<td>" . $commande->getIdVente() . "</td>";
            $composant .= "<td>" . $commande->getIdAdherent() . "</td>";
            $composant .= "<td>" . $commande->getStatut() . "</td>";
            $formSupprimerCommande='<td><form action="index.php" method="post" name= "supprimerCommande" ><input id="idCommande" name="idCommande" type="hidden" value="' . $commande->getIdCommandes() . ' "><input  type="submit" name="submitSupprimerCommande" id="submitSupprimerCommande" value="Supprimer"></td>';
            $composant .=  $formSupprimerCommande;

            $formValiderCommande='<td><form action="index.php" method="post" name= "validerCommande" ><input id="idCommande" name="idCommande" type="hidden" value="' . $commande->getIdCommandes() . ' "><input  type="submit" name="submitValiderCommande" id="submitValiderCommande" value="Valider"></td>';
            $composant .=  $formValiderCommande;

            $formModifierCommande='<td><form action="index.php" method="post" name= "validerCommande" ><input id="idCommande" name="idCommande" type="hidden" value="' . $commande->getIdCommandes() . ' "><input  type="submit" name="submitValiderCommande" id="submitValiderCommande" value="Valider"></td>';
            $composant .=  $formModifierCommande;



        }
    }
        
    $composant .= "</table></div></div>";

    echo $composant;

}





require_once 'vues/adherents/vueAdherentsPanier.php';

echo"dzuiqdbhuié";