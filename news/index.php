<?php
include_once("../includes/all.php");
// Example news data (this can be dynamic, fetched from a database)
#$newsTitle = "Breaking News: Major Event Happens!";
#$newsContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec venenatis arcu. Suspendisse potenti. Nulla facilisi. Vivamus pharetra, mauris ac vehicula dictum, lorem ligula tincidunt sem, at venenatis magna nulla ac ligula. Sed auctor augue a felis facilisis, eget placerat nunc iaculis. Sed sollicitudin dolor id odio tempor, nec euismod ipsum malesuada.";
$newsTitle = "Breaking News: Cydonia Rallies to Defend Chili Dogs";
$newsContent = "Our Great Leader warns, “Our enemy hates chili dogs and plans to steal and destroy them all!” Citizens of Cydonia are preparing to defend their beloved local delicacy. Streets are alive with rallies, and vendors report record chili dog sales. Families are stockpiling ingredients, and neighborhood watch groups are organizing patrols around local eateries. Community leaders are calling for volunteers to guard chili dog supply lines and protect local kitchens. Military and civic leaders urge everyone to unite: this is a fight for more than food—it’s a fight for the spirit of our city. Experts warn that losing chili dogs would be a blow to Cydonia’s identity and morale. Children and adults alike are painting banners with slogans like “Defend the Chili!” and “No Dog Left Behind!”

Cydonia stands ready. No chili dog will be left unguarded. The city vows to protect its culinary heritage at all costs.";
$newsTitle2 = "Breaking News: Chili Dog Crisis Escalates in Cydonia";
$newsContent2 = "Chaos erupted this morning as reports came in that enemy forces were spotted near the city outskirts, targeting Cydonia’s prized chili dog factories. Eyewitnesses describe long lines of citizens rushing to protect their supplies, while local chefs armed with spatulas and sauce bottles prepared for defense.

“Our chili dogs are more than food—they are our heritage,” said Mayor Lucinda Pepper, rallying the crowd in front of City Hall. Military units have been deployed to key locations, and emergency chili dog rationing is now in effect. Social media is flooded with messages of solidarity, with hashtags like #ChiliDogStrong and #DefendCydonia trending worldwide.

Analysts warn that if the enemy succeeds, it could lead to a severe morale crisis across the city. But for now, Cydonia stands united, determined to defend every last chili dog from theft or destruction.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo head(['navbar']); ?>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php echo navbar(); 

                #<h3><a href="https://pizza2d1.duckdns.org/CrimsonHacks/cia/">This is text on the side</a></h3>
?>

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
                <br><br>
                <h2><?= $newsTitle2 ?></h2>
                <p><?= $newsContent2 ?></p>
            </div>

            <!-- Right Image -->
            <div class="text-container right">
                <video width="300" controls autoplay>
                  <source src="../img/MartianAddress.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Mars United. All rights reserved.</p>
    </footer>

</body>
</html>

