<?php
class Formulaire{
    private $method;
    private $action;
    private $nom;
    private $style;
    private $formulaireToPrint;

    private $ligneComposants = array();
    private $tabComposants = array();

    public function __construct($uneMethode, $uneAction , $unNom,$unStyle ){
        $this->method = $uneMethode;
        $this->action =$uneAction;
        $this->nom = $unNom;
        $this->style = $unStyle;
    }
//Debut Pierre
    public function creerInputTexteInvisible($unNom, $unId, $uneValue , $required , $placeholder , $pattern){
        $composant = "<input type = 'text' name = '" . $unNom . "' id = '" . $unId . "' ";
        if (!empty($uneValue)){
            $composant .= "value = '" . $uneValue . "' ";
        }
        if (!empty($placeholder)){
            $composant .= "placeholder = '" . $placeholder . "' ";
        }
        if ( $required == 1){
            $composant .= "required ";
        }
        if (!empty($pattern)){
            $composant .= "pattern = '" . $pattern . "' ";
        }
        $composant .= "disabled";
        $composant .= "/>";
        return $composant;
    }



//Fin Pierre

    public function concactComposants($unComposant , $autreComposant ){
        $unComposant .=  $autreComposant;
        return $unComposant ;
    }

    public function ajouterComposantLigne($unComposant){
        $this->ligneComposants[] = $unComposant;
    }

    public function ajouterComposantTab(){
        $this->tabComposants[] = $this->ligneComposants;
        $this->ligneComposants = array();
    }

    public function corpsDebut(){
        $composant = "<div class='corps'>";
        return $composant;
    }

    public function divFin(){
        $composant = "</div>";
        return $composant;
    }

    public function creerBr(){
        $composant = "<br></br>";
        return $composant;
    }
    public function afficher($value){
        return $value;
    }

    public function creerLabel($unLabel){
        $composant = "<label>" . $unLabel . "</label>";
        return $composant;
    }

    public function creerID($unNomID,$unID){
        $composant = "<input id='" . $unNomID . "' name='" . $unNomID . "' type='hidden' value='".$unID."'>";
        return $composant;
    }

    public function creerMessage($unMessage){
        $composant = "<label class='message'>" . $unMessage . "</label>";
        return $composant;
    }

    public function creerTextarea($unNom, $unID, $unPlaceholder, $rows, $cols, $uneValeur){
        $composant = "<textarea type='text' name='" . $unNom . "' id='" . $unID. "' placeholder='" . $unPlaceholder . "' rows='" . $rows . "' cols='" . $cols . "' required>" . $uneValeur. "</textarea>";
        return $composant;
    }


    public function creerInputTexte($unNom, $unId, $uneValue , $required , $placeholder , $pattern){
        $composant = "<input type = 'text' name = '" . $unNom . "' id = '" . $unId . "' ";
        if (!empty($uneValue)){
            $composant .= "value = '" . $uneValue . "' ";
        }
        if (!empty($placeholder)){
            $composant .= "placeholder = '" . $placeholder . "' ";
        }
        if ( $required = 1){
            $composant .= "required ";
        }
        if (!empty($pattern)){
            $composant .= "pattern = '" . $pattern . "' ";
        }
        $composant .= "/>";
        return $composant;
    }


    public function creerInputMdp($unNom, $unId,  $required , $placeholder , $pattern){
        $composant = "<input type = 'password' name = '" . $unNom . "' id = '" . $unId . "' ";
        if (!empty($placeholder)){
            $composant .= "placeholder = '" . $placeholder . "' ";
        }
        if ( $required = 1){
            $composant .= "required ";
        }
        if (!empty($pattern)){
            $composant .= "pattern = '" . $pattern . "' ";
        }
        $composant .= "/>";
        return $composant;
    }


    public function creerImg($class, $src, $alt){
        $composant = "<img class='" . $class . "' src='" . $src . "' alt='" . $alt . "'>";
        return $composant;
    }

    public function creerLabelFor($unFor,  $unLabel){
        $composant = "<label for='" . $unFor . "'>" . $unLabel . "</label>";
        return $composant;
    }

