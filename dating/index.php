<?php
// index.php
session_start();

// 1) CONFIG: Your image list
$images = [
  "/CrimsonHacks/img/dating/Dating1.jpg",
  "/CrimsonHacks/img/dating/Dating2.jpg",
  "/CrimsonHacks/img/dating/Dating3.jpg",
  "/CrimsonHacks/img/dating/Dating4.jpg",
  "/CrimsonHacks/img/dating/Dating5.jpg",
];

// Initialize session state
if (!isset($_SESSION['idx'])) {
  $_SESSION['idx'] = 0;           // current image index
  $_SESSION['votes'] = [];        // store ["choice" => "smash"/"pass", "image" => "..."]
}

// Reset route
if (isset($_GET['reset'])) {
  $_SESSION['idx'] = 0;
  $_SESSION['votes'] = [];
  header("Location: ".$_SERVER['PHP_SELF']);
  exit;
}

// 2) AJAX: handle a vote and return the next image
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'vote') {
  header('Content-Type: application/json; charset=utf-8');

  $choice = isset($_POST['choice']) ? strtolower(trim($_POST['choice'])) : '';
  if (!in_array($choice, ['smash', 'pass'], true)) {
    echo json_encode(['ok' => false, 'error' => 'Invalid choice']);
    exit;
  }

  $idx = $_SESSION['idx'];
  if ($idx >= count($images)) {
    echo json_encode(['ok' => true, 'done' => true]);
    exit;
  }

  $currentImg = $images[$idx];
  $_SESSION['votes'][] = ['choice' => $choice, 'image' => $currentImg];
  $_SESSION['idx'] = $idx + 1;

  // Prepare next image
  if ($_SESSION['idx'] < count($images)) {
    $nextImg = $images[$_SESSION['idx']];
    echo json_encode(['ok' => true, 'done' => false, 'next' => $nextImg, 'index' => $_SESSION['idx']]);
  } else {
    echo json_encode(['ok' => true, 'done' => true]);
  }
  exit;
}

