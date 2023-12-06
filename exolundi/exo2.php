<?php include('header.php') ?>
<a href="exo3.php">Suivant</a><br><br>
<?php 

function Moyenne($valeur1, $valeur2){
    $moyenne = ($valeur1 + $valeur2)/2; 
    return $moyenne;
}

$moyenne=Moyenne(5,2);
echo 'La moyenne de 5 et 2 est :'. $moyenne
?>


<?php include('footer.php') ?>