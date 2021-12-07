

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
            <div class="titreListe">Les Ventes</div>
            <?php
            if ($option == "ajouter") {
                if(isset($addForm))
                {
                    $addForm->afficherFormulaire();
                }
                else
                {
                    echo '<br><br> ';
                    echo "Imposible d'ajouter un nouveau produit en vente!";
                }
                // echo '<br><input type="button" value="Retour sur la page precedente !" onclick="history.back()">';
                echo '<br><br><a href="index.php?MenuVente=gererMesVentes2"><input type="button" value="Anuler !" href="index.php?MenuVente=gererMesVentes2"></a>';
            } // afficher le formulaire d'ajout
            else if ($option == "modifier") {
                if(isset($editForm))
                {
                    $editForm->afficherFormulaire();
                }
                else
                {
                    echo '<br><br> ';
                    echo "Imposible de modifier!";
                }
                echo '<br><br><a href="index.php?MenuVente=gererMesVentes2"><input type="button" value="Anuler !" href="index.php?MenuVente=gererMesVentes2"></a>';
            } // afficher le formulaire de modification
            else if ($option == "afficher") {
                if(isset($viewForm))
                {
                    $viewForm->afficherFormulaire();
                    $tabDetailsForma->afficherTableauCorp();
                }
                else
                {
                    echo '<br><br> ';
                    echo "Imposible d'afficher !!";
                }
                echo '<br><br><a href="index.php?MenuVente=gererMesVentes2"><input type="button" value="Anuler !" href="index.php?MenuVente=gererMesVentes2"></a>';
            } // afficher
            else if ($option == "supprimer") {
                echo '<br><br> ';
                echo $message;
                echo '<br><br><input type="button" value="Retour sur la page precedente !" onclick="history.back()">';
            }
            else if ($option == "gererMesVentes") {

                afficherTableauCRUD();


            } // afficher le tableau CRUD
            else if ($option == "gererMesVentes2") {
                if (!empty($lesFormForma)) {
                    foreach ($lesFormForma as $value) {
                        if ($value != null) {
                            $value->afficherFormulaire();
                        }
                    }
                }
                else {
                    if (isset($message)) {
                        echo '<br><br> ';
                        echo $message;
                        echo '<br><br><input type="button" value="Retour sur la page precedente !" onclick="history.back()">';
                    }
                }
            }

            ?>

        </div>
    </section>

    <footer>

    </footer>

</section>

<script src="scripts/scripts.js"></script>