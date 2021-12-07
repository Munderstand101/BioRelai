<section id="conteneurVisiteurs">
    <header>
        <nav>
            <?php
            //            $menuCon->afficheMenu();
            ?>
        </nav>
    </header>
    <main>
        <section>
            <div class="formulaireInscription">
                <?php
                $formulaireInscription->afficherFormulaire();
                $menuFInscription->afficheMenu();
                ?>

        </section>


    </main>
    <footer>
        <?php include 'bas.php' ;?>
    </footer>
</section>
