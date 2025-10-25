<?php
include_once("./includes/all.php");
include_once("./includes/main_page.php");
?>

<!DOCTYPE html>
<html lang="en-US">
  <?php echo head(['all', 'main_page']);?>
  <body>
  <?php echo navbar(); ?> 

  <main id="main" class="hero">
    <div class="hero-media">
      <div class="video-frame">
        <video playsinline autoplay preload="metadata">
          <source src="img/MartianAddress.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </main>

  <section class="feature-grid" aria-label="Choose your mission">
    <article class="feature-card">
      <div class="card-icon">🛰️</div>
      <h3>News Command</h3>
      <p>Stay briefed on every maneuver, scandal, and snack-based policy across the red frontier.</p>
      <a class="cta tertiary" href="/CrimsonHacks/news/">Open Feed</a>
    </article>
    <article class="feature-card">
      <div class="card-icon">❤️</div>
      <h3>Dating Bureau</h3>
      <p>Matched by ideology, united by passion. Swipe through heroic martians in the Smash or Pass arena.</p>
      <a class="cta tertiary" href="/CrimsonHacks/dating/">Start Matching</a>
    </article>
    <article class="feature-card">
      <div class="card-icon">💬</div>
      <h3>Forum Council</h3>
      <p>Debate terraforming tactics, argue about snacks, and file grievances—all in one space.</p>
      <a class="cta tertiary" href="/CrimsonHacks/forum/">Open Forum</a>
    </article>
  </section>
  
  </body>
</html>
