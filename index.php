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
        <video controls playsinline poster="img/ads/hot_aliens.png">
          <source src="img/MartianAddress.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <p class="video-caption">Direct transmission from the Olympus Mons broadcast deck.</p>
    </div>

    <div class="hero-content">
      <p class="eyebrow">Dispatch • Stardate 42-3</p>
      <h2>“Do you want to charge us for just eating humans? To this crime we plead guilty.”</h2>
      <p class="lead">Comrade Karl Mars reminds every citizen that bold appetite fuels bold progress. Tune in, laugh at Earth, and organize the galaxy.</p>
      <div class="hero-cta">
        <a class="cta primary" href="/CrimsonHacks/news/">Read the Latest Dispatch</a>
        <a class="cta secondary" href="/CrimsonHacks/forum/">Join the Forum</a>
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

  <section class="ad-panel">
    <img src="img/ads/hot_aliens.png" alt="Hot aliens recruitment poster">
    <div class="ad-copy">
      <p class="eyebrow">Special Broadcast</p>
      <h3>Hot Aliens Hotline</h3>
      <p>Operators are standing by to connect you with only the fiercest comrades. Limited-time rations bonus for first contact.</p>
      <a class="cta primary" href="/CrimsonHacks/dating/">Dial In</a>
    </div>
  </section>
  
  </body>
</html>
