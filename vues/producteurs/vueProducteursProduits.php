

<section id="conteneurVisiteurs">

    <header>
        <nav>
            <?php
            $menuProducteurs->afficheMenu();
            ?>
        </nav>
    </header>

    <section>

        <div class="producteurs">
            <div class="titreListe">Produits</div>

        <?php
        if ($option == "ajouter") {
            if(isset($addForm))
            {
                $addForm->afficherFormulaire();
            }
            else
            {
                echo '<br><br> ';
                echo "Imposible d'ajouter !!";
            }
           // echo '<br><input type="button" value="Retour sur la page precedente !" onclick="history.back()">';
            echo '<br><br><a href="index.php?MenuProduits=gererMesProduits"><input type="button" value="Anuler !" href="index.php?MenuProduits=gererMesProduits"></a>';
        } // afficher le formulaire d'ajout
        else if ($option == "modifier") {
            if(isset($editForm))
            {
                $editForm->afficherFormulaire();
            }
            else
            {
                echo '<br><br> ';
                echo "Imposible de modifier !";
            }
            echo '<br><br><a href="index.php?MenuProduits=gererMesProduits"><input type="button" value="Anuler !" href="index.php?MenuProduits=gererMesProduits"></a>';
        } // afficher le formulaire de modification
        else if ($option == "afficher") {
            if(isset($viewForm))
            {
                $viewForm->afficherFormulaire();
            }
            else
            {
                echo '<br><br> ';
                echo "Imposible d'afficher !!";
            }
            echo '<br><br><a href="index.php?MenuProduits=gererMesProduits"><input type="button" value="Anuler !" href="index.php?MenuProduits=gererMesProduits"></a>';
        } // afficher
        else if ($option == "supprimer") {
            echo '<br><br> ';
            echo $message;
            echo '<br><br><input type="button" value="Retour sur la page precedente !" onclick="history.back()">';
        }
        else if ($option == "gererMesProduits") {
            if(isset($gestForma))
            {
                $gestForma->afficherFormulaire();
                echo '<a href="index.php?MenuProduits=ajouter"><input type="button" value="Nouveau produit!" href="index.php?MenuProduits=ajouter"></a><br><br>';
                afficherTableauCRUD();
            }
            else
            {
                echo '<br><br> ';
                echo "Imposible d'afficher le tableau  !!";
            }


        } // afficher le tableau CRUD

            ?>

        </div>
    </section>

    <footer>

    </footer>

</section>

<script src="scripts/scripts.js"></script>