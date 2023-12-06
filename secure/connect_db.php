<?php

$user = 'root';
$pass = '';

try
{
    $db = new PDO('mysql:host->localhost;dbname=secureDB', $user, $pass);
    print_r('toto');

}catch(PDOException $e)
{
    print 'Erreur:' . $e->getMessage()."<br/>";
    die;
}