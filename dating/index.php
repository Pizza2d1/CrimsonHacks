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
<html lang="en-US">
    <?php echo head(['all','dating']);?>
    <body>
      
    
    </body>
</html>

