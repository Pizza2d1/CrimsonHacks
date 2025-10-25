<?php
include_once("../includes/all.php");
include_once("./includes/content.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all','forum']);?>
    <body>
    <?php
      echo navbar();
      echo forum_item();
      echo alien_ad();
    ?>
    </body>
</html>

