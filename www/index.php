<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Language Converter</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
<h1>Database test page</h1>

<p>Translated Words Below:</p>
<br><table border="1">
<tr><th>Word in English</th><th>Language</th><th>Translated Word</th></tr>

<?php
    
    $language = $_POST['language'];
    $db_host   = '192.168.2.31';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    $q = $pdo->query("SELECT * FROM WordConverter");


    while($row = $q->fetch()){
        echo "<tr><td>".$row["word"]."</td><td>".$row["lang"]."</td><td>".$row["translated_word"]."</td></tr>\n";
    }
    
?>

</table></br>

<?php
    function getSelectSession($val, $val2) {
       if ($_SESSION[$val] == $val2) {
           echo "selected";
       }
    }
?>

<p>Add a new word to the table:</p>
<form action="insert.php" method="post">
    <p>
        <label for="word">Word:</label>
        <input type="text" name="word" id="word">
    </p>
     <p> Translate from English to:
           <select name="language">
             <option value="french" <?php getSelectSession("lang", "french"); ?>>French</option>
             <option value="italian" <?php getSelectSession("lang", "italian"); ?>>Italian</option>
             <option value="spanish" <?php getSelectSession("lang", "spanish"); ?>>Spanish</option>
             <option value="portugese"<?php getSelectSession("lang", "portugese"); ?>>Portugese</option>
           </select>
</p>
    <input type="submit" value="Submit">
</form>


</body>
</html>