// Helper values for initial render
$currentIndex = $_SESSION['idx'];
$total = count($images);
$currentSrc = $currentIndex < $total ? $images[$currentIndex] : null;
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Smash or Pass</title>
<style>
  :root {
    --bg: #0f1217;
    --card: #161a22;
    --text: #e8ecf1;
    --muted: #a8b3c2;
    --accent: #7c5cff;
    --ok: #22c55e;
    --bad: #ef4444;
  }
  * { box-sizing: border-box; }
  body {
    margin: 0;
    font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
    background: radial-gradient(1200px 800px at 80% -20%, #1a2030 0, #0f1217 55%);
    color: var(--text);
    min-height: 100dvh;
    display: grid;
    place-items: center;
    padding: 24px;
  }
  .app {
    width: min(520px, 92vw);
  }
  .topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
  }
  .title {
    font-weight: 700;
    letter-spacing: 0.2px;
  }
  .count {
    color: var(--muted);
    font-size: 14px;
  }
  .card-wrap {
    position: relative;
    height: min(70vh, 64vw);
    max-height: 640px;
    border-radius: 24px;
    background: linear-gradient(180deg, #202534, #161a22);
    box-shadow: 0 20px 60px rgba(0,0,0,0.45);
    overflow: hidden;
  }
  .card {
    position: absolute;
    inset: 0;
    display: grid;
    place-items: center;
    will-change: transform, opacity;
    transition: transform 380ms cubic-bezier(.2,.7,.2,1), opacity 240ms ease;
    border-radius: 24px;
    overflow: hidden;
  }
  .card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    user-select: none;
    -webkit-user-drag: none;
    pointer-events: none;
  }
  .swipe-left  { transform: translateX(-120%) rotate(-12deg); opacity: 0.1; }
  .swipe-right { transform: translateX(120%) rotate(12deg); opacity: 0.1; }

  .buttons {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-top: 16px;
  }
  button {
    appearance: none;
    border: 0;
    background: var(--card);
    color: var(--text);
    padding: 16px 18px;
    border-radius: 14px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 6px 18px rgba(0,0,0,0.35), inset 0 0 0 1px rgba(255,255,255,0.05);
    transition: transform 120ms ease, box-shadow 120ms ease, background 120ms ease;
  }
  button:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 24px rgba(0,0,0,0.45), inset 0 0 0 1px rgba(255,255,255,0.08);
  }
  .btn-pass { background: linear-gradient(180deg, #2a1416, #1c1112); }
  .btn-pass .pill { background: rgba(239, 68, 68, 0.18); color: #fecaca; }
  .btn-smash { background: linear-gradient(180deg, #132217, #111a14); }
  .btn-smash .pill { background: rgba(34, 197, 94, 0.18); color: #bbf7d0; }
  .pill {
    display: inline-block;
    font-weight: 800;
    letter-spacing: .2px;
    font-size: 14px;
    padding: 6px 10px;
    border-radius: 999px;
    margin-right: 8px;
  }
  .end {
    text-align: center;
    padding: 32px 12px;
    color: var(--muted);
  }
  .end h2 { color: var(--text); margin: 8px 0 6px; }
  .restart {
    margin-top: 10px;
    display: inline-block;
    color: #c7d2fe;
    text-decoration: none;
    padding: 10px 14px;
    border-radius: 10px;
    background: rgba(124,92,255,0.12);
    border: 1px solid rgba(124,92,255,0.35);
  }
</style>
</head>
<body>
<div class="app">
  <div class="topbar">
    <div class="title">Smash or Pass</div>
    <div class="count" id="counter">
      <?php
        if ($currentSrc) {
          echo htmlspecialchars(($currentIndex+1)." / ".$total, ENT_QUOTES, 'UTF-8');
        } else {
          echo "0 / ".(int)$total;
        }
      ?>
    </div>
  </div>

  <div class="card-wrap" id="cardWrap">
    <?php if ($currentSrc): ?>
      <div class="card" id="card">
        <img id="img" src="<?php echo htmlspecialchars($currentSrc, ENT_QUOTES, 'UTF-8'); ?>" alt="current">
      </div>
    <?php else: ?>
      <div class="end">
        <h2>All done!</h2>
        <p>You’ve reached the end of the stack.</p>
        <a class="restart" href="?reset=1">Restart</a>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($currentSrc): ?>
  <div class="buttons">
    <button class="btn-pass" id="btnPass" aria-label="Pass (Left)">
      <span class="pill">❌ Pass</span> Swipe Left
    </button>
    <button class="btn-smash" id="btnSmash" aria-label="Smash (Right)">
      <span class="pill">✅ Smash</span> Swipe Right
    </button>
  </div>
  <?php endif; ?>
</div>

<script>
(function(){
  const cardWrap = document.getElementById('cardWrap');
  const counter  = document.getElementById('counter');
  const btnPass  = document.getElementById('btnPass');
  const btnSmash = document.getElementById('btnSmash');

  let card   = document.getElementById('card');
  let imgEl  = document.getElementById('img');
  let busy   = false;

  function updateCounter(nextIndex, total) {
    counter && (counter.textContent = `${nextIndex} / ${total}`);
  }

  function endScreen() {
    cardWrap.innerHTML = `
      <div class="end">
        <h2>All done!</h2>
        <p>You’ve reached the end of the stack.</p>
        <a class="restart" href="?reset=1">Restart</a>
      </div>`;
    if (counter) counter.textContent = `0 / ${<?php echo (int)$total; ?>}`;
    if (btnPass) btnPass.remove();
    if (btnSmash) btnSmash.remove();
  }

  function animateAndNext(direction, nextSrc) {
    if (!card) return;
    card.classList.add(direction === 'left' ? 'swipe-left' : 'swipe-right');

    // After animation, swap to next
    setTimeout(() => {
      if (nextSrc) {
        // replace img src without recreating the DOM tree too much
        imgEl.src = nextSrc;
        // reset animation
        card.classList.remove('swipe-left','swipe-right');
      } else {
        endScreen();
      }
      busy = false;
    }, 380);
  }

  async function vote(choice) {
    if (busy || !card) return;
    busy = true;
    const dir = (choice === 'pass') ? 'left' : 'right';

    try {
      const form = new FormData();
      form.append('action', 'vote');
      form.append('choice', choice);

      const res = await fetch(location.href, { method: 'POST', body: form });
      const data = await res.json();

      if (!data.ok) throw new Error(data.error || 'Vote failed');

      if (data.done) {
        animateAndNext(dir, null);
      } else {
        // Preload next
        const nextSrc = data.next;
        if (nextSrc) {
          const pre = new Image();
          pre.src = nextSrc;
          // update counter for the *new* index (1-based for humans)
          updateCounter(data.index + 1, <?php echo (int)$total; ?>);
        }
        animateAndNext(dir, nextSrc || null);
      }
    } catch (e) {
      console.error(e);
      busy = false;
      alert('Something went wrong.');
    }
  }

  // Button events
  btnPass && btnPass.addEventListener('click', () => vote('pass'));
  btnSmash && btnSmash.addEventListener('click', () => vote('smash'));

  // Keyboard support
  window.addEventListener('keydown', (e) => {
    if (!card) return;
    if (e.key === 'ArrowLeft')  vote('pass');
    if (e.key === 'ArrowRight') vote('smash');
  });

  // Touch swipe (simple)
  let startX = null, startY = null;
  cardWrap.addEventListener('touchstart', (e) => {
    if (!e.touches || e.touches.length !== 1) return;
    startX = e.touches[0].clientX;
    startY = e.touches[0].clientY;
  }, {passive: true});

  cardWrap.addEventListener('touchend', (e) => {
    if (startX === null || startY === null) return;
    const dx = (e.changedTouches && e.changedTouches[0].clientX) - startX;
    const dy = (e.changedTouches && e.changedTouches[0].clientY) - startY;
    startX = startY = null;

    // horizontal swipe threshold
    if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) {
      if (dx > 0) vote('smash'); else vote('pass');
    }
  }, {passive: true});
})();
</script>
</body>
</html>
