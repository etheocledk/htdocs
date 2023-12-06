<?php include('header.php') ?>
<a href="index.php">Suivant</a><br><br>
<?php
function Message($condition){
    if($condition=="Je suis un homme et de l'aube")
    {
    echo "Je suis H de l'aube"; 
    
    }elseif($condition=="Je suis un homme et d'ailleurs")
    {
    echo "Je suis H de d'ailleurs"; 
    
    }elseif($condition=="Je suis un femme et de l'aube")
    {
    echo "Je suis F de l'aube"; 
    
    }elseif($condition=="Je suis un femme et d'ailleurs")
    {
    echo "Je suis F de d'ailleurs"; 
    
    }
}

 
echo Message("Je suis un femme et de l'aube");
?>

<?php include('footer.php') ?>