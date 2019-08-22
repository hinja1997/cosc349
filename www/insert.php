<?php
 
$db_host   = '192.168.2.31';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    
$q1 = $pdo->query("INSERT INTO WordConverter (word, lang) VALUES ('$_POST[word]','$_POST[language]')");
    
header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;
?>
