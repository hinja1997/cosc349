<html>
<body>

<?php
    
    $format = "l d F Y";
    date_default_timezone_set('NZ');

    if(strcmp($_GET['language'], "english") == 0){
        $date = new DateTime();
        $nz_date = new DateTimeZone('Pacific/Auckland');
        $date->setTimezone($nz_date);
        echo $date->format($format);
    }
    if(strcmp($_GET['language'], "french") == 0){
        echo dateToFrench("now", $format);
    }
    if(strcmp($_GET['language'], "spanish") == 0){
        echo dateToFrench("now", $format);
    }
    if(strcmp($_GET['language'], "italian") == 0){
        echo dateToItalian("now", $format);
    }
    if(strcmp($_GET['language'], "portugese") == 0){
        echo dateToPortugese("now", $format);
    }
?>

<?php
    function dateToFrench($date, $format)
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $french_days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
    }
    
    function dateToSpanish($date, $format) {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $spanish_days = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $spanish_months = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        return str_replace($english_months, $spanish_months, str_replace($english_days, $spanish_days, date($format, strtotime($date))));
    }
    
    function dateToItalian($date, $format) {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $italian_days = array('Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato', 'Domenica');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $italian_months = array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre');
        return str_replace($english_months, $italian_months, str_replace($english_days, $italian_days, date($format, strtotime($date))));
    }
    
    function dateToPortugese($date, $format) {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $portugese_days = array('Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $portugese_months = array('Janeiro', 'Fevereiro', 'Fevereiro', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        return str_replace($english_months, $portugese_months, str_replace($english_days, $portugese_days, date($format, strtotime($date))));
    }
?>

</body>
</html>
