<?php
include_once(__DIR__ . '/../includes/all.php');

$imageDirectory = realpath(__DIR__ . '/../img');
$imageDirectory = $imageDirectory ? $imageDirectory . DIRECTORY_SEPARATOR : __DIR__ . '/../img/';
$imageFiles = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE) ?: [];

$profiles = array_map(function ($path) {
    $filename = pathinfo($path, PATHINFO_FILENAME);
    $displayName = ucwords(str_replace(['-', '_'], ' ', $filename));

    return [
        'src' => '/CrimsonHacks/img/' . basename($path),
        'name' => $displayName ?: 'Anonymous Martian',
        'tagline' => 'Ready to explore the red planet with you.'
    ];
}, $imageFiles);
?>

<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all','dating']);?>
    <body>
      <?php echo navbar(); ?>
      <main class="dating-app">
        <h1>Smash or Pass</h1>

        <?php if (empty($profiles)): ?>
            <p class="empty-state">No cadets are available right now. Check back after the next Martian shuttle arrives.</p>
        <?php else: ?>
            <div class="card-stage">
                <div id="profile-card" class="profile-card">
                    <img id="profile-photo" src="<?php echo htmlspecialchars($profiles[0]['src']); ?>" alt="<?php echo htmlspecialchars($profiles[0]['name']); ?> profile photo">
                    <div class="profile-meta">
                        <h2 id="profile-name"><?php echo htmlspecialchars($profiles[0]['name']); ?></h2>
                        <p id="profile-tagline"><?php echo htmlspecialchars($profiles[0]['tagline']); ?></p>
                    </div>
                </div>
                <div class="actions">
                    <button class="pass" data-direction="left">Pass</button>
                    <button class="smash" data-direction="right">Smash</button>
                </div>
            </div>
            <p id="match-status" class="match-status">Swipe left to pass, right to smash.</p>
        <?php endif; ?>
      </main>

      <?php if (!empty($profiles)): ?>
      <script>
        const profiles = <?php echo json_encode($profiles, JSON_UNESCAPED_SLASHES); ?>;

        (function() {
          const card = document.getElementById('profile-card');
          const photo = document.getElementById('profile-photo');
          const name = document.getElementById('profile-name');
          const tagline = document.getElementById('profile-tagline');
          const status = document.getElementById('match-status');
          const buttons = document.querySelectorAll('.actions button');
          let index = 0;

          function showProfile(targetIndex) {
            const profile = profiles[targetIndex];
            photo.src = profile.src;
            photo.alt = profile.name + ' profile photo';
            name.textContent = profile.name;
            tagline.textContent = profile.tagline;
          }

          function handleChoice(direction) {
            card.classList.remove('swipe-left', 'swipe-right');
            void card.offsetWidth; // Restart animation
            card.classList.add(direction === 'left' ? 'swipe-left' : 'swipe-right');

            setTimeout(() => {
              index += 1;
              if (index >= profiles.length) {
                status.textContent = 'You have met every cadet. Refresh for another round.';
                card.classList.add('depleted');
                buttons.forEach(btn => btn.disabled = true);
                return;
              }

              showProfile(index);
              card.classList.remove('swipe-left', 'swipe-right');
              status.textContent = direction === 'left' ? 'Pass logged.' : 'Major smash energy.';
            }, 300);
          }

          buttons.forEach(button => {
            button.addEventListener('click', () => handleChoice(button.dataset.direction));
          });
        })();
      </script>
      <?php endif; ?>
    </body>
</html>
