<html>
<body>

<?php

    if(strcmp($_GET['language'], "english") == 0){
        $datetime = new DateTime();
        $datetime->setlocale(LC_TIME, 'en_NZ.UTF-8');
        echo strftime("%B %e, %G");
    }
    if(strcmp($_GET['language'], "french") == 0){
        $datetime = new DateTime();
        $datetime->setlocale(LC_TIME, 'fr_FR.UTF-8');
        echo strftime("%B %e, %G");
    }
    if(strcmp($_GET['language'], "spanish") == 0){
        $datetime = new DateTime();
        $datetime->setlocale(LC_TIME, 'es_ES.UTF-8');
        echo strftime("%B %e, %G");
    }
    if(strcmp($_GET['language'], "italian") == 0){
        $datetime = new DateTime();
        $datetime->setlocale(LC_TIME, 'it_IT.UTF-8');
        echo strftime("%B %e, %G");
    }
    if(strcmp($_GET['language'], "portugese") == 0){
        $datetime = new DateTime();
        $datetime->setlocale(LC_TIME, 'pt_PT.UTF-8');
        echo strftime("%B %e, %G");
    }
?>
</body>
</html>
