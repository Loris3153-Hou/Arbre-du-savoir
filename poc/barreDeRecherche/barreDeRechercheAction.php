<?php

$liste[] = "Marketing Digital Avancé";
$liste[] = "Développement Web Full-Stack";
$liste[] = "Leadership et Gestion d'Équipe";
$liste[] = "Développement d'Applications Mobiles";
$liste[] = "Marketing des Réseaux Sociaux";
$liste[] = "Cybersécurité et Protection des Données";
$liste[] = "Gestion de Projet Agile";
$liste[] = "Leadership Stratégique";
$liste[] = "Programmer en C";


$value = $_REQUEST["value"];
$html = "";

function fctRetirerAccents($varMaChaine)
{
    $search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
    $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

    $varMaChaine = str_replace($search, $replace, $varMaChaine);
    return $varMaChaine;
}

if ($value !== "") {
    $value = strtolower($value);
    $len=strlen($value);
    foreach($liste as $name) {
        if (stristr($value, substr(fctRetirerAccents($name), 0, $len))) {
            if ($html === "") {
                $html = $name;
            } else {
                $html .= ",<br> $name";
            }
        }
    }
}

echo $html;

