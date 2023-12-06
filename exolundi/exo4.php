<?php include('header.php') ?>
<a href="exo5.php">Suivant</a><br><br>
<?php 
function MontantTTC($PrixHT, $TauxTVA){
    $M_TauxTVA = $TauxTVA * $PrixHT/100;
    $montant = $PrixHT + $M_TauxTVA; 
    return $montant;
}

$montant=MontantTTC(1200,20);
echo "Le montant TTC d'un achat dont le PrixHT est 1200 et le taux TVA est 20% est: ". $montant
?>


<?php include('footer.php') ?>