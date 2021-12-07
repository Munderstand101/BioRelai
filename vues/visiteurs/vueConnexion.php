<section id="conteneurVisiteurs">
    <header>
        <nav>
            <?php
           // $menuCon->afficheMenu();
            ?>
        </nav>
    </header>
    <main>
        <section>
            <div class="formulaireConnexion">

                <?php
                $formulaireConnexion->afficherFormulaire();

                $menuDInscription->afficheMenu();

                $menuFInscription->afficheMenu();
                ?>
        </section>


    </main>
    <footer>
<?php include 'bas.php' ;?>
    </footer>
</section>
