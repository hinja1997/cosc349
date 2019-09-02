<html>
<body>

<?php

    if(strcmp($_GET['language'], "english") == 0){
        $date = new DateTime();
        $nz_date = new DateTimeZone('Pacific/Auckland');
        $date->setTimezone($nz_date);
        echo $date->format('l d F Y');
    }
    if(strcmp($_GET['language'], "french") == 0){
        /* Set locale to Dutch */
        setlocale(LC_ALL, 'nl_NL');

        /* Output: vrijdag 22 december 1978 */
        echo strftime("%A %e %B %Y", mktime(0, 0, 0, 12, 22, 1978));

        /* try different possible locale names for german as of PHP 4.3.0 */
        $loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');
        echo "Preferred locale for german on this system is '$loc_de'";
    
    }
    if(strcmp($_GET['language'], "spanish") == 0){
        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
        $date = date('F j, Y');
        echo strftime('%d %B %Y',strtotime($date));
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
