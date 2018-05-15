<!-- 
    #######################################################
    FILENAME: logout.php
    OVERVIEW: PHP to logout.
    PURPOSE: PHP page for logging out, destroys session and
    get redirected back to index.php.
    #######################################################
-->
<?php
session_start();
session_destroy();
header("Location: ../splash2.php");
?>
