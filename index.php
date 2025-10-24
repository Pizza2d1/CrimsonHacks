<?php $srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/include/all.php");?>

<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all']);?>
    <body>
    
    </body>
</html>
