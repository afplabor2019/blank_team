<?php
/**
 *  * User: Dombi Tibor HL5U4V
 * Date: 2019. 10. 17.
 * Time: 10:13
 */
//session_start();
if(empty($_SESSION['u_id'])):
    ?>
    <!--HTML ha ki van jelentkezve a felhasználó-->
<?php
else:
    header('Location: index.php'); //redirect to index if logged in
endif;

/*
 * Igazából 99%, hogy nem kell itt az if, de mindegy, majd módosítgatjátok
 */