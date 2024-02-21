<?php

namespace controlleurs;

include_once(__DIR__ . "/../DAO/LieuDAO.php");

class LieuControlleur
{

    public $lieuDAO;
    public $listeLieux;

    function __construct(){
        $this->lieuDAO = new \LieuDAO();
        $this->listeLieux = $this->lieuDAO->getTousLesLieux();
    }

    public function afficherTousLesLieux(){
        $html = "";
        $num_sous_categorie = 0;
        foreach ($this->listeLieux as $lieu) {
            $num_sous_categorie += 1;
            $html .= "<input type='checkbox' class='choixDuLieu' id='sous-cat" . $num_sous_categorie . "' name='" . $lieu->getVilleLieu() . "'>
                <label for='sous-cat" . $num_sous_categorie . "'>" . $lieu->getVilleLieu() . "</label><br>";
        }
        echo $html;
    }

    public function afficherTousLesLieuxVueModifierFormation($listeLieuxFormation){
        $html = "";
        $count = 1;
        foreach ($this->listeLieux as $lieu){
            $html .= "<input type='checkbox' id='sous-lieu$count' name='". $lieu->getIdLieu() ."'";
            foreach ($listeLieuxFormation as $lieuFormation){
                if ($lieu->getIdLieu() == $lieuFormation->getIdLieu()){
                    $html .= " checked='true'";
                }
            }
            $html .= "><label for='sous-lieu$count'>" . $lieu->getVilleLieu() ."</label><br><br>";
            $count = $count + 1;
        }

        return $html;
    }

    public function afficherTousLesLieuxVueAjouterFormation(){
        $html = "";
        foreach ($this->listeLieux as $lieu){
            $html .= "<input type='checkbox' id='sous-lieu' name='lieuFormation[]' value='". $lieu->getIdLieu() ."'>
                    <label for='sous-lieu'>" . $lieu->getVilleLieu() ."</label><br><br>";
        }
        echo $html;
    }


}