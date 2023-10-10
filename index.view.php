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
        <?php foreach ($animals as $animal) : ?> <!-- Task C: loops through the array of animals and prints them in a list -->
            <li><?= $animal; ?></li>
        <?php endforeach; ?>
    </ul>
    <ul> 
        <?php foreach ($tasks as $key => $task) : ?> <!-- Task D: loops through the array of tasks and keys then prints them in a list -->
            <li><strong><?= $key; ?></strong> <?= $task; ?></li>
        <?php endforeach; ?>
    </ul>
    <ul> <!-- Task E: listing the contents of the array of tasks and printing -->
        <li>
            <strong>Task: </strong> <?=$tasks['Title']; ?>
        </li>
        <li>
            <strong>Due: </strong> <?=$tasks['Due']; ?>
        </li>
        <li>
            <strong>Assigned To: </strong> <?=$tasks['Assigned_to']; ?>
        </li>
        <li>
            <strong>Status: </strong> <!-- if statement for checkbox -->
            <?php if ($tasks['Completed']) : ?>
                <span class="icon">&#9989;</span>
            <?php else : ?>
                <span class="icon">Incomplete</span>
            <?php endif; ?>
        </li>
    </ul>

</body>
</html>