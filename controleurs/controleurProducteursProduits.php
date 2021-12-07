<?php


if (isset($_POST['submitNewProduit'])) {

    if (isset($_POST['nomProduit'], $_POST['descriptifProduit'], $_FILES['photoProduit'])) {

        $file_name = $_FILES['photoProduit']['name'];
        $file_type = $_FILES['photoProduit']['type'];
        $tmp_name = $_FILES['photoProduit']['tmp_name'];

        $file_explode = explode('.', $file_name);
        $file_ext = end($file_explode);

        $extensions = ["png", "jpg", "jpeg"];

        if (in_array($file_ext, $extensions) === true) {
            $types = ["image/png", "image/jpg", "image/jpeg"];
            if (in_array($file_type, $types) === true) {

                $time = time();
                $file = $time . $file_name;
                $chemin = "./upload/produits/" . $file;
                if (move_uploaded_file($tmp_name, $chemin)) {

                    ProduitDAO::nouveauProduit($_POST['nomProduit'], $_POST['descriptifProduit'], $chemin, $_POST['idProducteur'], $_POST['idCategorie']);

                    echo("<script>alert('Le nouveau produit a pas bien ete ajouter');</script>");

                }

            } else {
                $msg = "Veuillez charger une image de type - png, jpg, jpeg";
                echo("<script>alert('" . $msg . "');</script>");
            }

        } else {
            $msg = "Veuillez charger une image de type - png, jpg, jpeg";
            echo("<script>alert('" . $msg . "');</script>");
        }

    } else {
        echo("<script>alert('Echec lors de la creation du nouveau produit !!');</script>");
    }
} //

if (isset($_POST['submitEditProduit'])) {

    if (isset($_POST['idProduit'],$_POST['nomProduit'], $_POST['descriptifProduit'], $_FILES['photoProduit'])) {

        $file_name = $_FILES['photoProduit']['name'];
        $file_type = $_FILES['photoProduit']['type'];
        $tmp_name = $_FILES['photoProduit']['tmp_name'];

        $file_explode = explode('.', $file_name);
        $file_ext = end($file_explode);

        $extensions = ["png", "jpg", "jpeg"];

        if (in_array($file_ext, $extensions) === true) {
            $types = ["image/png", "image/jpg", "image/jpeg"];
            if (in_array($file_type, $types) === true) {

                $time = time();
                $file = $time . $file_name;
                $chemin = "./upload/produits/" . $file;
                if (move_uploaded_file($tmp_name, $chemin)) {

                    ProduitDAO::modifierProduit($_POST['idProduit'],$_POST['nomProduit'], $_POST['descriptifProduit'], $chemin, $_POST['idProducteur'], $_POST['idCategorie']);

                    echo("<script>alert('Le nouveau produit a pas bien ete modifier');</script>");


                }

            } else {
                $msg = "Veuillez charger une image de type - png, jpg, jpeg";
                echo("<script>alert('" . $msg . "');</script>");
            }

        } else {
            $msg = "Veuillez charger une image de type - png, jpg, jpeg";
            echo("<script>alert('" . $msg . "');</script>");
        }

    } else {
        echo("<script>alert('Echec lors de la modification du produit !!');</script>");
    }
} //


$_SESSION['produits'] = new ProduitsDTO(ProduitDAO::lesProduits());
$_SESSION['categories'] = new CategoriesDTO(CategorieDAO::lesCategories());
$_SESSION['producteurs'] = new ProducteursDTO(ProducteurDAO::lesProducteurs());
$_SESSION['utilisateurs'] = new UtilisateursDTO(UtilisateurDAO::lesUtilisateurs());




$menuProducteurs = new Menu("menuBioRelai");
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Produits", "Produits"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Ventes", "Ventes"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Factures", "Factures"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("MonCompte", "MonCompte"));
$menuProducteurs->ajouterComposant($menuProducteurs->creerItemLien("Deconnexion", "deconnexion"));
$menuProducteurs->creerMenu("", 'menuProducteurs');


if (isset($_GET['MenuProduits'])) {
    $_SESSION['MenuProduits'] = $_GET['MenuProduits'];
    if (isset($_GET['id'])) {
        $_SESSION['idProduit'] = $_GET['id'];

    }
} else {
    if (!isset($_SESSION['MenuProduits'])) {
        $_SESSION['MenuProduits'] = "gererMesProduits";
    }
}

$option = $_SESSION['MenuProduits'];

