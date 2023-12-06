<?php include('header.php') ?>
<a href="exo6.php">Suivant</a><br><br>
<?php
function tableau($tab){
    /* $phrase= implode($tab); */
     foreach($tab as $element)
    {
    echo $element .' '; 
    }
    /* return $phrase; */
}

$table = array ('Je ', 'suis', 'le', 'plus',
'fort', 'de', 'ma', 'génération');
echo tableau($table)
?>

<?php include('footer.php') ?>