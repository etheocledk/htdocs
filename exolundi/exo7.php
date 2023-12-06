
<?php include('header.php') ?>
<a href="exo8.php">Suivant</a><br><br>
<?php 

$nombre = 2;
while ($nombre <= 100)
{
    if($nombre%2==0){
        echo 'Nombre Pair' . $nombre . '<br />';
    }
$nombre++;
}
?>

<?php include('footer.php') ?>