if ($option == "ajouter") {
    $addForm = new Formulaire("post", "index.php", "fNewProduit", "fNewProduit");

    $addForm->ajouterComposantLigne($addForm->creerTitre("titre", "Ajouter un produit"), "1");

    $addForm->ajouterComposantLigne($addForm->corpsDebut());

    $idProducteur = $_SESSION['identification']['idUtilisateur'];
    $addForm->ajouterComposantLigne($addForm->creerID("idProducteur", $idProducteur, ""), "");

    $addForm->ajouterComposantLigne($addForm->creerLabelFor('nomProduit', 'Nom du produit :'));
    $addForm->ajouterComposantLigne($addForm->creerBr());
    $addForm->ajouterComposantLigne($addForm->creerInputTexte('nomProduit', 'nomProduit', '', 1, 'Entrez un nom', ''));
    $addForm->ajouterComposantLigne($addForm->creerBr());

    $addForm->ajouterComposantLigne($addForm->creerLabelFor('descriptifProduit', 'Description produit :'));
    $addForm->ajouterComposantLigne($addForm->creerBr());
    $addForm->ajouterComposantLigne($addForm->creerTextarea('descriptifProduit', 'descriptifProduit', 'Entrez une description', 6, 80, ''));
    $addForm->ajouterComposantLigne($addForm->creerBr());

    $addForm->ajouterComposantLigne($addForm->creerLabelFor('photoProduit', 'Photo Produit :'));
    $addForm->ajouterComposantLigne($addForm->creerBr());
    //$addForm->ajouterComposantLigne($addForm->creerInputTexte('photoProduit', 'photoProduit', 'Entrez un lien vers une photo', 6, 80, ''));
    $addForm->ajouterComposantLigne($addForm->creerInputType('file', 'photoProduit', '', "", "image/png, image/jpeg"));
    $addForm->ajouterComposantLigne($addForm->creerBr());



    function creerSelectCategorie($unNom, $unId, $options)
    {
        $composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' required >";
        foreach ($options as $option) {
            $composant .= "<option value = '" . $option->getIdCategorie() . "'>" . $option->getNomCategorie() . "</option>";
        }
        $composant .= "</select></td></tr>";
        return $composant;
    }

    $addForm->ajouterComposantLigne($addForm->creerLabelFor('idCategorie', 'Categorie Produit :'));
    $addForm->ajouterComposantLigne($addForm->creerBr());
    $categories = $_SESSION['categories']->getCategories();
    $addForm->ajouterComposantLigne(creerSelectCategorie("idCategorie", 1, $categories));
    $addForm->ajouterComposantLigne($addForm->creerBr());


    $addForm->ajouterComposantLigne($addForm->divFin());

    $addForm->ajouterComposantLigne($addForm->creerInputSubmit2('submitNewProduit', 'submitNewProduit', " Creer le Produit "));
    $addForm->ajouterComposantTab();

    $addForm->creerFormulaire2();
}
else if ($option == "modifier") {

    $optID = $_SESSION['idProduit'];
    $produitToView = $_SESSION['produits']->chercheProduit($optID);
    if (isset($produitToView)) {
        $idProduit = $produitToView->getIdProduit();
        $intitule = $produitToView->getNomProduit();
        $descriptif = $produitToView->getDescriptifProduit();
        $location = $produitToView->getPhotoProduit();
        $idProducteur = $produitToView->getIdProducteur();
        $idCategorie = $produitToView->getIdCategorie();


        $editForm = new Formulaire("post", "index.php", "fEditProduit", "fEditProduit");

        $editForm->ajouterComposantLigne($editForm->creerTitre("titre", "Modifier un produit"), "1");

        $editForm->ajouterComposantLigne($editForm->corpsDebut());

        $editForm->ajouterComposantLigne($editForm->creerID("idProduit", $idProduit, ""), "");

        $editForm->ajouterComposantLigne($editForm->creerLabelFor('nomProduit', 'Nom du produit :'));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        $editForm->ajouterComposantLigne($editForm->creerInputTexte('nomProduit', 'nomProduit', $intitule, 1, 'Entrez un nom', ''));
        $editForm->ajouterComposantLigne($editForm->creerBr());

        $editForm->ajouterComposantLigne($editForm->creerLabelFor('descriptifProduit', 'Description produit :'));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        $editForm->ajouterComposantLigne($editForm->creerTextarea('descriptifProduit', 'descriptifProduit', 'Entrez une description', 6, 80, $descriptif));
        $editForm->ajouterComposantLigne($editForm->creerBr());

        $editForm->ajouterComposantLigne($editForm->creerImg('', $location, $intitule));
        $editForm->ajouterComposantLigne($editForm->creerLabelFor('photoProduit', 'Photo Produit :'));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        $editForm->ajouterComposantLigne($editForm->creerInputType('file', 'photoProduit', '', "", "image/png, image/jpeg"));
        $editForm->ajouterComposantLigne($editForm->creerBr());

        $idProducteur = $_SESSION['identification']['idUtilisateur'];
        $editForm->ajouterComposantLigne($editForm->creerID("idProducteur", $idProducteur, ""), "");

        $categories = $_SESSION['categories']->getCategories();
        function creerSelectCategorie($unNom, $unId, $options)
        {
            $composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' >";
            foreach ($options as $option) {
                $composant .= "<option value = '" . $option->getIdCategorie() . "'>" . $option->getNomCategorie() . "</option>";
            }
            $composant .= "</select></td></tr>";
            return $composant;
        }
        $editForm->ajouterComposantLigne($editForm->creerLabelFor('photoProduit', 'Categorie Produit :'));
        $editForm->ajouterComposantLigne($editForm->creerBr());
        //  $editForm->ajouterComposantLigne($editForm->creerSelect("idCategorie", 1,"Categorie Produit", $myArray));
        $editForm->ajouterComposantLigne(creerSelectCategorie("idCategorie", 1, $categories));
        $editForm->ajouterComposantLigne($editForm->creerBr());


        $editForm->ajouterComposantLigne($editForm->divFin());

        $editForm->ajouterComposantLigne($editForm->creerInputSubmit2('submitEditProduit', 'submitEditProduit', " Modifier le Produit "));
        $editForm->ajouterComposantTab();

        $editForm->creerFormulaire2();
    }
}
else if ($option == "afficher") {
    $optID = $_SESSION['idProduit'];
    $produitToView = $_SESSION['produits']->chercheProduit($optID);
    if (isset($produitToView)) {
        $idProduit = $produitToView->getIdProduit();
        $intitule = $produitToView->getNomProduit();
        $descriptif = $produitToView->getDescriptifProduit();
        $location = $produitToView->getPhotoProduit();
        $idProducteur = $produitToView->getIdProducteur();
        $idCategorie = $produitToView->getIdCategorie();


        $viewForm = new Formulaire("post", "index.php", "fAfficher", "form");


        $viewForm->ajouterComposantLigne($viewForm->creerTitre("titre", "Nom : " . $intitule . ""), "1");


        $viewForm->ajouterComposantLigne($viewForm->creerImg("", $location, $intitule), "1");

        $viewForm->ajouterComposantLigne($viewForm->creerCorp("corps", "Description : " . $descriptif), "1");


        $categorie = $_SESSION['categories']->chercherCategorie($produitToView->getIdCategorie());
        $producteur = $_SESSION['utilisateurs']->chercheUtilisateur($produitToView->getIdProducteur());


        $info = $categorie->getNomCategorie() . " du protucteur : " . $producteur->getNomUtilisateur();

        $viewForm->ajouterComposantLigne($viewForm->creerCorp("corps", "Info : " . $info), "1");


        $viewForm->ajouterComposantTab();


        $viewForm->creerArticle2();
    }

}
else if ($option == "supprimer") {
    $optID = null;
    $optID = $_SESSION['idProduit'];
    $produitToDelete = $_SESSION['produits']->chercheProduit($optID);
    if (isset($produitToDelete)) // verifie si le produit existe
    {
        //supprime le produit passer en parametre
        ProduitDAO::supprimerProduit($optID);
        $message = "Le produit a bien ete supprimer";
    } else {
        $message = "Le produit n'a pas ete trouver !!";
    }
}

