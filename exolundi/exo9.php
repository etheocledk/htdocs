
<?php include('header.php') ?>
<a href="exo10.php">Suivant</a><br><br>
<?php
function Message($Sexe){
    if($Sexe=='M')
    {
    echo 'Je suis un homme'; 
    
    }else{
        echo 'Je suis une femme'; 
    }
}

 
echo Message('M');
?>

<?php include('footer.php') ?>