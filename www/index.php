<!DOCTYPE HTML>
<html>
<head><H1>Date Language Converter</H1><STYLE type="text/css">
H1 { text-align: center}
</STYLE></head>

<body>
<STYLE type="text/css">
 body { text-align: center}
</STYLE>

<p> <?php $date = file_get_contents("http://192.168.2.32?language=english");?> </p>
<p><b>NZ Date in English: </b><?php echo "$date"; ?></p>

<?php
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Translate'])){
        switchLanguages();
    }
    
    function switchLanguages(){
        $language = $_POST['language'];
        $db_host   = '192.168.2.31';
        $db_name   = 'fvision';
        $db_user   = 'webuser';
        $db_passwd = 'insecure_db_pw';
        
        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
        
        if($language == "french"){
            $fre = file_get_contents("http://192.168.2.32?language=french");
            $_SESSION['dates'] = "<p><b> Date in French: </b>$fre </p>";
            $q = $pdo->query("UPDATE dateToConvert SET lang = 'french' WHERE ID='ID'");
        } else if($language == "italian"){
            $ita = file_get_contents("http://192.168.2.32?language=italian");
            $_SESSION['dates'] = "<p><b> Date in Italian:</b> $ita </p>";
            $q = $pdo->query("UPDATE dateToConvert SET lang = 'italian' WHERE ID='ID'");
        } else if($language == "spanish"){
            $spa = file_get_contents("http://192.168.2.32?language=spanish");
            $_SESSION['dates'] = "<p><b> Date in Spanish:</b> $spa </p>";
            $q = $pdo->query("UPDATE dateToConvert SET lang = 'spanish' WHERE ID='ID'");
        } else if($language == "portugese"){
            $por = file_get_contents("http://192.168.2.32?language=portugese");
            $_SESSION['dates'] = "<p><b> Date in Portugese: </b> $por </p>";
            $q = $pdo->query("UPDATE dateToConvert SET lang = 'portugese' WHERE ID='ID'");
        }
    }
?>

<?php
    
    $db_host   = '192.168.2.31';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    $q = $pdo->query("SELECT * FROM dateToConvert");
    
    while($row = $q->fetch()) {
        $original = $row["lang"];
        if($original == $language){
            header("refresh: 0;");
        }
    }
    
    $_SESSION['date'] = $original;
?>

<?php
    
    function getSelectedLanguage($val1, $lang) {
        if ($_SESSION[$val1] == $lang) {
            echo "selected language";
          }
      }
?>

<form action="index.php" method="post">
<p> Convert from English to:
    <select name="language">
        <option value="french" <?php getSelectedLanguage("lang", "french"); ?>>French</option>
        <option value="italian" <?php getSelectedLanguage("lang", "italian"); ?>>Italian</option>
        <option value="spanish" <?php getSelectedLanguage("lang", "spanish"); ?>>Spanish</option>
        <option value="portugese" <?php getSelectedLanguage("lang", "portugese"); ?>>Portugese</option>
    </select>
        <input type="submit" name="Translate" value="Translate"></input>
</form>

<?php
    echo $_SESSION['dates'];
    $_SESSION['dates'] = "";
?>

</body>
</html>
