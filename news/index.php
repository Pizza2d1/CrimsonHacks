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
$newsTitle3 = "How the radical humans are taking away your right to sapien meat";
$newsContent3 = "Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.";
$newsTitle4 = "50 Aligators found in Cydania crader";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo head(['navbar']); ?>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


    <header>
        <h1>Martian News</h1>
        <p>(def not propaganda)</p>
    </header>
    <?php echo navbar(); ?>

    <main>
        <div class="news-container">
            <!-- Left Image -->
            <div class="image-container left">
                <img src="https://cdn.discordapp.com/attachments/1430037351475707986/1431491953668915329/image.png?ex=68fd9c45&is=68fc4ac5&hm=e9ef420044db8ca4f8a0d11e824dbb1c652d767aa9f259f3e96ef32243a7cdea&" alt="Image 1" class="news-image">
            </div>

            <!-- News Content -->
            <div class="news-content">
                <h2><?= $newsTitle ?></h2>
                <p><?= $newsContent ?></p>
                <br><br>
                <h2><?= $newsTitle2 ?></h2>
                <p><?= $newsContent2 ?></p>
                <br><br>
                <h2><?= $newsTitle3 ?></h2>
                <p><?= $newsContent3 ?></p>
                <br><br>
                <h2><?= $newsTitle4 ?></h2>
                <p><?= $newsContent3 ?></p>
                <br><br>
                <br><br>
                <br><br>
            </div>

            <!-- Right Image -->
            <div class="text-container right">
                <video width="300" controls autoplay loop muted>
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
