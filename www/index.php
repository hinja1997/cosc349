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
<tr><th>Word</th></tr>

<?php
    $db_host   = '192.168.2.31';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    $getData = $pdo->query("SELECT * FROM words");


    while($row = $getData->fetch()){
        echo "<tr><td>".$row["word"]."</td></tr>\n";
    }
?>

</table></br>

<?php
    function getSelectedLanguage($val1, $val2) {
       if ($_SESSION[$val1] == $val2) {
           echo "selected language";
       }
    }
?>

<p>Add a new word to the table:</p>
<form action="insert.php" method="post">
    <p>
        <label for="word">Word:</label>
        <input type="text" name="word" id="word">
    </p>
<input type="submit" value="Add"></input>
</form>

<p>Choose a language to convert the table to:</p>
<form action="index.php" method="post">
     <p> Translate the table to:
           <select name="language">
             <option value="french" <?php getSelectedLanguage("lang", "french"); ?>>French</option>
             <option value="italian" <?php getSelectedLanguage("lang", "italian"); ?>>Italian</option>
             <option value="spanish" <?php getSelectedLanguage("lang", "spanish"); ?>>Spanish</option>
           </select>
</p>
<input type="submit" value="Translate"></input>
</form>
</body>
</html>