else if ($option == "gererMesProduits") {

    $gestForma = new Formulaire("post", "index.php", "fConnexion", "fConnexion");
    $gestForma->ajouterComposantLigne($gestForma->creerTitre("titre", "Gerer mes produits :"), "1");
    $gestForma->ajouterComposantTab();
    $gestForma->creerArticle();

    function afficherTableauCRUD()
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
                                
                                <td>Details</td>
                                <td>Modifier</td>
                                <td>Supprimer</td></tr>
                        </thead>";

       // var_dump($_SESSION['identification']['idUtilisateur']);
        foreach ($_SESSION['produits']->getProduits() as $unProduit) {


          //  var_dump($unProduit->getIdProducteur());
           if ($unProduit->getIdProducteur()==$_SESSION['identification']['idUtilisateur']){

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


            $formModifier = '<a href="?MenuProduits=afficher&id=' . $id . '"><input type="button" value="Voir le produit"/></a>';
            $composant .= "<td>" . $formModifier . "</td>";


            $formModifier = '<a href="?MenuProduits=modifier&id=' . $id . '"><input type="button" value="Modifier"/></a>';
            $composant .= "<td>" . $formModifier . "</td>";

            $formSupprimer = '<a href="?MenuProduits=supprimer&id=' . $id . '"><input type="button" value="Supprimer"/></a>';

            $composant .= "<td>" . $formSupprimer . "</td>";

            $composant .= "</tr>";
           }
        }

        $composant .= "</table></div></div>";

        echo $composant;
    }

} // creation du tableau CRUD de MesProduits


require_once 'vues/producteurs/vueProducteursProduits.php';