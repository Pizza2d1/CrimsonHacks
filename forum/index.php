<?php
include_once("../includes/all.php");
include_once("./includes/content.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all','forums']);?>
    <body>
    <?php
      echo navbar();
      echo forum_item();
      echo alien_ad(); # To left
    ?>

      <div class='advertisement'><img src='/CrimsonHacks/img/img.png'</div>
    </body>
</html>

