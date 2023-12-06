<?php include('header.php') ?>
<a href="exo9.php">Suivant</a><br><br>
<?php 

for ($nombre = 2; $nombre <= 100; $nombre++)
{
    if($nombre%2 !=0){
        echo 'Nombre Impair' . $nombre . '<br />';
    }
}
?>

<?php include('footer.php') ?>