

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
            <div class="titreListe">Achats</div>



        </div>
    </section>
    <?php
            
           echo($formNouvelleCommande);
           echo("Commande numéro: ". $_SESSION['Numero Commande']);
           afficherTableauProduits();
            ?>

    <footer>

    </footer>

</section>

<script src="scripts/scripts.js"></script>