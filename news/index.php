<?php
include_once("../includes/all.php");
// Example news data (this can be dynamic, fetched from a database)
$newsTitle = "Breaking News: Major Event Happens!";
$newsContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec venenatis arcu. Suspendisse potenti. Nulla facilisi. Vivamus pharetra, mauris ac vehicula dictum, lorem ligula tincidunt sem, at venenatis magna nulla ac ligula. Sed auctor augue a felis facilisis, eget placerat nunc iaculis. Sed sollicitudin dolor id odio tempor, nec euismod ipsum malesuada.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo head(['navbar']); ?>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php echo navbar(); ?>

    <header>
        <h1>Welcome to the News Site</h1>
    </header>

    <main>
        <div class="news-container">
            <!-- Left Image -->
            <div class="image-container left">
                <img src="images/img.png" alt="Image 1" class="news-image">
            </div>

            <!-- News Content -->
            <div class="news-content">
                <h2><?= $newsTitle ?></h2>
                <p><?= $newsContent ?></p>
            </div>

            <!-- Right Image -->
            <div class="text-container right">
                <h3>This is text on the side</h3>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Mars United. All rights reserved.</p>
    </footer>

</body>
</html>

