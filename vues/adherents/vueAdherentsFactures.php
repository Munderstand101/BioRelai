

<section id="conteneurVisiteurs">

    <header>
        <nav>
            <?php
            $menuAdherents->afficheMenu();
            ?>
        </nav>
    </header>

    <section>

        <div class="producteurs">
            <div class="titreListe">Factures</div>


        </div>
    </section>
    <?php
         
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
         //  afficherTableauCommandes();
            ?>

    <footer>

    </footer>

</section>

<script src="scripts/scripts.js"></script>