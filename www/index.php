<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Database test page</title>
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

<p>Showing contents of WordConverter table:</p>

<table border="1">
<tr><th>Word</th><th>Language</th></tr>

<?php
 
$db_host   = '192.168.2.31';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM WordConverter");


while($row = $q->fetch()){
  echo "<tr><td>".$row["word"]."</td><td>".$row["lang"]."</td></tr>\n";
}
    
?>

</table>

<p>Add a new word to the table:</p>
<form action="insert.php" method="post">
    <p>
        <label for="word">Word:</label>
        <input type="text" name="word" id="word">
    </p>
    <p>
        <label for="language">Language:</label>
        <input type="text" name="language" id="language">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>
