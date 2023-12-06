<?php include('header.php') ?>
<a href="exo7.php">Suivant</a><br><br>
<?php 

$somme =0;
for ($i = 0; $i <= 99; $i++)
{
$somme +=1; 
}
echo 'Le resultat de la somme est : '. $somme;
?>

<?php include('footer.php') ?>