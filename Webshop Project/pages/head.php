<?php
session_start();
if(empty($_SESSION['u_id'])):
?>
<!--HTML ha ki van jelentkezve a felhasználó-->
<?php
else:
    ?>
<!--HTML ha be van jelentkezve a felhasználó-->
<?php
    endif;