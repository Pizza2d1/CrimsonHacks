<?php
// Define the path to the image directory
$imageDirectory = 'img/';

// Get all image files (PNG, JPG, GIF, JPEG) in the directory
$imageFiles = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Define a function to resize the image to 50x50
function resizeImage($filePath, $width = 50, $height = 50) {
    list($originalWidth, $originalHeight) = getimagesize($filePath);

    $newImage = imagecreatetruecolor($width, $height);

    // Create image resource based on the file type
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($filePath);
            break;
        case 'png':
            $image = imagecreatefrompng($filePath);
            break;
        case 'gif':
            $image = imagecreatefromgif($filePath);
            break;
        default:
            return false;
    }

    // Resize the image
    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

    // Output the resized image to a string (to display in HTML)
    ob_start();
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($newImage);
            break;
        case 'png':
            imagepng($newImage);
            break;
        case 'gif':
            imagegif($newImage);
            break;
    }
    $imageData = ob_get_contents();
    ob_end_clean();

    return 'data:image/' . $ext . ';base64,' . base64_encode($imageData);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .image-box {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            max-width: 300px;
        }
        .image-box img {
            margin-right: 10px;
        }
        .image-box .text {
            font-size: 16px;
        }
    </style>
</head>
<body>

    <h1>Image Gallery</h1>

    <?php
    // Loop through each image and display it
    foreach ($imageFiles as $imageFile) {
        // Resize image
        $resizedImage = resizeImage($imageFile);

        // Extract the file name for the text (optional, you can customize this)
        $fileName = basename($imageFile);
    ?>

    <div class="image-box">
        <img src="<?= $resizedImage ?>" alt="<?= $fileName ?>" width="50" height="50">
        <div class="text"><?= $fileName ?></div>
    </div>

    <?php
    }
    ?>

</body>
</html>

