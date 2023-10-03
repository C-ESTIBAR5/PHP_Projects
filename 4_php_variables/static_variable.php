<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Variable</title>
</head>
<body>
<?php
function keep_track() {
 STATIC $count = 0;
 $count++;
 print $count;
 print "";
    }
    keep_track();
    keep_track();
    keep_track();
    keep_track();
    keep_track();
    keep_track();
    keep_track();
?>
</body>
</html>