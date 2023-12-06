<?php 
$age_du_visiteur = 17;
echo "Le visiteur a ";
echo $age_du_visiteur;
echo "ans <br>";
 
echo "Le visiteur à $age_du_visiteur ans <br>";

echo "Le visiteur à" .$age_du_visiteur. "ans <br>";

$valeur1 = 15;
$valeur2 = 30;
$valeur3 = $valeur1 + $valeur2;
echo "Le résultat de la somme de $valeur1 et $valeur2 est :" .$valeur3. " <br>";

if($valeur3 === "45"){
    echo "Success <br>";
}else{
    echo "error <br>";
}

$maChaine= "Je suis un etudiant de l'ecole29 de cotonou ";
//echo strlen($maChaine) ;//pour compter le nombre de lettre dans une chaine de caractère
//echo str_replace("etudiant", "eleve", $maChaine)//pour remplacer un mot dans une chaine de caractère
//echo str_shuffle($maChaine)//pour melanger les lettres
//echo strtolower($maChaine)//mettre toute la phrase en miniscule
//echo strtoupper($maChaine)//mettre toute la phrase en majuscule

$madate = date("d/m/Y");
/* echo $madate. "<br>";
$madate = date("y"); */
$maHour = date("H:i:s");
echo $maHour. "<br>";

echo "Bonjour ! Nous sommes le $madate  et il est $maHour ";

function VolumeCone($rayon, $hauteur){
$volume = $rayon * $rayon * (22/7) *$hauteur *(1/3);
return $volume;
}
echo VolumeCone(5, 14)
?>