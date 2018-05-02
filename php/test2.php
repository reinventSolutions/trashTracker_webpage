<!--
    https://phppot.com/php/dates-and-time-in-php/
-->
<?php
    echo date_default_timezone_get(); //Display the current time zone.
    date_default_timezone_set("America/Los_Angeles");
    echo '<br>';
    $current_date = date('l-m-d-Y');
    // Will print current date in mm-dd-yyyy format 
    echo $current_date;
?>
