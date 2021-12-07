

<section id="conteneurVisiteurs">

    <header>
        <nav>
            <?php
            if ($status=="adherents")
            {
                $menuAdherents->afficheMenu();
            }
            else if ($status=="producteurs")
            {
                $menuProducteurs->afficheMenu();
            }


          /*  if(isset($menu))
            {
                $menu->afficheMenu();
            }*/
            ?>
        </nav>
    </header>

    <section>

        <div class="producteurs">
            <div class="titreListe">Mon compte</div>
            <?php
            if(isset($editUtilisateur))
            {
                $editUtilisateur->afficherFormulaire();
            }
            if(isset($editProducteur))
            {
                $editProducteur->afficherFormulaire();
            }
            ?>


        </div>
    </section>

    <footer>

    </footer>

</section>

<script src="scripts/scripts.js"></script>