    public function creerTableau(){
        $composant = "<label for='" . $unFor . "'>" . $unLabel . "</label>";
        return $composant;
    }

//<h3 class="titre">Intitule : []</h3>
    public function creerTitre($uneClasse,  $unLabel){
        $composant = "<h3 class='" . $uneClasse . "'>" . $unLabel . "</h3>";
        return $composant;
    }

///<p class="corps">Descriptif : </p>
    public function creerCorp($uneClasse,  $unLabel){
        $composant = "<p class='" . $uneClasse . "'>" . $unLabel . "</p>";
        return $composant;
    }

    public function creerCorpDiv($uneClasse,  $unLabel){
        $composant = "<div class='" . $uneClasse . "'>" . $unLabel . "</div>";
        return $composant;
    }

    public function creerSelect($unNom, $unId, $unLabel, $options){
        $composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' >";
        foreach ($options as $option){
            $composant .= "<option value = '".$option[0]."'>".$option[1]."</option>" ;
        }
        $composant .= "</select></td></tr>";
        return $composant;
    }

    public function creerInputType($unType, $unNom, $unId, $uneValue, $accept){
        $composant = "<input type = '" . $unType . "' name = '" . $unNom . "' id = '" . $unId . "' ";
        $composant .= "value = '" . $uneValue . "' accept='" . $accept . "'/> ";
        return $composant;
    }

    public function creerInputSubmit($unNom, $unId, $uneValue){
        $composant = "<input type = 'submit' name = '" . $unNom . "' id = '" . $unId . "' ";
        $composant .= "value = '" . $uneValue . "'/> ";
        return $composant;
    }

    public function creerInputSubmit2($unNom, $unId, $uneValue){

        $composant = "<div class='corps'><input type = 'submit' name = '" . $unNom . "' id = '" . $unId . "' ";
        $composant .= "value = '" . $uneValue . "'/> </div>";
        return $composant;
    }

    public function creerInputImage($unNom, $unId, $uneSource){
        $composant = "<input type = 'image' name = '" . $unNom . "' id = '" . $unId . "' ";
        $composant .= "src = '" . $uneSource . "'/> ";
        return $composant;
    }


    public function creerFormulaire(){
        $this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
        $this->formulaireToPrint .= "action = '" .  $this->action . "' ";
        $this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
        $this->formulaireToPrint .= "class = '" .  $this->style . "' >";


        foreach ($this->tabComposants as $uneLigneComposants){
            $this->formulaireToPrint .= "<div class = 'ligne'>";
            foreach ($uneLigneComposants as $unComposant){
                $this->formulaireToPrint .= $unComposant ;
            }
            $this->formulaireToPrint .= "</div>";
        }
        $this->formulaireToPrint .= "</form>";
        return $this->formulaireToPrint ;
    }

    public function creerFormulaire2(){
        $this->formulaireToPrint = "<form enctype='multipart/form-data' method = '" .  $this->method . "' ";
        $this->formulaireToPrint .= "action = '" .  $this->action . "' ";
        $this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
        $this->formulaireToPrint .= "class = '" .  $this->style . "' >";


        foreach ($this->tabComposants as $uneLigneComposants){
            $this->formulaireToPrint .= "<div class = 'ligne'>";
            foreach ($uneLigneComposants as $unComposant){
                $this->formulaireToPrint .= $unComposant ;
            }
            $this->formulaireToPrint .= "</div>";
        }
        $this->formulaireToPrint .= "</form>";
        return $this->formulaireToPrint ;
    }

    public function creerArticle(){
        $this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
        $this->formulaireToPrint .= "action = '" .  $this->action . "' ";
        $this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
        $this->formulaireToPrint .= "class = '" .  $this->style . "' >";


        foreach ($this->tabComposants as $uneLigneComposants){
            $this->formulaireToPrint .= "<div class = 'article'>";
            foreach ($uneLigneComposants as $unComposant){
                $this->formulaireToPrint .= $unComposant ;
            }
            $this->formulaireToPrint .= "</div>";
        }
        $this->formulaireToPrint .= "</form>";
        return $this->formulaireToPrint ;
    }

    public function creerArticle2(){

        foreach ($this->tabComposants as $uneLigneComposants){
            $this->formulaireToPrint .= "<div class = 'article'>";
            foreach ($uneLigneComposants as $unComposant){
                $this->formulaireToPrint .= $unComposant ;
            }
            $this->formulaireToPrint .= "</div>";
        }
        return $this->formulaireToPrint ;
    }


    public function afficherFormulaire(){
        echo $this->formulaireToPrint ;
    }

}