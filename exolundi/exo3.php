<?php include('header.php') ?>
<a href="exo4.php">Suivant</a><br><br>
<?php
function tableau($prenoms){
    foreach($prenoms as $element)
    {
    echo $element . '<br />'; 
    
    }
}

$table = array ('Pauline', 'Job', 'Nicole', 'Véro',
'Benoît');
echo tableau($table)
?>

<?php include('footer.php') ?>