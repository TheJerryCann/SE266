<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style></style>
</head>
<body>
    
    <ul>
        <?php foreach ($animals as $animal) : ?> <!-- loops through the array of animals and prints them in a list -->
            <li><?= $animal; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>