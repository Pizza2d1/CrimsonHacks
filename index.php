<?php
include_once("./includes/all.php");
include_once("./includes/main_page.php");
?>

<!DOCTYPE html>
<html lang="en-US">
  <?php echo head(['all', 'main_page']);?>
  <body>
  <?php echo navbar(); ?> 

  <div id="main">
    <video width="300" controls>
      <source src="img/MartianAddress.mp4" type="video/mp4">
    </video>

    <br>

    "Do you want to charge us for just eating Humans? To this crime we plead guilty. " - Our glorius leader Karl Mars
  </div>

  <img class="ad" src="img/ads/hot_aliens.png">
  
  </body>
</html>
