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

      <div class='advertisement'><img src='https://cdn.discordapp.com/attachments/1430037351475707986/1431491953668915329/image.png?ex=68fd9c45&is=68fc4ac5&hm=e9ef420044db8ca4f8a0d11e824dbb1c652d767aa9f259f3e96ef32243a7cdea&'</div>
    </body>
</html>

