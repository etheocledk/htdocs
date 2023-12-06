
<?php include("header.php") ?>
<a href="exo2.php">Suivant</a><br><br>
<?php
function VolumePyramide($Longueur, $Hauteur){
    $volume = $Longueur *$Longueur *  $Hauteur; 
    return $volume;
}

$volume=VolumePyramide(5,2);
echo 'Le volume d\'une pyramide ayant pour longueur 5 et hauteur 2 est : '. $volume
?>
<?php include("footer.php") ?>